<?php include "header.php"; ?>

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
                      <div class="listadd">
                        <h4 class="card-title lmc">Add Information</h4>
                      </div>
                      <div class="linebefor"></div>
                      <div class="col-lg-12 grid-margin stretch-card responsive-table">
                        <div class="card">
                          <div class="card-body">
                            <form class="form-sample">
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
                                        <input type="text" class="form-control" placeholder="Enter Product Name"/>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter Qty"/>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter Price"/>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter Qty"/>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter Price"/>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter Name Cashier"/>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-group row">
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Enter Date"/>
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
                                        <button type="button" class="btn btn-gradient-primary btn-fw">Add</button>
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