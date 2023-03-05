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


  if($net=='neco') {

##### TO MAKE NECO PURCHASE #####


$userid='08138442969';
$p='21749ab30b0972adfb8aken';


  $size= $variation_code; // integer

$user_ref=$token;

 
$smecurl = curl_init(); 
//step2
curl_setopt($smecurl,CURLOPT_URL,"http://mobileairtimeng.com/httpapi/neco?userid=$userid&pass=$p&jsn=json&user_ref=$user_ref");
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
{
echo json_encode(['code'=>'s0c']);
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

} else{

##### TO MAKE  PURCHASE ON VT PASS#####
$jo=json_encode($_POST);
 file_put_contents('test.txt', $jo);



$username = "$username"; //email address
$password = "$password"; //password
$host = "$urlkp";
$data = array(
  'serviceID'=> $net, //integer
      'billersCode' => $billersCode,   
    'amount' =>  $api_amount, 
  'variation_code' =>  $variation_code, // integer
  'phone' => $phone, //integer
  'request_id' => $token, // unique for every transaction
/*'Insured_Name' => $Insured_Name, //integer
'Engine_Number' => $Engine_Number, //integer
'Chasis_Number' => $Chasis_Number, //integer
'Vehicle_Make' => $Vehicle_Make, //integer
'Vehicle_Color' => $Vehicle_Color, //integer
'Vehicle_Model' => $Vehicle_Model, //integer
'Year_of_Make' => $Year_of_Make, //integer
'Contact_Address' => $Contact_Address, //integer */

);


$curl       = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => $host,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_USERPWD => $username.":" .$password,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $data,
));

//this code change the vtpass response to my own 
if($curl)
{
//$rstatus=curl_exec ($curl); 

  $status1=curl_exec ($curl); 

$rstatus=$status1;
//$status2= substr($status1, 9, 3);

$vt_resp=json_decode($status1);

$status2=$vt_resp->code;

 $request_id='error';

$sscode='000';


if($status2==' ')
{ echo json_encode(['code'=>'s0c']);
$status='1'; } 
else if($status2=='')
{ echo json_encode(['code'=>'s0c']);
$status='1'; }
else if($status2==$sscode)
{ echo json_encode(['code'=>'s0c']);
$status='1'; }

else { echo json_encode(['code'=>'141']);

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