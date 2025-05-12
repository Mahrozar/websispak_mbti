<?php
namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the jobs.
     */
    public function index()
    {
        $jobs = Job::all(); // Retrieve all jobs from the database
        return view('mbti.jobs', compact('jobs'));
    }
}