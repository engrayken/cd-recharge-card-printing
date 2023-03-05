<?php
$func=$_GET['id'];
if($func=='contact'){
	contact();
}
function contact(){
	require_once("config.php");
	$name=mysqli_real_escape_string($dbc, trim($_POST['name']));
	$mobile=mysqli_real_escape_string($dbc, trim($_POST['phone']));
	$description=mysqli_real_escape_string($dbc, trim($_POST['comment']));
	$email=mysqli_real_escape_string($dbc, trim($_POST['email']));
	$security_code=mysqli_real_escape_string($dbc, trim($_POST['security_code']));
	$verification_code=mysqli_real_escape_string($dbc, trim($_POST['verification_code']));	
	if($security_code!=$verification_code){
		echo"<script>alert('Invalid Security code!!!');</script>";
	}else{
		mysqli_query($dbc,"INSERT INTO contact VALUES('0','$name','$mobile','$email','$description','$datetime')");
		echo"<script>alert('Message successfully sent');</script>";
	}
	echo "<script>window.location.href='".$url."/contact';</script>";
}