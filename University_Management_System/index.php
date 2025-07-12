<?php
$pageTitle = "Home";
date_default_timezone_set("Asia/Kolkata");
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="University Management System">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Normalize CSS -->
  <link rel="stylesheet" href="assets/css/normalize.css">

  <!-- Font Awesome via CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Main CSS -->
  <link rel="stylesheet" href="assets/css/main.css">

  <!-- Modernizr (Optional) -->
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

  <!-- Header -->
  <header class="container header_area fix">
    <div id="sticker">
      <div class="head">
        <a href="#">
          <div class="logo fix">
            <img src="assets/images/university_logo.png" alt="University Logo" />
          </div>
        </a>
        <div class="uniname fix">
          <h2>University Management System</h2>
        </div>
      </div>
      <div class="menu fix">
        <div class="dateshow fix">
          <p><?php echo "Date : " . date("d M Y"); ?></p>
        </div>
      </div>
    </div>
  </header>

  <!-- Sidebar and Main Content -->
  <div class="maincontent container fix">
    <!-- Sidebar -->
    <div id="stickerside">
      <div class="sidebar fix">
        <ul>
          <li><span class="spcl"><i class="fa fa-server" aria-hidden="true"></i> Administrator</span></li>
          <ul>
            <li><a href="modules/login/admin_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Admin Login</a></li>
          </ul>

          <li><span class="spcl"><i class="fa fa-male" aria-hidden="true"></i> Faculty Area</span></li>
          <ul>
            <li><a href="modules/login/faculty_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Faculty Login</a></li>
            <li><a href="modules/faculty/fct_single_profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
            <li><a href="modules/attendance/att_add_faculty.php"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Attendance</a></li>
          </ul>

          <li><span class="spcl"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Student Area</span></li>
          <ul>
            <li><a href="modules/login/st_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Student Login</a></li>
            <li><a href="modules/login/st_reg.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
            <li><a href="modules/student/st_profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
            <li><a href="modules/result/st_result_view.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Result</a></li>
          </ul>
        </ul>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="content fix">
      <h2>Welcome to the University Management System</h2>
      <p>Select your role from the sidebar to continue.</p>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
