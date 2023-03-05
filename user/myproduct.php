<?php
require_once("../app/config.php");
$title="My Product";
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');
?>
<div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
          <h4><i class="icon-coins mr-2"></i> <span class="font-weight-semibold">My Product</span></h4>
          </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
            <div class="breadcrumb">
              <a href="./" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <a href="./myproduct" class="breadcrumb-item">my Product</a>
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
<i class="text-danger">Your confirmed & payed Product Can be download here
</i>
    <div class="card-header header-elements-inline">


      <h6 class="card-title font-weight-semibold">My Product</h6>
    </div>
   <table class="table datatable-show-all">
      <thead>
        <tr>
        <th></th>
          <th>Order ID</th>
 <th>Network</th>
 <th>Denomination</th>
 <th>Quantity</th>
          <th>Amount</th>
 
          <th>Date</th>
  <th>Product</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>  
      <?php 
        $trans = mysqli_query($dbc, "SELECT * FROM transaction WHERE user_id='".$row['id']."'  and status='1' and quantity>1 order by id desc");
        while($row1 = mysqli_fetch_array($trans)){?>
        <tr>
          
          <td><?php echo $index++;?></td>
<td> <?php echo clean($row1['trans_id']);?></td>

     <td><?php echo clean($row1['net']);?></td>

     <td><?php echo clean($row1['deno']);?></td>


  <td><?php echo clean($row1['quantity']);?></td>
          <td><?php echo clean($row1['amount']);?></td>


          <td><?php echo clean(date("Y/m/d h:i:A", strtotime($row1['date']))); ?></td>


<td><a href="view?download=<?php echo clean($row1['net']);?>&pdf=<?php echo clean($row1['trans_id']);?>"><span class="badge badge-success">View Desktop Print</span></a></td>

          <td><?php if($row1['status']==1){ ?><a href="viewmv?download=<?php echo clean($row1['net']);?>&pdf=<?php echo clean($row1['trans_id']);?>"><span class="badge badge-success">View Mobile Print</span></a> <?php }else{echo'<span class="badge badge-danger">Download</span>';}?></td>
             </tr>
        <?php }?>
      </tbody>
    </table>
  </div>

