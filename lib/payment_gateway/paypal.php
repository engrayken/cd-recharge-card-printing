<?php
require_once "../../app/config.php";
$payment_type		=	$_POST['payment_type'];
$payment_date		=	$_POST['payment_date'];
$payment_status		=	$_POST['payment_status'];
$address_status		=	$_POST['address_status'];
$payer_status		=	$_POST['payer_status'];
$first_name			=	$_POST['first_name'];
$last_name			=	$_POST['last_name'];
$payer_email		=	$_POST['payer_email'];
$payer_id			=	$_POST['payer_id'];
$address_country	=	$_POST['address_country'];
$address_country_code	=	$_POST['address_country_code'];
$address_zip		=	$_POST['address_zip'];
$address_state		=	$_POST['address_state'];
$address_city		=	$_POST['address_city'];
$address_street		=	$_POST['address_street'];
$business			=	$_POST['business'];
$receiver_email		=	$_POST['receiver_email'];
$receiver_id		=	$_POST['receiver_id'];
$residence_country	=	$_POST['residence_country'];
$item_name			=	$_POST['item_name'];
$item_number		=	$_POST['item_number'];
$quantity			=	$_POST['quantity'];
$shipping			=	$_POST['shipping'];
$tax				=	$_POST['tax'];
$mc_currency		=	$_POST['mc_currency'];
$mc_fee				=	$_POST['mc_fee'];
$mc_gross			=	$_POST['mc_gross'];
$mc_gross_1			=	$_POST['mc_gross_1'];
$txn_id				=	$_POST['txn_id'];
$notify_version		=	$_POST['notify_version'];
$custom				=	$_POST['custom'];
$ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$paypal_email = $payment->paypal_email;

if($payer_status=="verified" && $payment_status=="Completed" && $receiver_email==$paypal_email && $ip=="notify.paypal.com"){
	$castro=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposit WHERE token='$custom'"));
	mysqli_query($dbc, "UPDATE deposit SET status=1 WHERE token='$custom'");
	$user=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$castro['user_id']."'"));
	$a=$user['balance']+$castro['amount'];
	mysqli_query($dbc, "UPDATE users SET balance='$a' WHERE id='".$castro['user_id']."'");
	echo"<script>window.location.href='".$url."/user/fund/1';</script>";
}

?>
