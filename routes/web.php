<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\NoteController;


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

Route::get('/clear-cache', function () {
   Artisan::call('cache:clear');
   Artisan::call('route:clear');
   Artisan::call('view:clear');
   Artisan::call('config:clear');
   return redirect()->route('dashboard')->with(['key'=>200]);
})->name('clear');


Route::get('/', function(){
    return redirect()->route('login');
});
Route::get('/dashboard', function () {
    return view('frontend.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // note
    Route::post('/addnote', [NoteController::class, 'AddNote'])->name('addnote');
    Route::post('/addimages/{id}', [NoteController::class, 'AddImages'])->name('addimages');
    Route::get('/getnote', [NoteController::class, 'GetNote'])->name('getnote');
    Route::get('/deletenote/{id}', [NoteController::class, 'DeleteNote'])->name('deletenote');
    Route::get('/edatenote/{id}', [NoteController::class, 'EdateNote'])->name('edatenote');
    Route::post('/updatenote/{id}', [NoteController::class, 'UpdateNote'])->name('updatenote');
    Route::post('/updatenoteimage/{id}', [NoteController::class, 'UpdateNoteImage'])->name('updatenoteimage');
    Route::get('/deletesingleimage/{id}', [NoteController::class, 'DeleteSingleImage'])->name('deletesingleimage');



    
    

});

require __DIR__.'/auth.php';
