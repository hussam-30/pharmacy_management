<?php include "header.php"; ?>
<?php

$id = intval(@$_GET['id']);
$select_suppliers_edit = mysqli_query($connect, "SELECT * FROM suppliers WHERE suppliers_id = '".$id."' ");
$fetch_suppliers_edit = mysqli_fetch_object($select_suppliers_edit);

$suppliers_name = @$_POST['suppliers_name'];
$suppliers_contact = @$_POST['suppliers_contact'];
$suppliers_email = @$_POST['suppliers_email'];
$suppliers_address = @$_POST['suppliers_address'];

if(isset($_POST['updatesuppliers'])){
    if(empty($suppliers_name)){
        echo 'Please Enter a Valid Name Website';
     } elseif (empty($suppliers_contact)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($suppliers_email)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($suppliers_address)){
        echo 'Please Enter a Valid Name Website';
    } else {
        $update_suppliers = mysqli_query ($connect,"UPDATE suppliers SET 
        suppliers_name = '$suppliers_name', 
        suppliers_contact = '$suppliers_contact' ,
        suppliers_email = '$suppliers_email' ,
        suppliers_address = '$suppliers_address' 
        WHERE suppliers_id = '".$id."' ");
    }
}
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-truck menu-icon"></i>
                </span> Edit Suppliers
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
                                      if(isset($update_suppliers)){
                                        echo '<meta http-equiv= "refresh" content="2; url="suppliers.php"">
                                                <div class="alert alert-success" role="alert">
                                                  Edit Succeeded
                                                </div>
                                              ';
                                      }
                                      ?>
                                        <div class="form-group row">
                                          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Suppliers Name *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Enter your Full Name" name="suppliers_name" value="<?php echo $fetch_suppliers_edit->suppliers_name; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Suppliers Contact *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleInputMobile" name="suppliers_contact" value="<?php echo $fetch_suppliers_edit->suppliers_contact; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Suppliers Email *</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleInputMobile" name="suppliers_email" value="<?php echo $fetch_suppliers_edit->suppliers_email; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Suppliers Address *</label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control" id="exampleInputMobile" name="suppliers_address"><?php echo $fetch_suppliers_edit->suppliers_address; ?></textarea>
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary me-2" name="updatesuppliers">Submit</button>
                                        <a class="btn btn-light" href="suppliers.php">Cancel</a>
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