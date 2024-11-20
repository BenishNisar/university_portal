<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a style="font-size:15px;" class="nav-link" href="{{ asset('student/dashboard') }}">
        <i style="color: gray;" class="fas fa-tachometer-alt"></i>
        <span style="font-size: 12px;">Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->




  
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/student/studentcourse') }}">
          <i style="color: gray; font-size:15px;" class="fas fa-users-cog" aria-hidden="true"></i>
          <span>My Courses</span>
        </a>
      </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/student/assignmentupload') }}">
          <i style="color: gray; font-size:15px;" class="fa fa-bullhorn" aria-hidden="true"></i>
          <span>Assignments</span>
        </a>
      </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/student/quiz') }}">
          <i style="color: gray; font-size:15px;" class="fa fa-file"></i>
          <span>Quiz</span>
        </a>
      </li>



    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/notification') }}">
          <i style="color: gray; font-size:15px;" class="fas fa-bell"></i>
          <span>Notification</span>
        </a>
      </li>





  </ul>
