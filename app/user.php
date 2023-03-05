<?php
$func=$_GET['id'];
if($func=='subscribe'){
	subscribe();
}else if($func=='validate'){
	validate();
}else if($func=='message'){
	message();
}else if($func=='login'){
	user_login();
}else if($func=='register'){
	user_reg();
}else if($func=='depositinsert'){
	user_depositinsert();
}else if($func=='resetpass'){
	user_reset();
}else if($func=='referral'){
	user_referral();
}else if($func=='profile'){
	user_profile();
}else if($func=='bank'){
	user_bank();
}else if($func=='userimg'){
	user_img();
}else if($func=='kyc'){
	user_kyc();
}else if($func=='addstatus'){
	user_status();
}else if($func=='password'){
	user_password();
}else if($func=='review'){
	user_review();
}else if($func=='logout'){
	user_logout();
}else if($func=='ticket'){
	user_ticket();
}else if($func=='replyticket'){
	user_replyticket();
}else if($func=='plan'){
	user_plan();
}else if($func=='pay'){
	user_pay();
}else if($func=='mpay'){
	user_mpay();
}else if($func=='forgot'){
	user_forgot();
}else if($func=='wallet'){
	user_wallet();
}else if($func=='withdraw'){
	user_withdraw();
}else if($func=='ufund'){
	ufund();
}else if($func=='sendfund'){
	send_fund();
}else if($func=='norder'){
	order_product();
}else if($func=='order'){
	create_order();
}else if($func=='dr'){
	$del=$_GET['del'];
	user_dr($del);
}else if($func=='delete_ticket'){
	$del=$_GET['del'];
	user_deleteticket($del);
}else if($func=='doffer'){
	$del=$_GET['del'];
	user_doffer($del);
}else if($func=='sendver'){
	$del=$_GET['del'];
	$token=$_GET['status'];
	user_verification($del, $token);
}else if($func=='confirm'){
	$del=$_GET['del'];
	user_confirm($del);
}else if($func=='process'){
	$user =$_GET['user'];
	$profit_id =$_GET['profit_id'];
	$amount =$_GET['amount'];
	user_profit($user, $profit_id, $amount);
}

function ufund(){
	require_once("config.php");
	$amount=mysqli_real_escape_string($dbc, trim($_POST['amount']));
	$crypto=mysqli_real_escape_string($dbc, trim($_POST['crypto']));
	$user_id=mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$token = round(microtime(true));
	if ($crypto=='paypal' || $crypto=='skrill'|| $crypto=='blockchain'|| $crypto=='stripe'|| $crypto=='vogue') {
		mysqli_query($dbc, "INSERT INTO deposit VALUES(0,'".$user_id."','".$amount."','".$crypto."','".$datetime."','0', '$token', '', '')");
		echo "<script>window.location.href='".$url."/user/prostat/".$token."';</script>";
	} 	else{
		echo "<script>window.location.href='".$url."/user/ufund/".$amount."/".$crypto."';</script>";
	}
}

function user_reset(){
	require_once("config.php");
	session_start();
	$pass=mysqli_escape_string($dbc,$_POST['password']);
	$token=mysqli_escape_string($dbc,$_POST['token']);
	$password=password_hash($pass, PASSWORD_DEFAULT);
	$castro=mysqli_query($dbc, "UPDATE users SET password='$password' WHERE token='$token'");
	$_SESSION['bitcrow_loginerror']='success';
	redirect($url."/login");
}


