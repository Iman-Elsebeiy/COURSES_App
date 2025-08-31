@extends('layouts.app')
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">{{ $course->title }}</h2>
            <p><strong>Teacher:</strong> {{ $course->teacher_job }}</p>
            <p><strong>Description:</strong> {{ $course->description }}</p>
            <p><strong>Lessons:</strong> {{ $course->lessons }}</p>
            <p><strong>Price:</strong> ${{ $course->price }}</p>

            @if($course->course_image)
                <img src="{{ asset('storage/' . $course->course_image) }}" 
                     alt="Course Image" class="img-fluid rounded mt-3">
            @endif

            @if($course->teacher_image)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $course->teacher_image) }}" 
                         alt="Teacher Image" class="rounded-circle" width="100">
                </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('teacher.courses.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection

