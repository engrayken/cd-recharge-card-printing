<?php  
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $chtoken)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
 $arrResponse = json_decode($response, true);
  
// verify the response

if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $temp_ran && $_POST['ll']==$_SESSION['goch'] && $_POST['gtoken']!='' && $_POST['user_id']==$_SESSION['bitcrow_userid'] && $arrResponse["score"] >= 0.5) {
    // valid submission

##### TO MAKE SME DATA PURCHASE #####

$phone=$phone;

$userid='08138442969';
$p='21749ab30b0972adfb8a';


  $size= $variation_code; // integer

$user_ref=$token;

 
$smecurl = curl_init(); 
//step2
curl_setopt($smecurl,CURLOPT_URL,"https://mobileairtimeng.com/httpapi/datashare?userid=$userid&pass=$p&network=1&phone=$phone&datasize=$size&jsn=json&user_ref=$user_ref");
curl_setopt($smecurl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($smecurl,CURLOPT_HEADER, false); 


if($smecurl)
{
//$rstatus=curl_exec ($smecurl); 

 $status1=curl_exec ($smecurl); 
$rstatus=$status1;
//$smestatus= substr($status1, 0, 3);
$smecoder = json_decode($status1);

$smestatus=$smecoder->{'code'};

$smecode2= substr($status1, 0, 3);

$smecode='100';
 $request_id='error';

if($smecode==$smestatus)
{ echo json_encode(['code'=>'s0c']);
$status='1'; }

elseif($smecode==$smecode2)
{ echo json_encode(['code'=>'s0c']);
$status='1'; }

else {echo json_encode(['code'=>'141']);
 $status='0'; 
$a=$b+$total;
//mysqli_query($dbc,"UPDATE users SET dep_balance='$a' WHERE id='$user_id' "); 

$usf=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?"); 
$usf->bind_param("ii", $a, $user_id);
$usf->execute();
$usf->close();
// end Debite customer
}

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