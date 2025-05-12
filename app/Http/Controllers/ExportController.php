namespace App\Http\Controllers;

use App\Models\MBTI;
use App\Models\Job;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportController extends Controller
{
    public function exportMBTI()
    {
        return Excel::download(new class implements FromCollection {
            public function collection()
            {
                return MBTI::all();
            }
        }, 'mbti_data.xlsx');
    }

    public function exportJobs()
    {
        return Excel::download(new class implements FromCollection {
            public function collection()
            {
                return Job::all();
            }
        }, 'jobs_data.xlsx');
    }
}