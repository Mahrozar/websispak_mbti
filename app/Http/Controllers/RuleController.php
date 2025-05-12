<?php
namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the rules.
     */
    public function index()
    {
        $rules = Rule::all(); // Retrieve all rules from the database
        return view('mbti.rules', compact('rules'));
    }
}