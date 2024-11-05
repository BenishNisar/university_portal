<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a style="font-size:15px;" class="nav-link" href="{{ asset('/') }}">
        <i style="color: gray;" class="fas fa-tachometer-alt"></i>
        <span style="font-size: 12px;">Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
        <i style="color: gray; font-size:15px;" class="fas fa-users-cog"></i>
        <span>Users Manage</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="users-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ asset('/users') }}">
            <i class="bi bi-circle"></i><span>Users</span>
          </a>
        </li>
        <li>
          <a href="{{ asset('/roles') }}">
            <i class="bi bi-circle"></i><span>Roles</span>
          </a>
        </li>
        <li>
          <a href="{{ asset('/departments') }}">
            <i class="bi bi-circle"></i><span>Department</span>
          </a>
        </li>
      </ul>
    </li><!-- End Users Manage Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i style="color: gray; font-size:15px;" class="fas fa-book-open"></i>
        <span>Courses</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ asset('/courses') }}">
            <i class="bi bi-circle"></i><span>Courses</span>
          </a>
        </li>


        <li>
            <a href="{{ asset('/batches') }}">
              <i class="bi bi-circle"></i><span>Batches</span>
            </a>
          </li>

          <li>
            <a href="{{ asset('/course_assign') }}">
              <i class="bi bi-circle"></i><span>Batches</span>
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
          <a href="{{ asset('/programlearning') }}">
            <i class="bi bi-circle"></i><span>Program Learning Outcomes</span>
          </a>
        </li>
        <li>
          <a href="{{ asset('/courselearning') }}">
            <i class="bi bi-circle"></i><span>Course Learning Outcomes</span>
          </a>
        </li>
      </ul>
    </li><!-- End PLO Or CLO Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i style="color: gray; font-size:15px;" class="fas fa-sitemap"></i>
        <span>CLO_PLO_MAPPING</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ asset('/clo_plo') }}">
            <i class="bi bi-circle"></i><span>CLO_PLO_Map</span>
          </a>
        </li>
      </ul>
    </li><!-- End CLO_PLO_MAPPING Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i style="color: gray; font-size:15px;" class="fas fa-poll"></i>
        <span>Assessments</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ asset('/assessments') }}">
            <i class="bi bi-circle"></i><span>Assessments</span>
          </a>
        </li>
        <li>
          <a href="{{ asset('/student_assessments') }}">
            <i class="bi bi-circle"></i><span>Student_Assessments</span>
          </a>
        </li>
      </ul>
    </li><!-- End Assessments Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('/notification') }}">
        <i style="color: gray; font-size:15px;" class="fas fa-bell"></i>
        <span>Notification</span>
      </a>
    </li><!-- End Notification Nav -->



  </ul>
