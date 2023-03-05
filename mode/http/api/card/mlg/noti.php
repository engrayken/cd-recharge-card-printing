<?php
include('../../../../../app/config.php');

$username=$_GET['username'];
	$password=$_GET['password'];

$login=$dbc->prepare("select * from users where email=? ");
$login->bind_param("s",$username);
$login->execute();
$login_result=$login->get_result();
$login->close();
$login_row=$login_result->fetch_assoc();


 $chpassword=$login_row['utoken'];

// $chusername=$login_row['email'];

 $u=$login_row['id'];

if(isset($_GET['view']) && $chpassword==$password && $_GET['dev']=="cdkpandroiddevicekpcdv1" && $_GET['error']=="noti"){

// $con = mysqli_connect("localhost", "root", "", "notif");

if(addslashes($_GET["view"] != ''))
{

 // echo $u=login_row['id'];

  // $update_query = "UPDATE comments SET comment_status = 1 WHERE comment_status=0 and user_id='$u' "; mysqli_query($dbc, $update_query);

$comment_statuss=1;
$comment_status=0;

  $update_query=$dbc->prepare("UPDATE comments SET comment_status = ? WHERE comment_status=? and user_id= ?");
   $update_query->bind_param("iii", $comment_statuss, $comment_status, $u);
 $update_query->execute();
 $update_query->close();


 $query = "SELECT * FROM comments where user_id='$u' ORDER BY comment_id DESC LIMIT 5";
$result = mysqli_query($dbc, $query);
//$output = '';
if(mysqli_num_rows($result) > 0)
{
  while($row = $result->fetch_assoc()){ 
 
  $data[]=$row;

  $kk= json_encode(array("kpapi_resp"=>$data));
 }
}
else{
     $data .= '
    No Notication Found';
}

} else{




$status_query = "SELECT * FROM comments WHERE comment_status=0 and user_id='$u' ";
$result_query = mysqli_query($dbc, $status_query);
$count = mysqli_num_rows($result_query);
$data=array();
    array_push($data,array('unseen_notification'  => $count
));

 $kk= json_encode(array("kpapi_resp"=>$data));



}



echo strip_tags($kk);

}

?>