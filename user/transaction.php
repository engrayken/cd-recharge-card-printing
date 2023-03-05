<?php
require_once("../app/config.php");
$title="All Transaction History";
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');
?>
<div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
          <h4><i class="icon-coins mr-2"></i> <span class="font-weight-semibold">All Transaction History</span></h4>
          </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
            <div class="breadcrumb">
              <a href="./" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <a href="./myproduct" class="breadcrumb-item">Transaction</a>
            </div>
          </div>

          <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
              <a href="./fund/0" class="breadcrumb-elements-item">
                <i class="icon-credit-card mr-2 text-success"></i>
                Fund account
              </a>
         
             <a href="ticket" class="breadcrumb-elements-item">
                <i class="icon-comment-discussion mr-2 text-info"></i>
                Support
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /page header -->

<div class="content">
  <div class="card">
<br/>
<i class="text-danger">Your confirmed and unconfirmed product can be seen here.
</i>
    <div class="card-header header-elements-inline">
      <h6 class="card-title font-weight-semibold">Transaction History</h6>
    </div>
    <table class="table datatable-show-all">
      <thead>
        <tr>
          <th>N</th>
          <th>Order ID</th>
 <th>Network</th>
 <th>Denomination</th>
 <th>Quantity</th>
          <th>Amount</th>
 
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>  
        <?php 
       // $trans = mysqli_query($dbc, "SELECT * FROM transaction WHERE user_id = '".$row['id']."' order by id desc");
	   
  $transe =$dbc->prepare("SELECT * FROM transaction WHERE user_id= ? order by id desc");
  $transe->bind_param("i", $row['id']);
  $transe->execute();
  $trans=  $transe->get_result();
  $transe->close();
        while($row1 = $trans->fetch_assoc()){?>
        <tr>
          <td><?php echo $index++;?>.</td>
          <td><?php echo clean($row1['trans_id']);?></td>

     <td><?php echo clean($row1['net']);?></td>

     <td><?php echo clean($row1['deno']);?></td>


  <td><?php echo clean($row1['quantity']);?></td>
          <td><?php echo clean($row1['amount']);?></td>

          <td><?php echo clean(date("Y/m/d h:i:A", strtotime($row1['date']))); ?></td>
          <td><?php if($row1['status']==1){echo'<span class="badge badge-success">Approved</span>';}else{echo'<span class="badge badge-danger">Pending</span>';}?></td>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </div>




 <div class="card">
    <div class="card-header header-elements-inline">
      <h6 class="card-title font-weight-semibold">Cash Deposit History</h6>
    </div>
    <table class="table datatable-show-all">
      <thead>
        <tr>
          <th>S/N</th>
          <th>Reference ID</th>
          <th>Amount</th>
          <th>Method</th>
          <th>Date</th>
          <th>Status</th>
          <th>Charge</th>
        </tr>
      </thead>
      <tbody>  
        <?php 
       // $trans = mysqli_query($dbc, "SELECT * FROM deposits WHERE user_id = '".$row['id']."'");
	   
	    $transe =$dbc->prepare("SELECT * FROM deposits WHERE user_id= ?");
  $transe->bind_param("i", $row['id']);
  $transe->execute();
  $trans=  $transe->get_result();
  $transe->close();

        while($row1 =$trans->fetch_assoc()){
     //   $cast= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM gateways WHERE id='".$row1['gateway_id']."'"));
   
		 $caste =$dbc->prepare("SELECT * FROM gateways WHERE id= ?");
  $caste->bind_param("i", $row1['gateway_id']);
  $caste->execute();
  $castee=  $caste->get_result();
  $cast=$castee->fetch_assoc();
  $caste->close()
		?>
        <tr>
          <td><?php echo $index++;?>.</td>
          <td>#<?php echo clean($row1['trx']);?></td>
          <td><?php echo clean($scan2['currency'].number_format($row1['amount']));?></td>
          <td><?php echo clean($cast['main_name']);?></td>
          <td><?php echo clean(date("Y/m/d h:i:A", strtotime($row1['created_at']))); ?></td>
          <td><?php if($row1['status']==1){echo'<span class="badge badge-success">Approved</span>';}else{echo'<span class="badge badge-danger">Pending</span>';}?></td>
          <td><?php echo clean($scan2['currency'].number_format($row1['charge']));?></td>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </div>