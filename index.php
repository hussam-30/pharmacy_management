<?php include "header.php";?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home menu-icon"></i>
                </span> Dashboard
              </h3>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total mediciane <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">$ 150,000</h2>
                    <h6 class="card-text">Increased by 60%</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total suppliers <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">456,334</h2>
                    <h6 class="card-text">Decreased by 10%</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Cashier <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">955,741</h2>
                    <h6 class="card-text">Increased by 5%</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 statistics grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                      <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                    </div>
                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-12 top10 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body card-top10item">
                    <h4 class="card-title">Top 10 selling items</h4>
                    <div class="linebefor"></div>
                    <table class="top10items table-striped table">
                      <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                      </tr>
                      <tr>
                        <td>abdallah</td>
                        <td>30</td>
                        <td>70$</td>
                        <td>700$</td>
                      </tr>
                      <tr>
                        <td>abdallah</td>
                        <td>30</td>
                        <td>70$</td>
                        <td>700$</td>
                      </tr>
                      <tr>
                        <td>abdallah</td>
                        <td>30</td>
                        <td>70$</td>
                        <td>700$</td>
                      </tr>
                      <tr>
                        <td>abdallah</td>
                        <td>30</td>
                        <td>70$</td>
                        <td>700$</td>
                      </tr>
                      <tr>
                        <td>abdallah</td>
                        <td>30</td>
                        <td>70$</td>
                        <td>700$</td>
                      </tr>
                      <tr>
                        <td>abdallah</td>
                        <td>30</td>
                        <td>70$</td>
                        <td>700$</td>
                      </tr>
                      <tr>
                        <td>abdallah</td>
                        <td>30</td>
                        <td>70$</td>
                        <td>700$</td>
                      </tr>
                      <tr>
                        <td>abdallah</td>
                        <td>30</td>
                        <td>70$</td>
                        <td>700$</td>
                      </tr>
                      <tr>
                        <td>abdallah</td>
                        <td>30</td>
                        <td>70$</td>
                        <td>700$</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>    
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
<?php include "footer.php";?>