<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('list', TodoController::class)->middleware('auth');

// Route::get('/list', [TodoController::class, 'index'])->name('list.index');
    
// Route::get('/list/create', [TodoController::class, 'create'])->name('list.create');

// Route::post('/create', [TodoController::class, 'store'])->name('list.store');

// Route::get('/list/{id}/edit', [TodoController::class, 'edit'])->name('list.edit');

// Route::put('/edit/{id}', [TodoController::class, 'update'])->name('list.update');

// Route::delete('/lists/{id}', [TodoController::class, 'destroy'])->name('list.destroy');


require __DIR__.'/auth.php';
