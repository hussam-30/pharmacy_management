<?php include "header.php"; ?>

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
                                <th>Action<i class="mdi mdi-swap-vertical"></i></th>
                              </tr>
                            </thead>
                            <tr>
                              <td>Hussam</td>
                              <td>panadol</td>
                              <td>2</td>
                              <td>4</td>
                              <td>40$</td>
                              <td>Abdallah</td>
                              <td>12/10/2024</td>
                              <td>
                                <a class="btn btn-sm btn-gradient-primary editback" href="edit-medicine.php?id='.$row['medicine_id'].'"><i class="mdi mdi-pencil-box-outline"></i> Edit</a>
                                <a class="btn btn-sm btn-gradient-primary deleteback" href="medicine.php?delete=medicine&medicine_id='.$row['medicine_id'].' "><i class="mdi mdi-delete"></i> Delete</a>
                                <a class="btn btn-sm btn-gradient-primary viewback" href="#"><i class="mdi mdi-eye"></i> Print</a>
                            </td>
                            </tr>
                            </thead>
                          </table>
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