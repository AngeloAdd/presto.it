<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[PublicController::class, 'indexHome']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/crea/annuncio', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/salva/annuncio', [AnnouncementController::class, 'store'])->name('announcement.store');
// Rotta per visualizzare tutti annuni
Route::get('/tutti/annunci/',[PublicController::class,'index'])->name('announcements.index');
Route::get('/categoria/{category}/annunci', [PublicController::class, 'show'])->name('announcements.show');
