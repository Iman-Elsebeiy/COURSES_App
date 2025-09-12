


@extends('teacher.teacher_master')

@section('title')
    <title>Manage Courses</title>
@endsection

@section('content')


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>📚 My Courses</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">My Courses</h2>
            <a href="{{ route('teacher.courses.create') }}" class="btn btn-success">
                ➕ Create Course
            </a>
        </div>

        <div class="card shadow-lg border-0">
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Course Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Lessons</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $index => $course)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($course->course_image)
                                        <img src="{{ asset('storage/' . $course->course_image) }}"
                                             alt="Course Image"
                                             class="img-thumbnail" width="80">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $course->name }}</td>
                                <td>{{ Str::limit($course->description, 50) }}</td>
                                <td>{{ $course->lessons }}</td>
                                <td class="text-success fw-bold">${{ $course->price }}</td>
                                <td>  {{ $course->category ? $course->category->title : 'No Category' }}</td>
                                <td>
                                    <a href="{{ route('teacher.courses.show', $course->id) }}" 
                                       class="btn btn-sm btn-primary">👁 View</a>
                                    <a href="{{ route('teacher.courses.edit', $course->id) }}" 
                                       class="btn btn-sm btn-warning">✏ Edit</a>
    <form action="{{ route('teacher.courses.destroy', $course->id) }}" 
      method="POST" 
      class="d-inline delete-form" 
      id="delete-form-{{ $course->id }}">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $course->id }})">
        🗑 Delete
    </button>
</form>


                                    {{-- <form action="{{ route('teacher.courses.destroy', $course->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                               
                                                class="btn btn-sm btn-danger">🗑 Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-muted">No courses available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
function confirmDelete(courseId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + courseId).submit();
        }
    });
}
    // Show success message if exists
    @if(session('deleted'))
    Swal.fire({
        icon: 'success',
        title: 'Deleted!',
    text: '{{ session('deleted') }}',
    timer: 2000,
    showConfirmButton: false
})
@endif
@if(session('created'))
Swal.fire({
    icon: 'success',
    title: 'Created!',
    text: '{{ session('created') }}',
    timer: 2000,
    showConfirmButton: false
})
@endif

@if(session('updated'))
Swal.fire({
    icon: 'success',
    title: 'Updated!',
    text: '{{ session('updated') }}',
    timer: 2000,
    showConfirmButton: false
})
@endif
</script>
@endpush

@endsection

     

