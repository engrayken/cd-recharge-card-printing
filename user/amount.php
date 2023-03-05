<?php
require_once("../app/config.php");
$serviceID=addslashes($_POST['net']);

//  $q=mysqli_query($dbc, "SELECT * FROM pidentifier WHERE identifier_serviceID='$serviceID' ");
     $qq=$dbc->prepare("SELECT * FROM pidentifier WHERE identifier_serviceID= ?");
   $qq->bind_param("s", $serviceID);
$qq->execute();
$q=$qq->get_result();
$qq->close();


    while($row= $q->fetch_assoc()){ 




 $data=$row['identifier_id'];
}


echo'<option value="select">Select </option>';



  //get rows
  //  $am=mysqli_query($dbc, "SELECT * FROM pamount WHERE amount_identifier='$data' ");
    
   $amc=$dbc->prepare("SELECT * FROM pamount WHERE amount_identifier= ?");
   $amc->bind_param("s", $data);
$amc->execute();
$am=$amc->get_result();
$amc->close();

    while($row1= $am->fetch_assoc()){ 




 $name=$row1['amount_name'];   $amount=$row1['amount'];
$variationcode=$row1['amount_variationcode'];
?>






<option value="<?php echo clean($variationcode); ?>"><?php echo $name; ?></option>

<?php
}


?>