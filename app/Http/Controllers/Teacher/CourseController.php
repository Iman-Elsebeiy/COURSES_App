<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Course;
use App\Models\Category;
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
        $courses = Course::all();
        return view('teacher.courses_index', compact('courses'));
        
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
     */
    public function store(StoreCourseRequest $request)
    {
        //


          $validated = $request->validate([
        'name' => 'required|string|max:255|unique:courses,name',
        'teacher_job' => 'nullable|string|max:255',
        'lessons' => 'nullable|integer|min:0',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        // 'category' => 'nullable|string|max:255',
        'category_id' => 'required|exists:category,id',
        'course_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'teacher_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Handle course image
    if ($request->hasFile('course_image')) {
        $validated['course_image'] = $request->file('course_image')->store('courses', 'public');
    }

    // Handle teacher image
    if ($request->hasFile('teacher_image')) {
        $validated['teacher_image'] = $request->file('teacher_image')->store('teachers', 'public');
    }

    Course::create($validated);
        // Create Course
    // Course::create([
    //     'name' => $request->name,
    //     'description' => $request->description,
    //     'course_image' => $courseImagePath,
    //     'teacher_image' => $teacherImagePath,
    //     'teacher_job' => $request->teacher_job,
    //     'lessons' => $request->lessons,
    //     'category_id' => $request->category_id,
    //     'price' => $request->price,

    //     'teacher_id' => auth()->id(), // assuming logged-in teacher creates course
    // ]);


    return redirect()->route('courses.index')->with('success', 'Course created successfully!');
}
 

    // $request->validate([
    //     'name' => 'required|string|max:255|unique:courses,name',
    //     'description' => 'nullable|string|max:500',
    //     'price' => 'required|numeric|min:0',
    //     'course_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //     'teacher_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //     'teacher_job' => 'nullable|string|max:255',
    //     'lessons' => 'nullable|integer|min:1',
    // ]);

    // // Save images if uploaded
    // $courseImagePath = $request->file('course_image')?->store('courses', 'public');
    // $teacherImagePath = $request->file('teacher_image')?->store('teachers', 'public');


    // return redirect()->route('teacher.dashboard')->with('success', 'Course created successfully!');



        
    // $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //     ]);

    //     Course::create([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'teacher_id' => auth()->id(), // assumes you track teacher
    //     ]);

    //     return redirect()->route('dashboard')->with('success', 'Course created successfully!');
    





    

    /**
     * Display the specified resource.
     */
  
        //
        public function show($id)
{
    $course = Course::with('lessons')->findOrFail($id);
    return view('teacher.courses_show', compact('course'));
}

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
