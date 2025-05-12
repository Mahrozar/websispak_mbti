<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MBTIController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Auth;

// Mengganti Auth::routes() dengan rute manual untuk login dan register
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
// Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/', [MBTIController::class, 'index']);
Route::post('/recommendation', [MBTIController::class, 'recommendation']);
Route::get('/dashboard', [MBTIController::class, 'dashboard'])->middleware('auth');
Route::get('/export-mbti', [ExportController::class, 'exportMBTI'])->middleware('auth')->name('export.mbti');
Route::get('/export-jobs', [ExportController::class, 'exportJobs'])->middleware('auth')->name('export.jobs');
Route::get('/about', function () {
    return view('mbti.about');
})->name('about');
Route::get('/test', [MBTIController::class, 'showTest'])->middleware('auth');
Route::post('/test', [MBTIController::class, 'submitTest'])->middleware('auth')->name('mbti.submit');
Route::get('/result', [MBTIController::class, 'showResult'])->middleware('auth')->name('mbti.result');

// Route for MBTI Types page
Route::get('/types', [App\Http\Controllers\MBTIController::class, 'types']);

// Route for Jobs page
Route::get('/jobs', [App\Http\Controllers\JobController::class, 'index']);

// Route for Rules page
Route::get('/rules', [App\Http\Controllers\RuleController::class, 'index']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect('/dashboard');
})->name('home');
// Route::get('/mbti', [MBTIController::class, 'index'])->name('mbti.index');
// Route::get('/mbti/recommendation', [MBTIController::class, 'recommendation'])->name('mbti.recommendation');
// Route::get('/mbti/dashboard', [MBTIController::class, 'dashboard'])->name('mbti.dashboard');
// Route::get('/mbti/test', [MBTIController::class, 'showTest'])->name('mbti.test');
// Route::post('/mbti/test', [MBTIController::class, 'submitTest'])->name('mbti.test.submit');
// Route::get('/mbti/types', [MBTIController::class, 'types'])->name('mbti.types');
// Route::get('/mbti/jobs', [JobController::class, 'index'])->name('mbti.jobs');
// Route::get('/mbti/rules', [RuleController::class, 'index'])->name('mbti.rules');
Route::get('/mbti/about', function () {
    return view('mbti.about');
})->name('mbti.about');
// Route::get('/mbti/export-mbti', [ExportController::class, 'exportMBTI'])->name('mbti.export.mbti');
// Route::get('/mbti/export-jobs', [ExportController::class, 'exportJobs'])->name('mbti.export.jobs');
// Route::get('/mbti/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('mbti.login');
// Route::post('/mbti/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('mbti.login.submit');
// Route::post('/mbti/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('mbti.logout');
// Route::get('/mbti/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('mbti.register');
// Route::post('/mbti/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('mbti.register.submit');
// Route::get('/mbti/password/reset', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('mbti.password.request');
