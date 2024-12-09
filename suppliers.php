<?php include "header.php"; ?>

<?php

$suppliers_id = intval(@$_GET['suppliers_id']);
if(@$_GET['delete'] == "suppliers"){
    $delete_suppliers = mysqli_query ($connect, "DELETE FROM suppliers WHERE suppliers_id = '".$suppliers_id."' ");
}
?>
<!-- Start Insert Data in File Add cashier -->
<?php
$suppliers_name = @$_POST['suppliers_name'];
$suppliers_contact = @$_POST['suppliers_contact'];
$suppliers_email = @$_POST['suppliers_email'];
$suppliers_address = @$_POST['suppliers_address'];
if(isset($_POST['addsupplier'])){
    if(empty($suppliers_name)){
        echo 'Please Enter a Valid Name Website';
     } elseif (empty($suppliers_contact)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($suppliers_email)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($suppliers_address)){
        echo 'Please Enter a Valid Name Website';
    } else {
        $insert_supplier = mysqli_query ($connect, "INSERT INTO suppliers (suppliers_name,suppliers_contact,suppliers_email,suppliers_address) VALUES ('$suppliers_name','$suppliers_contact','$suppliers_email','$suppliers_address')");
       
    }
}
?>
<!-- End Insert Data in File Add cashier -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-truck menu-icon"></i>
                </span> Suppliers
              </h3>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card medicine">
                <div class="card">
                  <div class="card-body">
                  <?php
                      if(isset($delete_suppliers)){
                        echo '<script>location.replace("suppliers.php");</script>';
                      }
                      ?>
                    <div class="listadd">
                      <h4 class="card-title lmc">List Of Suppliers</h4>
                       <!-- Button trigger modal -->
                       <button type="button" class="btn btn-outline-danger btn-icon-text" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+ Add Suppliers</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Suppliers</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Supplier Name :</label>
                                    <input type="text" class="form-control" id="recipient-name" name="suppliers_name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Supplier Contact :</label>
                                    <input type="text" class="form-control" id="message-text" name="suppliers_contact">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Supplier Email :</label>
                                    <input type="text" class="form-control" id="message-text" name="suppliers_email">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Supplier Address :</label>
                                    <textarea class="form-control" id="message-text" name="suppliers_address"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save Changes" name="addsupplier">
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
                              
                              if(isset($insert_supplier)){
                                echo '<meta http-equiv= "refresh" content="2; url="suppliers.php"">
                                <div class="alert alert-success" role="alert">
                                  Add Succeeded
                                </div>
                                ';
                            }
                              ?>
                          <?php
                            $select_suppliers_empty = mysqli_query($connect, "SELECT * FROM suppliers");
                            if(mysqli_num_rows($select_suppliers_empty) == 0){
                                echo '
                                        <div class="alert alert-warning" role="alert">
                                            Sorry ! We Not Fond Any suppliers
                                        </div>
                                    ';
                            } else {
                        echo '
                        <table class="table table-striped">
                        <thead>
                        <tr>
                        <th>Supplier Name Or Company<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Supplier Contact<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Supplier Email<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Supplier Address Company<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Action<i class="mdi mdi-swap-vertical"></i></th>
                        </tr> 
                        </thead>
                        ';
                               // Start select Data in File Add medicine_category
                               $select_suppliers = mysqli_query($connect, "SELECT * FROM suppliers ORDER BY suppliers_id DESC");
                               // End select Data in File Add medicine_category
                                  while($row = mysqli_fetch_assoc($select_suppliers)){
                                      echo '
                                              <tr>
                                              <td>'.$row['suppliers_name'].'</td>
                                              <td>'.$row['suppliers_contact'].'</td>
                                              <td>'.$row['suppliers_email'].'</td>
                                              <td>'.mb_substr($row['suppliers_address'], '0' , '150' , 'UTF-8').'</td>
                                              <td>
                                                <a class="btn btn-sm btn-gradient-primary editback" href="edit-suppliers.php?id='.$row['suppliers_id'].'"><i class="mdi mdi-pencil-box-outline"></i> Edit</a>
                                                <a class="btn btn-sm btn-gradient-primary deleteback" href="suppliers.php?delete=suppliers&suppliers_id='.$row['suppliers_id'].' "><i class="mdi mdi-delete"></i> Delete</a>
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