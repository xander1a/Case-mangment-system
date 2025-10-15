<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CasseController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\MedicalTreatmentController;
use App\Http\Controllers\PsychologicalSupportController;
use App\Http\Controllers\LegalAdviceController;
use App\Http\Controllers\GbvSupportController;
use App\Http\Controllers\SocialSupportController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\VictimController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\http\Controllers\UpdatesController;



// Built-in auth routes (login, register, logout, etc.)

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/victims_create', function () {
    return view('auth.victim_create');
})->name('victim.report');

// Home/Dashboard
Route::get('/dashboard', [HomeController::class, 'index']);

// Victim management (Admin/Investigator)
Route::resource('victims', VictimController::class);

// Cases (Investigator opens case, all roles view)
Route::resource('cases', CasseController::class);
Route::get('/cases/{case}/assign', [CasseController::class, 'assign'])->name('cases.assign');

// Testimony (Investigator collects after opening case)
Route::resource('testimonies', TestimonyController::class);

// Medical Treatment (Doctor branch)
Route::resource('medical-treatments', MedicalTreatmentController::class);

// Psychological Support (Counselor branch)
Route::resource('psychological-supports', PsychologicalSupportController::class);

// Legal Advice (Legal Officer branch)
Route::resource('legal-advices', LegalAdviceController::class);

// GBV Support (GBV Officer branch)
Route::resource('gbv-supports', GbvSupportController::class);

// Social Support (Social Worker branch)
Route::resource('social-supports', SocialSupportController::class);

// Reports (Specialists submit, simulates email submission)
Route::resource('reports', ReportController::class);
Route::post('/reports/{case}/submit-all', [ReportController::class, 'submitAll'])->name('reports.submitAll');

// Updates (Sent to victim, simulates SMS/Phone)
Route::resource('updates', UpdateController::class);





Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::resource('users', UserController::class);