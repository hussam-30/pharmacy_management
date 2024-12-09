<!-- Start cookie from signup file (form sign in not sign up) to show user profile info -->

<?php

include "../config/include.php";

$id_cookie = $_COOKIE['id'];
$signin_cookie = $_COOKIE['signin'];

$select_cashier = mysqli_query ($connect,"SELECT * FROM cashiers WHERE cashier_id = '".$id_cookie."' ");
$fetch_cashier = mysqli_fetch_assoc ($select_cashier);

?>

<!-- End Cookie from signup file to show user profile info -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
  </head>
  <?php

$select_setting_company = mysqli_query($connect, "SELECT * FROM setting");
$fetch_setting_company = mysqli_fetch_object($select_setting_company);

    if($fetch_setting_company->setting_close == 2){
      echo '<div>'.$fetch_setting_company ->setting_leave_message.'</div>';
      exit();
    }

    ?>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../index.html"><img src="../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../index.html"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="index.php">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
<!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <?php
              if($signin_cookie == 1){
                echo '<a href="profile.php?cashier='.$id_cookie.'" class="nav-link">';
              }
              ?>
                <div class="nav-profile-image">
                  <img src="../assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <?php
                  if($signin_cookie == 1){
                    echo '
                      <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">'.$fetch_cashier['cashier_fullname'].'</span>
                        <span class="text-secondary text-small">'.$fetch_cashier['cashier_rule'].' Account</span>
                      </div>
                    '; 
                  }
                ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="medicine-category.php">
                <span class="menu-title">Medicine Category</span>
                <i class="mdi mdi-format-align-left menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="medicine.php">
                <span class="menu-title">Medicine</span>
                <i class="mdi mdi-hospital menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sales.php">
                <span class="menu-title">Sales</span>
                <i class="mdi mdi-desktop-mac menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->