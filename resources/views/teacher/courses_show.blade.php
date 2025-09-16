@extends('teacher.teacher_master')

@section('content')
	<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Courses</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2> Course details</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="row g-0">

            {{-- course image--}}
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $course->course_image) }}" 
                     alt="{{ $course->name }}" 
                     class="img-fluid h-100 w-100 object-fit-cover">
            </div>

            {{-- course details --}}
            <div class="col-md-7 p-4">
                <h2 class="mb-3 text-primary fw-bold">{{ $course->name }}</h2>

                <p class="text-muted mb-4">{{ $course->description ?: 'No description available.' }}</p>

                {{-- <div class="mb-3">
                    <span class="badge bg-light text-dark px-3 py-2">
                        Category: {{ $course->category->title ?? 'N/A' }}
                    </span>
                </div> --}}

                <ul class="list-unstyled mb-4">
                      <li><strong>Category:</strong>  {{ $course->category->title ?? 'N/A' }}</li>
                    <li><strong>Lessons:</strong> {{ $course->lessons }}</li>
                    <li><strong>Price:</strong> ${{ number_format($course->price, 2) }}</li>
                </ul>

                {{-- course teacher details --}}
                <div class="d-flex align-items-center mb-4">
                    <img src="{{ asset('storage/' . $course->teacher_image) }}" 
                         alt="Teacher Image" 
                         class="rounded-circle me-3 border" width="70" height="70">
                    <div>
                        <h6 class="mb-0">{{ $course->teacher->name ?? 'Unknown Teacher' }}</h6>
                        <small class="text-muted">{{ $course->teacher_job ?? '' }}</small>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <a href="{{ route('teacher.courses.index') }}" class="btn btn-outline-secondary">
                        ⬅ Back
                    </a>
                    <a href="{{ route('teacher.courses.edit', $course->id) }}" class="btn btn-warning text-white">
                        ✏ Edit
                    </a>
                    <form action="{{ route('teacher.courses.destroy', $course->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this course?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            🗑 Delete
                        </button>
                    </form>
                    <a href="{{ route('teacher.lessons.create', $course->id) }}" class="btn btn-primary">
    Add Lesson
</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


