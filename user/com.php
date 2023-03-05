<?php
require_once("../app/config.php");

$p='100';

if(empty($_POST['quantity'])){ $quantity= ""; }
else{
$quantity=mysqli_real_escape_string($dbc, trim($_POST['quantity']));
}

if(empty($_POST['variation'])){ $variation= ""; }
else{
$variation=mysqli_real_escape_string($dbc, trim($_POST['variation']));
}

//$variation=$_POST['variation'];

if($variation!='') {

if($variation=='prepaid' || $variation=='postpaid') {
$deno=$_POST['buy'];
} else {
   //$am=mysqli_query($dbc, "SELECT * FROM pamount WHERE amount_variationcode='$variation' ");
$am=$dbc->prepare("SELECT * FROM pamount WHERE amount_variationcode= ?");

$am->bind_param("s", $variation);
$am->execute();
$ame=$am->get_result();

    while($row1= $ame->fetch_assoc()){ 
 $name=$row1['amount_name'];   $deno=$row1['amount'];
//$variationcode=$row1['amount_variationcode'];
}

}
} else {
$deno=(int)$_POST['buy'];

}



 //     $rate = mysqli_query($dbc, "SELECT * FROM apcommission WHERE serviceID='$_POST[net]' ");
     $rate =$dbc->prepare("SELECT * FROM apcommission WHERE serviceID= ?");

$rate->bind_param("s", $_POST['net']);
$rate->execute();
$ratec=$rate->get_result();


        while($ratef= mysqli_fetch_array($ratec)){

$to=$ratef['percent']/$p;

 $too=$to*$deno;
$tota=$deno-$too;

if($quantity) {
echo $total=$tota*$quantity;
} else{ echo $total=$tota; }

}
$rate->close();

?>