function user_logout(){
	require_once("config.php");
	session_start();
	unset($_SESSION['bitcrow_userid']);
	unset($_SESSION['bitcrow_loginerror']);
	unset($_SESSION['bitcrow_regerror']);
	unset($_SESSION['bitcrow_forgoterror']);
	unset($_SESSION['bitcrow_userhome']);
	unset($_SESSION['bitcrow_limit']);
	unset($_SESSION['bitcrow_pending']);
	unset($_SESSION['bitcrow_insufficient']);
	unset($_SESSION['bitcrow_offer']);
	unset($_SESSION['password']);
	redirect($url."/login");
}
function message(){
	require_once("config.php");
	$name=addslashes(mysqli_real_escape_string($dbc, trim($_POST['name'])));
	$phone=addslashes(mysqli_real_escape_string($dbc, trim($_POST['phone'])));
	$email=addslashes(mysqli_real_escape_string($dbc, trim($_POST['email'])));
	$message=mysqli_real_escape_string($dbc, trim($_POST['message']));
	//mysqli_query($dbc, "INSERT INTO contact VALUES('0', '$name','$phone', '$email', '$message','$datetime')");
	$mcont=$dbc->prepare("INSERT INTO contact(full_name, mobile, email, message, date)  VALUES(?, ?, ?, ?, ?)");
	$mcont->bind_param("sssss", $name,$phone, $email, $message,$datetime);
	$mcont->execute();
	$mcont->close();
	
}
/*function user_wallet(){
	require_once("config.php");
	$address=mysqli_real_escape_string($dbc, trim($_POST['address']));
	$user_id=mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$coin_id=mysqli_real_escape_string($dbc, trim($_POST['coin_id']));
	$castro=mysqli_query($dbc, "SELECT * FROM wallet_address WHERE coin_id='$coin_id' AND user_id='$user_id'");
	if(mysqli_num_rows($castro)==0){
		mysqli_query($dbc, "INSERT INTO wallet_address VALUES('0', '$coin_id', '$user_id', '$address', '$datetime')");
	}else{
		mysqli_query($dbc, "UPDATE wallet_address SET address='$address', date='$datetime' WHERE coin_id=$coin_id AND user_id=$user_id");
	}	echo"<script>window.location.href='".$url."/user/wallet';</script>";			
}*/
function user_review(){
	$statusr=0;
	require_once("config.php");
	$user_id=(int)mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$review=mysqli_real_escape_string($dbc, trim($_POST["review"]));
//	mysqli_query($dbc, "INSERT INTO review VALUES(0, '".$user_id."', '".$review."', '".$datetime."', '0')");	
	$review=$dbc->prepare("INSERT INTO review(user_id, review, date, status) VALUES(?, ?, ?, ?)");
$review->bind_param("isss", $user_id, $review, $datetime, $statusr);
$review->execute();
$review->close();


	echo"<script>window.location.href='".$url."/user/profile/1';</script>";	

}
/*function user_depositinsert(){
	require_once("config.php");
	$user_id=mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$amount=mysqli_real_escape_string($dbc, trim($_POST["amount"]));
	$gateway=mysqli_real_escape_string($dbc, trim($_POST["gateway"]));
	$gate=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM gateways WHERE id='$gateway'"));
	if ($gate['minamo'] <= $amount && $gate['maxamo'] >= $amount) {
	    $charge = $gate['fixed_charge'] + ($amount * $gate['percent_charge'] / 100);
	    $usdamo = ($amount + $charge) / $gate['rate'];
	    $usdamo = round($usdamo, 2);
	    $trx = round(microtime(true));
		mysqli_query($dbc, "INSERT INTO deposits VALUES(0, '$user_id','$gateway','$amount','$charge','$usdamo','0','','$trx','0','0','$datetime','$datetime')");
		redirect($url."/user/deposit_preview/".$trx);
        } else {
       	echo"<script>window.location.href='".$url."/user/fund/3';</script>";
    }	
} */
function user_verification($del,$token){
	require_once("config.php");
	session_start();
	$reg=$token;
	//$ad= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE token ='".$reg."'" ));
	$ade=$dbc->prepare("SELECT * FROM users WHERE token = ?");
	$ade->bind_param("i", $reg);  
	$ade->execute();
	$adee=$ade->get_result();
	$ad=$adee->fetch_assoc();
	$ade->close();
	
	
	$status=$del;
	require_once '../lib/mail/reg_ver.php';
	require '../lib/phpmailer/PHPMailerAutoload.php';
	if($eset['status']==1){
		$mail = new PHPMailer(true);                    
		$mail->SMTPDebug = 0;                                
		$mail->isSMTP();                                      
		$mail->Host = $eset['hoste'];; 
		$mail->SMTPAuth = true;                        
		$mail->Username = $eset['username'];                 
		$mail->Password = $eset['password'];                          
		$mail->SMTPSecure = 'ssl';                            
		$mail->Port = $eset['porte'];                                    
		$mail->setFrom($eset['frome'], $set['site_name']);
		$mail->addAddress($ad['email'], $set['site_name']);          
		$mail->addReplyTo($eset['reply_to'], $set['site_name']);
		$mail->isHTML(true);               
		$mail->Subject = 'Account Verification';
		$mail->Body=$email_content;
		$mail->AltBody = $set['site_name'];
		if($mail->send()){
			if($status==2){
				$_SESSION['bitcrow_userhome']='email_versent';
				redirect($url."/user");
			}else if($status==1){
				$_SESSION['bitcrow_loginerror']='email_versent';
				redirect($url."/login");
			}
		}else{
			if($status==2){
				$_SESSION['bitcrow_userhome']='email_verfailed';
				redirect($url."/user");
			}else if($status==1){
				$_SESSION['bitcrow_loginerror']='email_verfailed';
				redirect($url."/login");
			}
		}
	}else{
		if($status==2){
			$_SESSION['bitcrow_userhome']='email_verfailed';
			redirect($url."/user");
		}else if($status==1){
			$_SESSION['bitcrow_loginerror']='email_verfailed';
			redirect($url."/login");
		}
	}
}
function user_confirm($del){
	require_once("config.php");
	session_start();
	$token=$del;
	//$ad= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE token ='".$token."'" ));
		$ade=$dbc->prepare("SELECT * FROM users WHERE token = ?");
	$ade->bind_param("i", $token);  
	$ade->execute();
	$adee=$ade->get_result();
	$ad=$adee->fetch_assoc();
	$ade->close();
	
	$active=1;
	
$update=$dbc->prepare("UPDATE users SET active= ? WHERE token= ?");
$update->bind_param("is", $active, $token);
$update->execute(); 
$update->close();


	require '../lib/phpmailer/PHPMailerAutoload.php';
	if($eset['status']==1){
		require_once '../lib/mail/verify_kyc.php';
		$mail = new PHPMailer(true);                    
		$mail->SMTPDebug = 0;                                
		$mail->isSMTP();                                      
		$mail->Host = $eset['hoste'];; 
		$mail->SMTPAuth = true;                        
		$mail->Username = $eset['username'];                 
		$mail->Password = $eset['password'];                          
		$mail->SMTPSecure = 'ssl';                            
		$mail->Port = $eset['porte'];                                    
		$mail->setFrom($eset['frome'], $set['site_name']);
		$mail->addAddress($ad['email'], $set['site_name']);          
		$mail->addReplyTo($eset['reply_to'], $set['site_name']);
		$mail->isHTML(true);               
		$mail->Subject = 'Kindly submit your KYC and Proof Of Address for proper verification.';
		$mail->Body=$email_content2;
		$mail->AltBody = $set['site_name'];
		$mail->send();
		require_once '../lib/mail/reg_successful.php';
		$mail = new PHPMailer(true);                    
		$mail->SMTPDebug = 0;                                
		$mail->isSMTP();                                      
		$mail->Host = $eset['hoste'];; 
		$mail->SMTPAuth = true;                        
		$mail->Username = $eset['username'];                 
		$mail->Password = $eset['password'];                          
		$mail->SMTPSecure = 'ssl';                            
		$mail->Port = $eset['porte'];                                    
		$mail->setFrom($eset['frome'], $set['site_name']);
		$mail->addAddress($ad['email'], $set['site_name']);          
		$mail->addReplyTo($eset['reply_to'], $set['site_name']);
		$mail->isHTML(true);               
		$mail->Subject = 'Welcome to '.$set['site_name'];
		$mail->Body=$email_content;
		$mail->AltBody = $set['site_name'];
		if($mail->send()){
			$_SESSION['bitcrow_loginerror']='email_confirm';
			redirect($url."/login");
		}else{
			$_SESSION['bitcrow_loginerror']='email_confirm';
			redirect($url."/login");
		}
	}else{
		$_SESSION['bitcrow_loginerror']='email_confirm';
		redirect($url."/login");
	}
}
function user_dr($del){
	require_once("config.php");
	$dr=$del;
	//$result=mysqli_query($dbc,"DELETE FROM review WHERE id = '$dr'"); 
	
	$result=$dbc->prepare("DELETE FROM review WHERE id = ?"); 
	$result->bind_param("i", $dr); 
	$result->execute();
	$result->close();
	
	echo"<script>window.location.href='".$url."/user/review';</script>";
}
function user_deleteticket($del){
	require_once("config.php");
	$dr=$del;
	//$result=mysqli_query($dbc,"DELETE FROM support WHERE ticket_id = '$dr'"); 
$result=$dbc->prepare("DELETE FROM support WHERE ticket_id = ?"); 
	$result->bind_param("i", $dr); 
	$result->execute();
	$result->close();
	
	
	
	echo"<script>window.location.href='".$url."/user/ticket';</script>";
}
/*
function user_doffer($del){
	require_once("config.php");
	$dr=$del;
	mysqli_query($dbc,"DELETE FROM profits WHERE id = '$dr'"); 
	echo"<script>window.location.href='".$url."/user/sell_bitcoin';</script>";
} */ 


