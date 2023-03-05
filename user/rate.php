<?php
require_once("../app/config.php");

$p='100';
$deno=clean($_POST['buy']);

$quantity=clean($_POST['quantity']);

     // $rate = mysqli_query($dbc, "SELECT * FROM rate WHERE network='$_POST[net]' ");
      $ratep=$dbc->prepare("SELECT * FROM rate WHERE network=? ");
	  $ratep->bind_param("s", $_POST['net']);
	  $ratep->execute();
	  $rate=$ratep->get_result();
	  
	  
        while($ratef=$rate->fetch_assoc()){

$to=$ratef['percent']/$p;

 $too=$to*$deno;
$tota=$deno-$too;

echo $total=$tota*$quantity;

}
$ratep->close();

?>