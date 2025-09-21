<?php

// namespace App\Http\Controllers\Teacher;

// use App\Http\Controllers\Controller;
// use App\Models\Course;
// use App\Models\Category;
// use App\Models\User;
// use Illuminate\Http\Request;



// class CourseController extends Controller
// {
//     // عرض الكورسات
//     public function courses()
//     {
//         $courses = Course::with(['category', 'teacher'])->get();
//         // هيرجع للملف resources/views/admin/courses.blade.php
//         return view('admin.courses', compact('courses'));
//     }

//     // صفحة إضافة كورس
//     public function addCourse()
//     {
//         $categories = Category::all();
//         $teachers   = User::all(); // أو تجيب بس المدرسين
//         // هيرجع للملف resources/views/admin/addcourse.blade.php
//         return view('admin.addcourse', compact('categories', 'teachers'));
//     }

//     // تخزين كورس جديد
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name'         => 'required|string|max:255|unique:courses',
//             'course_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
//             'teacher_image'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
//             'teacher_job'  => 'nullable|string|max:255',
//             'lessons'      => 'nullable|integer|min:0',
//             'price'        => 'nullable|numeric|min:0',
//             'category_id'  => 'nullable|exists:categories,id',
//             'teacher_id'   => 'required|exists:users,id',
//         ]);

//         $data = $request->all();

//         if ($request->hasFile('course_image')) {
//             $data['course_image'] = $request->file('course_image')->store('courses', 'public');
//         }

//         if ($request->hasFile('teacher_image')) {
//             $data['teacher_image'] = $request->file('teacher_image')->store('teachers', 'public');
//         }

//         Course::create($data);

//         return redirect()->route('admin.courses')->with('success', 'تمت إضافة الكورس بنجاح');
//     }



//     // صفحة تعديل كورس
//     public function edit($id)
//     {
//         $course = Course::findOrFail($id);
//         $categories = Category::all();
//         $teachers = User::all();
//         return view('admin.editcourse', compact('course', 'categories', 'teachers'));
//     }

//     // تحديث كورس
//     public function update(Request $request, $id)
//     {
//         $course = Course::findOrFail($id);

//         $request->validate([
//             'name'        => 'required|string|max:255|unique:courses,name,' . $course->id,
//             'teacher_job' => 'nullable|string|max:255',
//             'lessons'     => 'nullable|integer|min:0',
//             'price'       => 'nullable|numeric|min:0',
//             'category_id' => 'nullable|exists:categories,id',
//             'teacher_id'  => 'required|exists:users,id',
//         ]);

//         $data = $request->all();

//         if ($request->hasFile('course_image')) {
//             $data['course_image'] = $request->file('course_image')->store('courses', 'public');
//         }

//         if ($request->hasFile('teacher_image')) {
//             $data['teacher_image'] = $request->file('teacher_image')->store('teachers', 'public');
//         }

//         $course->update($data);

//         return redirect()->route('admin.courses')->with('success', 'تم تحديث الكورس بنجاح');
//     }

//     // حذف كورس
//     public function destroy($id)
//     {
//         $course = Course::findOrFail($id);
//         $course->delete();
//         return redirect()->route('admin.courses')->with('success', 'تم حذف الكورس بنجاح');
//     }
// }


