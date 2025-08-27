<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


// index
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/aboutUs', [HomeController::class, 'about'])->name('home.about');
Route::get('/courses', [HomeController::class, 'courses'])->name('home.courses');
Route::get('/News', [HomeController::class, 'blog'])->name('home.blog');
Route::get('/contactUS', [HomeController::class, 'contact'])->name('home.contact');
