	
    @extends('teacher.teacher_master')
    @section('title')
    <title>Edit course</title>
    @section('content')
    
    
    <!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Edit Courses</h3>
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
									<h2>Edit Course</h2>
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
								@if(session('success'))
									<div class="alert alert-success alert-dismissible " role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
										</button>
										<strong>Great!</strong> {{ session('success') }}
									</div>
								@endif
								<div class="x_content">
									<br />
									<form id="demo-form2" action="{{route('teacher.courses.update', $course->id)}}" method="POST"
                                    enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                        @csrf
                                        {{-- Course Name --}}
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Course name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="name" name="name" required="required" class="form-control " value="{{ $course->name }}">
                                                  @error('name')
                                                 <div class="text-danger small">{{ $message }}</div>
                                                 @enderror
											</div>
										</div>
                                {{-- Description1 --}}

                                        
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea id="description" name="description" required="required" class="form-control"
                                                 rows="4" >{{ $course->description }}</textarea>
                                                 <small id="descCount" class="char-count">0 / 500</small>
                                                 @error('description')
                                                 <div class="text-danger small">{{ $message }}</div>
                                                 @enderror
											</div>
										</div>
                            
										
										
										
									
										
                                             {{-- Course Cover Image --}}
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Course Image <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="course_image" name="course_image" value="{{ $course->course_image }}" class="form-control" accept="image/*">
                                                 <img id="preview" class="image-preview mt-2" src="{{ asset('storage/' . $course->course_image) }}" alt="Course Image">
                                             @error('course_image')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                 @enderror
											</div>
										</div>
                                     

										{{-- Teacher Image --}}
                                   <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="teacher_image">Teacher Image <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="teacher_image" name="teacher_image" value="{{ $course->teacher_image }}" class="form-control" accept="image/*">
                                                 <img id="teacherPreview" class="image-preview mt-2" src="{{ asset('storage/' . $course->teacher_image) }}" alt="Teacher Image">
                                             @error('teacher_image')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                 @enderror
											</div>
										</div>
										
										   {{-- Teacher Job Title --}}

										   <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="teacher_job">Teacher title job <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="teacher_job" value="{{ $course->teacher_job }}" name="teacher_job" required="required" class="form-control ">
                                                  @error('teacher_job')
                                                 <div class="text-danger small">{{ $message }}</div>
                                                 @enderror
											</div>
										</div>
										
										{{-- Number of Lessons --}}

                                          <div class="item form-group">
											<label for="lessons" class="col-form-label col-md-3 col-sm-3 label-align">Number of Lessons <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="lessons" class="form-control" value="{{ $course->lessons }}" type="number" name="lessons"  min="1" placeholder="e.g. 12" required="required">
											</div>
										</div>


                                              {{-- category1 --}}

                                   <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="category_id" id="category">
													<option value=" ">Select Category</option>
													  @foreach($categories as $category)
                                                          <option value="{{ $category->id }}" {{ $category->id == $course->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                                              @endforeach

													
											
												</select>
											</div>
										</div>

                             
										



                                                <!-- Price -->

		                               <div class="item form-group">
											<label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price ($) <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="price" class="form-control" type="number" value="{{ $course->price }}" name="price" step="0.01" required="required">
												@error('price')
                                              <div class="text-danger small">{{ $message }}</div>
                                                  @enderror
											</div>
										</div>



										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
                                                <a href="{{ route('teacher.dashboard') }}" class="btn btn-primary">Cancel</a>
												<button  type="submit" class="btn btn-success">Add</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->


{{-- JavaScript for character count & image preview --}}

// Course Image Preview
<script>
document.getElementById('course_image').addEventListener('change', function () {
    const file = this.files[0];
    const preview = document.getElementById('preview');
    if (file) {
        const reader = new FileReader();
        preview.style.display = "block";
        reader.onload = (e) => preview.src = e.target.result;
        reader.readAsDataURL(file);
    }
});

// Teacher Image Preview
document.getElementById('teacher_image').addEventListener('change', function () {
    const file = this.files[0];
    const preview = document.getElementById('teacherPreview');
    if (file) {
        const reader = new FileReader();
       teacherPreview.style.display = "block";
        reader.onload = (e) => teacherPreview.src = e.target.result;
        reader.readAsDataURL(file);
    }
});
</script>


    {{-- <script>
        const desc = document.getElementById('description');
        const descCount = document.getElementById('descCount');
        const imageInput = document.getElementById('image');
        const preview = document.getElementById('preview');

        desc.addEventListener('input', function () {
            descCount.textContent = `${desc.value.length} / 500`;
            descCount.style.color = desc.value.length > 500 ? "red" : "gray";
        });

        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                preview.style.display = "block";
                reader.onload = function (e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = "none";
            }
        });
    </script> --}}

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection