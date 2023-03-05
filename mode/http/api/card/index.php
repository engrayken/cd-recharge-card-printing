<?php
header('X-Frame-Options: Deny');
require_once("../../../../app/config.php");


if($_SERVER['REQUEST_METHOD'] == 'POST') 
{

//  $jo=json_encode($_POST);
 //file_put_contents('file.txt', $jo);

  if($_POST['pkey']!='' && $_POST['skey']!='' && $_POST['email']!='' && $_POST['password']!='' && $_POST['network']!='' && $_POST['amount']!='' && $_POST['quan']!='' && $_POST['tid']!='')
{

  $tid=$_POST['tid'];

 //file_put_contents('file.txt', $_POST);
  
//$date= date('M/d/Y‎');

    //POST rows
    //$query = $db->query("SELECT * FROM user WHERE username='$_POST[username]' ");
    $checkuser = $dbc->prepare("SELECT * FROM users WHERE pkey=? and skey=? ");
    $checkuser->bind_param('ss', $_POST['pkey'],$_POST['skey']);
    $checkuser->execute();
    $checkusers=$checkuser->get_result();
    $checkuser->close();
    $user= $checkusers->fetch_assoc();   
    $user_id=$user['id'];
      
if(!password_verify($_POST['password'],$user['password'])) {  
  die(json_encode(['status'=>'01','message'=>'Invalid details']));
 } 
  



 if($_POST['email']!=$user['email'])
   {
    die(json_encode(['status'=>'01','message'=>'Invalid details']));
    }

 if($_POST['quan']>$user['limite'] || $_POST['quan']==$user['limite']+1) {  
  die(json_encode(['status'=>'01','message'=>'You are not allowed to purchase more than '.$user['limite'].' quantity contact admin on 08126216200']));
 } 








// check if transaction_id is empty 
if($_POST['tid']=='') {

  die(json_encode(['status'=>'08','message'=>'transaction id is empty']));

//die('{"code":"08","message":"transaction id is empty"}'); 
}

// also check if transaction_id exits in our data base if yes cancel the transaction
    //POST rows
    //$queryt = $db->query("SELECT * FROM transaction_id WHERE code='$_POST[transaction_id]' ");
    
   $queryt = $dbc->prepare("SELECT * FROM transaction WHERE trans_id=? ");
    $queryt->bind_param('s', $_POST['tid']);
      $queryt->execute();
      $codes= $queryt ->get_result();
      $queryt->close();
       $code=$codes->fetch_assoc();

        
 
       

if($_POST['tid']==$code['trans_id'])
{

//die('{"code":"09","message":"transaction id already exit"}');
die(json_encode(['status'=>'09','message'=>'transaction id already exit']));
}








// check if service id is not equal to eg mtn and if not display invalid service id

if($_POST['network']!='mtn' && $_POST['network']!='airtel' && $_POST['network']!='glo' && $_POST['network']!='etisalat')
{ 
  //die('{"code":"03","message":"invalid service id"}'); 
  die(json_encode(['status'=>'03','message'=>'invalid network id']));
} else{
switch ($_POST['network']) {
  case"airtel";
  $net="airtel";
  break;
  case"mtn";
  $net="mtn";
  break;
  case"glo";
  $net="glo";
  break;
  case"9mobile";
  $net="9mobile";
  break;

}

}


//check if amount is empty

if($_POST['amount']=='') {

//die('{"code":"05","message":"Amount field is empty"}'); 
die(json_encode(['status'=>'05','message'=>'Amount field is empty']));

}


//check if amount is greater than N20.000
if($_POST['amount']>20000 || $_POST['amount']<100) {

//die('{"code":"06","message":"You can not carry out transaction below N100 and above N20.000"}'); }
die(json_encode(['status'=>'06','message'=>'You can not carry out transaction below N100 and above N20.000']));
}

// check again if username and password exits, if yes proccedd
if($_POST['skey']!=$user['skey'] && $user['email']!=$_POST['email']) {
  die(json_encode(['status'=>'141','message'=>'Paramenter can not be empty']));


}
    
else{  

  $quantity=$_POST['quan'];


//$qun=$_POST['quan'];

   //$rate = mysqli_query($dbc, "SELECT * FROM rate WHERE network='$net' ");   while($ratef= mysqli_fetch_array($rate)){
	  $deno=$_POST['amount']; 
    $amount=$_POST['amount']; 
    $ratec =$dbc->prepare("SELECT * FROM rate WHERE network= ?");
    $ratec->bind_param("s", $net);
    $ratec->execute();
    $ratecp=$ratec->get_result();
    
            while($ratef=$ratecp->fetch_assoc()){
         
         
    $p='100';
    
    $to=$ratef['percent']/$p;
    
     $too=$to*$deno;
    $tota=$deno-$too;
    
      $total=$tota*$quantity;
    
    }
    $ratec->close();
    
    $bal_bf=$user['dep_balance'];
    
    
//check if transtion amount is less than the user balance, if yes then proceed

    if($user['dep_balance']>$total){   
    
    $bal_af=$user['dep_balance']-$total;
    
    $limit='0';

    $result = mysqli_query($dbc, "SELECT * FROM network WHERE net='$net' and deno='$deno' LIMIT 0,$quantity");
    $num_rows = mysqli_num_rows($result);
    
     $fetee=mysqli_query($dbc, "SELECT * FROM transaction WHERE trans_id='$tid' ");
         
     //$btid=$fetee['trans_id'];
    //$bstatus=$fetee['status'];
     $bnum_rows = mysqli_num_rows($fetee);	

     
if($quantity>$num_rows)
{

//Sorry The Quantity you are requesting for is not upto.  Kindly reduce and request again.

//redirect($url.'/user/order_product?n2o7t18=1');
//echo'786';
 //echo json_encode(['code'=>'786']);
 die(json_encode(['status'=>'786','message'=>'Sorry The Quantity you are requesting for is not upto.  Kindly reduce and request again']));


} else if($quantity<9)
{

//Sorry The Quantity you are requesting for is not upto.  Kindly reduce and request again.

//redirect($url.'/user/order_product?n2o7t18=1');
//echo'131';
 //echo json_encode(['code'=>'131']);
 die(json_encode(['status'=>'131','message'=>'Sorry the lowest you can order is 10 quantity']));

} else if($bnum_rows=='1')
{

//Sorry The Quantity you are requesting for is not upto.  Kindly reduce and request again.

//redirect($url.'/user/order_product?n2o7t18=1');
//echo's0c';
 //echo json_encode(['code'=>'s0c']);
 die(json_encode(['status'=>'s0c','message'=>'transaction successful']));

 
} else{


$b=$user['dep_balance']-$total;

	$upd=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?");
	$upd->bind_param("si", $b, $user_id);
	$upd->execute(); 
	$upd->close();

	
  $data=array();
//for json
$netfetch = mysqli_query($dbc, "SELECT pin,deno,seria,descr FROM network WHERE net='$net' and deno='$deno' LIMIT 0,$quantity ");
        while($netrow = $netfetch->fetch_assoc()) //mysqli_fetch_array($netfetch))
        {

          $data[]=$netrow;

        }
    
      $netfetch = mysqli_query($dbc, "SELECT * FROM network WHERE net='$net' and deno='$deno' LIMIT 0,$quantity ");
        while($netrow =  $netfetch->fetch_assoc()){

 $mypin = $netrow['id'].'-'.$netrow['net'].'-'.$netrow['deno'].'-'.$netrow['pin'].'-'.$netrow['seria'].'-'.$netrow['descr'].',';


					 $exp = explode(',', $mypin);
		

foreach($exp as $item)
{

 $xexp = explode('-', $item);

//


 $sto = mysqli_query($dbc,"INSERT INTO mypin (orderno,user_id,amount,net,deno,pin,seria,descr,date,status)
 VALUES('$tid','$user_id','$amount','$xexp[1]','$xexp[2]','$xexp[3]','$xexp[4]','$xexp[5]','$datetime','pending');");

/*
$del =$dbc->prepare("DELETE FROM network WHERE id= ?");
$del->bind_param("i", $xexp[0]);
$del->execute();
$del->close();

//sleep(1); header( "location: $url/user/order_product?success=success" ); 

*/

//redirect($url.'/user/order_product?success=success'); 

}



}



//echo's0c';
 //echo json_encode(['code'=>'s0c']);
$statusw=1;


	$sto =$dbc->prepare("INSERT INTO transaction (trans_id,user_id,amount,quantity,net,deno,date,status,bal_bf,bal_af)VALUES(?,?,?,?,?,?,?,?,?,?)");
	$sto->bind_param("sisisssiss", $tid,$user_id,$total,$quantity,$net,$deno,$datetime,$statusw,$bal_bf,$bal_af);
	$sto->execute();
	$sto->close();
	


 // execute transaction here
 echo $json= json_encode(array('status'=>'s0c','network'=>$net,'quantity'=>$_POST['quan'],'total'=>$total,'balance'=>$user['dep_balance'],'message'=>'transaction successful','data'=>$data));				

 /* execute
  $jsonIterator =new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($json, TRUE)),
  RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(!is_array($val)) {
       if($key == "serial" || $key =="seria") {


     echo'<br/>';

        }

       if($key == "pin" ||  $key == "seria" ||   $key =="serialNumber")
 {  $bundle=$key.$val.",";
 $bundle=substr_replace($bundle,"",-1);
 


  $exp = explode('
', $bundle);
  
      foreach($exp as $item)
      {
  $xexp = explode('seria', $item);
  
echo $pin=str_replace("pin","",$xexp[0]);
//echo $seria=str_replace("seria","",$xexp[1]);
} 

}
    } } */ //end decode execute 


}


}  else { 
  
  //die('{"code":"02","message":"low wallet"}');
  die(json_encode(['status'=>'02','message'=>'low wallet']));
} //end of check if amount is less than user balance
} // end of check if username and passwor_d exits.

} else{
  die(json_encode(['status'=>'141','message'=>'Paramenter can not be empty']));

  
}//POST

} else { 
  die(json_encode(['status'=>'142','message'=>'This method is not allowed']));

}// end of server request POST method



//$u='{"code":"0","content":"Access Block for User Type"}';

//$ua=json_decode($u);
//echo $ua->{'content'};








?>