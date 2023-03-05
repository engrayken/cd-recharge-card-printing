<?php
require_once "../../app/config.php";
$app_api_key = $pay['block_apikey'];
$app_xpub = $pay['block_xpub'];
$app_secret = $pay['block_secret'];
$app_rootURL = $url;
$orderID = $trans['token'];
$app_webSocketURL = "wss://ws.blockchain.info/inv";
$app_callback_url = $app_rootURL."/lib/payment_gateway/blockchain.php?invoice=".$orderID."&secret=".$app_secret;
$app_receive_url = "https://api.blockchain.info/v2/receive?key=".$app_api_key."&xpub=".$app_xpub."&callback=".urlencode($app_callback_url);
$now = date('Y-m-d H:i:s');

/**/
//implementing the callback file
$secret = $app_secret;
if($_GET['secret'] != $secret)
{
	die('APIKEY secret does not match the original on which was created.');
}
else
{

  //update DB
  $order_num = $_GET['invoice'];
  $amount = $_GET['value']; //default value is in satoshis
  /*
  $_GET RESPONSE HAS 
  $_GET['invoice']
  $_GET['secret']
  $_GET['address']
  $_GET['transaction_hash']
  $_GET['confirmations']
  //

  //$amountCalc = $amount / 100000000; //optional satoshi convert to bitcoins
  HERE IS WHERE YOU CAN UPDATE YOUR DATABASE USIND THE $order_num
  */
  //ALSO MARKED THESE AS PAID
  $_SESSION['pay_address_ispaid'] = TRUE;//this can be read from the Database
  //
  $fff = fopen("response_".$order_num.".txt","w");
  $fw = fwrite($fff, json_encode($_GET));
  fclose($fff);  //
  echo "*ok*"; // you must echo *ok* on the page or blockchain will keep sending callback requests every block up to 1,000 times!
  $id=$order_num;
  $castro=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposit WHERE token='$custom'"));
  mysqli_query($dbc, "UPDATE deposit SET status=1 WHERE token='$custom'");
  $user=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$castro['user_id']."'"));
  $a=$user['balance']+$castro['amount'];
  mysqli_query($dbc, "UPDATE users SET balance='$a' WHERE id='".$castro['user_id']."'");
  echo"<script>window.location.href='".$url."/user/fund/1';</script>";
  
}
