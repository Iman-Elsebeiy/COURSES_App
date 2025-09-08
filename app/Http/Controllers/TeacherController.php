<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //
    
        public function dashboard(){



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
    
    
    


    //      $teacher = auth()->user();

    // $courses = $teacher->coursesTeaching()->with('students')->get();
    // $studentsCount = $courses->sum(fn($course) => $course->students->count());
    // $pendingTasks = 5;

    // return view('teacher.dashboard', compact('courses', 'studentsCount', 'pendingTasks'));
    // }}
    //       // Get all courses for this teacher (replace with Auth later if needed)
    //     $courses = Course::with('students')->get();

    //     // Total students across all courses
    //     $studentsCount = $courses->sum(fn($course) => $course->students->count());

    //     // Example pending tasks (replace with real logic later)
    //     $pendingTasks = 5;

    //     return view('teacher.dashboard', [
    //         'courses' => $courses,
    //         'studentsCount' => $studentsCount,
    //         'pendingTasks' => $pendingTasks,
    //     ]);
    // }
////////////////////////////////////////////////////////////////////
       

