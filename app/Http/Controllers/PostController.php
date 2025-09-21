<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\user;


class PostController extends Controller
{
    // صفحة إضافة البوست
    public function addpost()
    {
        return view('admin.addpost'); // مش محتاج كاتيجوري
    }


    // عرض البوستات
    public function store(Request $request)
{
    $user = auth('web')->user();
    // تحقق إن المستخدم Teacher
    if ($user->role !== 'teacher') {
        return redirect()->back()->with('error', 'مسموح فقط للمدرسين بإضافة البوستات');
    }

    // التحقق من البيانات
    $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required|string',
        'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // جهّز البيانات
    $data = $request->only(['title', 'content']);
    $data['user_id'] = $user->id; // ربط البوست بالمدرس

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('posts', 'public');
    }

    // إنشاء البوست
    Post::create($data);

    return redirect()->route('admin.posts')->with('success', 'تم إضافة البوست بنجاح');
}

    public function posts()
    {
        $posts = Post::with('teacher')->latest()->get(); // شيلنا الـ category
        return view('admin.posts', compact('posts'));
    }
    public function destroy($id)
{
    $post = Post::findOrFail($id); // جلب البوست أو عرض 404 لو مش موجود
    $post->delete(); // حذف البوست
    return redirect()->route('admin.posts')->with('success', 'تم حذف البوست بنجاح');
}
// صفحة تعديل البوست
public function edit($id)
{
    $post = Post::findOrFail($id);
    return view('admin.editpost', compact('post'));
}

// حفظ التعديل
public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);

    $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required|string',
        'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('posts', 'public');
    }

    $post->update($data);

    return redirect()->route('admin.posts')->with('success', 'تم تحديث البوست بنجاح');
}

}


