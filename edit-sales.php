<?php include "header.php"; ?>
<?php

$id = intval(@$_GET['id']);
$select_sales_edit = mysqli_query($connect, "SELECT * FROM sales WHERE sales_id = '".$id."' ");
$fetch_sales_edit = mysqli_fetch_object($select_sales_edit);

$clientname = @$_POST['clientname'];
$qtybox = @$_POST['qtybox'];
$qtytape = @$_POST['qtytape'];
$total = @$_POST['total'];
$date = @$_POST['date'];
$medicine_name = @$_POST['medicine_name'];
$cashier_fullname = @$_POST['cashier_fullname'];


if(isset($_POST['updatesales'])){
    if(empty($clientname)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($qtybox)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($qtytape)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($total)){
        echo 'Please Enter a Valid Name Website';
    } elseif (empty($date)){
        echo 'Please Enter a Valid Name Website';
    } else {
        $update_sales = mysqli_query($connect, "UPDATE sales SET 
        sales_client_name = '$clientname', 
        sales_qty_box = '$qtybox' ,
        sales_qty_tape = '$qtytape' ,
        sales_total_price = '$total' ,
        sales_date = '$date' ,
        medicine_name = '$medicine_name',
        cashier_fullname = '$cashier_fullname'
        WHERE sales_id = '".$id."' ");
    }
}
?>
<div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-hospital menu-icon"></i>
                </span> Edit sales
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
                                    if(isset($update_sales)){
                                        echo '<meta http-equiv= "refresh" content="2; url="sales.php"">
                                                <div class="alert alert-success" role="alert">
                                                Edit Succeeded
                                                </div>
                                            ';
                                    }
                                    ?>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Client Name :</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="recipient-name" name="clientname" value="<?php echo $fetch_sales_edit->sales_client_name; ?>">
                                            </div>
                                        </div>
                                          <?php
                                          $select_medicine_name = mysqli_query ($connect, "SELECT * FROM medicine");
                                          echo '
                                                  <div class="form-group row">
                                                      <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Medicine Name :</label>
                                                      <div class="col-sm-10">
                                                      <select name="medicine_name" class="form-control">
                                                          ';
                                                          while($row = mysqli_fetch_assoc($select_medicine_name)){
                                                            echo '
                                                                    <option value="'.$row['medicine_id'].'">'.$row['medicine_name'].'</option>
                                                                  ';
                                                          }
                                                          echo '
                                                      </select>  
                                                      </div>                              
                                                  </div>
                                                ';
                                                  ?>
                                        <div class="form-group row">
                                          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Quantity Box :</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" name="qtybox" value="<?php echo $fetch_sales_edit->sales_qty_box; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Quantity Tape :</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" id="exampleInputMobile" name="qtytape" value="<?php echo $fetch_sales_edit->sales_qty_tape; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Total Price :</label>
                                          <div class="col-sm-10">
                                            <input type="number" class="form-control" id="exampleInputMobile" name="total" value="<?php echo $fetch_sales_edit->sales_total_price; ?>">
                                          </div>
                                        </div>
                                        <?php
                                          $select_cashier_fullname = mysqli_query ($connect, "SELECT * FROM cashiers");
                                          echo '
                                                  <div class="form-group row">
                                                      <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Cashier Full Name :</label>
                                                      <div class="col-sm-10">
                                                      <select name="cashier_fullname" class="form-control">
                                                          ';
                                                          while($row = mysqli_fetch_assoc($select_cashier_fullname)){
                                                            echo '
                                                                    <option value="'.$row['cashier_id'].'">'.$row['cashier_fullname'].'</option>
                                                                  ';
                                                          }
                                                          echo '
                                                      </select>  
                                                      </div>                              
                                                  </div>
                                                ';
                                                  ?>
                                        <div class="form-group row">
                                          <label for="exampleInputMobile" class="col-sm-2 col-form-label">Date :</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="exampleInputMobile" name="date" value="<?php echo $fetch_sales_edit->sales_date; ?>">
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-gradient-primary me-2" name="updatesales">Submit</button>
                                        <a class="btn btn-light" href="sales.php">Cancel</a>
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