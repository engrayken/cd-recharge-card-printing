<?php

require_once("../app/config.php");

 file_put_contents('v.txt', $_POST);

 //get rows of link that send the payment
  //  $apiquery =mysqli_query($dbc, "SELECT * FROM payhost ORDER BY id");
    $apiquerye =$dbc->prepare("SELECT * FROM payhost ORDER BY id");
 $apiquerye->execute();
 $apiquery= $apiquerye->get_result();
 $apiquerye->close();


while($apirow = $apiquery->fetch_assoc()){ 
$id=$apirow['id'];

$default=$apirow['xdefault'];



if($default=='1')
{
//$url= $row['host'];

$api_username  = $apirow['username'];
$api_password  = $apirow['password'];


}




$host='https://vtpass.com/api/merchant-verify';

//$host=$url;

//this code collect and send the form to vtpass website 
if(isset($_POST['service'])) {

$username = "$api_username"; //email address
$password = "$api_password"; //password

$data = array(
  'serviceID'=> $_POST['service'], //integer
      
    'billersCode' =>  $_POST['billersCode'], 
  
  'type' =>  $_POST['type'], 
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


}// end the form that is been sent to vtpass
}


 $json_data= $m=curl_exec ($curl); 


$json = json_decode($json_data);
if($json->content->Customer_Name!='')
{
echo'Name: '.$json->content->Customer_Name.'  <br/>Status: '.$json->content->Status.'   <br/>Due_Date: '.$json->content->Due_Date;
} else{ echo' ERROR NAME NOT MATCH';
}
?>