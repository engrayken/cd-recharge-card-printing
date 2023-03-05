<?php
header('X-Frame-Options: Deny');
require_once("../../../../../app/config.php");


if($_SERVER['REQUEST_METHOD'] == 'POST') 
{


  $jo=json_encode($_GET);
 //file_put_contents('file.txt', $jo);

  if($_GET['username']!='' && $_GET['error']=='tran' && $_GET['password']!='' && $_GET['orderno']!='')
{


  $usern=$_GET['username'];
  $chtoken=$_GET['password'];
  $offset=$_GET['offset'];
  $status1=$_GET['trans_type'];
  $csecpin=$_GET['secpin'];
  $chsecpin= md5($csecpin);
  $tr=$_GET['error'];
  $dev=$_GET['dev'];
  $orderno=$_GET['orderno'];

  $login=$dbc->prepare("select * from users where email=? ");
  $login->bind_param("s",$usern);
  $login->execute();
  $login_result=$login->get_result();
  $login->close();
  $row=$login_result->fetch_assoc();
  
  
  
  $idn=$row['id'];
  
  $balance1= $row['balance'];
  
  $user_id= $row['id'];
  
  $user=$row['username'];
  
  
  $vtoken= $row['utoken'];
  $secpin= $row['secpin'];

  
   
  
  if($chtoken==$vtoken && $tr=='tran' && $dev=='cdkpandroiddevicekpcdv1') { 
     
  
 // file_put_contents('call.txt', $_GET);
   
  if (!$_GET['records'])
  {
    $records = 2;
  } else {
  $records = $_GET['records'];
  }
  if (!$_GET['start'])
  {
  $start ='0';
  }
  else
  {
  $start = $_GET['start']+$records;
  }
  
  
  
  $data=array();
      $query= $dbc->query("SELECT net,amount,orderno,date,descr,pin,seria,deno,title FROM mypin WHERE user_id='$idn' and pin!='' and orderno='$orderno' ORDER BY id desc LIMIT $start, $records ");
      
      if($query->num_rows > 0){ ?>
          
          <?php
              while($tut = $query->fetch_assoc()){ 
  $data[]=$tut;
  }
  } else {

    $data=array();
    array_push($data,array('title'=>'failed', 'message'=>'Invalid Orderno','net'=>'failed','amount'=>'failed','orderno'=>'failed','date'=>'failed','descr'=>'failed','pin'=>'failed','seria'=>'failed','deno'=>'failed'));
  }
 // $next=array();
 // array_push($next,array("start"=>$start, "records"=>$records));
  echo json_encode(array("kpapi_resp"=>$data));

  

  } else{

    $data=array();
    array_push($data,array('title'=>'failed', 'message'=>'Authenticating issue','net'=>'failed','amount'=>'failed','orderno'=>'failed','date'=>'failed','descr'=>'failed','pin'=>'failed','seria'=>'failed','deno'=>'failed'));
    die(json_encode(array("kpapi_resp"=>$data)));
   //  file_put_contents('test.txt', json_encode($_GET)); 

  }
  
  
 // echo json_encode(array("kpapi_resp"=>$data,"next"=>$next));
  

} else{
  
  $data=array();
  array_push($data,array('title'=>'failed', 'message'=>'Paramenter can not be empty','net'=>'failed','amount'=>'failed','orderno'=>'failed','date'=>'failed','descr'=>'failed','pin'=>'failed','seria'=>'failed','deno'=>'failed'));
  echo json_encode(array("kpapi_resp"=>$data));
  
// echo'{"kpapi_resp":[{"net":"gotv","phone":"08138442969","amount":"2772","trans_id":"1654806739","id":"472","date":"2022-06-09 21:35:22","status":"0","billersCode":"7529278813","deno":"2800"},{"net":"airtel","phone":"07082772845","amount":"193","trans_id":"1652277394","id":"455","date":"2022-05-11 14:56:54","status":"1","billersCode":"","deno":"200"}],"next":[{"start":0,"records":2}]}';
  
}//POST

} else { 


  $data=array();
  array_push($data,array('title'=>'failed', 'message'=>'This method is not allowed','net'=>'failed','amount'=>'failed','orderno'=>'failed','date'=>'failed','descr'=>'failed','pin'=>'failed','seria'=>'failed','deno'=>'failed'));
  die(json_encode(array("kpapi_resp"=>$data)));;

}// end of server request POST method



//$u='{"code":"0","content":"Access Block for User Type"}';

//$ua=json_decode($u);
//echo $ua->{'content'};







?>