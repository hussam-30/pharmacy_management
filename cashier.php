<?php include "header.php"; ?>

<?php

$cashier_id = intval(@$_GET['cashier_id']);
if(@$_GET['delete'] == "cashier"){
    $delete_cashier_account = mysqli_query ($connect, "DELETE FROM cashiers WHERE cashier_id = '".$cashier_id."' ");
}
?>
<!-- Start Insert Data in File Add cashier -->
<?php
$cashier_add_fullname = @$_POST['cashier_add_fullname'];
$cashier_add_contact = @$_POST['cashier_add_contact'];
$cashier_add_username = @$_POST['cashier_add_username'];
$cashier_add_password = @$_POST['cashier_add_password'];
if(isset($_POST['addcashier'])){
    if(empty($cashier_add_fullname)){
        echo 'Please Enter a Valid Name Website';
     } elseif (empty($cashier_add_contact)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($cashier_add_username)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($cashier_add_password)){
        echo 'Please Enter a Valid Name Website';
    } else {
        $insert_cashier_account = mysqli_query ($connect, "INSERT INTO cashiers (cashier_fullname,cashier_contact,cashier_username,cashier_password) VALUES ('$cashier_add_fullname','$cashier_add_contact','$cashier_add_username','$cashier_add_password')");
       
    }
}
?>
<!-- End Insert Data in File Add cashier -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account menu-icon"></i>
                </span> Cashier
              </h3>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card medicine">
                <div class="card">
                  <div class="card-body">
                  <?php
                      if(isset($delete_cashier_account)){
                        echo '<script>location.replace("cashier.php");</script>';
                      }
                      ?>
                    <div class="listadd">
                      <h4 class="card-title lmc">List Of Cashiers</h4>
                       <!-- Button trigger modal -->
                       <button type="button" class="btn btn-outline-danger btn-icon-text" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+ Add Cashier</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Cashier</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Full Name :</label>
                                    <input type="text" class="form-control" id="recipient-name" name="cashier_add_fullname">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Contact :</label>
                                    <input type="text" class="form-control" id="message-text" name="cashier_add_contact">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Username :</label>
                                    <input type="text" class="form-control" id="message-text" name="cashier_add_username">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Password :</label>
                                    <input type="text" class="form-control" id="message-text" name="cashier_add_password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save Changes" name="addcashier">
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
                              
                              if(isset($insert_cashier_account)){
                                echo '<meta http-equiv= "refresh" content="2; url="cashier.php"">
                                <div class="alert alert-success" role="alert">
                                  Add Succeeded
                                </div>
                                ';
                            }
                              ?>
                          <?php
                            $select_cashier_empty = mysqli_query($connect, "SELECT * FROM cashiers");
                            if(mysqli_num_rows($select_cashier_empty) == 0){
                                echo '
                                        <div class="alert alert-warning" role="alert">
                                            Sorry ! We Not Fond Any Cashiers
                                        </div>
                                    ';
                            } else {
                        echo '
                        <table class="table table-striped">
                        <thead>
                        <tr>
                        <th>Full Name<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Contact<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Username<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Password<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Account Status<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Action<i class="mdi mdi-swap-vertical"></i></th>
                        </tr> 
                        </thead>
                        ';
                               // Start select Data in File Add medicine_category
                               $select_cashier_account = mysqli_query($connect, "SELECT * FROM cashiers ORDER BY cashier_id DESC");
                               // End select Data in File Add medicine_category
                                  while($row = mysqli_fetch_assoc($select_cashier_account)){
                                      echo '
                                              <tr>
                                              <td>'.$row['cashier_fullname'].'</td>
                                              <td>'.$row['cashier_contact'].'</td>
                                              <td>'.$row['cashier_username'].'</td>
                                              <td>'.$row['cashier_password'].'</td>
                                              <td><button class="btn btn-sm btn-gradient-primary editback">Active</button></td>
                                              <td>
                                                  <a class="btn btn-sm btn-gradient-primary deleteback" href="cashier.php?delete=cashier&cashier_id='.$row['cashier_id'].' "><i class="mdi mdi-delete"></i> delete</a>
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