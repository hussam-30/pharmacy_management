<?php include "header.php"; ?>
<?php

$id = intval(@$_GET['id']);
$select_medicine_edit = mysqli_query($connect, "SELECT * FROM medicine WHERE medicine_id = '".$id."' ");
$fetch_medicine_edit = mysqli_fetch_object($select_medicine_edit);

$medicine_name = @$_POST['medicine_name'];
$purchase_price = @$_POST['purchase_price'];
$retail_price = @$_POST['retail_price'];
$unit_of_box = @$_POST['unit_of_box'];
$unit_of_picec = @$_POST['unit_of_picec'];
$quantity_box = @$_POST['quantity_box'];
$quantity_picec = @$_POST['quantity_picec'];
$expirys_date = @$_POST['expirys_date'];
$medicine_sup = @$_POST['medicine_sup'];
$medicine_sup_email = @$_POST['medicine_sup_email'];
$med_cat_name = @$_POST['med_cat_name'];

if(isset($_POST['updatemedicine'])){
    if(empty($medicine_name)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($purchase_price)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($retail_price)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($unit_of_box)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($unit_of_picec)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($quantity_box)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($quantity_picec)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($expirys_date)){
        echo 'Please Enter a Valid Name Website';
    } else {
        $update_medicine = mysqli_query ($connect,"UPDATE medicine SET 
        medicine_name = '$medicine_name', 
        medicine_purchase_price = '$purchase_price' ,
        medicine_retail_price = '$retail_price' ,
        medicine_unit_of_box = '$unit_of_box' ,
        medicine_unit_of_picec = '$unit_of_picec' ,
        medicine_quantity_box = '$quantity_box' ,
        medicine_quantity_picec = '$quantity_picec' ,
        medicine_expirys_date = '$expirys_date' ,
        medicine_sup = '$medicine_sup' ,
        medicine_sup_email = '$medicine_sup_email' ,
        med_cat_name = '$med_cat_name' 
        WHERE medicine_id = '".$id."' ");
    }
}
?>
<div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-hospital menu-icon"></i>
                </span> Edit Medicine
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
                                    if(isset($update_medicine)){
                                        echo '<meta http-equiv= "refresh" content="2; url="medicine.php"">
                                                <div class="alert alert-success" role="alert">
                                                Edit Succeeded
                                                </div>
                                            ';
                                    }
                                    ?>
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Medicine Name :</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="recipient-name" name="medicine_name" value="<?php echo $fetch_medicine_edit->medicine_name; ?>">
                                    </div>
                                </div>
                                <?php
                                $select_medicine_category_cat = mysqli_query ($connect, "SELECT * FROM medicine_category");
                                echo '
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Category :</label>
                                            <div class="col-sm-10">
                                            <select name="med_cat_name" class="form-control">
                                                ';
                                                while($row = mysqli_fetch_assoc($select_medicine_category_cat)){
                                                  echo '
                                                          <option value="'.$row['med_cat_id'].'">'.$row['med_cat_category_name'].'</option>
                                                        ';
                                                }
                                                echo '
                                            </select>  
                                            </div>                              
                                        </div>
                                      ';
                                $select_sup_name = mysqli_query ($connect, "SELECT * FROM suppliers");
                                echo '
                              <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Supplier Name :</label>
                                        <div class="col-sm-10">
                                            <select name="medicine_sup" class="form-control">
                                                ';
                                                while($row = mysqli_fetch_assoc($select_sup_name)){
                                                echo '
                                                        <option value="'.$row['suppliers_id'].'">'.$row['suppliers_name'].'</option>
                                                        ';
                                                }
                                                echo '
                                            </select>  
                                            </div>                              
                                        </div>
                                    ';
                                    $select_sup_email = mysqli_query ($connect, "SELECT * FROM suppliers");
                                echo '
                                        <div class="form-group row">
                                          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Supplier Email :</label>
                                          <div class="col-sm-10">
                                            <select name="medicine_sup_email" class="form-control">
                                                ';
                                                while($row = mysqli_fetch_assoc($select_sup_email)){
                                                  echo '
                                                          <option value="'.$row['suppliers_id'].'">'.$row['suppliers_email'].'</option>
                                                        ';
                                                }
                                                echo '
                                            </select>  
                                            </div>
                                        </div>
                                      ';
                                ?>
                                        <div class="form-group row">
                                          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Purchase Price :</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" name="purchase_price" value="<?php echo $fetch_medicine_edit->medicine_purchase_price; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Retail Price :</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" id="exampleInputMobile" name="retail_price" value="<?php echo $fetch_medicine_edit->medicine_retail_price; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Unit Of Box :</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" id="exampleInputMobile" name="unit_of_box" value="<?php echo $fetch_medicine_edit->medicine_unit_of_box; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Unit Of Tape :</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" id="exampleInputMobile" name="unit_of_picec" value="<?php echo $fetch_medicine_edit->medicine_unit_of_picec; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Quantity Box :</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" id="exampleInputMobile" name="quantity_box" value="<?php echo $fetch_medicine_edit->medicine_quantity_box; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Quantity Tape :</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" id="exampleInputMobile" name="quantity_picec" value="<?php echo $fetch_medicine_edit->medicine_quantity_picec; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Expiry Date :</label>
                                          <div class="col-sm-10">
                                            <input type="date" class="form-control" id="exampleInputMobile" name="expirys_date" value="<?php echo $fetch_medicine_edit->medicine_expirys_date; ?>">
                                          </div>
                                        </div>



                            
                            <button type="submit" class="btn btn-gradient-primary me-2" name="updatemedicine">Submit</button>
                            <a class="btn btn-light" href="medicine.php">Cancel</a>
                            
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