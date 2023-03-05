<?php
require_once("../app/config.php");
$title=addslashes("Fund Account");
$status=(int)$_GET['id'];
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');
?>
<div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
            <h4><i class="icon-credit-card mr-2"></i> <span class="font-weight-semibold">Instant Wallet Funding</span></h4>
          </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
            <div class="breadcrumb">
              <a href="./" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <a href="./fund/0" class="breadcrumb-item">fund account</a>
            </div>
          </div>

    
        </div>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-12">
            <div class="alert bg-secondary text-white alert-styled-left alert-dismissible">
              <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                Current account balance is <?php echo $scan2['currency'].number_format($row['dep_balance']);?>
              </div>
            </div>
        </div>




<?php
if($row['active']==0 || $row['bvn_status']==0){
  if($set['email_activation']==1  || $row['bvn_status']==0){
    if($eset['status']==1){?>
        <div class="alert bg-info alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1">Email Or BVN verification</h6>
          User account has not yet been verified, account funding is currently disabled until email and bvn is verified, you can't buy or order for product without funding your account. <a class="text-white" href='<?php echo $url."/app/user?id=sendver&del=2&status=".$row['token'];?>'><font color='darkred'><b>Click here</b></font></a> to verify your email <br/>and <a class="text-white" href='profile/0'><font color='darkred'><b>Click here</b></font></a> to submite your BVN
<br/><br/> <h5>Incase you dont want to activate your bvn here. you can still fund your wallet manually by using our bank account </h5><br/>
<h5><table width="%100"><tr><td>Bank Name:</td><td> Gt bank</tr><tr><td>
Acc Name: </td><td>Kenspay Technology</tr><tr><td>
Acc Numb: </td><td>0610567899</td></tr></table></h5>

please note that A stamp duty of 60 Naira applies to every transfer made .
<br/> after payment send us the details including your email on our whatsapp @ 08126216200.
          </div>
<?php
    }
  }
}
else{ ?>

<div class="card card-body">

<?php 
if($row['bankName']=='' && $row['customerName']=='' && $row['accountNumber']=='')
{ 
echo'<script>window.location="providus_log.php";</script>';

} else{ ?>

<h4>Your virtual account number is</h4>




      <h5>
<strong class="text-primary">Bank: </strong> <?php  echo clean($row['bankName']);?><br /><strong class="text-primary">Account Name: </strong>  <?php  echo clean($row['customerName']);?><br />      <strong class="text-primary">Account No: </strong> <?php echo clean($row['accountNumber']);?><br />
         
 </h5>

You can top up your wallet instantly by doing a transfer to this account number <font color='darkred'>(<?php echo clean($row['accountNumber']);?>)</font> . <br/>Save it as a beneficiary on your banking app so you can send money to it at any time! <br/><strong>Remember you can also transfer</strong> via your bank’s USSD.
A stamp duty of 60 Naira applies to every transfer made while for manuel wallet funding we charge 60 Naira also.
<h5><table width="%100"><tr><td>Bank Name:</td><td> Gt bank</tr><tr><td>
Acc Name: </td><td>Kenspay Technology</tr><tr><td>
Acc Numb: </td><td>0610567899</td></tr></table></h5>

 after payment send us the details including your email on our whatsapp @ 08126216200.

<?php }?>




</div>


<?php

} 


?>


  </div>
<?php require_once('include/user_footer.php');?>