<?php include "header.php"; ?>
<?php
$sales_id = intval(@$_GET['sales_id']);
if(@$_GET['delete'] == "sales"){
    $delete_sales = mysqli_query ($connect, "DELETE FROM sales WHERE sales_id = '".$sales_id."' ");
}
?>
<div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-desktop-mac menu-icon"></i>
                </span> Sales
            </h3>
            </div>
            <div class="row">
            <div class="col-md-12 grid-margin stretch-card medicine">
                <div class="card">
                <div class="card-body">
                    <?php
                        if(isset($delete_sales)){
                        echo '<script>location.replace("sales.php");</script>';
                        }
                    ?>
                    <div class="listadd">
                    <h4 class="card-title lmc">List Of Sales</h4>
                    <a class="btn btn-outline-danger btn-icon-text" href="add-sales.php">+ Add Sales</a>
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

                            $clientname = @$_POST['clientname'];
                            $qtybox = @$_POST['qtybox'];
                            $qtytape = @$_POST['qtytape'];
                            $total = @$_POST['total'];
                            $date = @$_POST['date'];
                            $medicine_name = @$_POST['medicine_name'];
                            $cashier_fullname = @$_POST['cashier_fullname'];

                            $select_sales_empty = mysqli_query($connect, "SELECT * FROM sales");
                            if(mysqli_num_rows($select_sales_empty) == 0){
                                echo '
                                        <div class="alert alert-warning" role="alert">
                                            Sorry ! We Not Fond Any sales
                                        </div>
                                    ';
                            } else {
                        echo '
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Client Name<i class="mdi mdi-swap-vertical"></i></th>
                                <th>Medicine Name <i class="mdi mdi-swap-vertical"></i></th>
                                <th>Quantity Box <i class="mdi mdi-swap-vertical"></i></th>
                                <th>Quantity Piece <i class="mdi mdi-swap-vertical"></i></th>
                                <th>Total Price<i class="mdi mdi-swap-vertical"></i></th>
                                <th>Name Cahsier<i class="mdi mdi-swap-vertical"></i></th>
                                <th>Date<i class="mdi mdi-swap-vertical"></i></th>
                                <th>Action<i class="mdi mdi-swap-vertical"></i></th>
                            </tr>
                            </thead>
                            ';
                            // Start select Data in File Add medicine_category
                            $select_sales = mysqli_query($connect, "SELECT * FROM sales ORDER BY sales_id DESC");

                            // End select Data in File Add medicine_category
                            while($row = mysqli_fetch_assoc($select_sales)){


                            $select_medicine = mysqli_query($connect, "SELECT * FROM medicine WHERE medicine_id = '".$row['medicine_name']."' ");
                            $fetch_med = mysqli_fetch_assoc($select_medicine);

                            $select_cashier = mysqli_query($connect, "SELECT * FROM cashiers WHERE cashier_id = '".$row['cashier_fullname']."' ");
                            $fetch_cashier = mysqli_fetch_assoc($select_cashier);



                            echo '
                            <tr>
                            <td>'.$row['sales_client_name'].'</td>
                            <td>'.$fetch_med['medicine_name'].'</td>
                            <td>'.$row['sales_qty_box'].'</td>
                            <td>'.$row['sales_qty_tape'].'</td>
                            <td>'.$row['sales_total_price'].'</td>
                            <td>'.$fetch_cashier['cashier_fullname'].'</td>
                            <td>'.$row['sales_date'].'</td>
                            <td>
                                <a class="btn btn-sm btn-gradient-primary editback" href="edit-sales.php?id='.$row['sales_id'].'"><i class="mdi mdi-pencil-box-outline"></i> Edit</a>
                                <a class="btn btn-sm btn-gradient-primary deleteback" href="sales.php?delete=sales&sales_id='.$row['sales_id'].' "><i class="mdi mdi-delete"></i> Return</a>
                                <a class="btn btn-sm btn-gradient-primary viewback" href="#"><i class="mdi mdi-eye"></i> Print</a>
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

<?php include "footer.php"; ?>