<?php
require_once("../app/config.php");
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');

$name=clean($row['name']);
$email=clean($row['email']);
$bvn=clean($row['bvn']);
$token=$row['token'];
echo'please wait';
//reserve account login to monnify api account

session_start();


//reserve account login to monnify api account

$clientSecret='9MMD36DQ67TYUCFFGT5F329WK9A6MQPF';

//$clientSecret='FFPWFWY7CMDCHRRVSQ3ENT6QSQSA5D4U';

//$str = 'MK_PROD_6DMHKUCMD4';

$str = 'MK_PROD_6DMHKUCMD4:9MMD36DQ67TYUCFFGT5F329WK9A6MQPF';

//$str = 'Hello World!!';
$b64 = base64_encode($str);

$contractCode='534873159525';

//$contractCode='2668562525';



//start login to monify
if ($b64 === false) {
  echo 'Invalid input';
} else {
//  echo $b64; //-> "SGVsbG8gV29ybGQhIQ=="

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.monnify.com/api/v1/auth/login/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Basic $b64"
));

 $response = curl_exec($ch);
curl_close($ch);

$resp=json_decode($response);



if($resp->requestSuccessful=='true')
{
$Bearer= $resp->responseBody->accessToken;

//start setup açcount

if($row['bankName']=='' && $row['customerName']=='' && $row['accountNumber']=='')
{


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.monnify.com/api/v1/bank-transfer/reserved-accounts");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, '{
  "accountName": "'.$name.'",
  "accountReference": "'.$token.'",
  "currencyCode": "NGN",
  "contractCode": "'.$contractCode.'",
  "customerName": "'.$name.'",
  "customerEmail": "'.$email.'",
 "bvn": "'.$bvn.'"}');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Bearer $Bearer"
));

 $response = curl_exec($ch);
curl_close($ch);

$res=json_decode($response);

$customerName=htmlspecialchars($res->responseBody->customerName);




 $accountNumber=htmlspecialchars($res->responseBody->accountNumber);

 $bankName=htmlspecialchars($res->responseBody->bankName);


if($res->requestSuccessful=='true')
{

 $ref=$row['token'];


//$bankName1 = mysqli_query($dbc, "UPDATE users SET bankName='$bankName' WHERE email='$email' ");

$bankName1 =$dbc->prepare("UPDATE users SET bankName= ? WHERE email= ? ");
$bankName1->bind_param("ss", $bankName, $email);
$bankName1->execute();
$bankName1->close();

//$customerName1 = mysqli_query($dbc, "UPDATE users SET customerName='$customerName' WHERE email='$email' ");
$customerName1 =$dbc->prepare("UPDATE users SET customerName= ? WHERE email= ? ");
$customerName1->bind_param("ss", $customerName, $email);
$customerName1->execute();
$customerName1->close();


//$accountNumber1 = mysqli_query($dbc, "UPDATE users SET accountNumber='$accountNumber' WHERE email='$email' ");

$accountNumber1 =$dbc->prepare("UPDATE users SET accountNumber= ? WHERE email= ? ");
$accountNumber1->bind_param("ss", $accountNumber, $email);
$accountNumber1->execute();
$accountNumber1->close();



//$reference = mysqli_query($dbc, "UPDATE users SET reference='$ref' WHERE email='$email' ");

$reference =$dbc->prepare("UPDATE users SET reference= ? WHERE email= ? ");
$reference->bind_param("ss", $ref, $email);
$reference->execute();
$reference->close();



if($bankName1!='' && $customerName1!='' && $accountNumber1!='' && $reference!='')
{
echo'<script>window.location="fund/0";</script>';

}


}

}

else {
echo' <div class="card card-body"><h5>error occure while creating account</h5><a href="fund"><h2>Back</h2></a></div>';
}// end setup


}



} // end login to monify

?>