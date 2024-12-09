<?php include "header.php"; ?>
<?php
error_reporting(0);
$select_setting = mysqli_query($connect, "SELECT * FROM setting");
$fetch_setting = mysqli_fetch_assoc($select_setting);

$setting_company_name = $_POST['setting_company_name'];
$setting_description = $_POST['setting_description'];
$setting_keywords = $_POST['setting_keywords'];
$setting_address = $_POST['setting_address'];
$setting_email = $_POST['setting_email'];
$setting_contact = $_POST['setting_contact'];
$setting_leave_message = $_POST['setting_leave_message'];
$setting_close = $_POST['setting_close'];

if(isset($_POST['update'])){
    if(empty($setting_company_name)){
        echo 'Please Enter a Valid Name Website';
    } elseif(empty($setting_description)){
        echo 'Please Enter a Valid Name Website';
    } elseif(empty($setting_keywords)){
        echo 'Please Enter a Valid Name Website';
    } elseif(empty($setting_address)){
        echo 'Please Enter a Valid Name Website';
    } elseif(empty($setting_email)){
        echo 'Please Enter a Valid Name Website';
    } elseif(empty($setting_contact)){
        echo 'Please Enter a Valid Name Website';
    } elseif(empty($setting_leave_message)){
        echo 'Please Enter a Valid Name Website';
    } elseif(empty($setting_close)){
        echo 'Please Enter a Valid Name Website';
    } else {
        $updatesetting = mysqli_query($connect, "UPDATE setting SET 
        setting_company_name = '$setting_company_name', 
        setting_description ='$setting_description',
        setting_keywords ='$setting_keywords', 
        setting_address ='$setting_address', 
        setting_email ='$setting_email', 
        setting_contact ='$setting_contact', 
        setting_leave_message ='$setting_leave_message', 
        setting_close ='$setting_close'");
    }
}
?>
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-chart-bar menu-icon"></i>
                </span> Company Settings
              </h3>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-description">System configuration</p>
                        <?php
                        if(isset($updatesetting)){
                            echo '
                                    <div class="alert alert-success" role="alert">Edit succeeded</div>
                                    <meta http-equiv= "refresh" content="2; url="company.php"">
                                ';
                        }
                        ?>
                        <form class="forms-sample" method="post">
                          <div class="form-group">
                            <label for="exampleInputName1">Company Name *</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter your Company Name" name="setting_company_name" value="<?php echo $fetch_setting['setting_company_name']; ?>">
                          </div>
                          <div class="form-group">
                            <label>Logo *</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary btn-upload" type="button">Upload</button>
                              </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Enter your Description" name="setting_description"><?php echo $fetch_setting['setting_description']; ?></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleTextarea1">Keywords</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Enter your Keywords" name="setting_keywords"><?php echo $fetch_setting['setting_keywords']; ?></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword4">Address *</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Enter your Address" name="setting_address"><?php echo $fetch_setting['setting_address']; ?></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword4">Email *</label>
                            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Enter your Email" name="setting_email" value="<?php echo $fetch_setting['setting_email']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Contact *</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter your Contact" name="setting_contact" value="<?php echo $fetch_setting['setting_contact']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Leave Message</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Enter your Message" name="setting_leave_message"><?php echo $fetch_setting['setting_leave_message']; ?></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Open Or Close *</label>
                            <select class="form-control" name="setting_close">
                            <?php
                            if($fetch_setting['setting_close'] == 1){
                                echo '<option value="1">open</option>';
                                echo '<option value="2">close</option>';
                            } else {
                                echo '<option value="2">close</option>';
                                echo '<option value="1">open</option>';
                            }
                            ?>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-gradient-primary me-2" name="update">Submit</button>
                          <button class="btn btn-light">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
          </div>
          <!-- content-wrapper ends -->
<?php include "footer.php"; ?>