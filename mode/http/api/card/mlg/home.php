<?php
include('../../../../../app/config.php');
//include('../../../../../functions/dbdbc.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{


//    $usernnn=$_GET['username'];
//$chtoken=$_GET['token'];

$csecpin=$_GET['secpin'];
$chsecpin= md5($csecpin);


//include('update.php');


	$username=$_GET['username'];
	$password=$_GET['password'];
//$password=md5($xpassword);

/*	$login=mysqli_query($dbc,"select * from users where email='$username' ");

  while($login_row= $login->fetch_assoc()){

$chpassword=$login_row['utoken'];

$chusername=$login_row['username'];

}
*/

$login=$dbc->prepare("select * from users where email=? ");
$login->bind_param("s",$username);
$login->execute();
$login_result=$login->get_result();
$login->close();
$login_row=$login_result->fetch_assoc();


$chpassword=$login_row['utoken'];

$chusername=$login_row['email'];


if($username==$chusername && $_GET['error']=='home')
{

	$dev=$_GET['dev'];

	if($chpassword==$password && $dev=='cdkpandroiddevicekpcdv1')
	{
//file_put_contents('call.txt', $_GET);

$data=array();
    //get rows
   // $llogin_result=mysqli_query($dbc,"SELECT * FROM users WHERE email='$username' ");

$llogin=$dbc->prepare("select * from users where email=? ");
$llogin->bind_param("s",$username);
$llogin->execute();
$llogin_result=$llogin->get_result();
$llogin->close();
//$login_row=$login_result->fetch_assoc();   

    while($row= $llogin_result->fetch_assoc()){ 
 $data[]=$row;
}

//$resp=array();
//array_push($resp,array("returnvalue"=>$result, "title"=>$logmsg));
		echo json_encode(array("kpapi_resp"=>$data));
//file_put_contents('test.txt', $_GET);
//echo json_encode($data);


	}
	else
	{
 $resp=array();
array_push($resp,array("dep_balance"=>"","name"=>"", "title"=>"failed"));

	echo json_encode(array("kpapi_resp"=>$resp));

	}

}//end   while($login_row= $login->fetch_assoc())

}

?>