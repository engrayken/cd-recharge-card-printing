<?php  


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

if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $temp_ran && isset($_POST['ll'])==$_SESSION['goch'] && $_POST['gtoken']!='' && $_POST['user_id']==$_SESSION['bitcrow_userid'] && $arrResponse["score"] >= 0.5) {
    // valid submission




if($codes!='') {

 $musername="cc1abd17not";

} else {

$musername="cc1abd17";
}

$murl="https://smartrecharge.ng/api/v2/airtime/";

$callback='https://kenspay.com.ng/call/index.php';


if($net=='mtn')
{
$product_code='mtn_custom';
}
else if($net=='airtel')
{
$product_code='airtel_custom';
} else if($net=='glo')
{
$product_code='glo_custom';
} else if($net=='9mobile')
{
$product_code='9mobile_custom';
}
//echo $product_code;


$mhost = "$murl";
$data = array(

'api_key'=>$musername,

  'product_code'=> $product_code, //integer
      
    'amount' =>  $api_amount, 
  
  'phone' => $phone, //integer

  'callback' => $callback, // unique for every transaction
);
$curl       = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $mhost,           
	
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "POST",
     CURLOPT_POSTFIELDS => $data,
));

if($curl)
{
//$rstatus=curl_exec ($curl); 

  $status1=curl_exec ($curl); 
$rstatus=$status1;

$vt_resp=json_decode($status1);

$status2=$vt_resp->status;

	  
$repl=str_replace("'", '',$rstatus);
$vtresp=json_decode($repl);

 if($vtresp->data->recharge_id!='')
 {
 $request_id=$vtresp->data->recharge_id;
 } else {
	 $request_id='error';
 }

 
$sscode='true';



if($status1==' ')
{ echo json_encode(['code'=>'s0c']);
$status='1'; } 
elseif($status1=='')
{ echo json_encode(['code'=>'s0c']);
$status='1'; }
else  if($status2==$sscode)
{ //success
echo json_encode(['code'=>'s0c']);
$status='1';

 }

else { 
//failed
echo json_encode(['code'=>'141']);
$status='0';

$a=$b+$total;
//mysqli_query($dbc,"UPDATE users SET dep_balance='$a' WHERE id='$user_id' ");
$usf=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?"); 
$usf->bind_param("ii", $a, $user_id);
$usf->execute();
$usf->close();
 // end Debite customer


 }

} else {  echo json_encode(['code'=>'141']);
$status='0';
$a=$b+$total;
//mysqli_query($dbc,"UPDATE users SET dep_balance='$a' WHERE id='$user_id' "); 

$usf=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?"); 
$usf->bind_param("ii", $a, $user_id);
$usf->execute();
$usf->close();// end Debite customer

}
} else {  echo json_encode(['code'=>'141']);
$status='0';
$a=$b+$total;
//mysqli_query($dbc,"UPDATE users SET dep_balance='$a' WHERE id='$user_id' "); 

$usf=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?"); 
$usf->bind_param("ii", $a, $user_id);
$usf->execute();
$usf->close();// end Debite customer
}

?>