<?php	//$shoGod=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM God WHERE uid='1'")); */
$shoGods=$dbc->prepare("SELECT * FROM god WHERE uid= ?");
$shoGods->bind_param("i", $row['id']);
$shoGods->execute();
$shoGodss=$shoGods->get_result();
$shoGod=$shoGodss->fetch_assoc();
$shoGods->close();

$encrypted_values=password_hash($encrypted_value, PASSWORD_DEFAULT);


	if($shoGodss->num_rows<1)
{

/*$sto = mysqli_query($dbc,"INSERT INTO God (uid,words)VALUES('$row[id]','$encrypted_value');"); */


$sto =$dbc->prepare("INSERT INTO god (uid, words) VALUES(?, ?)");
$sto->bind_param("is", $row['id'], $encrypted_values);
$sto->execute();
$sto->close();

} else {
//echo $shoGod['words'];

//$upd=mysqli_query($dbc,"UPDATE God SET words='$encrypted_value' WHERE uid='$row[id]' "); 
$upd=$dbc->prepare("UPDATE god SET words= ? WHERE uid= ?"); 
$upd->bind_param("si", $_SESSION['enscripted'], $row['id']);
$upd->execute();
$upd->close();

} ?>

	<div class="text-center  w-100">
			
	<?php
//$qsp=mysqli_query($dbc, "SELECT * FROM gospel ORDER BY RAND() LIMIT 1");
$rand=1;
$qspp=$dbc->prepare("SELECT * FROM gospel ORDER BY RAND() LIMIT ?");
$qspp->bind_param("i", $rand);
$qspp->execute();
$qsp=$qspp->get_result();



while($gp_row= $qsp->fetch_assoc()){ 

echo'<b>'. $gosp= str_replace('../', '', stripslashes($gp_row['message'])).'</b>';

} 
$qspp->close();
?> <br/>				<!--button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<!--i class="icon-unfold mr-2"></i>
						Footer
					</button-->
				</div>

<div class="navbar navbar-expand-lg navbar-light">
			



				<!--div class="navbar-collapse collapse" id="navbar-footer"-->
					<span class="navbar-text">
				&copy; 2020. <a href="javascript:void"><?php echo clean($set['site_name']);?></a> | powered by kenspay technology
					</span>
				<!--/div-->
			</div>	
	</div>
	<!-- /page content -->

</body>
</html>