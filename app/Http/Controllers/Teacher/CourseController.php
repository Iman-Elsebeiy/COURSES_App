<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $courses = Course::where('teacher_id', auth()->id())->get();
        // $courses = Course::all();
        // $courses = auth()->user()->courses()->with('category')->get();//show category with name(title)
        // return view('teacher.courses_index', compact('courses'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();

        return view('teacher.courses_create', compact('categories')); //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * 
     * 
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:courses,name',
        'teacher_job' => 'nullable|string|max:255',
        'lessons' => 'nullable|integer|min:0',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:category,id', 
        'course_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'teacher_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        // dd("passed")
    ]);

    //save course image
    if ($request->hasFile('course_image')) {
        $validated['course_image'] = $request->file('course_image')->store('courses', 'public');
    }

    //save teacher image
    if ($request->hasFile('teacher_image')) {
        $validated['teacher_image'] = $request->file('teacher_image')->store('teachers', 'public');
    }

    //connect course to current teacher
    $validated['teacher_id'] = auth()->id();
  
    // create course

    Course::create($validated);

    return redirect()->route('teacher.courses.index')
                     ->with('created', 'Course created successfully!');
    // return back()->with('success', 'Course created successfully!');
}

///////////////////////////////////










    

//     /**
//      * Display the specified resource.
//      */
  
//         //
//         public function show($id)
// {
//     $course = Course::with('lessons')->findOrFail($id);
//     return view('teacher.courses_show', compact('course'));
// }

    

    /**
     * Show the form for editing the specified resource.
     */

}
