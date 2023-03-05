<?php
require_once("../app/config.php");
$error=$_GET['id'];
$title="Profile";
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');
?>
<div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
            <h4><i class="icon-user-plus mr-2"></i> <span class="font-weight-semibold">Account Information</span></h4>
          </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
            <div class="breadcrumb">
              <a href="./" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <a href="./profile/0" class="breadcrumb-item">Profile</a>
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
<?php if($error==1){?>   
          <div class="row">
            <div class="col-lg-12">
              <div class="alert bg-success text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                  Update successful.
                </div>
              </div>
          </div>
<?php }else if($error==2){?>
            <div class="row">
            <div class="col-lg-12">
              <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                  An error occured, try again later.
                </div>
              </div>
          </div>
<?php }?>
<div class="row">
    <div class="col-md-8">

      <!-- Basic layout-->
      <div class="card">
        <div class="card-header header-elements-inline">
          <h6 class="card-title font-weight-semibold">Update account information</h6>
              <div class="header-elements">
                <div class="list-icons text-orange-600">
                <a class="list-icons-item" data-action="collapse"></a>

              </div>
            </div>
        </div>

        <div class="card-body">
          <form action="../app/user/profile" method="post">
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Username:</label>
                <div class="col-lg-10">
                  <input type=""hidden value="<?php echo clean($row['id']); ?>"name="user_id">
                  <input type="text" name="username" class="form-control" value="<?php echo clean($row['username']);?>">
                </div>
              </div>
             <div class="form-group row">
                <label class="col-form-label col-lg-2">Name:</label>
                <div class="col-lg-10">
                  <input type="text" name="name" class="form-control" value="<?php echo clean($row['name']);?>">
                </div>
              </div>  
<?php if($row['bvn_status']==0){?>      <div class="form-group row">
                <label class="col-form-label col-lg-2">BVN: <small><font color='red'>Warning do not insert fake bvn for we do not tolerate fake bvn</font></small></label>
                <div class="col-lg-10">
                  <input type="text" name="bvn" class="form-control" value="<?php echo clean($row['bvn']);?>" required>
                </div>
              </div>  <?php }else{ ?><div class="form-group row">
                <label class="col-form-label col-lg-2">BVN:</label>
                <div class="col-lg-10">
                  <input type="text" name="bvn" class="form-control" readonly value="*******<?php //echo clean($row['bvn']);
				  ?>">
                </div>
              </div> <?php }?>


      <div class="form-group row">
                <label class="col-form-label col-lg-2">Business Name:</label>
                <div class="col-lg-10">
                  <input type="text" name="bname" class="form-control" value="<?php echo clean($row['bname']);?>">
                </div>
              </div>  

             <div class="form-group row">
                <label class="col-form-label col-lg-2">Email:</label>
                <div class="col-lg-10">
                  <input type="email" name="email" class="form-control" readonly value="<?php echo clean($row['email']);?>">
                </div>
              </div>
             <div class="form-group row">
                <label class="col-form-label col-lg-2">Mobile:</label>
                <div class="col-lg-10">
                  <input type="text" name="mobile" class="form-control" value="<?php echo clean($row['phonenumber']);?>">
                </div>
              </div>                
            <div class="text-right">
              <button type="submit" class="btn bg-orange">Update profile<i class="icon-paperplane ml-2"></i></button>
            </div>
          </form>
        </div>
      </div>
      <div class="card">
        <div class="card-header header-elements-inline">
          <h6 class="card-title font-weight-semibold">Kyc verification</h6>
          <div class="header-elements">
            <div class="list-icons text-orange-600">
                <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <td>Identification verification</td>
              <td><?php if($row['kyc_status']==0){echo'Unverified';}else{echo'Verified';}?></td>
              <td>              
                <?php 
                if(empty($row['kyc_link'])){?>
                <form method="post" action="../app/user/kyc" enctype="multipart/form-data">
                <div class="row">
                <div class="col-lg-8">
                <input type="file" name="file" class="form-input-styled" data-fouc required>
                <input type="hidden" name="user_id" value="<?php echo clean($row['id']);?>" required> 
                </div>
                <div class="col-lg-2">
                <input type="submit" class="btn btn-success" value="Upload">
                </div>
                </div>
                </form>
                <?php }else{echo'Submitted';}?>
              </td>   
                </tr> 
                <tr>
                  <td>Address verification</td>
                  <td><?php if($row['add_status']==0){echo'Unverified';}else{echo'Verified';}?></td>
                  <td>              
                    <?php 
                    if(empty($row['add_link'])){?>
                    <form method="post" action="../app/user/addstatus" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-lg-8">
                    <input type="file" name="file" class="form-input-styled" data-fouc required>
                    <input type="hidden" name="user_id" value="<?php echo clean($row['id']);?>" required> 
                    </div>
                    <div class="col-lg-2">
                    <input type="submit" class="btn btn-success" value="Upload">
                    </div>
                    </div>
                    </form>
                    <?php }else{echo'Submitted';}?>
                    </td> 
                </tr>
            </tbody>
          </table>
        </div>
      </div>
      </div>
         <div class="col-md-4">

      <!-- Basic layout-->
      <div class="card">
        <div class="card-header header-elements-inline">
          <h6 class="card-title font-weight-semibold">Change account photo</h6>
              <div class="header-elements">
                <div class="list-icons text-orange-600">
                <a class="list-icons-item" data-action="collapse"></a>

              </div>
            </div>
        </div>

        <div class="card-body">
          <form action="../app/user/userimg" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Your avatar:</label>
                <input type="file" name="file" class="form-input-styled" data-fouc required>
                <input type="hidden" name="user_id" value="<?php echo clean($row['id']);?>"> 
                <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
              </div>              
            <div class="text-right">
              <button type="submit" class="btn bg-secondary">Upload photo <i class="icon-paperplane ml-2"></i></button>
            </div>
          </form>
        </div>
      </div>
      <div class="card">
        <div class="card-header bg-transparent header-elements-inline">
          <span class="card-title">Review <?php echo clean($set['site_name']);?></span>
          <div class="header-elements">
            <div class="list-icons">
                      <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                  </div>
        </div>

        <div class="card-body">
          <form method="post" action="../app/user/review">
                      <textarea class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..." name="review" required></textarea>
                      <input type="hidden" name="user_id"  value="<?php echo clean($row['id']);?>">

                      <div class="d-flex align-items-center">
                        <button type="submit" class="btn bg-blue btn-labeled btn-labeled-right ml-auto"><b><i class="icon-paperplane"></i></b> Share</button>
                      </div>
          </form>
        </div>
      </div>
      </div>
    </div>
</div> 
<?php require_once('include/user_footer.php');?>