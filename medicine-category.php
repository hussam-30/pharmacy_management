<?php include "header.php"; ?>

<?php

$med_cat_id = intval(@$_GET['med_cat_id']);
if(@$_GET['delete'] == "medicinecategory"){
    $delete_medicine_category = mysqli_query ($connect, "DELETE FROM medicine_category WHERE med_cat_id = '".$med_cat_id."' ");
}
?>
<!-- Start Insert Data in File Add medicine category -->
<?php
$med_cat_category_name = @$_POST['med_cat_category_name'];
$med_cat_description = @$_POST['med_cat_description'];
if(isset($_POST['add'])){
    if(empty($med_cat_category_name)){
        echo 'Please Enter a Valid Name Website';
     } elseif (empty($med_cat_description)){
        echo 'Please Enter a Valid Name Website';
    } else {
        $insert_med_cat = mysqli_query ($connect, "INSERT INTO medicine_category (med_cat_category_name,med_cat_description) VALUES ('$med_cat_category_name','$med_cat_description')");
       
    }
}
?>
<!-- End Insert Data in File Add medicinecategory -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-format-align-left menu-icon"></i>
                </span> Medicine Category
              </h3>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card medicine">
                <div class="card">
                  <div class="card-body">
                  <?php
                      if(isset($delete_medicine_category)){
                        echo '<script>location.replace("medicine-category.php");</script>';
                      }
                      ?>
                    <div class="listadd">
                      <h4 class="card-title lmc">List Of Medicine Category</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger btn-icon-text" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+ Add Category</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Category Name :</label>
                                    <input type="text" class="form-control" id="recipient-name" name="med_cat_category_name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Description :</label>
                                    <textarea class="form-control" id="message-text" name="med_cat_description"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save Changes" name="add">
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="linebefor"></div>
                    <div class="col-lg-12 grid-margin stretch-card responsive-table">
                      <div class="card">
                        <div class="card-body">
                          <div class="m-search">
                            <h5>show
                            <select class="card-title selectall">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                            </select>
                            entries
                            </h5>
                            <div class="form-group">
                              <div class="input-group col-md-4">
                                <div class="input-group-append">
                                  <button class="btn btn-sm btn-gradient-primary search" type="button">Search</button>
                                </div>
                                <input type="text" class=" form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                              </div>
                            </div>
                          </div>
                          <?php
                              
                              if(isset($insert_med_cat)){
                                echo '<meta http-equiv= "refresh" content="2; url="medicine-category.php"">
                                <div class="alert alert-success" role="alert">
                                  Add Succeeded
                                </div>
                                ';
                            }
                              ?>
                          <?php
                            $select_med_cat_empty = mysqli_query($connect, "SELECT * FROM medicine_category");
                            if(mysqli_num_rows($select_med_cat_empty) == 0){
                                echo '
                                        <div class="alert alert-warning" role="alert">
                                            Sorry ! We Not Fond Any Medicine Category
                                        </div>
                                    ';
                            } else {
                        echo '
                        <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Category Name <i class="mdi mdi-swap-vertical"></i></th>
                            <th>Description <i class="mdi mdi-swap-vertical"></i></th>
                            <th>Action <i class="mdi mdi-swap-vertical"></i></th>
                        </tr> 
                        </thead>
                        ';
                               // Start select Data in File Add medicine_category
                               $select_med_cat = mysqli_query($connect, "SELECT * FROM medicine_category ORDER BY med_cat_id DESC");
                               // End select Data in File Add medicine_category
                                  while($row = mysqli_fetch_assoc($select_med_cat)){
                                      echo '
                                              <tr>
                                              <td>'.$row['med_cat_category_name'].'</td>
                                              <td>'.mb_substr($row['med_cat_description'], '0' , '150' , 'UTF-8').'</td>
                                              <td>
                                                  <a class="btn btn-sm btn-gradient-primary editback" href="edit-medicine-category.php?id='.$row['med_cat_id'].'"><i class="mdi mdi-pencil-box-outline"></i> edit</a>
                                                  <a class="btn btn-sm btn-gradient-primary deleteback" href="medicine-category.php?delete=medicinecategory&med_cat_id='.$row['med_cat_id'].' "><i class="mdi mdi-delete"></i> delete</a>
                                              </td>
                                              </tr>
                                          ';
                                  }
                        echo '
                        </table>
                                  ';
                                }
                          ?>
                          <!-- <div class="showng_prev">
                            <div class="showng">                            
                              <p>Showing 1 to 9 out of 9 entries</p>
                            </div>
                            <div class="prev">                            
                              <p>Previous 1 Next</p>
                            </div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
 
<?php include "footer.php"; ?>