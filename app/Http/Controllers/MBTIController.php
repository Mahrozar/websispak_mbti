<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MBTI;
use App\Models\Job;
use App\Models\Rule;
use App\Models\Question;

class MBTIController extends Controller
{
    public function index()
    {
        return view('mbti.index');
    }

    public function showTest()
    {
        $questions = Question::all();
        return view('mbti.test', compact('questions'));
    }

    public function submitTest(Request $request)
    {
        $answers = $request->input('answers', []);

        $mbtiScores = [
            'E' => 0, 'I' => 0,
            'S' => 0, 'N' => 0,
            'T' => 0, 'F' => 0,
            'J' => 0, 'P' => 0,
        ];

        foreach ($answers as $questionId => $score) {
            $question = Question::find($questionId);
            if ($score >= 3) {
                $mbtiScores[$question->mbti_type] += $score - 3;
            } else {
                $oppositeType = $this->getOppositeType($question->mbti_type);
                $mbtiScores[$oppositeType] += 3 - $score;
            }
        }

        $mbtiResult = '';
        $mbtiResult .= $mbtiScores['E'] >= $mbtiScores['I'] ? 'E' : 'I';
        $mbtiResult .= $mbtiScores['S'] >= $mbtiScores['N'] ? 'S' : 'N';
        $mbtiResult .= $mbtiScores['T'] >= $mbtiScores['F'] ? 'T' : 'F';
        $mbtiResult .= $mbtiScores['J'] >= $mbtiScores['P'] ? 'J' : 'P';

        $mbti = MBTI::where('type', $mbtiResult)->first();

        if (!$mbti) {
            return redirect()->back()->withErrors(['msg' => 'Hasil MBTI tidak ditemukan dalam database.']);
        }

        $rules = Rule::where('mbti_id', $mbti->id)->get() ?? collect();
        $recommendations = [];

        foreach ($rules as $rule) {
            $job = Job::find($rule->job_id);
            if ($job) {
                $recommendations[] = [
                    'job' => $job->name,
                    'description' => $job->description ?? '-',
                    'certainty' => $rule->cf_value * 100,
                ];
            }
        }

        usort($recommendations, fn($a, $b) => $b['certainty'] <=> $a['certainty']);

        // Simpan hasil ke session agar bisa diakses di /result
        session([
            'mbtiResult' => $mbtiResult,
            'mbtiScores' => $mbtiScores,
            'recommendations' => $recommendations,
            'mbti' => $mbti,
        ]);

        return redirect('/result');
    }

    public function showResult()
    {
        $mbtiResult = session('mbtiResult');
        $mbtiScores = session('mbtiScores');
        $recommendations = session('recommendations');
        $mbti = session('mbti');
        if (!$mbtiResult || !$mbtiScores) {
            return redirect('/test');
        }
        return view('mbti.result', compact('mbtiResult', 'mbtiScores', 'recommendations', 'mbti'));
    }

    private function getOppositeType($type)
    {
        $opposites = [
            'E' => 'I', 'I' => 'E',
            'S' => 'N', 'N' => 'S',
            'T' => 'F', 'F' => 'T',
            'J' => 'P', 'P' => 'J',
        ];

        return $opposites[$type] ?? null;
    }

    public function dashboard(Request $request)
    {
        $mbtiData = MBTI::select('type', MBTI::raw('count(*) as total'))
            ->groupBy('type')
            ->get();

        $mbtiLabels = $mbtiData->pluck('type');
        $mbtiCounts = $mbtiData->pluck('total');

        $searchResults = null;
        if ($request->has('search')) {
            $search = $request->input('search');
            $searchResults = [
                'mbti' => MBTI::where('type', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->get(),
                'jobs' => Job::where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->get(),
            ];

            if ($searchResults) {
                session()->flash('success', 'Search completed successfully!');
            } else {
                session()->flash('error', 'No results found for your search.');
            }
        }

        return view('mbti.dashboard', [
            'mbtiLabels' => $mbtiLabels,
            'mbtiData' => $mbtiCounts,
            'searchResults' => $searchResults,
        ]);
    }

    public function recommendation(Request $request)
    {
        $request->validate([
            'mbti_type' => 'required|string|exists:m_b_t_i_s,type',
            'range' => 'required|integer|min:1|max:5',
        ]);

        $mbti = MBTI::where('type', $request->mbti_type)->first();

        if (!$mbti) {
            return redirect()->back()->withErrors(['msg' => 'MBTI type not found!']);
        }

        $mbti->range = $request->range;
        $mbti->save();

        $rules = Rule::where('mbti_id', $mbti->id)->get() ?? collect();
        $recommendations = [];

        foreach ($rules as $rule) {
            $job = Job::find($rule->job_id);
            if ($job) {
                $recommendations[] = [
                    'job' => $job->name,
                    'description' => $job->description ?? '-',
                    'certainty' => $rule->cf_value * 100,
                ];
            }
        }

        usort($recommendations, function ($a, $b) {
            return $b['certainty'] <=> $a['certainty'];
        });

        return view('mbti.recommendation', compact('recommendations'));
    }

    public function jobs()
    {
        $jobs = Job::all();
        return view('mbti.jobs', compact('jobs'));
    }

    public function jobDetail($id)
    {
        $job = Job::findOrFail($id);
        return view('mbti.job_detail', compact('job'));
    }

    public function mbtiDetail($id)
    {
        $mbti = MBTI::findOrFail($id);
        return view('mbti.mbti_detail', compact('mbti'));
    }

    public function mbtiList()
    {
        $mbtiList = MBTI::all();
        return view('mbti.mbti_list', compact('mbtiList'));
    }

    public function types()
    {
        $mbtiTypes = MBTI::all();
        return view('mbti.types', compact('mbtiTypes'));
    }
}
