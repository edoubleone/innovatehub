<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\DonateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Named routes power the navigation menu, footer, and in-page links. Every
| URL here corresponds to one of the Blade views in resources/views/pages.
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/programs',          [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');

Route::get('/about',   [AboutController::class,   'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/apply',           [ApplicationController::class, 'create'])->name('apply');
Route::get('/apply/thank-you', [ApplicationController::class, 'thanks'])->name('apply.thanks');
Route::get('/apply/status',    [ApplicationController::class, 'status'])->name('apply.status');

Route::get('/donate',          [DonateController::class, 'index'])->name('donate');
Route::post('/donate',         [DonateController::class, 'store'])->name('donate.store');
Route::get('/donate/success',  [DonateController::class, 'success'])->name('donate.success');

Route::get('/privacy', [LegalController::class, 'privacy'])->name('legal.privacy');
Route::get('/terms',   [LegalController::class, 'terms'])->name('legal.terms');
