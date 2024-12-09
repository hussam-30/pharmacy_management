<?php include "header.php"; ?>

<!-- Start get profile name -> by (_GET) from header file to profile file because to view my profile -->
<!-- Note please to complete this (visit header file and show href link -> display = username ) -->
<?php

$cashier = intval($_GET['cashier']);

// <!-- Start secure -->
if($id_cookie != $cashier){
  echo '<script>location.replace("index.php"); </script>';
}
// <!-- End secure -->

$selectcashiers = mysqli_query ($connect,"SELECT * FROM cashiers WHERE cashier_id = '".$cashier."' ");
$fetchcashiers = mysqli_fetch_object($selectcashiers);
?>
<!-- End get profile name -> by (_GET) from header file to profile file because to edit my profile -->

<?php
#========post
$cashier_fullname = @$_POST['cashier_fullname'];
$cashier_contact = @$_POST['cashier_contact'];
$cashier_username = @$_POST['cashier_username'];
$cashier_password = @$_POST['cashier_password'];
#========post
if(isset($_POST['editcashier'])){
    if(empty($cashier_fullname)){
      echo'<div>please fullname</div>';
    } elseif(empty($cashier_contact)){
      echo'<div>please contact</div>';
    } elseif(empty($cashier_username)){
      echo'<div>please username</div>';
    } elseif(empty($cashier_password)){
      echo'<div>please password</div>';
    } else {
        $editcashiers = mysqli_query ($connect,"UPDATE cashiers SET 
        cashier_fullname = '$cashier_fullname', 
        cashier_contact = '$cashier_contact', 
        cashier_username = '$cashier_username', 
        cashier_password = '$cashier_password'");
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
                                 if(isset($editcashiers)){
                                    echo '
                                            <div class="alert alert-success" role="alert">
                                                Edit Succeeded
                                            </div>
                                            <meta http-equiv= "refresh" content="2; url="profile.php"">
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
                                            <input type="text" class="form-control" placeholder="Enter your Full Name" value="<?php echo $fetchcashiers->cashier_fullname; ?>" name="cashier_fullname">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Contact *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleInputMobile" value="<?php echo $fetchcashiers->cashier_contact; ?>" name="cashier_contact">
                                          </div>
                                        </div>
                                        <p class="card-description"><i class="mdi mdi-email-outline"></i> Account</p>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Username *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Enter your Username" value="<?php echo $fetchcashiers->cashier_username; ?>" name="cashier_username">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Password *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="Enter your Password" value="<?php echo $fetchcashiers->cashier_password; ?>" name="cashier_password">
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary me-2" name="editcashier">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
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