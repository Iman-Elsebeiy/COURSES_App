
@extends('teacher.teacher_master')
@section('title')
    <title>Teacher Dashboard</title>

@section('content')
<style>
.table-container {
    width: 70%;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
}

.table-title {
    font-size: 20px;
    margin-bottom: 15px;
    color: #c0392b; /* red accent to match sidebar */
    text-align: center;
    font-weight: bold;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 16px;
    border-radius: 12px;
    overflow: hidden;
}

.styled-table thead tr {
    background-color: #c0392b; /* red header */
    color: #fff;
    text-align: left;
    font-weight: bold;
}

.styled-table th, 
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
    transition: background 0.3s;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f9f9f9;
}

.styled-table tbody tr:hover {
    background-color: #ffe6e6; /* light red on hover */
}


//
.stats-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 30px auto;
    width: 70%;
}

.stat-card {
    flex: 1;
    display: flex;
    align-items: center;
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 18px rgba(0,0,0,0.2);
}

.stat-icon {
    background: #c0392b;
    color: #fff;
    font-size: 32px;
    padding: 5px;
    border-radius: 50%;
    margin-bottom: 40px;
    
    display: flex;
    align-items: center;
    justify-content: center;
}

.stat-info h3 {
    font-size: px;
    color: #666;
    margin-left:5;
}

.stat-info p {
    font-size: 24px;
    font-weight: bold;
    color: #c0392b;
    margin: 5px 0 0;
}

</style>


        <!-- page content -->
         <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Teacher  <small>Dashboard</small></h3>
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
                     
      



         <div class="p-6">
        <h1 class="text-3xl font-bold mb-6">Welcome </h1>
{{-- {{ $teacher->name }} --}}
        <!-- Teacher Stats -->





        <div class="stats-container">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-book-open"></i>
        </div>
        <div class="stat-info">
            <h3>Total Courses</h3>
            <p>3</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="stat-info">
            <h3>Total Students</h3>
            <p>73</p>
        </div>
    </div>
</div>

        </div>
    



    <div class="table-container">
    <h2 class="table-title">📚 My Courses</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Students</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Math 101</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Science 202</td>
                <td>18</td>
            </tr>
            <tr>
                <td>History 303</td>
                <td>30</td>
            </tr>
        </tbody>
    </table>
</div>
///////////////////////////
{{-- @foreach($courses as $course)
    <tr>
        <td>{{ $course->name }}</td>
        <td>{{ $course->students_count ?? 0 }}</td>
        <td>
            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary btn-sm">View</a>
        </td>
    </tr>
@endforeach --}}

        <!-- /page content -->
     ///////////////////////////////////////////   
{{-- <script>
const ctx = document.getElementById('studentsChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($courses->pluck('name')),
        datasets: [{
            label: 'Students',
            data: @json($courses->map(fn($c) => $c->students->count())),
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script> --}}
///////////////////////////////////////////
    <!-- Create Course Modal -->
    {{-- <div id="createCourseModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow w-96">
            <h2 class="text-xl font-bold mb-4">Create Course</h2>
            <form method="POST" action="{{ route('teacher.courses.store') }}">
                @csrf
                <label class="block mb-2">Course Name</label>
                <input type="text" name="name" class="w-full border rounded p-2 mb-4">

                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Save
                </button>
                <button type="button" id="closeCreateCourse"
                    class="px-4 py-2 ml-2 bg-gray-300 rounded hover:bg-gray-400">
                    Cancel
                </button>
            </form>
        </div>
    </div>

    <!-- Grade Assignments Modal -->
    <div id="gradeAssignmentsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow w-[500px]">
            <h2 class="text-xl font-bold mb-4">Grade Assignments</h2>
            <p>Feature placeholder: you can list assignments here and add grading forms.</p>

            <button type="button" id="closeGradeAssignments"
                class="px-4 py-2 mt-4 bg-gray-300 rounded hover:bg-gray-400">
                Close
            </button>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart.js
        const ctx = document.getElementById('studentsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($courses->pluck('name')),
                datasets: [{
                    label: 'Students',
                    data: @json($courses->map(fn($c) => $c->students->count())),
                    backgroundColor: '#3b82f6',
                }]
            }
        });

        // Modal handlers
        const createCourseModal = document.getElementById('createCourseModal');
        document.getElementById('openCreateCourse').onclick = () => createCourseModal.classList.remove('hidden');
        document.getElementById('closeCreateCourse').onclick = () => createCourseModal.classList.add('hidden');

        const gradeAssignmentsModal = document.getElementById('gradeAssignmentsModal');
        document.getElementById('openGradeAssignments').onclick = () => gradeAssignmentsModal.classList.remove('hidden');
        document.getElementById('closeGradeAssignments').onclick = () => gradeAssignmentsModal.classList.add('hidden');
    </script> --}}
        <!-- footer content -->
      @endsection