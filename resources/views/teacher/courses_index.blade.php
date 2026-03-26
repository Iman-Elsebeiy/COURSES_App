{{-- 


@extends('layouts.app')

@section('content')


<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">📚 My Courses</h2>
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Lessons</th>
                        <th>Price</th>
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
                            <td class="fw-bold">{{ $course->title }}</td>
                            <td>{{ Str::limit($course->description, 50) }}</td>
                            <td>{{ $course->lessons }}</td>
                            <td class="text-success fw-bold">${{ $course->price }}</td>
                            <td>
                                <a href="{{ route('teacher.courses.show', $course->id) }}" 
                                   class="btn btn-sm btn-primary">👁 View</a>
                                <a href="{{ route('teacher.courses.edit', $course->id) }}" 
                                   class="btn btn-sm btn-warning">✏ Edit</a>
                                <form action="{{ route('teacher.courses.destroy', $course->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure?')" 
                                            class="btn btn-sm btn-danger">🗑 Delete</button>
                                </form>
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


@endsection --}}

@extends('teacher.teacher_master')
@section('title')
<title>courses Management</title>
@section('content')


        <!-- page content -->



     
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Courses</h3>
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

                                        <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">📚 My Courses</h2>
       
    </div>
              </div>
            </div>
     //////#
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Course Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Lessons</th>
                        <th>Price</th>
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
                            <td class="fw-bold">{{ $course->title }}</td>
                            <td>{{ Str::limit($course->description, 50) }}</td>
                            <td>{{ $course->lessons }}</td>
                            <td class="text-success fw-bold">${{ $course->price }}</td>
                            <td>
                                <a href="{{ route('teacher.courses.show', $course->id) }}" 
                                   class="btn btn-sm btn-primary">👁 View</a>
                                <a href="{{ route('teacher.courses.edit', $course->id) }}" 
                                   class="btn btn-sm btn-warning">✏ Edit</a>
                                <form action="{{ route('teacher.courses.destroy', $course->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure?')" 
                                            class="btn btn-sm btn-danger">🗑 Delete</button>
                                </form>
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

            {{-- <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Cars</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Price</th>
                     
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>Car 10</td>
                          <td>250</td>
                        
                          <td><img src="{{asset('admin/images/edit.png')}}" alt="Edit"></td>
                          <td><img src="{{asset('admin/images/delete.png')}}" alt="Delete"></td>
                        </tr>
                        <tr>
                          <td>Car 1</td>
                          <td>150</td>
                       
                          <td><img src="{{asset('admin/images/edit.png')}}" alt="Edit"></td>
                          <td><img src="{{asset('admin/images/delete.png')}}" alt="Delete"></td>
                        </tr>
                        <tr>
                          <td>Car 2</td>
                          <td>200</td>
                    
                          <td><img src="{{asset('admin/images/edit.png')}}" alt="Edit"></td>
                          <td><img src="{{asset('admin/images/delete.png')}}" alt="Delete"></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
            </div>
              <a href="{{ route('teacher.courses.create') }}" class="btn btn-success">
            ➕ Create Course
        </a>
        </div>
          </div> --}}
         
        <!-- /page content -->
@endsection
     

