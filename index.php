<?php 
if(is_file('app/config.php')){
require_once("app/config.php");
}
$title="CARD DISPENSER ".$set['title'];
$desc=$set['site_desc'];
require_once('view/include/header.php');
require_once('view/include/navbar.php');     
require_once('view/include/slider.php');
require_once('view/include/services.php');
require_once('view/include/footer.php');
?>