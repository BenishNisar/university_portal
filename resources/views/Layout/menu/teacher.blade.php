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
          <a href="{{ asset('/course') }}">
            <i class="bi bi-circle"></i><span>Course Management</span>
          </a>
        </li>

        <li>
            <a href="{{ asset('/course') }}">
              <i class="bi bi-circle"></i><span>Schedule & Timings</span>
            </a>
          </li>
          <li>
            <a href="{{ asset('/course') }}">
              <i class="bi bi-circle"></i><span>Study Materials Upload
            </span>
            </a>
          </li>
          <li>
            <a href="{{ asset('/course') }}">
              <i class="bi bi-circle"></i><span>Course Outlines</span>
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
          <a href="{{ asset('dashboard/admin/clomanagement') }}">
            <i class="bi bi-circle"></i><span>View Enrolled Students</span>
          </a>
        </li>


        <li>
            <a href="{{ asset('dashboard/admin/clomanagement') }}">
              <i class="bi bi-circle"></i><span>Student Performance Tracking</span>
            </a>
          </li>


          <li>
            <a href="{{ asset('dashboard/admin/clomanagement') }}">
              <i class="bi bi-circle"></i><span>Attendance Records</span>
            </a>
          </li>
      </ul>
    </li><!-- End Courses Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i style="color: gray; font-size:15px;" class="fas fa-tasks"></i>
          <span>PLO Or CLO</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Program Learning Outcomes</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Course Learning Outcomes</span>
            </a>
          </li>


          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>CLO-PLO Mapping</span>
            </a>
          </li>
        </ul>
      </li><!-- End PLO Or CLO Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i style="color: gray; font-size:15px;" class="fas fa-poll"></i>
          <span>Assessments</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Create & Manage Exams</span>
            </a>
          </li>
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Grading & Feedback</span>
            </a>
          </li>

          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Exam Schedules</span>
            </a>
          </li>

        </ul>
      </li><!-- End Assessments Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#notification" data-bs-toggle="collapse" href="#">
          <i style="color: gray; font-size:15px;" class="fas fa-book-open"></i>
          <span>Notifications </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="notification" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ asset('dashboard/admin/incidents') }}">
              <i class="bi bi-circle"></i><span>Updates on Course Changes
            </span>
            </a>
          </li>

          <li>
            <a href="{{ asset('dashboard/admin/incidents') }}">
              <i class="bi bi-circle"></i><span>Student Alerts
            </span>
            </a>
          </li>


          <li>
            <a href="{{ asset('dashboard/admin/incidents') }}">
              <i class="bi bi-circle"></i><span>System Notifications
            </span>
            </a>
          </li>
        </ul>
      </li><!-- End Courses Nav -->


    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('dashboard/admin/incidents') }}">
        <i style="color: gray; font-size:15px;" class="fas fa-bell"></i>
        <span>As</span>
      </a>
    </li><!-- End Notification Nav --> --}}

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-error-404.html">
        <i style="color: gray; font-size:15px;" class="fas fa-exclamation-circle"></i>
        <span>Error 404</span>
      </a>
    </li><!-- End Error 404 Page Nav -->

  </ul>