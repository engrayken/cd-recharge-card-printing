<?php
session_start();
require_once("../app/config.php");
if(!isset($_SESSION['bitcrow_userid'])){echo "<script>window.location.href='".$url."/login';</script>";}
$rowusr=$dbc->prepare("SELECT * FROM users WHERE id= ?");
$rowusr->bind_param("i", $_SESSION['bitcrow_userid']);
$rowusr->execute();
$rowuser=$rowusr->get_result();
$row=$rowuser->fetch_assoc();
$rowusr->close();

$username=$row['username'];
$ip_address=user_ip();
if($_SESSION['bitcrow_password']!=$row['password']){
	redirect($url."/app/user/logout");
}
//mysqli_query($dbc, "UPDATE users SET ip_address='$ip_address' WHERE id='".$_SESSION['bitcrow_userid']."'");
$ipa=$dbc->prepare("UPDATE users SET ip_address= ? WHERE id= ?");
$ipa->bind_param("si", $ip_address, $_SESSION['bitcrow_userid']);
$ipa->execute();
$ipa->close();

//$admin=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM admin WHERE id=1"));
$aaid=1;
$admina=$dbc->prepare("SELECT * FROM admin WHERE id= ?");
$admina->bind_param("i", $aaid);
$admina->execute();
$adminaa=$admina->get_result();
$admin=$adminaa->fetch_assoc();
$admina->close();

if(empty($admin['image_link'])){
	$cast2="../asset/global_assets/images/placeholders/placeholder.jpg";
}else{
	$cast2="../asset/profile/".$admin['image_link'];
}
if(empty($row['image_link'])){
	$cast="../asset/global_assets/images/placeholders/placeholder.jpg";
}else{
	$cast="../asset/profile/".$row['image_link'];
}?>
<html lang="en">
<head>
	<base href="<?php echo $url; ?>/user/"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../asset/<?php echo $logo['image_link']; ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="../asset/<?php echo $logo['image_link']; ?>">
	<title><?php echo $title.' | '.$set['site_name']; ?></title>

	<!-- google chaptcher -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $set['pkey']; ?>"></script>


	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../asset/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../asset/global_assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/kenspay.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="../asset/global_assets/js/main/jquery.min.js"></script>
	<script src="../asset/global_assets/js/plugins/extensions/jquery_ui/widgets.min.js"></script>
	<script src="../asset/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="../asset/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="../asset/global_assets/js/plugins/ui/ripple.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="../asset/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="../asset/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="../asset/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="../asset/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="../asset/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="../asset/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/selects/select2.min.js"></script>

	<script src="../asset/user/assets/js/app.js"></script>
	<script src="../asset/global_assets/js/demo_pages/dashboard.js"></script>
	<script src="../asset/global_assets/js/demo_pages/login.js"></script>
	<script src="../asset/global_assets/js/demo_pages/datatables_advanced.js"></script>
	<script src="../asset/global_assets/js/demo_pages/datatables_basic.js"></script>
	<script src="../asset/global_assets/js/demo_pages/form_layouts.js"></script>
	<script src="../asset/global_assets/js/demo_pages/form_select2.js"></script>
	<script src="../asset/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	<script src="../asset/global_assets/js/plugins/ui/prism.min.js"></script>
	<script src="../asset/global_assets/js/plugins/ui/sticky.min.js"></script>
	<script src="../asset/global_assets/js/plugins/extensions/session_timeout.min.js"></script>
	<script src="../asset/global_assets/js/demo_pages/extra_session_timeout.js"></script>
	<script src="../asset/global_assets/js/demo_pages/widgets_content.js"></script>
	<script src="../asset/global_assets/js/demo_pages/widgets_stats.js"></script>
	<!-- /theme JS files -->

<script src="../dist/js/kpnav.js" type="text/javascript"></script>

</head>