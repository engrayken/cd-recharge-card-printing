<?php
require_once("../app/config.php");
$title=addslashes("Security");
$error=clean($_GET['id']);
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');
?>
<div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
            <h4><i class="icon-lock mr-2"></i> <span class="font-weight-semibold">Account Security</span></h4>
          </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
            <div class="breadcrumb">
              <a href="./" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <a href="./security/0" class="breadcrumb-item">security</a>
            </div>
          </div>

          <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
              <a href="./fund/0" class="breadcrumb-elements-item">
                <i class="icon-credit-card mr-2 text-success"></i>
                Fund account
              </a>
              <!--a href="./buy_bitcoin" class="breadcrumb-elements-item">
                <i class="icon-coin-dollar mr-2 text-danger"></i>
                Buy bitcoin
              </a-->    
             <a href="ticket" class="breadcrumb-elements-item">
                <i class="icon-comment-discussion mr-2 text-info"></i>
                Support
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="alert bg-info text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                  You will be logged out automatically once password is successfully changed
                </div>
              </div>
          </div>
<?php if($error==1){?>   
          <div class="row">
            <div class="col-lg-12">
              <div class="alert bg-secondary text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                  Incorrect password
                </div>
              </div>
          </div>
<?php }else if($error==2){?>
            <div class="row">
            <div class="col-lg-12">
              <div class="alert bg-secondary text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                  Passwords doesn't match
                </div>
              </div>
          </div>
<?php }?>
          <div class="row">
    <div class="col-md-12">

      <!-- Basic layout-->
      <div class="card">
        <div class="card-header header-elements-inline">
          <h6 class="card-title font-weight-semibold">Change account password</h6>
              <div class="header-elements">
                <div class="list-icons text-orange-600">
                <a class="list-icons-item" data-action="collapse"></a>

              </div>
            </div>
        </div>

        <div class="card-body">
          <form action="../app/user/password" method="post">
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Old password:</label>
                <div class="col-lg-10">
                  <input type=""hidden value="<?php echo $row['id']; ?>"name="user_id">
                  <input type="password" name="oldpassword" class="form-control" required>
                </div>
              </div>
             <div class="form-group row">
                <label class="col-form-label col-lg-2">New password:</label>
                <div class="col-lg-10">
                  <input type=""hidden value="<?php echo $row['id']; ?>"name="user_id">
                  <input type="password" name="newpassword" class="form-control" required>
                </div>
              </div>  
             <div class="form-group row">
                <label class="col-form-label col-lg-2">Confirm password:</label>
                <div class="col-lg-10">
                  <input type=""hidden value="<?php echo $row['id']; ?>"name="user_id">
                  <input type="password" name="confirmpassword" class="form-control" required>
                </div>
              </div>                
            <div class="text-right">
              <button type="submit" class="btn bg-danger">Submit form <i class="icon-paperplane ml-2"></i></button>
            </div>
          </form>
        </div>
      </div>
      <!-- /basic layout -->
      </div>
    </div>
  </div>
<?php require_once('include/user_footer.php');?>