function user_password(){
	require_once("config.php");
	$user_id=(int)mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$oldpass=mysqli_escape_string($dbc,$_POST['oldpassword']);
	$newpass=mysqli_escape_string($dbc,$_POST['newpassword']);
	$conpass=mysqli_escape_string($dbc,$_POST['confirmpassword']);
//	$user=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM users WHERE id='$user_id'"));
	$usere=$dbc->prepare("SELECT * FROM users WHERE id= ?");
	$usere->bind_param("i", $user_id);
	$usere->execute();
	$useree=$usere->get_result();
	$user=$useree->fetch_assoc();
	$usere->close();
	
	if(password_verify($oldpass, $user['password'])){
		if($newpass==$conpass){
			$password=password_hash($newpass, PASSWORD_DEFAULT);
			//mysqli_query($dbc, "UPDATE users SET password='$password' WHERE id='".$user_id."'");
			$update=$dbc->prepare("UPDATE users SET password= ? WHERE id= ?");
			$update->bind_param("si", $password, $user_id);
			$update->execute();
			$update->close();
			
			
			session_start();
			unset($_SESSION['bitcrow_userid']);
			unset($_SESSION['password']);
			$_SESSION['bitcrow_loginerror']="eruptx";
			echo"<script language='javascript'>document.location='../../login';</script>";
		}else{
			echo "<script>window.location.href='".$url."/user/security/2';</script>";
		}
	}else{
		echo "<script>window.location.href='".$url."/user/security/1';</script>";
	}
}
function user_img(){
	require_once("config.php");
	$user_id=(int)mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$allowedExts = array("jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if((($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 1000000) && in_array($extension, $allowedExts)){
		if($_FILES["file"]["error"]>0){
			echo "<script>window.location.href='".$url."/user/profile/2';</script>";
		}else{
			$cast=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='$user_id' LIMIT 1"));
			$LIMIT=1;
			
		/*	$caste=$dbc->prepare("SELECT * FROM users WHERE id= ?, LIMIT ?");
			$caste->bind_param("is", $user_id, $LIMIT);
			$caste->execute();
			$castee=$caste->get_result();
			$cast=$castee->fetch_assoc();
			$caste->close();
			*/
			
			$image='../asset/profile/'.$cast['image_link'];
			if(!empty($cast['image_link'])){
				unlink($image);
			}
			$newfilename = round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES["file"]["tmp_name"], "../asset/profile/" . $newfilename);
		//	$up=mysqli_query($dbc, "UPDATE users SET image_link='".$newfilename."' WHERE id='$user_id'");
				$up=$dbc->prepare("UPDATE users SET image_link= ? WHERE id= ?");
				$up->bind_param("si", $newfilename, $user_id);
				$up->execute();
				$up->close();
			
			if($up){
				echo "<script>window.location.href='".$url."/user/profile/1';</script>";
			}
		}
	}else{
		echo "<script>window.location.href='".$url."/user/profile/2';</script>";
	}
}
function user_kyc(){
	require_once("config.php");
	$user_id=(int)$_POST['user_id'];
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if(($_FILES["file"]["size"] < 2000000)){
	if($_FILES["file"]["error"] > 0){echo "<script>window.location.href='".$url."/user/profile/2';</script>";}
	else{
	$cast=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='$user_id' LIMIT 1"));
	$LIMIT=1;
			
			/*$caste=$dbc->prepare("SELECT * FROM users WHERE id= ?, LIMIT ?");
			$caste->bind_param("ii", $user_id, $LIMIT);
			$caste->execute();
			$castee=$caste->get_result();
			$cast=$castee->fetch_assoc();
			$caste->close();
			*/
	
	
	$image='../../profile/'.$cast['kyc_link'];
	if(!empty($cast['kyc_link'])){unlink($image);}
	$newfilename = round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($_FILES["file"]["tmp_name"], "../asset/profile/" . $newfilename);
	//$up=mysqli_query($dbc, "UPDATE users SET kyc_link='".$newfilename."' WHERE id='$user_id'");
	$up=$dbc->prepare("UPDATE users SET kyc_link= ? WHERE id= ?");
				$up->bind_param("si", $newfilename, $user_id);
				$up->execute();
				$up->close();
	
	
	if($up){
	if($eset['status']==1){
	require_once '../lib/mail/kyc.php';
	require '../lib/phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	$mail->SMTPDebug = 0;                                
	$mail->isSMTP();                                      
	$mail->Host = $eset['hoste'];; 
	$mail->SMTPAuth = true;                        
	$mail->Username = $eset['username'];                 
	$mail->Password = $eset['password'];                          
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = $eset['porte'];                                    
	$mail->setFrom($eset['frome'], $set['site_name']);
	$mail->addAddress($set['email'], $set['site_name']);          
	$mail->addReplyTo($eset['reply_to'], $set['site_name']);
	$mail->isHTML(true);                               // Set email format to HTML
	$mail->Subject ='New identity document just uploaded';
	$mail->Body=$email_content;
	$mail->AltBody = $set['site_name'];
	$mail->send();
	}echo "<script>window.location.href='".$url."/user/profile/1';</script>";}}}
	else{echo "<script>window.location.href='".$url."/user/profile/2';</script>";}
}
function user_status(){
	require_once("config.php");
	$user_id=$_POST['user_id'];
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if(($_FILES["file"]["size"] < 2000000)){
	if($_FILES["file"]["error"] > 0){echo "<script>window.location.href='".$url."/user/profile/2';</script>";}
	else{
	$cast=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='$user_id' LIMIT 1"));
		$LIMIT=1;
			
			/*$caste=$dbc->prepare("SELECT * FROM users WHERE id= ?, LIMIT ?");
			$caste->bind_param("ii", $user_id, $LIMIT);
			$caste->execute();
			$castee=$caste->get_result();
			$cast=$castee->fetch_assoc();
			$caste->close();
			*/
	
	$image='../../profile/'.$cast['kyc_link'];
	if(!empty($cast['kyc_link'])){unlink($image);}
	$newfilename = round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($_FILES["file"]["tmp_name"], "../asset/profile/" . $newfilename);
	//$up=mysqli_query($dbc, "UPDATE users SET ='".$newfilename."' WHERE id='$user_id'");
		$up=$dbc->prepare("UPDATE users SET add_link= ? WHERE id= ?");
				$up->bind_param("si", $newfilename, $user_id);
				$up->execute();
				$up->close();
	
	
	if($up){echo "<script>window.location.href='".$url."/user/profile/1';</script>";}}}
	else{echo "<script>window.location.href='".$url."/user/profile/2';</script>";}
}
/*function user_bank(){
	require_once("config.php");
	$user_id=mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$name=mysqli_real_escape_string($dbc, trim($_POST['name']));
	$address=mysqli_real_escape_string($dbc, trim($_POST['address']));
	$iban=mysqli_real_escape_string($dbc, trim($_POST['iban']));
	$swift=mysqli_real_escape_string($dbc, trim($_POST['swift']));
	$acct_no=mysqli_real_escape_string($dbc, trim($_POST['acct_no']));
	if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM bank WHERE user_id='$user_id'"))>0){
		mysqli_query($dbc,"UPDATE bank SET name='$name',address='$address',iban='$iban',swift='$swift',acct_no='$acct_no' WHERE user_id ='$user_id'");
	}else{
		mysqli_query($dbc,"INSERT INTO bank VALUES(0,'$user_id','$name','$address','$iban','$swift','$acct_no')");
	}
	echo "<script>window.location.href='".$url."/user/wallet';</script>";
} */
function user_profile(){
	require_once("config.php");
	$user_id=(int)mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$name=addslashes(mysqli_real_escape_string($dbc, trim($_POST['name'])));

$bname=addslashes(mysqli_real_escape_string($dbc, trim($_POST['bname'])));

$bvn=addslashes(mysqli_real_escape_string($dbc, trim($_POST['bvn'])));
	$username=addslashes(mysqli_real_escape_string($dbc, trim($_POST['username'])));
	$mobile=addslashes(mysqli_real_escape_string($dbc, trim($_POST['mobile'])));
	
//	$castro=mysqli_query($dbc,"UPDATE users SET username='$username',name='$name',bname='$bname', bvn='$bvn',bvn_status='1', phonenumber='$mobile' WHERE id ='$user_id'");
	$bvn_status=1;
	
	$castro=$dbc->prepare("UPDATE users SET username= ?,name= ?,bname= ?, bvn= ?,bvn_status= ?, phonenumber= ? WHERE id = ?");
	$castro->bind_param("ssssisi", $username, $name, $bname, $bvn, $bvn_status, $mobile, $user_id);
	$castro->execute();
	$castro->close();
	
	
	
	if($castro){echo "<script>window.location.href='".$url."/user/profile/1';</script>";}
	else{echo "<script>window.location.href='".$url."/user/profile/2';</script>";}
}
function user_login(){
	session_start();
	require_once("config.php");
	require '../lib/phpmailer/PHPMailerAutoload.php';
		define("RECAPTCHA_V3_SECRET_KEY",$set['skey']);
		  $token = filter_input(INPUT_POST,'token', FILTER_SANITIZE_STRING);
		$femail=mysqli_escape_string($dbc,$_POST['email']);

if(!filter_var($femail,FILTER_VALIDATE_EMAIL))
{
$_SESSION['bitcrow_loginerror']='invaliddetails';		
		redirect($url."/login");
}

$email=addslashes($femail);
	$fpassword=mysqli_escape_string($dbc,$_POST['password']);

$password=addslashes($fpassword);

$ye_ran=mysqli_escape_string($dbc,$_POST['ye_ran']);


	//$row=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM users WHERE email='$email'"));
	 
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
 $arrResponse = json_decode($response, true);
  
// verify the response

if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $ye_ran && $arrResponse["score"] >= 0.5) {
    // valid submission
	
	$ip_address=user_ip();


$stmt = $dbc->prepare("SELECT * FROM users WHERE email =?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if($result->num_rows>0) {
//fetching result would go here, but will be covered later

$row = $result->fetch_assoc(); 

	
	
	//if(mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM users WHERE email='$email'"))>0){
	 if($ip_address!=$row['ip_address'] & $eset['status']==1){
	require_once '../lib/mail/login_attempt.php';
	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	$mail->SMTPDebug = 0;                                
	$mail->isSMTP();                                      
	$mail->Host = $eset['hoste'];; 
	$mail->SMTPAuth = true;                        
	$mail->Username = $eset['username'];                 
	$mail->Password = $eset['password'];                          
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = $eset['porte'];                                    
	$mail->setFrom($eset['frome'], $set['site_name']);
	$mail->addAddress($email, $set['site_name']);          
	$mail->addReplyTo($eset['reply_to'], $set['site_name']);
	$mail->isHTML(true);                               // Set email format to HTML
	$mail->Subject = 'Suspicious Login Attempt';
	$mail->Body=$email_content;
	$mail->AltBody = $set['site_name'];
	$mail->send();
	} 
	
	
$rowvlog=1;

$shoGods=$dbc->prepare("SELECT * FROM godlog WHERE uid= ?");
$shoGods->bind_param("i", $rowvlog);
$shoGods->execute();
$shoGodss=$shoGods->get_result();
$shoGod=$shoGodss->fetch_assoc();
$shoGods->close();
	
			if(password_verify($password, $row['password']) && password_verify($ye_ran,$shoGod['words']) && $arrResponse["action"] == $_SESSION['logieeee']){
			if($row['status']==1 || substr($row['attempt'],0,2)== "b-"){
				$blockedtime = substr($row['attempt'],2);
				if(time() < $blockedtime) {
				$_SESSION['bitcrow_loginerror']='blockeduser';	
				//redirect($url."/login");
				echo"<script>window.location.href='".$url."/login';</script>";
				} else{
					$attempt="";
				//update user and attempt login
				$update=$dbc->prepare("UPDATE users SET attempt= ?  WHERE id= ?");
				$update->bind_param("si", $attempt, $row['id']);
				$update->execute();
				$update->close();
					
					$_SESSION['bitcrow_loginerror']='blockeduser';	
				//redirect($url."/login");
				echo"<script>window.location.href='".$url."/login';</script>";
				}

			}else{
				$_SESSION['bitcrow_userid']=$row['id'];
				$_SESSION['bitcrow_password']=$row['password'];
				
					$attempt='';
				//update user and attempt login
				$updatea=$dbc->prepare("UPDATE users SET attempt= ?  WHERE id= ?");
$updatea->bind_param("si", $attempt, $row['id']);
$updatea->execute();
$updatea->close();

				
				$update=$dbc->prepare("UPDATE users SET last_login= ?  WHERE id= ?");
$update->bind_param("si", $datetime, $row['id']);
$update->execute();
$update->close();

//mysqli_query($dbc,"UPDATE users SET last_login='$datetime' WHERE id='".$row['id']."'");

	//	redirect($url."/user");
	echo"<script>window.location.href='".$url."/user';</script>";
			}
		}else{
			
		//	block attempt logoing start
			if($row['attempt']==''){
				//user was not login before
				$attempt=1;
				//update user and attempt login
				$update=$dbc->prepare("UPDATE users SET attempt= ?  WHERE id= ?");
$update->bind_param("si", $attempt, $row['id']);
$update->execute();
$update->close();

	$_SESSION['bitcrow_loginerror']='invaliddetails';
			//redirect($url."/login");
			echo"<script>window.location.href='".$url."/login';</script>";
			
			} else if($row['attempt']==3) {
				$attempt="b-".strtotime("+3 minutes", time());
				
				//update user and block if attempt is greater than 5
				$update=$dbc->prepare("UPDATE users SET attempt= ?  WHERE id= ?");
$update->bind_param("si", $attempt, $row['id']);
$update->execute();
$update->close();
$_SESSION['bitcrow_loginerror']='blockeduser';	
				//redirect($url."/login");
				echo"<script>window.location.href='".$url."/login';</script>";
			} else if(substr($row['attempt'],0,2)== "b-") {
				
				
				$_SESSION['bitcrow_loginerror']='blockeduser';	
				//redirect($url."/login");
				echo"<script>window.location.href='".$url."/login';</script>";
				
			} else if($row['attempt']<3) {				$attempt=$row['attempt']+1;
			
				//update user and block if attempt is greater than 5
				$update=$dbc->prepare("UPDATE users SET attempt= ?  WHERE id= ?");
$update->bind_param("si", $attempt, $row['id']);
$update->execute();
$update->close();
				$_SESSION['bitcrow_loginerror']='invaliddetails';
			//redirect($url."/login");
			echo"<script>window.location.href='".$url."/login';</script>";
				
			} else{
					$_SESSION['bitcrow_loginerror']='invaliddetails';
			//redirect($url."/login");
			echo"<script>window.location.href='".$url."/login';</script>";
			} //end attempt blocking
			
			
				

		}
	}else{
			$_SESSION['bitcrow_loginerror']='invaliddetails';
			 //redirect($url."/login");
			 echo"<script>window.location.href='".$url."/login';</script>";
		}

//$stmt->close(); //end stmt


} else {
   $_SESSION['bitcrow_loginerror']='invaliddetails';
   // redirect($url."/login");
   echo"<script>window.location.href='".$url."/login';</script>";
} //end captcha
}
function user_ticket(){
	require_once("config.php");
	$title=addslashes(mysqli_real_escape_string($dbc, trim($_POST['title'])));
	$user_id=(int)mysqli_real_escape_string($dbc, trim($_POST['user']));
	$priority=addslashes(mysqli_real_escape_string($dbc, trim($_POST['category'])));
	$editor=addslashes(mysqli_real_escape_string($dbc, trim($_POST['editor'])));
	//$user = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='$user_id'"));

$users = $dbc->prepare("SELECT * FROM users WHERE id=? ");
$users->bind_param("i", $user_id);
$users->execute();
$result=$users->get_result();
$user=$result->fetch_assoc();
$users->close();


	$token = round(microtime(true));
	//mysqli_query($dbc, "INSERT INTO support VALUES('0','$title','$priority','$editor','$datetime','0','$user_id','$token')");
$status='0';
$in=$dbc->prepare("INSERT INTO support(subject, priority, message, date, status, user_id, ticket_id) VALUES(?, ?, ?, ?, ?, ?, ?)");
$in->bind_param("ssssiii", $title, $priority, $editor, $datetime, $status, $user_id, $token);
$in->execute();
$in->close();

	if($eset['status']==1){
		require_once "../lib/mail/ticket.php";
		require '../lib/phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		$mail->SMTPDebug = 0;                                
		$mail->isSMTP();                                      
		$mail->Host = $eset['hoste'];; 
		$mail->SMTPAuth = true;                        
		$mail->Username = $eset['username'];                 
		$mail->Password = $eset['password'];                          
		$mail->SMTPSecure = 'ssl';                            
		$mail->Port = $eset['porte'];                                    
		$mail->setFrom($eset['frome'], $set['site_name']);
		$mail->addAddress($user['email'], $user['name']);          
		$mail->addReplyTo($eset['reply_to'], $set['site_name']);
		$mail->isHTML(true);                               // Set email format to HTML
		$mail->Subject ='[Ticket ID: '.$token.']'.$title;
		$mail->Body=$email_content;
		$mail->AltBody = $set['site_name'];
		$mail->send();
	}
	echo"<script>window.location.href='".$url."/user/ticket';</script>";
}
function user_replyticket(){
	require_once("config.php");
	$message=addslashes(mysqli_real_escape_string($dbc, trim($_POST['message'])));
	$ticket_id=(int)mysqli_real_escape_string($dbc, trim($_POST['ticket_id']));


	//mysqli_query($dbc, "INSERT INTO reply_support VALUES('0','$ticket_id','$message','$datetime','1')");
$statuss=1;
$rpt=$dbc->prepare("INSERT INTO reply_support(ticket_id, reply, date, status) VALUES(?, ?, ?, ?)");
$rpt->bind_param("issi", $ticket_id, $message, $datetime, $statuss);
$rpt->execute();
$rpt->close();

	
//mysqli_query($dbc, "UPDATE support SET status='0' WHERE ticket_id='$ticket_id'");

$istatus='0';
$update=$dbc->prepare("UPDATE support SET status= ? WHERE ticket_id= ?");
$update->bind_param("ii", $istatus, $ticket_id);
$update->execute();
$update->close();

	echo"<script>window.location.href='".$url."/user/check_ticket/".$ticket_id."';</script>";
}
/*
function user_plan(){
	require_once("config.php");
	$amount=mysqli_real_escape_string($dbc, trim($_POST['amount']));
	$plan=mysqli_real_escape_string($dbc, trim($_POST['plan']));
	$user_id=mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$user=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$user_id."'"));
	$balance=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$user_id."'"));
	$row=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM plan WHERE id='".$plan."'"));
	if($balance['balance']>$amount || $balance['balance']==$amount){
		if($amount>=$row['min_deposit'] || $amount==$row['min_deposit']){
			if($amount<$row['amount'] || $amount==$row['amount']){
				$a=$balance['balance']-$amount;
				$token = round(microtime(true));
				mysqli_query($dbc, "UPDATE users SET balance='".$a."' WHERE id='".$user_id."'");
				mysqli_query($dbc, "INSERT INTO profits VALUES(0, '".$user_id."','".$plan."','".$amount."','0', '".$datetime."','1','$token')");
				if ($set['referral']==1){
					if (mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM referral WHERE user_id='".$user_id."'"))>0) {
						$ref_amount=($amount*$row['ref_percent'])/100;
						$ref_update=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM referral WHERE user_id='".$user_id."'"));
						$user_update=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$ref_update['ref_id']."'"));
						$b=$user_update['profit']+$ref_amount;
						mysqli_query($dbc,"UPDATE users SET profit='$b' WHERE id='".$ref_update['ref_id']."'");
						mysqli_query($dbc,"INSERT INTO transfers VALUES('0', '$ref_amount', '$user_id', '".$user_update['id']."', '2', '$datetime')");
					}	
				}
				if($eset['status']==1){
					echo "<script>window.location.href='".$url."/user/plans/4';</script>";
				}else{
					echo "<script>window.location.href='".$url."/user/plans/1';</script>";
				}
			}else{
				echo "<script>window.location.href='".$url."/user/plans/2';</script>";
			}
		}else{
			echo "<script>window.location.href='".$url."/user/plans/3';</script>";
		}
	}
}
function user_pay(){
	require_once("config.php");
	$user_id=mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$usd=mysqli_real_escape_string($dbc, trim($_POST['usd']));
	$trans_id=mysqli_real_escape_string($dbc, trim($_POST['trans_id']));
	$details=mysqli_real_escape_string($dbc, trim($_POST['details']));
	$token = round(microtime(true));
	mysqli_query($dbc, "INSERT INTO deposit VALUES(0,'".$user_id."','".$usd."','Bitcoin','".$datetime."','0', '$token', '$trans_id', '$details')");
	$cast= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id ='".$user_id."' LIMIT 1" ));
	require '../lib/phpmailer/PHPMailerAutoload.php';
		if($eset['status']==1){
			require_once "../lib/mail/deposit_unver.php";
			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			$mail->SMTPDebug = 0;                                
			$mail->isSMTP();                                      
			$mail->Host = $eset['hoste'];; 
			$mail->SMTPAuth = true;                        
			$mail->Username = $eset['username'];                 
			$mail->Password = $eset['password'];                          
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = $eset['porte'];                                    
			$mail->setFrom($eset['frome'], $set['site_name']);
			$mail->addAddress($cast['email'], $set['site_name']);          
			$mail->addReplyTo($eset['reply_to'], $set['site_name']);
			$mail->isHTML(true);                               // Set email format to HTML
			$mail->Subject ='Deposit request under review';
			$mail->Body=$email_content;
			$mail->AltBody = $set['site_name'];
			$mail->send();

		}
		echo "<script>window.location.href='".$url."/user/deposit';</script>";
}
function user_mpay(){
	require_once("config.php");
	$user_id=$_POST['user_id'];
	$wallet=$_POST['wallet'];
	$usd=$_POST['usd'];
	$type=$_POST['type'];
	mysqli_query($dbc, "INSERT INTO usr_member VALUES(0, '".$user_id."', '".$type."', '0')");	
		echo "<script>window.location.href='".$url."/user/members';</script>";
} */


