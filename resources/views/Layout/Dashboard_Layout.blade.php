<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>University Examination Portal</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('Dashboard_assets/img/Ilama_University.png')}}" rel="icon">
  <link href="{{ asset( 'Dashboard_assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="{{ asset ('Dashboard_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset  ('Dashboard_assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset ('Dashboard_assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="'{{ asset ('Dashboard_assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset ('Dashboard_assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset ('Dashboard_assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset  ('Dashboard_assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset( 'Dashboard_assets/css/style.css')}}" rel="stylesheet">
  <style>



  .nav-item i {
    color: inherit; /* Icons take the same color as text */
  }
  .logo-img {
    width: 300px;  /* Set fixed width */
    height: 250px; /* Set fixed height */
    object-fit: contain; /* Ensures the image fits within the bounds without distortion */
    margin: 0 auto; /* Center the image */
}


html, body {
  height: 100%;
}

body {
  display: flex;
  flex-direction: column;
  margin: 0;
}

main {
  flex: 1;
}

footer {
  background-color: #f8f9fa;
  padding: 10px;
  text-align: center;
  position: relative;

  bottom: 0;
}


.icon-size {
    font-size: 20px; /* Adjust the size as needed */
  }



 </style>


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('Dashboard_assets/img/Ilama_University.png') }}" style="width: 200px;" alt="Logo">
        </a>
        <i style="font-size:22px;position: relative;left:-22px;" class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <!-- Search Icon -->
<li class="nav-item">
    <a class="nav-link nav-icon search-bar-toggle" href="#" style="color: darkgray; transition: none; font-size: 15px;">
        <i class="bi bi-search"></i>
    </a>
</li><!-- End Search Icon -->


            <!-- Notification Icon -->
            <li class="nav-item">
                <a class="nav-link nav-icon" href="#" style="color:#f71381; transition: none; font-size: 15px;" title="Notifications">
                    <i class="bi bi-bell"></i>
                </a>
            </li><!-- End Notification Icon -->

            <!-- New Icon -->
            <li class="nav-item">
                <a class="nav-link nav-icon" href="#" style="color: darkgray; transition: none; font-size: 15px;" title="Create New">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </li><!-- End New Icon -->

            <!-- Profile Icon -->
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: darkgray; transition: none; font-size: 15px;">
                    <img src="{{ Auth::user()->profile_img ? asset('storage/' . Auth::user()->profile_img) : asset('images/default-profile.png') }}" class="img-xs rounded-circle" alt="Profile Image" style="width: 30px; height: 30px;">

                    <span class="navbar-profile-name">{{ Auth::user()->firstname }}</span>
                    <i class="mdi mdi-menu-down"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </li>
            <!-- End Profile Nav -->

         <!-- Logout Icon -->
<li class="nav-item">
    <a class="nav-link nav-icon" href="{{ route('logout') }}" style="color: darkgray; transition: none; font-size: 15px;" title="Logout">
        <i class="bi bi-box-arrow-right"></i>
    </a>
</li>
<!-- End Logout Icon -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->




 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">



    @if (Auth::check())
    @if (Auth::user()->role_id == 1)
        {{-- Admin Menu --}}
        @include('Layout.menu.admin')
    @elseif (Auth::user()->role_id == 2)
        {{-- Teacher Menu --}}
        @include('Layout.menu.teacher')
    @elseif (Auth::user()->role_id == 3)
        {{-- Student Menu --}}
        @include('Layout.menu.student')
    @endif
@endif




  </aside><!-- End Sidebar -->








  <main id="main" class="main">

@yield('AdminContent')
  </main>



    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
          &copy; Copyright <strong><span>University Examination Portal</span></strong>. All Rights Reserved
        </div>


      </footer><!-- End Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <script src="{{ asset ('Dashboard_assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
      <script src="{{ asset ('Dashboard_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset  ('Dashboard_assets/vendor/chart.js/chart.umd.js')}}"></script>
      <script src="{{ asset ('Dashboard_assets/vendor/echarts/echarts.min.js')}}"></script>
      <script src="{{ asset('Dashboard_assets/vendor/quill/quill.js')}}"></script>
      <script src=  "{{ asset( 'Dashboard_assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
      <script src="{{asset  ('Dashboard_assets/vendor/tinymce/tinymce.min.js')}}"></script>
      <script src="{{ asset ('Dashboard_assets/vendor/php-email-form/validate.js')}}"></script>

      <!-- Template Main JS File -->
      <script src="{{  asset('Dashboard_assets/js/main.js')}}"></script>

    </body>

    </html>
