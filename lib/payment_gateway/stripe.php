<?php
require_once "../../app/config.php";
$custom=$_GET['id'];
$castro=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposit WHERE token='$custom'"));
$user=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$castro['user_id']."'"));
require_once('../vendor/autoload.php');
define ('SK_TEST', $pay['stripe_skey']);
define ('PK_TEST', $pay['stripe_pkey']);
\Stripe\Stripe::setApiKey(SK_TEST);
$token  = $_POST['stripeToken'];
$customer = \Stripe\Customer::create(array(
    'email' => $user['email'],
    'source'  => $token
));
$charge = \Stripe\Charge::create(array(
    'customer' => $customer->id,
    'amount'   => $castro['amount'],
    'currency' => 'usd'
));
    if ($charge['status'] == 'succeeded') {
	mysqli_query($dbc, "UPDATE deposit SET status=1 WHERE token='$custom'");
	$a=$user['balance']+$castro['amount'];
	mysqli_query($dbc, "UPDATE users SET balance='$a' WHERE id='".$castro['user_id']."'");
	echo"<script>window.location.href='".$url."/user/fund/1';</script>";
}else{
	echo"<script>window.location.href='".$url."/user/fund/2';</script>";
}