function validate(){
	session_start();
	$key=mysqli_real_escape_string($dbc, trim($_POST['key']));
	$host=mysqli_real_escape_string($dbc, trim($_POST['host']));
	$user=mysqli_real_escape_string($dbc, trim($_POST['user']));
	$pass=mysqli_real_escape_string($dbc, trim($_POST['pass']));
	$db=mysqli_real_escape_string($dbc, trim($_POST['db']));
	$dbc = mysqli_connect($host, $user, $pass, $db);
	//$row=mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM admin WHERE id=1"));
$fid=1;
$rowfetch=$dbc->prepare("SELECT * FROM admin WHERE id= ?");
$rowfetch->bind_param("i", $fid);
$rowfetch->execute();
$result=$rowfetch->get_result();
$row=$result->fetch_assoc();
$rowfetch->close();

	if(password_verify($key, $row['av'])){
		//mysqli_query($dbc, "UPDATE admin SET recovery=1");
$upid=1;
$upd=$dbc->prepare("UPDATE admin SET recovery= ?");
$upd->bind_param("i", $upid);
$upd->execute();
$upd->close();
	
		echo "<script>window.location.href='../../';</script>";
	}else{
		$_SESSION['bitcrow_invalid']='invalid';
		echo "<script>window.location.href='../license';</script>";
	}
}  /*
function user_referral(){
	require_once("config.php");
	require_once('../lib/geoplugin.class.php');
	$geoplugin = new geoPlugin();
	$geoplugin->locate();
	$username=mysqli_escape_string($dbc,$_POST['username']);
	$ref_id=mysqli_escape_string($dbc,$_POST['ref_id']);
	$token=mysqli_escape_string($dbc,$_POST['token']);
	$email=mysqli_escape_string($dbc,$_POST['email']);
	$name=mysqli_escape_string($dbc,$_POST['name']);
	$pass=mysqli_escape_string($dbc,$_POST['password']);
	$password=password_hash($pass, PASSWORD_DEFAULT);
	$ip_address=user_ip();
	if(empty($_POST['news'])){
		$promo=0;
	}else{
		$promo=mysqli_escape_string($dbc,$_POST['news']);
	}
	$country=$geoplugin->countryName;
	$mobile=mysqli_escape_string($dbc,$_POST['format-international-phone']);
	$regtoken = round(microtime(true));
	$confirm=mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users WHERE (username='$username') OR (email='$email') OR (phonenumber='$mobile')"));
	if($confirm>0){
		$_SESSION['bitcrow_regerror']='invaliddetails';
		redirect($url."/action_ref/".$token."/0");
	}
	else if($confirm<1){

		if ($set['email_activation']==1 & $eset['status']==1) {	

			$reg=mysqli_query($dbc,"INSERT INTO users VALUES(0,'$datetime','$username', '', '$email', '$name', '".$set['balance_reg']."','0','$password','$mobile','$country','0','0','$regtoken','$ip_address', '', '', '0', '', '0', '$promo')");
			if($reg){
				$boom=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE token='$regtoken'"));
				mysqli_query($dbc, "INSERT INTO referral VALUES ('0','".$boom['id']."','$ref_id','$datetime')");
				redirect($url."/app/user?id=sendver&del=1&status=".$token);
			}
		}
		else if ($set['email_activation']==1 & $eset['status']==0) {	
			$reg=mysqli_query($dbc,"INSERT INTO users VALUES(0,'$datetime','$username', '', '$email', '$name', '".$set['balance_reg']."','0','$password','$mobile','$country','0','1','$regtoken','$ip_address', '', '', '0', '', '0', '$promo')");
			if($reg){
				$boom=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE token='$regtoken'"));
				mysqli_query($dbc, "INSERT INTO referral VALUES ('0','".$boom['id']."','$ref_id','$datetime')");
				redirect($url."/login");
			}  
		}else if ($set['email_activation']==0) {
			$reg=mysqli_query($dbc,"INSERT INTO users VALUES(0,'$datetime','$username', '', '$email', '$name', '".$set['balance_reg']."','0','$password','$mobile','$country','0','1','$regtoken','$ip_address', '', '', '0', '', '0', '$promo')");
			if($reg){
				$boom=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE token='$regtoken'"));
				mysqli_query($dbc, "INSERT INTO referral VALUES ('0','".$boom['id']."','$ref_id','$datetime')");
				redirect($url."/login");
			} 
		} 
	}
}  */
function user_reg(){
	session_start();
	require_once("config.php");
	require_once('../lib/geoplugin.class.php');
		define("RECAPTCHA_V3_SECRET_KEY",$set['skey']);
  $chtoken = filter_input(INPUT_POST,'token', FILTER_SANITIZE_STRING);
	$geoplugin = new geoPlugin();
	$geoplugin->locate();
	$username=addslashes(mysqli_escape_string($dbc,$_POST['username']));
	$femail=addslashes(mysqli_escape_string($dbc,$_POST['email']));
if(!filter_var($femail, FILTER_VALIDATE_EMAIL))
{
$_SESSION['bitcrow_regerror']='invaliddetails';		
//echo'page 647';
		redirect($url."/register");


}

$email=$femail;
	$name=addslashes(mysqli_escape_string($dbc,$_POST['name']));

$auto=addslashes(mysqli_escape_string($dbc,$_POST['auto']));

	$pass=mysqli_escape_string($dbc,$_POST['password']);
	$password=password_hash($pass, PASSWORD_DEFAULT);
	$ip_address=user_ip();
	$mobile=mysqli_escape_string($dbc,$_POST['format-international-phone']);
		$ye_ran=mysqli_escape_string($dbc,$_POST['ye_ran']);
	
	if(!filter_var($mobile, FILTER_SANITIZE_NUMBER_INT))
{
$_SESSION['bitcrow_regerror']='invaliddetails';		
	//echo $reg->error;	
//echo'pge 665';
redirect($url."/register");
}
	
	$bal=$set['balance_reg'];
	if(empty($_POST['news'])){
		$promo=0;
	}else{
		$promo=1;
	}
	$country=$geoplugin->countryName;
	while(1){
	$token = round(microtime(true));
	//if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users WHERE token = $token")) < 1){ break;} 
	
$sl=$dbc->prepare("SELECT * FROM users WHERE token = ?");
$sl->bind_param("i", $token);
$sl->execute();
$sll=$sl->get_result();

if($sll->num_rows<1) { break;} 
$sl->close(); 

	
	
	}
	
		
 
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $chtoken)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
 $arrResponse = json_decode($response, true);
  
