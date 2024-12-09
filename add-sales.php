<?php include "header.php"; ?>

<!-- Start Insert Data in File Add cashier -->
<?php
$clientname = @$_POST['clientname'];
$qtybox = @$_POST['qtybox'];
$qtytape = @$_POST['qtytape'];
$total = @$_POST['total'];
$date = @$_POST['date'];
$medicine_name = @$_POST['medicine_name'];
$cashier_fullname = @$_POST['cashier_fullname'];
// $medicine_sup = @$_POST['medicine_sup'];
// $medicine_sup_email = @$_POST['medicine_sup_email'];

if(isset($_POST['add'])){
    if(empty($clientname)){
        echo 'Please Enter a clientname';
    } elseif (empty($qtybox)){
        echo 'Please Enter a qtybox';
    } elseif (empty($qtytape)){
        echo 'Please Enter a qtytape';
    } elseif (empty($total)){
        echo 'Please Enter a total';
    } elseif (empty($date)){
        echo 'Please Enter a date';
    } else {
        $insert_sales = mysqli_query ($connect, "INSERT INTO sales (sales_client_name,sales_qty_box,sales_qty_tape,sales_total_price,sales_date,medicine_name,cashier_fullname) VALUES 
        ('$clientname','$qtybox','$qtytape','$total','$date','$medicine_name','$cashier_fullname')");
    }
}
?>
<!-- End Insert Data in File Add cashier -->

<div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">
                <h3 class="page-title">
                  <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-desktop-mac menu-icon"></i>
                  </span> Add Sales
                </h3>
              </div>
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card medicine">
                  <div class="card">
                    <div class="card-body">
                      <?php
                            if(isset($insert_sales)){
                            echo '<meta http-equiv= "refresh" content="2; url="sales.php"">
                            <div class="alert alert-success" role="alert">
                                Add Succeeded
                            </div>
                            ';
                        }
                            ?>
                      <div class="listadd">
                        <h4 class="card-title lmc">Add Information</h4>
                      </div>
                      <div class="linebefor"></div>
                      <div class="col-lg-12 grid-margin stretch-card responsive-table">
                        <div class="card">
                          <div class="card-body">
                            <form class="form-sample" method="post">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group row">
                                      <p class="card-description"><i class="mdi mdi-map-marker-radius"></i> Cairo</p>
                                      <p class="card-description"><i class="mdi mdi-phone"></i> +9555411121</p>
                                      <p class="card-description"><i class="mdi mdi-email-outline"></i> Mail@mail.com</p>
                                      <p class="card-description"><i class="mdi mdi-web"></i> www.Domain.com</p>
                                    </div>
                                  </div>
                                </div>
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Client Name<i class="mdi mdi-swap-vertical"></i></th>
                                    <th>Product Name <i class="mdi mdi-swap-vertical"></i></th>
                                    <th>Quantity Box <i class="mdi mdi-swap-vertical"></i></th>
                                    <th>Quantity Piece <i class="mdi mdi-swap-vertical"></i></th>
                                    <th>Total Price<i class="mdi mdi-swap-vertical"></i></th>
                                    <th>Name Cahsier<i class="mdi mdi-swap-vertical"></i></th>
                                    <th>Date<i class="mdi mdi-swap-vertical"></i></th>
                                </tr>
                                </thead>
                                <tr>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Client Name" name="clientname"/>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                      <?php
                                      $select_medicine_name = mysqli_query ($connect, "SELECT * FROM medicine");
                                      echo '
                                            <select name="medicine_name" class="form-control">
                                                ';
                                                while($row = mysqli_fetch_assoc($select_medicine_name)){
                                                  echo '
                                                          <option value="'.$row['medicine_id'].'">'.$row['medicine_name'].'</option>
                                                        ';
                                                }
                                                echo '
                                            </select>                                
                                      ';
                                      ?>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter Qty" name="qtybox"/>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter Qty" name="qtytape"/>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter Price" name="total"/>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                      <?php
                                      $select_cashier_fullname = mysqli_query ($connect, "SELECT * FROM cashiers");
                                      echo '
                                            <select name="cashier_fullname" class="form-control">
                                                ';
                                                while($row = mysqli_fetch_assoc($select_cashier_fullname)){
                                                  echo '
                                                          <option value="'.$row['cashier_id'].'">'.$row['cashier_fullname'].'</option>
                                                        ';
                                                }
                                                echo '
                                            </select>                                
                                      ';
                                      ?>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter Date" name="date"/>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              </table>
                              <div class="btn-form">
                                        <div class="form-group row">
                                          <label class="col-lg-3">Discount ($)</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control"/>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label class="col-lg-3">Tax ($)</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control"/>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label class="col-lg-3">Total Amount ($)</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control"/>
                                          </div>
                                        </div>
                                        <div class="btn-form-click">
                                        <input type="submit" class="btn btn-gradient-primary btn-fw" name="add" value="Add">
                                        <input class="btn btn-primary" type="reset" value="Clear">
                                        <a class="btn btn-secondary" href="sales.php">Close</a>
                                      </div>
                                      </form>
                              </div>
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

            <?php include "footer.php"; ?>