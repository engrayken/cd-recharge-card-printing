<?php

header('X-Frame-Options: Deny');


$func=$_GET['id'];
 if($func=='norder'){
	order_product();
}




function order_product(){
	session_start();
	require_once("config.php");
	
	
	if(!isset($_SESSION['bitcrow_userid'])){echo "<script>window.location.href='".$url."/login';</script>";}

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
	redirect($url."/app/user/logout");
}

	
/*	
	$net=mysqli_real_escape_string($dbc, trim($_POST['net']));
	$quantity=mysqli_real_escape_string($dbc, trim($_POST['quantity']));
	
	//$earn=mysqli_real_escape_string($dbc, trim($_POST['earn']));
	$user_id=mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	*/
	
if(isset($_REQUEST['deno']) && isset($_REQUEST['net']) && isset($_REQUEST['temp_ran']) && isset($_REQUEST['user_id']) && isset($_REQUEST['token']) && $_POST['ll']==$_SESSION['goch'] && isset($_POST['gtoken'])!=''){

	define("RECAPTCHA_V3_SECRET_KEY",$set['skey']);
  $chtoken = filter_input(INPUT_POST,'gtoken', FILTER_SANITIZE_STRING);


$net=addslashes(mysqli_real_escape_string($dbc, trim($_POST['net'])));
$deno=addslashes(mysqli_real_escape_string($dbc, trim($_POST['deno'])));
//$page=mysqli_real_escape_string($dbc, trim($_POST['page']));
	$quantity=addslashes(mysqli_real_escape_string($dbc, trim($_POST['quantity'])));
	$token=(int)mysqli_real_escape_string($dbc, trim($_POST['token']));

	//$phone=addslashes(mysqli_real_escape_string($dbc, trim($_POST['phone'])));
	$user_id=(int)mysqli_real_escape_string($dbc, trim($_POST['user_id']));


 $temp_ran=mysqli_real_escape_string($dbc, trim($_POST['temp_ran']));

$shoGods=$dbc->prepare("SELECT * FROM god WHERE uid= ?");
$shoGods->bind_param("i", $rowv['id']);
$shoGods->execute();
$shoGodss=$shoGods->get_result();
$shoGod=$shoGodss->fetch_assoc();
$shoGods->close();


if($_SESSION['good']=='') {
       die("141");

}

//$words=password_hash($shoGod['words'], PASSWORD_DEFAULT); $shoGod['words']==$temp_ran

//$temp_rans=password_hash($temp_ran, PASSWORD_DEFAULT);


// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $chtoken)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
 $arrResponse = json_decode($response, true);
  
// verify the response

//if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $temp_ran && isset($_POST['ll'])==$_SESSION['goch'] && isset($_POST['gtoken'])!='' && isset($_POST['user_id'])==$_SESSION['bitcrow_userid'] && $arrResponse["score"] >= 0.5) {
    // valid submission



if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $temp_ran && $_SESSION['good']==$temp_ran && password_verify($_SESSION['good'],$shoGod['words']) && password_verify($temp_ran,$shoGod['words']) && $_POST['ll']==$_SESSION['goch'] && $_POST['gtoken']!='' && $_POST['user_id']==$_SESSION['bitcrow_userid'] && $arrResponse["score"] >= 0.5) {


	

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

   //$rate = mysqli_query($dbc, "SELECT * FROM rate WHERE network='$net' ");   while($ratef= mysqli_fetch_array($rate)){
	   
$ratec =$dbc->prepare("SELECT * FROM rate WHERE network= ?");
$ratec->bind_param("s", $net);
$ratec->execute();
$ratecp=$ratec->get_result();

        while($ratef=$ratecp->fetch_assoc()){
	   
	   
$p='100';

$to=$ratef['percent']/$p;

 $too=$to*$deno;
$tota=$deno-$too;

 $total=$tota*$quantity;

}
$ratec->close();

$bal_bf=$row['dep_balance'];


if(($row['dep_balance']>$total)){   

$bal_af=$row['dep_balance']-$total;

$limit='0';

$result = mysqli_query($dbc, "SELECT * FROM network WHERE net='$net' and deno='$deno' LIMIT 0,$quantity");
$num_rows = mysqli_num_rows($result);

 $fetee=mysqli_query($dbc, "SELECT * FROM transaction WHERE trans_id='$token' ");
     
 //$btoken=$fetee['trans_id'];
//$bstatus=$fetee['status'];
 $bnum_rows = mysqli_num_rows($fetee);		


//$b=$row['dep_balance']-$total;

//$count="$num_rows\n";

if($quantity>$num_rows)
{

//Sorry The Quantity you are requesting for is not upto.  Kindly reduce and request again.

//redirect($url.'/user/order_product?n2o7t18=1');
//echo'786';
 echo json_encode(['code'=>'786']);

} else if($quantity<9)
{

//Sorry The Quantity you are requesting for is not upto.  Kindly reduce and request again.

//redirect($url.'/user/order_product?n2o7t18=1');
//echo'131';
 echo json_encode(['code'=>'131']);

} else if($bnum_rows=='1')
{

//Sorry The Quantity you are requesting for is not upto.  Kindly reduce and request again.

//redirect($url.'/user/order_product?n2o7t18=1');
//echo's0c';
 echo json_encode(['code'=>'s0c']);
 
} else{


$b=$row['dep_balance']-$total;

	//mysqli_query($dbc,"UPDATE users SET dep_balance='$b' WHERE id='$user_id' ");
	$upd=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?");
	$upd->bind_param("si", $b, $user_id);
	$upd->execute(); 
	$upd->close();

	
      $netfetch = mysqli_query($dbc, "SELECT * FROM network WHERE net='$net' and deno='$deno' LIMIT 0,$quantity ");
        while($netrow = mysqli_fetch_array($netfetch)){

 $mypin = $netrow['id'].'-'.$netrow['net'].'-'.$netrow['deno'].'-'.$netrow['pin'].'-'.$netrow['seria'].'-'.$netrow['descr'].',';


					 $exp = explode(',', $mypin);
					

foreach($exp as $item)
{

$xexp = explode('-', $item);

//

$sto = mysqli_query($dbc,"INSERT INTO mypin (orderno,user_id,amount,net,deno,pin,seria,descr,date,status)VALUES('$token','$user_id','$amount','$xexp[1]','$xexp[2]','$xexp[3]','$xexp[4]','$xexp[5]','$datetime','pending');");





// $del = mysqli_query($dbc,"DELETE FROM network WHERE id='$xexp[0]' ");


$del =$dbc->prepare("DELETE FROM network WHERE id= ?");
$del->bind_param("i", $xexp[0]);
$del->execute();
$del->close();

//sleep(1); header( "location: $url/user/order_product?success=success" ); 



//redirect($url.'/user/order_product?success=success'); 

}



}

 
//echo's0c';
 echo json_encode(['code'=>'s0c']);
$statusw=1;


//$sto = mysqli_query($dbc,"INSERT INTO transaction (trans_id,user_id,amount,quantity,net,deno,date,status,bal_bf,bal_af)VALUES('$token','$user_id','$total','$quantity','$net','$deno','$datetime','1','$bal_bf','$bal_af');");

	$sto =$dbc->prepare("INSERT INTO transaction (trans_id,user_id,amount,quantity,net,deno,date,status,bal_bf,bal_af)VALUES(?,?,?,?,?,?,?,?,?,?)");
	$sto->bind_param("sisisssiss", $token,$user_id,$total,$quantity,$net,$deno,$datetime,$statusw,$bal_bf,$bal_af);
	$sto->execute();
	$check=$sto->error;
	$sto->close();
	
	file_put_contents('call.txt', $check);
	
}

} else{

//$bal_af=$row['dep_balance'];

//redirect($url.'/user/order_product?lowwallet=i');

//echo'140';
 echo json_encode(['code'=>'140']);

} //end check balance

} else {
//echo("141"); 
 echo json_encode(['code'=>'141']);

} //end session

} else {
//echo if all field are not completed
//echo'141';
 echo json_encode(['code'=>'141']);

} //end REQUEST 

}  //end function order_product

?>