<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //
       public function index()
    {
        $teacher = Auth::user();

        // Example data you might later replace with real DB queries
        $courses = [
            ['name' => 'Math 101', 'students' => 25],
            ['name' => 'Science 202', 'students' => 18],
            ['name' => 'History 303', 'students' => 30],
        ];

        return view('teacher.dashboard', compact('teacher', 'courses'));
    }
}


