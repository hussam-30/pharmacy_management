<?php include "header.php"; ?>
<!-- <?php include "config/function.php"; ?> -->
<?php
$medicine_id = intval(@$_GET['medicine_id']);
if(@$_GET['delete'] == "medicine"){
    $delete_medicine = mysqli_query ($connect, "DELETE FROM medicine WHERE medicine_id = '".$medicine_id."' ");
}
?>
<!-- Start Insert Data in File Add cashier -->
<?php
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
if(isset($_POST['addmedicine'])){
    if(empty($medicine_name)){
        echo 'Please Enter a medicine name';
     } elseif (empty($purchase_price)){
        echo 'Please Enter a purchase price';
    } elseif (empty($retail_price)){
        echo 'Please Enter a retail_price';
    } elseif (empty($unit_of_box)){
        echo 'Please Enter a unit_of_box';
    } elseif (empty($unit_of_picec)){
        echo 'Please Enter a unit_of_picec';
    } elseif (empty($quantity_box)){
        echo 'Please Enter a quantity_box';
    } elseif (empty($quantity_picec)){
        echo 'Please Enter a quantity_picec';
    } elseif (empty($expirys_date)){
      echo 'Please Enter a expiray_date';
    } else {
        $insert_medicine = mysqli_query ($connect, "INSERT INTO medicine (medicine_name,medicine_purchase_price,medicine_retail_price,medicine_unit_of_box,medicine_unit_of_picec,medicine_quantity_box,medicine_quantity_picec,medicine_expirys_date,medicine_sup,medicine_sup_email,med_cat_name) VALUES 
        ('$medicine_name','$purchase_price','$retail_price','$unit_of_box','$unit_of_picec','$quantity_box','$quantity_picec','$expirys_date','$medicine_sup','$medicine_sup_email','$med_cat_name')");
    }
}
?>
<!-- End Insert Data in File Add cashier -->
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-hospital menu-icon"></i>
                </span> Medicine
              </h3>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card medicine">
                <div class="card">
                  <div class="card-body">
                  <?php
                      if(isset($delete_medicine)){
                        echo '<script>location.replace("medicine.php");</script>';
                      }
                      ?>
                    <div class="listadd">
                      <h4 class="card-title lmc">List Of Medicine</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger btn-icon-text" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+ Add Medicine</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">+ Add Medicine</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Medicine Name :</label>
                                    <input type="text" class="form-control" id="recipient-name" name="medicine_name">
                                </div>
                                <?php
                                $select_medicine_category_cat = mysqli_query ($connect, "SELECT * FROM medicine_category");
                                echo '
                                        <div class="mb-3">
                                          <label for="message-text" class="col-form-label">Category :</label>
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
                                      ';
                                $select_sup_name = mysqli_query ($connect, "SELECT * FROM suppliers");
                                echo '
                                        <div class="mb-3">
                                          <label for="message-text" class="col-form-label">Supplier Name :</label>
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
                                      ';
                                $select_sup_email = mysqli_query ($connect, "SELECT * FROM suppliers");
                                echo '
                                        <div class="mb-3">
                                          <label for="message-text" class="col-form-label">Supplier Email :</label>
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
                                      ';
                                ?>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Purchase Price :</label>
                                    <input type="number" class="form-control" id="message-text" name="purchase_price">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Retail Price :</label>
                                    <input type="number" class="form-control" id="message-text" name="retail_price">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Unit Of Box :</label>
                                    <input type="number" class="form-control" id="message-text" name="unit_of_box">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Unit Of Tape :</label>
                                    <input type="number" class="form-control" id="message-text" name="unit_of_picec">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Quantity Box :</label>
                                    <input type="number" class="form-control" id="message-text" name="quantity_box">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Quantity Tape :</label>
                                    <input type="number" class="form-control" id="message-text" name="quantity_picec">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Expiry Date :</label>
                                    <input type="date" class="form-control" id="message-text" name="expirys_date">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save Changes" name="addmedicine">
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
                              
                              if(isset($insert_medicine)){
                                echo '<meta http-equiv= "refresh" content="2; url="medicine.php"">
                                <div class="alert alert-success" role="alert">
                                  Add Succeeded
                                </div>
                                ';
                            }
                              ?>
                          <?php
                            $select_medicine_empty = mysqli_query($connect, "SELECT * FROM medicine");
                            if(mysqli_num_rows($select_medicine_empty) == 0){
                                echo '
                                        <div class="alert alert-warning" role="alert">
                                            Sorry ! We Not Fond Any medicine
                                        </div>
                                    ';
                            } else {
                        echo '
                        <table class="table table-striped">
                        <thead>
                        <tr>
                        <th>Medicine Name<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Category<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Supplier Name<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Supplier Email<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Purchase Price<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Retail Price<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Unit Of Box<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Unit Of Tape<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Quantity Box<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Quantity Tape<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Expiry Date<i class="mdi mdi-swap-vertical"></i></th>
                        <th>Action<i class="mdi mdi-swap-vertical"></i></th>
                        </tr> 
                        </thead>
                        ';
                               // Start select Data in File Add medicine_category
                               $select_medicine = mysqli_query($connect, "SELECT * FROM medicine ORDER BY medicine_id DESC");

                               // End select Data in File Add medicine_category
                                  while($row = mysqli_fetch_assoc($select_medicine)){


                               $select_suppliers = mysqli_query($connect, "SELECT * FROM suppliers WHERE suppliers_id = '".$row['medicine_sup']."' ");
                               $fetch_supp = mysqli_fetch_assoc($select_suppliers);

                               $select_suppliers_email = mysqli_query($connect, "SELECT * FROM suppliers WHERE suppliers_id = '".$row['medicine_sup_email']."' ");
                               $fetch_supp_email = mysqli_fetch_assoc($select_suppliers_email);

                               $select_med_cat = mysqli_query($connect, "SELECT * FROM medicine_category WHERE med_cat_id = '".$row['med_cat_name']."' ");
                               $fetch_med = mysqli_fetch_assoc($select_med_cat);

                                      echo '
                                              <tr>
                                              <td>'.$row['medicine_name'].'</td>
                                              <td>'.$fetch_med['med_cat_category_name'].'</td>
                                              <td>'.$fetch_supp['suppliers_name'].'</td>
                                              <td>'.$fetch_supp_email['suppliers_email'].'</td>
                                              <td>'.$row['medicine_purchase_price'].'$</td>
                                              <td>'.$row['medicine_retail_price'].'$</td>
                                              <td>'.$row['medicine_unit_of_box'].' Box</td>
                                              <td>'.$row['medicine_unit_of_picec'].' Tape</td>
                                              <td>'.$row['medicine_quantity_box'].' Box</td>
                                              <td>'.$row['medicine_quantity_picec'].' Picec</td>
                                              <td>'.$row['medicine_expirys_date'].'</td>
                                              <td>
                                                <a class="btn btn-sm btn-gradient-primary editback" href="edit-medicine.php?id='.$row['medicine_id'].'"><i class="mdi mdi-pencil-box-outline"></i> Edit</a>
                                                <a class="btn btn-sm btn-gradient-primary deleteback" href="medicine.php?delete=medicine&medicine_id='.$row['medicine_id'].' "><i class="mdi mdi-delete"></i> Delete</a>
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