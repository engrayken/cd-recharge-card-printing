<?php
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Africa/Lagos');

   include('../../../../../app/config.php');

//include('../../../../../functions/dbconnect.php');


// file_put_contents('call.txt', $_GET);


$now = date('Y-m-d H:i:s', time());


$date= date('YmdHis', time());

 $token= md5($date);

$secp='12345';

 $sec= md5($secp);

if($_SERVER['REQUEST_METHOD'] == 'POST') 
{


//Login
if($_GET['error']=='l')
{
	$username=$_GET['username'];
	//$xpassword=$_GET['password'];
//$password=md5($xpassword);
$password=$_GET['password'];

//file_put_contents('call.txt', $_GET);

$login=$dbc->prepare("SELECT * FROM users WHERE email=? ");
$login->bind_param("s", $username);
$login->execute();
$getresult=$login->get_result();
$login->close();
$login_row=$getresult->fetch_assoc();

$chpassword=$login_row['password'];

$dev=$_GET['dev'];

	if(password_verify($password,$chpassword) && $dev=='cdkpandroiddevicekpcdv1')
	{

$update=$dbc->prepare("update users set utoken=? where email=? ");
$update->bind_param('ss', $token, $username);
$update->execute();
$update->close();

$lupdate=$dbc->prepare("update users set last_login=? where email=? ");
$lupdate->bind_param('ss', $datetime, $username);
$lupdate->execute();
$lupdate->close();

include'note.php';

$resp=array();
array_push($resp,array("returnvalue"=>$token, "title"=>"success"));
		echo json_encode(array("kpapi_resp"=>$resp));



	}
	else
	{
		$token="failed";
$resp=array();
array_push($resp,array("returnvalue"=>$token, "title"=>"failed"));
		echo json_encode(array("kpapi_resp"=>$resp));


	}
} else
	{
		$token="failed";
$resp=array();
array_push($resp,array("returnvalue"=>$token, "title"=>"failed"));
		echo json_encode(array("kpapi_resp"=>$resp));


	} //end get==l

} else
	{
		$token="failed";
$resp=array();
array_push($resp,array("returnvalue"=>$token, "title"=>"failed"));
		echo json_encode(array("kpapi_resp"=>$resp));


	} //end Post

?>

