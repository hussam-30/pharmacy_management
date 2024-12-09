<?php include "config/include.php";?>

<?php

//====== Start secure

$id_cookie = $_COOKIE['id'];
$signin_cookie = $_COOKIE['signin'];

if($signin_cookie == 1){
  header ('Location: index.php');
}

//====== End secure

#=====POST
$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];
#=====POST

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="assets/images/logo.svg">
                </div>
                <h4>Hello! Admin</h4>
                <h6 class="font-weight-light">Please Sign in to continue.</h6>
          <!-- Start Sign In -->
          <?php
          if(isset($_POST['signin'])){
            if(empty($admin_username)){
              echo'<div>please complete the form</div>';
            } elseif(empty($admin_password)){
              echo'<div>please complete the form</div>';
            } else {
              $select_admins = mysqli_query ($connect,"SELECT * FROM admins WHERE admin_username = '".$admin_username."' AND admin_password = '".$admin_password."' ");
              if(mysqli_num_rows($select_admins) > 0){
                $fetch_admins = mysqli_fetch_assoc($select_admins);
                #========admin
                $id = $fetch_admins ['admin_id'];
                $name = $fetch_admins ['admin_username'];
                $pass = $fetch_admins ['admin_password'];
                #========admin
                if($admin_username != $name){
                  echo '<div>please enter valid data</div>';
                } elseif ($admin_password != $pass){
                  echo '<div>please enter valid data</div>';
                } else {
                  setcookie("id",$id,time()+60*60*48);
                  setcookie("signin",1,time()+60*60*48);
                  header("Location: index.php");
                }
              } else {
                  echo '<div>data does not exist </div>';
              }
            }
          }
          ?>
          <!-- End Sign In -->
                <form class="pt-3" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="admin_username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"  name="admin_password">
                  </div>
                  <div class="mt-3">
                    <input type="submit" value="SIGN IN" name="signin" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                  </div>
                  <div class="mt-4 font-weight-light">To Login Cashier account ? <a href="account_cashier/login.php" class="text-primary btn-signin">Sign in Here</a></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>