// verify the response

if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $ye_ran && $arrResponse["score"] >= 0.5) {
    // valid submission
//check authentication.
//$confirm_auto=mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM auto WHERE (code='$auto')"));

 

$confirm_autoo=$dbc->prepare("SELECT * FROM auto WHERE code= ?");
$confirm_autoo->bind_param("s", $auto);
$confirm_autoo->execute();
$confirm_autooo=$confirm_autoo->get_result();
$confirm_autoo->close();
//$confirm_auto=$confirm_autooo->num_rows();


	if($confirm_autooo->num_rows>0){ 
	
	//$confirm=mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users WHERE (username='$username') OR (email='$email') OR (phonenumber='$mobile')"));
	
	
$fconfirm=$dbc->prepare("SELECT * FROM users WHERE username= ? OR email= ? OR phonenumber= ?");
$fconfirm->bind_param("sss", $username, $email, $mobile);
$fconfirm->execute();
//echo $username;

$confirm=$fconfirm->get_result();
$fconfirm->close(); 

	if($confirm->num_rows>0){ 
		$_SESSION['bitcrow_regerror']='invaliddetails';
		redirect($url."/register");
	}
	else if($confirm->num_rows<1){

		if ($set['email_activation']==1 & $eset['status']==1) {	
		    
		    
			$reg=mysqli_query($dbc,"INSERT INTO users (id,date,username,image_link,email,name,dep_balance,bit_balance,password,phonenumber,country,status,active,token,ip_address,last_login,kyc_link,kyc_status,add_link,add_status,promotional_emails) VALUES(0, '$datetime','$username', '', '$email', '$name', '$bal', '0', '$password', '$mobile', '$country', '0', '0', '$token', '$ip_address', '', '', '0', '', '0', '$promo')");
			if($reg){
				//redirect($url."/app/user?id=sendver&del=1&status=".$token);

sleep(1);
header( "location: $url/app/user?id=sendver&del=1&status=$token" ); 

$del=mysqli_query($dbc,"DELETE FROM auto WHERE code = '$auto'"); 
			} 
		}		
		else if ($set['email_activation']==1 & $eset['status']==0) {	
			//$reg=mysqli_query($dbc,"INSERT INTO users (id,date,username,image_link,email,name,dep_balance,bit_balance,password,phonenumber,country,status,active,token,ip_address,last_login,kyc_link,kyc_status,add_link,add_status,promotional_emails) VALUES(0,'$datetime','$username', '', '$email', '$name', '$bal', '0', '$password','$mobile','$country','0','1','$token','$ip_address', '', '', '0', '', '0', '$promo')");
			
$reg=$dbc->prepare("INSERT INTO users (date,username,email,name,password,phonenumber,country,token,ip_address,promotional_emails) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$reg->bind_param("sssssssiii", $datetime, $username, $email, $name, $password, $mobile, $country, $token, $ip_address, $promo);
$reg->execute();


if($reg->affected_rows>0){

$del=mysqli_query($dbc,"DELETE FROM auto WHERE code = '$auto'"); 
				$_SESSION['bitcrow_status']='success';
				redirect($url."/login");

//sleep(1); header( "location: $url/login" ); 
			} 
			$reg->close();
			
		}else if ($set['email_activation']==0) {
			
			//$reg=mysqli_query($dbc,"INSERT INTO users (id,date,username,image_link,email,name,dep_balance,bit_balance,password,phonenumber,country,status,active,token,ip_address,last_login,kyc_link,kyc_status,add_link,add_status,promotional_emails) VALUES(0,'$datetime','$username', '', '$email', '$name', '$bal', '0', '$password','$mobile','$country','0','1','$token','$ip_address', '', '', '0', '', '0', '$promo')");
			
$active=1;
$reg=$dbc->prepare("INSERT INTO users (date,username,email,name,password,phonenumber,country,active,token,ip_address,promotional_emails) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
$reg->bind_param("sssssssiiii", $datetime, $username, $email, $name, $password, $mobile, $country, $active, $token, $ip_address, $promo);
$reg->execute();
			if($reg->affected_rows>0){


$del=mysqli_query($dbc,"DELETE FROM auto WHERE code = '$auto'"); 
				$_SESSION['bitcrow_status']='success';
				redirect($url."/login");

//sleep(1); header( "location: $url/login" ); 
			} 
			$reg->close();
			
		} 
} 

} else {

$_SESSION['bitcrow_regerror']='invalidauto';
		redirect($url."/register");
	}
	} else{ $_SESSION['bitcrow_regerror']='invalid';		
//echo'page 647';
//redirect($url."/register");
echo"<script>window.location.href='".$url."/register';</script>";
 } //end captcha
	
}
 


function user_forgot(){
	session_start();
	require_once("config.php");
	$email=addslashes(mysqli_escape_string($dbc,$_POST['email']));

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{ $_SESSION['bitcrow_forgoterror']='invaliddetails';
redirect($url."/forgot");
}
	//if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users WHERE email='$email'"))>0)
$n=$dbc->prepare("SELECT * FROM users WHERE email= ?");
$n->bind_param("s", $email);
$n->execute();
$nn=$n->get_result();
$n->close();
if($nn->num_rows>0)
{
		$token = round(microtime(true));

//mysqli_query($dbc, "UPDATE users SET token='$token' WHERE email='$email'");

$upi=$dbc->prepare("UPDATE users SET token= ? WHERE email= ?");
$upi->bind_param("is", $token, $email);
$upi->execute();
$upi->close();

require_once "../lib/mail/forgot_password.php";
		require '../lib/phpmailer/PHPMailerAutoload.php';
		if($eset['status']==1){
			$mail = new PHPMailer(true);                             // Passing `true` enables exceptions
			$mail->SMTPDebug = 0;                                
			$mail->isSMTP();                                      
			$mail->Host = $eset['hoste'];; 
			$mail->SMTPAuth = true;                        
			$mail->Username = $eset['username'];                 
			$mail->Password = $eset['password'];                          
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = $eset['porte'];                                    
			$mail->setFrom($eset['frome'], $set['site_name']);
			$mail->addAddress($email, $set['site_name']);          
			$mail->addReplyTo($eset['reply_to'], $set['site_name']);
			$mail->isHTML(true);                                 
			$mail->Subject = "Password Recovery";
			$mail->Body=$email_content;
			$mail->AltBody = $set['site_name'];
			if($mail->send()){
				$_SESSION['bitcrow_forgoterror']='success';
			}else{
				$_SESSION['bitcrow_forgoterror']='eruptx';
			}			
		}else{
			$_SESSION['bitcrow_forgoterror']='eruptx';
		}
	}else{
		$_SESSION['bitcrow_forgoterror']='invaliddetails';
	}
	redirect($url."/forgot");
}