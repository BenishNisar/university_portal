<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a style="font-size:15px;" class="nav-link" href="{{ asset('teacher/dashboard') }}">
        <i style="color: gray;" class="fas fa-tachometer-alt"></i>
        <span style="font-size: 12px;">Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
        <i style="color: gray; font-size:15px;" class="fas fa-users-cog"></i>
        <span>My Course</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">


          <li>
            <a href="{{ asset('teacher/quiz_question_bank') }}">
         <i class="bi bi-circle"></i><span>Quizzes Question Bank</span>
            </a>
          </li>


          <li>
            <a href="{{ asset('teacher/view_quizzes') }}">
         <i class="bi bi-circle"></i><span>Views Quizs</span>
            </a>
          </li>



        <li>
            <a href="{{ asset('/assignments') }}">
              <i class="bi bi-circle"></i><span>Assignments</span>
            </a>
          </li>
        <li>
            <a href="{{ asset('/teacher/assignment_submission') }}">
              <i class="bi bi-circle"></i><span>Student_Assignments_Submisssion</span>
            </a>
          </li>



      </ul>
    </li><!-- End Users Manage Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i style="color: gray; font-size:15px;" class="fas fa-book-open"></i>
        <span>Student Management</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

        <li>
            <a href="{{ asset('/student/courses') }}">
              <i class="bi bi-circle"></i><span>Student_Courses</span>
            </a>
          </li>
        <li>
          <a href="{{ asset('/view_enrolled') }}">
            <i class="bi bi-circle"></i><span>View Enrolled Students</span>
          </a>
        </li>


        <li>
            <a href="{{ asset('/student_performance_tracking') }}">
              <i class="bi bi-circle"></i><span>Student Performance Tracking</span>
            </a>
          </li>


          <li>
            <a href="{{ asset('/attendence_records') }}">
              <i class="bi bi-circle"></i><span>Attendance Records</span>
            </a>
          </li>
      </ul>
    </li><!-- End Courses Nav -->

  



      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/notification') }}">
          <i style="color: gray; font-size:15px;" class="fas fa-bell"></i>
          <span>Notification</span>
        </a>
      </li>
      <!-- End Notification Nav -->



  </ul>
