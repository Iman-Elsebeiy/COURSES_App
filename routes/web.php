<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Teacher\CourseController;

use App\Http\Controllers\CategoryController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


// Route::get('/', function () {
//     return view('welcome');
// });

/////
Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    // Route::get('/posts', [AdminController::class, 'posts'])->name('admin.posts');
    // Route::get('/addpost', [AdminController::class, 'addpost'])->name('admin.addpost');
});
//teacher routes



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/addpost', [PostController::class, 'addpost'])->name('addpost');   // صفحة إضافة
    Route::post('/addpost', [PostController::class, 'store'])->name('savepost');   // تخزين البوست
    Route::get('/posts', [PostController::class, 'posts'])->name('posts');         // صفحة عرض البوستات
 Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy'); // حذف البوس
   Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit'); // صفحة التعديل
    Route::post('/posts/{id}/update', [PostController::class, 'update'])->name('posts.update'); //

});






Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/courses', [CourseController::class, 'courses'])->name('courses');   // عرض الكورسات
    Route::get('/addcourse', [CourseController::class, 'addCourse'])->name('addcourse');   // صفحة إضافة كورس
    Route::post('/addcourse', [CourseController::class, 'store'])->name('savecourse');   // تخزين الكورس
    // حذف كورس
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

    // صفحة تعديل كورس
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');

    // تحديث كورس
    Route::post('/courses/{id}/update', [CourseController::class, 'update'])->name('courses.update');
});




// Route::middleware([ 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
//     Route::get('/dashboard', [TeacherController::class, 'index']) ->name('dashboard');

//     Route::resource('courses', CourseController::class);
//     Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
//     Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
//     Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
//     Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');


// });

//admin routes

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

// <<<<<<< HEAD
// =======
require __DIR__.'/admin.php';
// >>>>>>> 532bcb847774a53ce96524992e330ca68af17e0
require __DIR__.'/admin.php';
//  require __DIR__ . '/admin_auth.php';


// index
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/aboutUs', [HomeController::class, 'about'])->name('home.about');
Route::get('/courses', [HomeController::class, 'courses'])->name('home.courses');
Route::get('/News', [HomeController::class, 'blog'])->name('home.blog');
Route::get('/contactUS', [HomeController::class, 'contact'])->name('home.contact');


//student



/////////////////////////

// Routes for authenticated users
Route::middleware(['auth'])->group(function () {


    // Routes only for teachers

Route::middleware([ 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard']) ->name('dashboard');

//courses
    Route::resource('courses', CourseController::class);
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');


});


    // Routes only for students

    Route::middleware(['role:student'])->group(function () {
        Route::get('/student/dashboard', function () {
            return view('student.dashboard');})->name('student.dashboard');
        });
        // Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    //     Route::get('/student/courses', [StudentController::class, 'courses'])->name('student.courses');
    //     Route::post('/student/enroll/{course}', [StudentController::class, 'enroll'])->name('student.enroll');
    });

    // Shared routes for both roles

    // Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');


//////

 // <-- Add this to close the Route::middleware(['auth'])->group(function () { block

