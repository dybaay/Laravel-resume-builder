<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SkillController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return view('main');
});


Route::get('/resume/download', [ResumeController::class, 'download'])->name('resume.download');
Route::get('/resume', [ResumeController::class, 'index'])->name('resume.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::resource('user-detail', UserDetailController::class);

Route::resource('education', EducationController::class);

Route::resource('experience', ExperienceController::class);
Route::resource('skill', SkillController::class);
});




