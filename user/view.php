<?php
require_once("../app/config.php");

   
   $title=strtoupper($_GET['download']);

require_once('include/user_header.php');

$back='../';
   //$new_ticket = mysqli_query($dbc, "SELECT * FROM mypin where user_id= and  pin!='' and orderno= ");
   
   $new_ticketp = $dbc->prepare("SELECT * FROM mypin where user_id=? and  pin!='' and orderno=? ");
      $new_ticketp->bind_param("is", $row['id'], $_GET['pdf']);
	  $new_ticketp->execute();
	 $new_ticket=$new_ticketp->get_result();
	  
   
   
   
//if(mysqli_num_rows($new_ticket)=='')
if($new_ticket->num_rows=='')
{
$url1=$_SERVER['REQUEST_URI']; header("Refresh: 0; URL=$back");

}



$password=mysqli_escape_string($dbc,$_POST['sk']);

 $noo=$_POST['no'];


if(password_verify($password, $row['password'])){



$url1=$_SERVER['REQUEST_URI']; 
//header("Refresh: 5; URL=$url1");

$_SESSION['pcontinate']='';

?>


<body onLoad="javscript:window.close( window.print() )">
   


  <table width="100%">
    <tr>
    <td>
    <form id="form1" name="form1" method="post" action="voucher.php">
    <table class="mystyle" cellpadding="3" width="100%"  border="2">
   <?php
	$no = 0;
	
   while($ticket_row  = mysqli_fetch_array($new_ticket )){
		if($no == 0)
		{ 

?>
		
        <tr>
        <?php
		}
		?>
        <td>
<table><tr><td><?php echo clean($row['bname']);?> </td><td> 
<?php 

if(strtolower($ticket_row['net'])=='mtn') { echo "<small style='font-size:15px'>N".$ticket_row['deno']."  <img src='../asset/images/MTN-Airtime.jpg' height='20' width='20' /></small>"; }
elseif(strtolower($ticket_row['net'])=='airtel') { echo "<small style='font-size:15px'>N".$ticket_row['deno']."  <img src='../asset/images/Airtel-Airtime.jpg' height='20' width='20' /></small>"; }
elseif(strtolower($ticket_row['net'])=='glo') { echo "<small style='font-size:15px'>N".$ticket_row['deno']."  <img src='../asset/images/GLO-Airtime.jpg' height='20' width='20' /></small>"; }
elseif(strtolower($ticket_row['net'])=='9mobile') { echo "<small style='font-size:15px'>N".$ticket_row['deno']."  <img src='../asset/images/9mobile-Airtime.jpg' height='20' width='20' /></small>"; } ?>
 </td></tr></table>
        <?php

		echo "<small style='font-size:12px'><table cellpadding='1'>

<tr><td style='font-size:10px'>Ref:</td><td style='font-size:10px'>".$ticket_row['orderno']."</td></tr>
<tr><td><h4>PIN:</h4></td><td><h4><b>". implode('-', str_split($ticket_row['pin'], 4))."</b></h4></td></tr>
<tr><td>S/N:</td><td>".$ticket_row['seria']."</td></tr>
<tr><td>Dial:</td><td><b>".$ticket_row['descr']."</b></td></tr>
<tr><td>DATE:</td><td>".$ticket_row['date']."</td></tr></table></small>";

		$no = $no + 1;
		?>
  
       
        </td>
        <?php
		if($no ==$noo)
		{
		?>
        </tr>
        <?php
		$no =0;
		}
	}
    ?>
      </table>
      </form>
      </td>
    </tr>
    </table>
</body>
  </div>
  </div>
      </div>
  </div>
<?php } else{
 
 ?>

<div style="margin-left:10px; margin-right:10px; align:center; ">
 <div class="alert bg-green alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1 text-uppercase">Security Key</h6>
          Kindly submit your Password for security check up to be able to print the card.  

<form class="login-form" action="" method="post">
<br/>
   <div class="form-group row">
                <label class="col-form-label col-lg-2">Select Print Per Page</label>
                <div class="col-lg-10">
                  <select class="form-control select" name="no" id="no" data-dropdown-css-class="bg-purple" data-fouc required>
  <option value="2">20 per page</option>
  <option value="3">30 per page</option>
  <option value="4">40 per page</option>
 </select>
                </div>
              </div>


							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" name="sk" placeholder="insert password" required>
<div class="form-control-feedback">
<i class="icon-lock2 text-muted"></i></div></div>

<div class="form-group">
<button type="submit" class="btn bg-violet btn-block">Confirm<i class="icon-circle-right2 ml-2"></i></button></div>
<a href="myproduct" class="btn bg-orange btn-block"><i class="icon-circle-left2 ml-2"></i>    Go Back</a>


          </div></div>

<?php } ?>