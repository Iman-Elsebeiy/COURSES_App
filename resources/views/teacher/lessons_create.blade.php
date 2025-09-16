{{-- @extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-primary">Add Lesson to {{ $course->name }}</h2>

    <form action="{{ route('lessons.store', $course->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-lg">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Lesson Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Lesson Description</label>
            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="video_url" class="form-label">Video URL (YouTube/Vimeo)</label>
            <input type="url" name="video_url" id="video_url" class="form-control" placeholder="https://youtube.com/...">
        </div>

        <div class="mb-3">
            <label for="video_file" class="form-label">Or Upload Video File</label>
            <input type="file" name="video_file" id="video_file" class="form-control" accept="video/*">
        </div>

        <button type="submit" class="btn btn-success">Add Lesson</button>
    </form>
</div>
@endsection --}}
@extends('teacher.teacher_master')
@section('title')
    <title>Create Lesson</title>


@section('content')
  <!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Lessons</h3>
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
									<h2>Add Lessons</h2>
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

								{{-- //return successfull message --}}

								
								@if(session('created'))
									<div class="alert alert-success alert-dismissible " role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
										</button>
										<strong>Great!</strong> {{ session('created') }}
									</div>
								@endif




<div class="x_content">
    <h2>Add Lesson to {{ $course->name }}</h2>

    <form  id="demo-form2"method="POST" action="{{ route('teacher.lessons.store', $course->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Lesson Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Video URL</label>
            <input type="text" name="video_url" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Upload File (Optional)</label>
            <input type="file" name="video_file" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Order</label>
            <input type="number" name="order" class="form-control" value="0">
        </div>

        <button type="submit" class="btn btn-success">Save Lesson</button>
        <a href="{{ route('teacher.lessons.index', $course->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
