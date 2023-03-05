<?php
//include('connect.php');
$u=(int)$_POST['user_id'];
include("../app/config.php");


if(isset($_POST['view'])){

// $con = mysqli_connect("localhost", "root", "", "notif");

if(addslashes($_POST["view"] != ''))
{



  // $update_query = "UPDATE comments SET comment_status = 1 WHERE comment_status=0 and user_id='$u' "; mysqli_query($dbc, $update_query);

$comment_statuss=1;
$comment_status=0;

  $update_query=$dbc->prepare("UPDATE comments SET comment_status = ? WHERE comment_status=? and user_id= ?");
   $update_query->bind_param("iii", $comment_statuss, $comment_status, $u);
 $update_query->execute();
 $update_query->close();

}
$query = "SELECT * FROM comments where user_id='$u' ORDER BY comment_id DESC LIMIT 5";
$result = mysqli_query($dbc, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
   $output .= '
   <li>
   <a href="#">
   <strong>'.$row["comment_subject"].'</strong><br />
   <small><em>'.$row["comment_text"].'</em></small>
   </a>
   </li>
   ';

 }
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}



$status_query = "SELECT * FROM comments WHERE comment_status=0 and user_id='$u' ";
$result_query = mysqli_query($dbc, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);

echo json_encode($data);

}

?>