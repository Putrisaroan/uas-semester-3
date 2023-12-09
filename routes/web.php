<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerpustakaanController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Use a more appropriate name for storing books
    Route::post('/perpustakaan', [PerpustakaanController::class, 'store'])->name('store.book');
    Route::get('/dashboard', [PerpustakaanController::class, 'index'])->name('dashboard');
    Route::put('/perpustakaan/{id}', [PerpustakaanController::class, 'update'])->name('update.book');
    Route::delete('/perpustakaan/{id}', [PerpustakaanController::class, 'destroy'])->name('destroy.book');
});


require __DIR__.'/auth.php';
