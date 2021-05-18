<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Models\Announcement;
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
Route::get('/nuovo/annuncio', [HomeController::class, 'newAnnouncement'])->name('announcement.new');

Route::get('/crea/annuncio', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/salva/annuncio', [AnnouncementController::class, 'store'])->name('announcement.store');
// Rotta per visualizzare tutti annuni
Route::get('/tutti/annunci/',[PublicController::class,'index'])->name('announcements.index');
// ROTTA PER SINGOLO ARTICOLO
Route::get('/annuncio/{announcement}/mostra',[PublicController::class, 'showAnnouncement'])->name('announcement.show');
Route::get('/categoria/{category}/annunci', [PublicController::class, 'show'])->name('announcements.show');
Route::post('/locale/{locale}', [PublicController::class ,'locale'])->name('locale');
Route::view('not_revisor', 'not_revisor')->name('not_revisor');

//! Rotta per i revisori
Route::get('/revisione/annunci', [RevisorController::class, 'index'])->name('revisor.index');

Route::post('/revisione/{announcement}/accettati', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisione/{announcement}/rifiutati', [RevisorController::class, 'reject'])->name('revisor.reject');
Route::get('/revisione/annunci/cestino', [RevisorController::class, 'bin'])->name('revisor.bin');

Route::put('/revisione/{announcement}/annulla', [RevisorController::class, 'unDo'])->name('revisor.undo');

// ROTTA PER LA RICERCA
Route::get('/cerca', [PublicController::class, 'search'])->name('search');

// ROTTA PER LAVORA CON NOI
Route::get('/offerta/lavoro', [AnnouncementController::class, 'work'])->name('work.offer');
Route::post('/candidatura', [AnnouncementController::class, 'application'])->name('application');

//! Rotte dropzone

Route::post('/annuncio/immagine/upload', [AnnouncementController::class, 'uploadImages'])->name('upload.images');
Route::delete('/annuncio/immagine/remove', [AnnouncementController::class, 'removeImages'])->name('remove.images');

Route::get('/annuncio/immagini',[AnnouncementController::class, 'getImage'])->name('get.images');