<?php include "header.php"; ?>
<?php

$id = intval(@$_GET['id']);
$select_med_cat_edit = mysqli_query($connect, "SELECT * FROM medicine_category WHERE med_cat_id = '".$id."' ");
$fetch_med_cat_edit = mysqli_fetch_object($select_med_cat_edit);

$med_cat_category_name = @$_POST['med_cat_category_name'];
$med_cat_description = @$_POST['med_cat_description'];

if(isset($_POST['update'])){
    if(empty($med_cat_category_name)){
        echo'<div>please complete the form</div>';
      } elseif(empty($med_cat_description)){
        echo'<div>please complete the form</div>';
    } else {
        $update_med_cat = mysqli_query ($connect,"UPDATE medicine_category SET 
        med_cat_category_name = '$med_cat_category_name', 
        med_cat_description = '$med_cat_description' WHERE med_cat_id = '".$id."' ");
    }
}
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-format-align-left menu-icon"></i>
                </span> Edit Medicine Category
              </h3>
            </div>
            <div class="col-12">
                <div class="card">
                  <div class="card-body">
                            <div class="col-md-12 grid-margin stretch-card">
                                  <div class="card">
                                    <div class="card-body med-profile">
                                      <form class="forms-sample col-md-12" method="post">
                                      <?php
                                      if(isset($update_med_cat)){
                                        echo '<meta http-equiv= "refresh" content="2; url="medicine-category.php"">
                                                <div class="alert alert-success" role="alert">
                                                  Edit Succeeded
                                                </div>
                                              ';
                                      }
                                      ?>
                                        <div class="form-group row">
                                          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Category Name *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Enter your Full Name" name="med_cat_category_name" value="<?php echo $fetch_med_cat_edit->med_cat_category_name; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Description *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleInputMobile" name="med_cat_description" value="<?php echo $fetch_med_cat_edit->med_cat_description; ?>">
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary me-2" name="update">Submit</button>
                                        <a class="btn btn-light" href="medicine-category.php">Cancel</a>
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