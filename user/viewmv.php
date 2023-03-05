<?php
require_once("../app/config.php");

   
   $title=strtoupper($_GET['download']);
   if($_GET['id']){
require_once('../view/include/user_header.php');
$imglink="asset";
   } else{

   require_once('include/user_header.php');
   $imglink="../asset";
   
   }

   $fetchcd=$dbc->prepare("SELECT * FROM cad_img_token WHERE user_id= ?");
   $fetchcd->bind_param("i", $row['id']);
   $fetchcd->execute();
   $fetchcdc=$fetchcd->get_result();
   $fetchcdd=$fetchcdc->fetch_assoc();
   $fetchcd->close();
   

if($_GET['id']){
  //echo $_GET['id'];
 // file_put_contents('v.txt',$_GET);
 
 $durl=base64_decode($_GET['id']);
$jdurl=json_decode($durl);
 $download=$jdurl->download;
 $pdf=$jdurl->pdf;
 $use=$jdurl->use;
 $noj=$jdurl->no;
 $sk=$jdurl->sk;



}



if($_GET['id']==''){
  $use=$row['id']; //$_GET['use'];
}
$rowrusrr=$dbc->prepare("SELECT * FROM users WHERE id= ?");
$rowrusrr->bind_param("i", $use);
$rowrusrr->execute();
$rowruserr=$rowrusrr->get_result();
$rowr=$rowruserr->fetch_assoc();
$rowrusrr->close();


$back='../';
   //$new_ticket = mysqli_query($dbc, "SELECT * FROM mypin where user_id= and  pin!='' and orderno= ");
   if($_GET['id']){
    $limit=$_GET['from']; //start from
    $offset=$_GET['to'];
   } else {
    $use=$row['id']; //$_GET['use'];
    $pdf= $_GET['pdf'];

    $limit=$_POST['from']; //start from
    $offset=$_POST['to']; //to

   }
  
   $new_ticketp = $dbc->prepare("SELECT * FROM mypin where user_id=? and  pin!='' and orderno=? ORDER BY id limit ?,?");
      $new_ticketp->bind_param("isii", $use, $pdf, $limit, $offset);
	  $new_ticketp->execute();
	 $new_ticket=$new_ticketp->get_result();
	  
   
   
   
//if(mysqli_num_rows($new_ticket)=='')
if($new_ticket->num_rows=='')
{
$url1=$_SERVER['REQUEST_URI']; header("Refresh: 0; URL=$back");

}


if($_GET['id']){
  $noo=$noj;
  $password=$sk;
} else {

$password=mysqli_escape_string($dbc,$_POST['sk']);

 $noo=$_POST['no'];
}

