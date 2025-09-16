<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    //

    //  public function index()
    // {
    //     //
    //     // $courses = Course::where('teacher_id', auth()->id())->get();
    //     // $courses = Course::all();
    //     $lessons = Lesson::all(); 
    //     return view('teacher.lessons.index', compact('lessons'));

    // }
    //     public function create(Course $course)
    // {
    //     return view('teacher.lessons.create', compact('course'));
    // }
       public function index($courseId)
    {
        $course = Course::with('lessons')->findOrFail($courseId);
        return view('teacher.lessons_index', ['course' => $course
    ,'lessons' => $course->lessons]);//  collection of Lesson models
    }

    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('teacher.lessons_create', compact('course'));
    }
      public function store(Request $request, $courseId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|string',
            'video_file' => 'nullable|file|mimes:pdf,docx,mp4,avi,mkv',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['course_id'] = $courseId;

        if ($request->hasFile('video_file')) {
            $data['video_file'] = $request->file('video_file')->store('lessons', 'public');
        }

        Lesson::create($data);

        return redirect()->route('teacher.lessons.index', $courseId)->with('success', 'Lesson created successfully!');
    }

    // public function edit($courseId, $lessonId)
    // {
    //     $course = Course::findOrFail($courseId);
    //     $lesson = Lesson::findOrFail($lessonId);

    //     return view('teacher.lessons.edit', compact('course', 'lesson'));
    // }

    // public function update(Request $request, $courseId, $lessonId)
    // {
    //     $lesson = Lesson::findOrFail($lessonId);

    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'video_url' => 'nullable|string',
    //         'video_file' => 'nullable|file|mimes:pdf,docx,mp4,avi,mkv',
    //         'order' => 'nullable|integer',
    //     ]);

    //     $data = $request->all();

    //     if ($request->hasFile('video_file')) {
    //         $data['video_file'] = $request->file('video_file')->store('lessons', 'public');
    //     }

    //     $lesson->update($data);

    //     return redirect()->route('teacher.lessons.index', $courseId)->with('success', 'Lesson updated successfully!');
    // }

    // public function destroy($courseId, $lessonId)
    // {
    //     $lesson = Lesson::findOrFail($lessonId);
    //     $lesson->delete();

    //     return redirect()->route('teacher.lessons.index', $courseId)->with('success', 'Lesson deleted successfully!');
    // }
}

//     public function store(Request $request, Course $course)
//     {
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'nullable|string',
//             'video_url' => 'nullable|url',
//             'video_file' => 'nullable|mimes:mp4,mov,avi|max:20480', // max 20MB
//         ]);

//         $videoPath = null;
//         if ($request->hasFile('video_file')) {
//             $videoPath = $request->file('video_file')->store('lessons', 'public');
//         }

//         Lesson::create([
//             'course_id' => $course->id,
//             'title' => $request->title,
//             'description' => $request->description,
//             'video_url' => $request->video_url,
//             'video_file' => $videoPath,
//         ]);

//         return redirect()->route('courses.show', $course->id)
//             ->with('success', 'Lesson added successfully!');
//     }
// }
