<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//admin routes
Route::prefix('admin')->name('admin.')->group(function(){
 Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
 require __DIR__.'/admin_auth.php';
});