if(password_verify($password, $rowr['password'])){



$url1=$_SERVER['REQUEST_URI']; 
//header("Refresh: 5; URL=$url1");

$_SESSION['pcontinate']='';

?>

<?php
//$urlr="https://carddispenser.com.ng/user/viewm?download=$_GET[download]&pdf=$_GET[pdf]&use=$_GET[use]&no=$_GET[no]&sk=$_GET[sk]";

  $urlr=json_encode(['download'=>$_POST['download'],'pdf'=>$_POST['pdf'],'use'=>$row['id'],'no'=>$_POST['no'],'sk'=>$_POST['sk'],'from'=>$_POST['from'],'to'=>$_POST['to']]);

 $urll=base64_encode($urlr);

$rann= uniqid();
$rannm=base64_encode($rann);
$ran=substr($rannm, 5,5);

if($fetchcdc->num_rows<1)
{

$sto =$dbc->prepare("INSERT INTO cad_img_token (user_id, download, pdf, noo, fromm, too, sk, mcadetoken, cardrtoken) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sto->bind_param("issssssss", $row['id'], $_POST['download'], $_POST['pdf'], $_POST['no'], $_POST['from'], $_POST['to'], $_POST['sk'], $urll, $ran);
$sto->execute();
$sto->close();
}
else {
  //echo $shoGod['words'];
  
  //$upd=mysqli_query($dbc,"UPDATE God SET words='$encrypted_value' WHERE uid='$row[id]' "); 
  $upd=$dbc->prepare("UPDATE cad_img_token SET download= ?, pdf= ?, noo= ?, fromm= ?, too= ?, sk= ?, mcadetoken= ?, cardrtoken= ? WHERE user_id= ?"); 
  $upd->bind_param("ssssssssi", $_POST['download'], $_POST['pdf'], $_POST['no'], $_POST['from'], $_POST['to'], $_POST['sk'], $urll, $ran, $row['id']);
  $upd->execute();
  $upd->close();
  
  }

  $fetchcd=$dbc->prepare("SELECT * FROM cad_img_token WHERE user_id= ?");
   $fetchcd->bind_param("i", $row['id']);
   $fetchcd->execute();
   $fetchcdc=$fetchcd->get_result();
   $fetchcdd=$fetchcdc->fetch_assoc();
   $fetchcd->close();
   
   $urlm="https://carddispenser.com.ng/user/viewcard/". $fetchcdd['cardrtoken'];

  //echo $urlm="https://carddispenser.com.ng/user/viewcard/".$urll;

  if($_POST['use']==''){
    //echo $urlm;  
      
  }

$smecurl = curl_init(); 
//step2
curl_setopt($smecurl,CURLOPT_URL,"https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=$urlm&screenshot=true&&key=AIzaSyCDn8fyX7SvO27gvQNiqnpE5cg2gaYAlxQ&strategy=mobile");
curl_setopt($smecurl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($smecurl,CURLOPT_HEADER, false); 
$data = curl_exec($smecurl);
curl_close($smecurl);

$decoded_data = json_decode($data, true);


$result = $decoded_data['lighthouseResult'];

$audits         = $decoded_data['lighthouseResult']['audits'];

 $decoded_screenshot = $audits['final-screenshot']['details']['data'];

 
$img = str_replace('data:image/jpeg;base64,', '', $decoded_screenshot);
$img = str_replace(' ', '+', $img);
 $img = base64_decode($img);

$name = $row['username'].'_'.$title.'_card';
file_put_contents('img/'.$name.'.jpg',$img);
//if($_POST['use']==''){

?>

<!--body onLoad="javscript:window.close( window.print() )"-->
   



  <table width="100%">
    <tr>
    <td>
    <form id="form1" name="form1" method="GET" action="">
    <table class="mystyle" cellpadding="3" width="100%"  border="2">
   <br/> <center><a href="viewmv?download=<?php echo $_GET['download']; ?>&pdf=<?php echo $_GET['pdf']; ?>" class="btn bg-orange btn-block" style="width:30%"><i class="icon-circle-left2 ml-2"></i>    Go Back</a>


   <?php


// } else{
//  // echo"<script>window.location.href='myproduct';</script>"; 
    echo"<script>window.location.href='dll.php?download=$_GET[download]&pdf=$_GET[pdf]&file=$name.jpg';</script>";
  
   
// }

    ?>
      </table>
      </form>
      </td>
    </tr>
    </table>
</body>
  </div>
  </div>
      </div>
  </div>
<?php } else{
 
 
 ?>

<div style="margin-left:10px; margin-right:10px; align:center; ">
 <div class="alert bg-green alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1 text-uppercase">Security Key</h6>
          Kindly submit your Password for security check up to be able to print the card.  

<form class="login-form" action="" method="POST">
<br/>


<input type="hidden" name="download" value="<?php echo $_GET['download']; ?>">
<input type="hidden" name="pdf" value="<?php echo $_GET['pdf']; ?>">

<input type="hidden" name="use" value="yes">
   <div class="form-group row">
                <label class="col-form-label col-lg-5">Select Print Per Page</label>
                <div class="col-lg-10">
                  <select class="form-control select" name="no" id="no" data-dropdown-css-class="bg-purple" data-fouc required>
  <option value="1">10 per page</option>
  <option value="2">20 per page</option>
  <option value="3">30 per page</option>
  <option value="4">40 per page</option>
 </select>
                </div>
              </div>


							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" name="sk" placeholder="insert password" required>
<div class="form-control-feedback">
<i class="icon-lock2 text-muted"></i></div></div>
<table><tr><td>
<label class="col-form-label col-lg-5" style="color:white">START FROM</label></td><td><input type="text" class="form-control" name="from" value="0" required>
</td><td><label class="col-form-label col-lg-5" style="color:white">TO </label</td><td><input type="text" class="form-control" name="to" value="4" required>
</td></tr></table>
<div class="form-group">
<button type="submit" class="btn bg-violet btn-block">Confirm<i class="icon-circle-right2 ml-2"></i></button></div>
<a href="myproduct" class="btn bg-orange btn-block"><i class="icon-circle-left2 ml-2"></i>    Go Back</a>


          </div></div>

<?php } 

?>