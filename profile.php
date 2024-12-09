<?php include "header.php"; ?>

<!-- Start get profile name -> by (_GET) from header file to profile file because to view my profile -->
<!-- Note please to complete this (visit header file and show href link -> display = username ) -->
<?php

$admin = intval($_GET['admin']);

// <!-- Start secure -->
if($id_cookie != $admin){
  echo '<script>location.replace("index.php"); </script>';
}
// <!-- End secure -->

$selectadmins = mysqli_query ($connect,"SELECT * FROM admins WHERE admin_id = '".$admin."' ");
$fetchadmins = mysqli_fetch_object($selectadmins);
?>
<!-- End get profile name -> by (_GET) from header file to profile file because to edit my profile -->

<?php
#========post
$admin_fullname = @$_POST['admin_fullname'];
$admin_username = @$_POST['admin_username'];
$admin_password = @$_POST['admin_password'];
#========post
if(isset($_POST['edit'])){
    if(empty($admin_fullname)){
      echo'<div>please complete the form</div>';
    }elseif(empty($admin_username)){
      echo'<div>please complete the form</div>';
    }elseif(empty($admin_password)){
      echo'<div>please complete the form</div>';
    } else {
        $editadmins = mysqli_query ($connect,"UPDATE admins SET 
        admin_fullname = '$admin_fullname', 
        admin_username = '$admin_username', 
        admin_password = '$admin_password' WHERE admin_id = '".$admin."' ");
    }
}
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account menu-icon"></i>
                </span> Profile
              </h3>
            </div>
            <div class="col-12">
                <div class="card">
                  <div class="card-body">
                            <div class="row">
                                <p class="card-description"> Profile Information </p>
                                <?php 
                                if(isset($editadmins)){
                                  echo '<meta http-equiv= "refresh" content="2; url="profile.php"">
                                        <div class="alert alert-success" role="alert">
                                          Edit Succeeded
                                        </div>
                                        ';
                                }
                                ?>
                            </div>
                            <div class="col-md-12 grid-margin stretch-card">
                                  <div class="card">
                                    <div class="card-body med-profile">
                                        <div class="col-md-4">
                                          <div class="row">
                                            <div class="form-group">
                                                <img src="img/abdallah.jpg" class="img-profile">
                                            </div>
                                          </div>
                                        </div>
                                      <form class="forms-sample col-md-8" method="post">
                                        <div class="row">
                                            <p class="card-description"><i class="mdi mdi-account menu-icon"></i> Profile Information </p>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Full Name *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Enter your Full Name" value="<?php echo $fetchadmins->admin_fullname; ?>" name="admin_fullname">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Admin Rule *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleInputMobile" readonly value="<?php echo $fetchadmins->admin_rule; ?>">
                                          </div>
                                        </div>
                                        <p class="card-description"><i class="mdi mdi-email-outline"></i> Account</p>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Username *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Enter your Username" value="<?php echo $fetchadmins->admin_username; ?>" name="admin_username">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Password *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Enter your Password" value="<?php echo $fetchadmins->admin_password; ?>" name="admin_password">
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary me-2" name="edit">Submit</button>
                                      </form>
                                    </div>
                                  </div>
                            </div>
                    </div>
                </div>
            </div>
            
          </div>
          <!-- content-wrapper ends -->

<?php include "footer.php"; ?>