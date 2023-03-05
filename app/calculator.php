<?php

header('X-Frame-Options: Deny');


   // If REFERRER is empty, or it's NOT YOUR HOST, then STOP it
  /* if(!isset($_SERVER['HTTP_REFERRER']) || parse_url($_SERVER['HTTP_REFERRER'])['host'] != $_SERVER['HTTP_HOST'] ){
       exit("'786'");
//Not allowed - Unknown host request! 
   } else {
*/

//session_start();
//echo $_SESSION['good'];

$func=$_GET['id'];
 if($func=='norder'){
	order_product();
}




function order_product(){
	session_start();
	require_once("config.php");


if(!isset($_SESSION['bitcrow_userid'])){echo json_encode(['code'=>404]); }

//$row=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$_SESSION['bitcrow_userid']."'"));

$rowu=$dbc->prepare("SELECT * FROM users WHERE id= ?");
$rowu->bind_param("i", $_SESSION['bitcrow_userid']);
$rowu->execute();

$rowux=$rowu->get_result();
$rowv=$rowux->fetch_assoc();
$rowu->close();

$usernamen=$rowv['username'];
$ip_address=user_ip();
if($_SESSION['bitcrow_password']!=$rowv['password']){
	//redirect($url."/app/user/logout");
	echo json_encode(['code'=>'786']);
}

    //get rows
//    $query =mysqli_query($dbc, "SELECT * FROM payhost ORDER BY id");
       $queryme =$dbc->prepare("SELECT * FROM payhost ORDER BY id");
    $queryme->execute();
$query=$queryme->get_result();
$queryme->close();
    if($query->num_rows > 0){
            while($rowh = $query->fetch_assoc()){ 
$id=$rowh['id'];

$default=$rowh['xdefault'];

if($default=='1')
{
$urlkp = $rowh['host'];
$username  = $rowh['username'];
$password  = $rowh['password'];
}
}
}

if(isset($_POST['deno']) && isset($_POST['net']) && isset($_POST['phone']) && isset($_POST['user_id'])==$_SESSION['bitcrow_userid'] && $_POST['ll']==$_SESSION['goch'] && $_POST['gtoken']!=''){

	define("RECAPTCHA_V3_SECRET_KEY",$set['skey']);
  $chtoken = filter_input(INPUT_POST,'gtoken', FILTER_SANITIZE_STRING);


$net=addslashes(mysqli_real_escape_string($dbc, trim($_POST['net'])));

$page=mysqli_real_escape_string($dbc, trim($_POST['page']));
if( isset($_POST['quantity'])) {	$quantity=(int)mysqli_real_escape_string($dbc, trim($_POST['quantity']));
} else{
		$quantity='';
}

	$phone=addslashes(mysqli_real_escape_string($dbc, trim($_POST['phone'])));
	$user_id=(int)mysqli_real_escape_string($dbc, trim($_POST['user_id']));

if(isset($_POST['billersCode'])) {
$billersCode=mysqli_real_escape_string($dbc, trim($_POST['billersCode']));
} else {$billersCode=''; }

if(isset($_POST['variation'])) {
$variation_code=mysqli_real_escape_string($dbc, trim($_POST['variation']));
} else{ $variation_code=''; }


$temp_ran=mysqli_real_escape_string($dbc, trim($_POST['temp_ran']));
$token=(int)mysqli_real_escape_string($dbc, trim($_POST['token']));

$shoGods=$dbc->prepare("SELECT * FROM god WHERE uid= ?");
$shoGods->bind_param("i", $rowv['id']);
$shoGods->execute();
$shoGodss=$shoGods->get_result();
$shoGod=$shoGodss->fetch_assoc();
$shoGods->close();


if($_SESSION['good']=='') {
       die (json_encode(['code'=>'786']));

}

//$words=password_hash($shoGod['words'], PASSWORD_DEFAULT); $shoGod['words']==$temp_ran

//$temp_rans=password_hash($temp_ran, PASSWORD_DEFAULT);

if($_SESSION['good']==$temp_ran && password_verify($_SESSION['good'],$shoGod['words']) && password_verify($temp_ran,$shoGod['words']) && $_POST['ll']==$_SESSION['goch'] && $_POST['gtoken']!='') {


//$jo=json_encode($_POST);
// file_put_contents('test.txt', $jo);





if($variation_code!='') {

if($variation_code=='prepaid' || $variation_code=='postpaid') {
$deno=mysqli_real_escape_string($dbc, trim($_POST['deno']));
$api_amount=$deno;
} else {

//  $am=mysqli_query($dbc, "SELECT * FROM pamount WHERE amount_variationcode='$variation_code' ");




  $vam=$dbc->prepare("SELECT * FROM pamount WHERE amount_variationcode= ?");
$vam->bind_param("s", $variation_code);
$vam->execute();
$am=$vam->get_result(); 

 while($row1= $am->fetch_assoc()){ 
 $name=$row1['amount_name'];   $deno=$row1['amount'];
//$variationcode=$row1['amount_variationcode'];
}
$vam->close();

}
} else {
	 $deno=mysqli_real_escape_string($dbc, trim($_POST['deno']));
$api_amount=$deno;

}


	//$token = round(microtime(true));

//START the calculation

//$row=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='$user_id'"));

$rowb=$dbc->prepare("SELECT * FROM users WHERE id= ?");
$rowb->bind_param("i", $user_id);
$rowb->execute();
$rowab=$rowb->get_result();
$row=$rowab->fetch_assoc();
$rowb->close();


//$total=$deno*$quantity;

$amount=$deno;
//check rate
   //$rate = mysqli_query($dbc, "SELECT * FROM apcommission WHERE serviceID='$net' ");
   $ratec =$dbc->prepare("SELECT * FROM apcommission WHERE serviceID= ?");
$ratec->bind_param("s", $net);
$ratec->execute();
$ratecp=$ratec->get_result();

        while($ratef=$ratecp->fetch_assoc()){
$p='100';

 $to=$ratef['percent']/$p;

 $too=$to*$deno;
$tota=$deno-$too;
if($quantity) {
 $total=$tota*$quantity;
} else {   $total=$tota; }

} //end check rate
$ratec->close();

//checking for transaction id
    //$queryt = mysqli_query($dbc, "SELECT * FROM transaction  where trans_id='$token' ");
    $queryt =$dbc->prepare("SELECT * FROM transaction  where trans_id= ?");
$queryt->bind_param("i", $token);
$queryt->execute();
$querytr=$queryt->get_result();

  while($rowt = $querytr->fetch_assoc()){ 

 $codes=$rowt['trans_id'];
 $bstatus=$rowt['status'];
//die('{"code":"09","message":"transaction id already exit"}'); 
}
$queryt->close();

if($codes!='' && $bstatus==1) {
	
die (json_encode(['code'=>'s0c']));

}  else if($codes!='' && $bstatus!=1) {
	
die (json_encode(['code'=>'141']));

}

$bal_bf=$row['dep_balance'];

//check amount
if(($row['dep_balance']>=$total)){   

// Debite customer
$bal_af=$row['dep_balance']-$total;
$b=$row['dep_balance']-$total;
//mysqli_query($dbc,"UPDATE users SET dep_balance='$b' WHERE id='$user_id' "); 
$usersb=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?"); 
$usersb->bind_param("ii", $b, $user_id);
$usersb->execute();
$usersb->close();
// end Debite customer

//give customer product after debited

if($page=='airtime') { 
include'airtime.php';

}
else if($page=='sme') {
include'sme.php';

} 
else if($page=='airtime-pin') {
include'airtime-pin.php';
$net=$net.'-pin';


} else{
include'other.php';


}



} else{


// echo for low wallet
//redirect($url.'/user/order_product?lowwallet=i');
echo json_encode(['code'=>'140']);

$bal_af=$row['dep_balance']-$total;
$b=$row['dep_balance']-$total;
$status='0';
$rstatus='this user dont have enough fund in is wallet';

} // end check amount


/*$sto = mysqli_query($dbc,"INSERT INTO transaction (trans_id,user_id,net,deno,amount,phone,date,billersCode,quantity,bal_bf,bal_af,status,rstatus)VALUES('$token','$user_id','$net','$deno','$total','$phone','$datetime','$billersCode','$quantity','$bal_bf','$bal_af','$status','$rstatus');");*/

$sto =$dbc->prepare("INSERT INTO transaction (trans_id,request_id,user_id,net,deno,amount,phone,date,billersCode,quantity,bal_bf,bal_af,status,rstatus) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sto->bind_param("isisiisssiiiis", $token,$request_id, $user_id, $net, $deno, $total, $phone, $datetime, $billersCode, $quantity, $bal_bf, $bal_af, $status, $rstatus);
$sto->execute();
//echo $sto->error;
$sto->close(); 



if($status=='0') {
$a=$b+$total;
//mysqli_query($dbc,"UPDATE transaction SET bal_af='$a' WHERE trans_id='$token' ");
$updtr=$dbc->prepare("UPDATE transaction SET bal_af= ? WHERE trans_id= ?");
$updtr->bind_param("ii", $a, $token);
$updtr->execute();
$updtr->close();

}

} else {  
$bal_af=$row['dep_balance']-$total;
$b=$row['dep_balance']-$total;
$status='0';

$deno=(int)mysqli_real_escape_string($dbc, trim($_POST['deno']));

$rstatus='hackers are trying to buy without valid session';


$sto =$dbc->prepare("INSERT INTO transaction (trans_id,user_id,net,deno,amount,phone,date,billersCode,quantity,bal_bf,bal_af,status,rstatus) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sto->bind_param("iisiissiiiiis", $token, $user_id, $net, $deno, $total, $phone, $datetime, $billersCode, $quantity, $bal_bf, $bal_af, $status, $rstatus);
$sto->execute();
//echo $sto->error;
$sto->close(); 

echo json_encode(['code'=>'786']);

    file_put_contents('test.txt', print_r($_POST, true));


} //end session

} else {
//echo if all field are not completed
echo json_encode(['code'=>'786']);


} //end REQUEST 

} //end function order_product

//}//end if(!empty($_POST))

?>