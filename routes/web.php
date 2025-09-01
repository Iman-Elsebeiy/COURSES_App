<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


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

Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/admin/categories',       [CategoryController::class, 'store'])->name('categories.store');

Route::resource('categories', CategoryController::class);
// عرض كل الكاتيجوريز
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');

// صفحة تعديل كاتيجوري
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// تحديث الكاتيجوري
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

// حذف الكاتيجوري
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


// index
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/aboutUs', [HomeController::class, 'about'])->name('home.about');
Route::get('/courses', [HomeController::class, 'courses'])->name('home.courses');
Route::get('/News', [HomeController::class, 'blog'])->name('home.blog');
Route::get('/contactUS', [HomeController::class, 'contact'])->name('home.contact');


//Posts... news

Route::get('/News', [PostController::class, 'index'])->name('home.blog');
