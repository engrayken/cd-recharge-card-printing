	<?php
	require_once "../../app/config.php";
	$id=$_GET['id'];
	$castro=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposit WHERE token='$id'"));
	mysqli_query($dbc, "UPDATE deposit SET status=1 WHERE token='$id'");
	$user=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$castro['user_id']."'"));
	$a=$user['balance']+$castro['amount'];
	mysqli_query($dbc, "UPDATE users SET balance='$a' WHERE id='".$castro['user_id']."'");
	echo"<script>window.location.href='".$url."/user/fund/1';</script>";
	?>