@extends('teacher.teacher_master')
@section('title')
    <title>Lessons for {{ $course->name }}</title>
    @section('content')

<h3>Lessons for {{ $course->name }}</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Lesson Title</th>
            <th>Description</th>
            <th>Duration</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($lessons as $lesson)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lesson->title }}</td>
                <td>{{ $lesson->description }}</td>
                <td>{{ $lesson->duration }}</td>
                <td>
                    <a href="{{ route('teacher.lessons.edit', [$course->id, $lesson->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('teacher.lessons.destroy', [$course->id, $lesson->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No lessons yet.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('teacher.lessons.create', $course->id) }}" class="btn btn-success">Add Lesson</a>

@endsection


{{-- @extends('teacher.teacher_master')

@section('content')
<div class="container mt-4">
    <h2>{{ $course->name }} - Lessons</h2>
    <a href="{{ route('teacher.lessons.create', $course->id) }}" class="btn btn-primary mb-3">Add Lesson</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order</th>
                <th>Title</th>
                <th>Description</th>
                <th>Video</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($course->lessons as $lesson)
            <tr>
                <td>{{ $lesson->order }}</td>
                <td>{{ $lesson->title }}</td>
                <td>{{ Str::limit($lesson->description, 50) }}</td>
                <td>
                    @if($lesson->video_url)
                        <a href="{{ $lesson->video_url }}" target="_blank">Watch</a>
                    @endif
                </td>
                <td>
                    @if($lesson->file_path)
                        <a href="{{ asset('storage/'.$lesson->file_path) }}" target="_blank">Download</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('teacher.lessons.edit', [$course->id, $lesson->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('teacher.lessons.destroy', [$course->id, $lesson->id]) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this lesson?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}
