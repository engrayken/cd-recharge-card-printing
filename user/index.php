<?php
require_once("../app/config.php");
$title="User Dashboard";
//$url2 = "https://api.coinmarketcap.com/v1/ticker/bitcoin?convert=USD"; 
//$data = file_get_contents($url2); 
//$priceinfo = json_decode($data); 
//$rate = $priceinfo[0]->price_usd; 
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');
$support= mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM support WHERE user_id='".$row['id']."'"));  
$support_1= mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM support WHERE status=0 AND user_id='".$row['id']."'"));
$support_0=mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM support WHERE status=1 AND user_id='".$row['id']."'"));

?>
<!-- Main content -->
<div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
          <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
              <h4><i class="icon-home4 mr-2"></i> <span class="font-weight-semibold">Dashboard</span></h4>
            </div>
          </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content pt-0">
<?php 
if(!empty($_SESSION['bitcrow_userhome'])){?>
        <div class="row">
            <div class="col-lg-12">
              <div class="alert <?php if($_SESSION['bitcrow_userhome']=='email_versent') {echo 'bg-success';}else{echo 'bg-danger';}?> text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <?php if($_SESSION['bitcrow_userhome']=='email_verfailed') {
            echo'An error occured while sending verification email, try again later.';
          } else if($_SESSION['bitcrow_userhome']=='email_versent') {
            echo'Verification email was successfully sent.';
          }?>                 
                </div>
              </div>
          </div>
<?php
}if($row['active']==0){
  if($set['email_activation']==1){
    if($eset['status']==1){?>
        <div class="alert bg-light alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1">Email verification</h6>
          User account has not yet been verified, account funding is currently disabled until email is verified, you can't buy a trading plan without funding your account. <a class="" href='<?php echo $url."/app/user?id=sendver&del=2&status=".$row['token'];?>'>Click here</a> to verify your account
          </div>
<?php
    }
  }
}?>
<?php if (($row['kyc_status']==0) || ($row['add_status']==0)){?>
        <div class="alert bg-orange alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1 text-uppercase">Identity verification</h6>
          Kindly submit your KYC and Proof Of Address for proper verification. Once Verification is completed we will remove all restrictions to your account. <a class="text-white" href='<?php echo $url."/user/profile/0";?>'>Click here</a> to upload documents
          </div>
<?php }?>
<div class="row">
  <div class="col-md-4">
    <div class="card card-body">
      <div class="media">
        <div class="mr-3 align-self-center">
          <i class="icon-enter6 icon-3x text-indigo-400"></i>
        </div>

        <div class="media-body text-right">
          <h3 class="font-weight-semibold mb-0"><?php echo clean($scan2['currency'].number_format($row['dep_balance']));?></h3>
          <span class="text-uppercase font-size-sm text-muted">Mature Balance</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card border-left-3 border-left-orange rounded-left-0">
      <div class="card-body">
        <div class="d-flex">
          <h3 class="font-weight-semibold mb-0">
  <?php echo clean($scan2['currency']. $row['bit_balance']);?>
          </h3>
        </div>
         Immature  balance
      </div>
    </div>
  </div> 
   <div class="col-md-4">
    <div class="card border-left-3 border-left-danger rounded-left-0">
      <div class="card-body">
        <div class="d-flex">
          <h3 class="font-weight-semibold mb-0">
          <?php      $trans = mysqli_query($dbc, "SELECT sum(amount) FROM transaction WHERE status='1' and user_id = '".$row['id']."' ");
        while($transn = mysqli_fetch_array($trans)){ 

echo clean($scan2['currency'].$transn['sum(amount)']);

}
?>
          </h3>
        </div>
         TOTAL TRANSACTION
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    <div class="card card-body">
      <div class="media align-items-center align-items-md-start flex-column flex-md-row">
        <a href="#" class="text-teal mr-md-3 mb-3 mb-md-0">
          <i class="icon-question7 text-success-400 border-success-400 border-2 rounded-round p-2"></i>
        </a>

       <div class="media-body text-center text-md-left">
          <h6 class="media-title font-weight-semibold">Do You Have a question?</h6>
        Kindly  Contact us anytime

<br/>
        <a href="./ticket" class="btn bg-warning-400 ml-md-3 mt-3 mt-md-0">Contact</a>
        </div>
      </div>
    </div>
    <div class="card border-left-3 border-left-default rounded-left-0">
      <div class="card-body">
        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
          <div>
            <ul class="list list-unstyled mb-0">
              <li>Merchant ID: <span class="font-weight-semibold">[#<?php echo clean($row['token']);?>]</span></li>
              <li>Country: <span class="font-weight-semibold"><?php echo clean($row['country']);?></span></li>
              <li>Joined: <span class="font-weight-semibold"><?php echo clean(date("Y/m/d h:i:A", strtotime($row['date'])));?></span></li>
              <li>Last Login: <span class="font-weight-semibold"><?php echo clean(date("Y/m/d h:i:A", strtotime($row['last_login'])));?></span></li>
            </ul>
          </div>
          <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
            <ul class="list list-unstyled mb-0">
              <?php if($row['active']==0){echo'<li>Account Status: <span class="badge bg-danger-800 font-weight-semibold">Not verified</span></li>';}else{echo'<li>Account Status: <span class="badge bg-success-800 font-weight-semibold">Verified</span></li>';}?>
              
            </ul>
          </div>
        </div>
      </div>
      <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
        <span>
          <span class="badge badge-mark border-success mr-2"></span>
          IP Address:
          <span class="font-weight-semibold"><?php echo clean($row['ip_address']);?></span>
        </span>
      </div>
    </div>
  </div> 
    <div class="col-md-5">
      <div class="card border-top-3 border-top-purple rounded-left-0">
        <div class="card-header bg-transparent header-elements-inline">
          <span class="text-uppercase font-size-sm font-weight-semibold">Transaction Highlight</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="list-group list-group-flush">
<?php 
$trans = mysqli_query($dbc, "SELECT * FROM transaction WHERE user_id='".$row['id']."' LIMIT 5");
while($htran = mysqli_fetch_array($trans)){
?>
      
              <div class="list-group-item list-group-item-action">
                <?php echo clean($htran['net'].'-'.$scan2['currency'].$htran['amount']);?>
           
              </div>
  
<?php }?>
    <a href="transaction" class="list-group-item list-group-item-action"> <font color='green'><b>Continue...</b></font>
            </a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
        <i class="icon-book icon-2x text-indigo-400 border-indigo-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
          <h5 class="card-title">Knowledge Base</h5>
          <p class="mb-3">Ouch found swore much dear conductively hid submissively hatchet vexed far</p>
          <a href="../blog/1" class="btn bg-indigo-400">Browse articles</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div id="accordion-group">
        <?php
        $data=mysqli_query($dbc, "SELECT * FROM review WHERE status=1 ORDER BY review.id desc LIMIT 3");
        while($row2 = mysqli_fetch_array($data)) {
        $user=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id = '".$row2['user_id']."'")); 
        ?> 
        <div class="card mb-0 rounded-bottom-0">
          <div class="card-header">
            <h6 class="card-title">
              <a data-toggle="collapse" class="text-default" href="#accordion-item-group<?php echo  $row2['id'];?>"><?php echo  $user['username'];?></a>
            </h6>
          </div>

          <div id="accordion-item-group<?php echo  $row2['id'];?>" class="collapse show" data-parent="#accordion-group">
            <div class="card-body">
              <?php echo  clean($row2['review']);?>
            </div>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>
<?php require_once('include/user_footer.php');?>
