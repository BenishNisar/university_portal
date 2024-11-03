<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a style="font-size:15px;" class="nav-link" href="{{ asset('student/dashboard') }}">
        <i style="color: gray;" class="fas fa-tachometer-alt"></i>
        <span style="font-size: 12px;">Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->


    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('dashboard/admin/profile') }}">
          <i style="color: gray; font-size:15px;" class="fas fa-bell"></i>
          <span>Profile</span>
        </a>
      </li> --}}
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
        <i style="color: gray; font-size:15px;" class="fas fa-users-cog"></i>
        <span>My Courses</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ asset('/courses') }}">
            <i class="bi bi-circle"></i><span>Enrolled Courses</span>
          </a>
        </li>
        <li>
          <a href="{{ asset('/faculty_timings') }}">
            <i class="bi bi-circle"></i><span>Faculty & Timings</span>
          </a>
        </li>
        <li>
          <a href="{{ asset('/credit_hr') }}">
            <i class="bi bi-circle"></i><span>Credit Hours</span>
          </a>
        </li>

        <li>
            <a href="{{ asset('/study_material') }}">
              <i class="bi bi-circle"></i><span>Study Materials</span>
            </a>
          </li>

          <li>
            <a href="{{ asset('/courses') }}">
              <i class="bi bi-circle"></i><span>Course Outlines</span>
            </a>
          </li>


      </ul>
    </li><!-- End Users Manage Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i style="color: gray; font-size:15px;" class="fas fa-book-open"></i>
        <span>Exams & Grades</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ asset('/exam_schedule') }}">
            <i class="bi bi-circle"></i><span>Exam Schedule</span>
          </a>
        </li>


        <li>
            <a href="{{ asset('/grade_performance') }}">
              <i class="bi bi-circle"></i><span>Grades & Performance</span>
            </a>
          </li>

          <li>
            <a href="{{ asset('/clo_plo') }}">
              <i class="bi bi-circle"></i><span>CLO Progress</span>
            </a>
          </li>


      </ul>
    </li><!-- End Courses Nav -->

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">

        <i style="color: gray; font-size:15px;" class="fas fa-bell"></i>
        <span>Notifications</span>
      </a>
      <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="forms-elements.html">
            <i class="bi bi-circle"></i><span>Study Material Updates</span>
          </a>
        </li>
        <li>
          <a href="forms-layouts.html">
            <i class="bi bi-circle"></i><span>Exam Alerts</span>
          </a>
        </li>

        <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Grade Announcements</span>
            </a>
          </li>
      </ul>
    </li><!-- End PLO Or CLO Nav --> --}}



    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/notification') }}">
          <i style="color: gray; font-size:15px;" class="fas fa-bell"></i>
          <span>Notification</span>
        </a>
      </li>

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('dashboard/admin/settings') }}">
            <i style="color: gray; font-size:15px;" class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
    </li> --}}




  </ul>
