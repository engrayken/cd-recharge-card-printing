<?php
$func=$_GET['id'];
if($func=='login'){
	admin_login();
}elseif($func=='social'){
	admin_social();
}elseif($func=='about'){
	admin_about();
}else if($func=='doffer'){
	$del=$_GET['del'];
	admin_doffer($del);
}elseif($func=='currency'){
	admin_currency();
}elseif($func=='member'){
	admin_member();
}elseif($func=='wmethods'){
	admin_wmethods();
}elseif($func=='hash'){
	admin_hash();
}elseif($func=='coin'){
	admin_coin();
}elseif($func=='article'){
	admin_article();
}elseif($func=='blogimg'){
	admin_blogimg();
}else if($func=='userimg'){
	user_img();
}elseif($func=='category'){
	admin_category();
}elseif($func=='page'){
	admin_page();
}elseif($func=='faq'){
	admin_faq();
}elseif($func=='dfaq'){
	$id=$_GET['stat'];
	admin_dfaq($id);
}elseif($func=='buser'){
	$id=$_GET['stat'];
	admin_buser($id);
}elseif($func=='akyc'){
	$id=$_GET['stat'];
	admin_akyc($id);
}elseif($func=='rkyc'){
	$id=$_GET['stat'];
	admin_rkyc($id);
}elseif($func=='aadd'){
	$id=$_GET['stat'];
	admin_aadd($id);
}elseif($func=='radd'){
	$id=$_GET['stat'];
	admin_radd($id);
}elseif($func=='duser'){
	$id=$_GET['stat'];
	admin_duser($id);
}elseif($func=='ubuser'){
	$id=$_GET['stat'];
	admin_ubuser($id);
}elseif($func=='vuser'){
	$id=$_GET['stat'];
	admin_vuser($id);
}elseif($func=='dplan'){
	$id=$_GET['stat'];
	admin_dplan($id);
}elseif($func=='rticket'){
	admin_rticket();
}elseif($func=='dcplan'){
	$id=$_GET['stat'];
	admin_dcplan($id);
}elseif($func=='aplan'){
	$id=$_GET['stat'];
	admin_aplan($id);
}elseif($func=='areview'){
	$id=$_GET['stat'];
	admin_areview($id);
}elseif($func=='upreview'){
	$id=$_GET['stat'];
	admin_upreview($id);
}elseif($func=='dreview'){
	$id=$_GET['stat'];
	admin_dreview($id);
}elseif($func=='mining'){
	$id=$_GET['stat'];
	admin_mining($id);
}elseif($func=='endtrade'){
	$id=$_GET['stat'];
	admin_endtrade($id);
}elseif($func=='dcurrency'){
	$id=$_GET['stat'];
	admin_dcurrency($id);
}elseif($func=='dmem'){
	$id=$_GET['stat'];
	admin_dmem($id);
}elseif($func=='dcoin'){
	$id=$_GET['stat'];
	admin_dcoin($id);
}elseif($func=='dhash'){
	$id=$_GET['stat'];
	admin_dhash($id);
}elseif($func=='defaultcur'){
	$id=$_GET['stat'];
	admin_defaultcur($id);
}elseif($func=='dpage'){
	$id=$_GET['stat'];
	admin_dpage($id);
}elseif($func=='unpage'){
	$id=$_GET['stat'];
	admin_unpage($id);
}elseif($func=='ppage'){
	$id=$_GET['stat'];
	admin_ppage($id);
}elseif($func=='unarticle'){
	$id=$_GET['stat'];
	admin_unarticle($id);
}elseif($func=='particle'){
	$id=$_GET['stat'];
	admin_particle($id);
}elseif($func=='darticle'){
	$id=$_GET['stat'];
	admin_darticle($id);
}elseif($func=='unmethod'){
	$id=$_GET['stat'];
	admin_unmethod($id);
}elseif($func=='pmethod'){
	$id=$_GET['stat'];
	admin_pmethod($id);
}elseif($func=='dmethod'){
	$id=$_GET['stat'];
	admin_dmethod($id);
}elseif($func=='dcategory'){
	$id=$_GET['stat'];
	admin_dcategory($id);
}elseif($func=='editfaq'){
	$id=$_GET['stat'];
	admin_editfaq($id);
}elseif($func=='editfaq'){
	$id=$_GET['stat'];
	admin_editfaq($id);
}elseif($func=='sendemail'){
	admin_sendemail();
}elseif($func=='sendpemail'){
	admin_sendpemail();
}elseif($func=='editpage'){
	$id=$_GET['stat'];
	admin_editpage($id);
}elseif($func=='upwallet'){
	$id=$_GET['stat'];
	admin_upwallet($id);
}elseif($func=='topup'){
	$id=$_GET['stat'];
	admin_topup($id);
}elseif($func=='editcat'){
	$id=$_GET['stat'];
	admin_editcat($id);
}elseif($func=='editar'){
	$id=$_GET['stat'];
	admin_editar($id);
}elseif($func=='editplan'){
	$id=$_GET['stat'];
	admin_editplan($id);
}elseif($func=='logout'){
	admin_logout();
}elseif($func=='esettings'){
	admin_eset();
}elseif($func=='security'){
	admin_security();
}elseif($func=='settings'){
	admin_settings();
}elseif($func=='gateways'){
	admin_gateways();
}elseif($func=='adminimg'){
	admin_img();
}elseif($func=='appcashdp'){
	$id=$_GET['stat'];
	admin_appcashdeposit($id);
}elseif($func=='appbitdp'){
	$id=$_GET['stat'];
	admin_appbitdeposit($id);
}elseif($func=='delcashdp'){
	$id=$_GET['stat'];
	admin_delcashdeposit($id);
}elseif($func=='delbitdp'){
	$id=$_GET['stat'];
	admin_delbitdeposit($id);
}elseif($func=='closeticket'){
	$id=$_GET['stat'];
	admin_closeticket($id);
}elseif($func=='dmessage'){
	$id=$_GET['stat'];
	admin_dmessage($id);
}elseif($func=='delsubscriber'){
	$id=$_GET['stat'];
	$page=$_GET['page'];
	admin_delsubscriber($id, $page);
}elseif($func=='amem'){
	$id=$_GET['stat'];
	$page=$_GET['page'];
	admin_amem($id, $page);
}elseif($func=='delticket'){
	$id=$_GET['stat'];
	admin_delticket($id);
}elseif($func=='cashpay'){
	$id=$_GET['stat'];
	admin_cashpay($id);
}elseif($func=='bitpay'){
	$id=$_GET['stat'];
	admin_bitpay($id);
}else if($func=='profile'){
	user_profile();
}else if($func=='delete_mtrading'){
	$del=$_GET['del'];
	user_deletetrading($del);
}elseif($func=='product'){
	admin_product();
}






function user_img(){
	require_once("config.php");
	$allowedExts = array("jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if((($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 1000000) && in_array($extension, $allowedExts)){
	if($_FILES["file"]["error"]>0){echo "<script>window.location.href='".$url."/admin/security/0';</script>";}else{
	$cast=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM admin WHERE id='1'"));
	$image='../asset/profile/'.$cast['image_link'];
	if(!empty($cast['image_link'])){unlink($image);}
	$newfilename = round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($_FILES["file"]["tmp_name"], "../asset/profile/" . $newfilename);
	$up=mysqli_query($dbc, "UPDATE admin SET image_link='$newfilename' WHERE id=1");
	if($up){echo "<script>window.location.href='".$url."/admin/security/0';</script>";}}}
	else{echo "<script>window.location.href='".$url."/admin/security/0';</script>";}
}
function user_deletetrading($del){
	require_once("config.php");
	$dr=$del;
	$result=mysqli_query($dbc,"DELETE FROM profits WHERE id = '$dr'"); 
	echo"<script>window.location.href='".$url."/admin/trading';</script>";
}
function user_profile(){
	require_once("config.php");
	session_start();
	$user_id=mysqli_real_escape_string($dbc, trim($_POST['user_id']));
	$name=mysqli_real_escape_string($dbc, trim($_POST['name']));
	$username=mysqli_real_escape_string($dbc, trim($_POST['username']));
	$mobile=mysqli_real_escape_string($dbc, trim($_POST['mobile']));
	$dep_bal=mysqli_real_escape_string($dbc, trim($_POST['dep_bal']));
	$bit_bal=mysqli_real_escape_string($dbc, trim($_POST['bit_bal']));
	$castro=mysqli_query($dbc,"UPDATE users SET username='$username',name='$name',phonenumber='$mobile', dep_balance='$dep_bal', bit_balance='$bit_bal' WHERE id ='$user_id'");
	if($castro){
		$_SESSION['admin_user_update']='success';
		redirect($url."/admin/manage_users/".$user_id);
	}else{
		$_SESSION['admin_user_update']='error';
		redirect($url."/admin/manage_users/".$user_id);
	}
}
function admin_blogimg(){
	require_once("config.php");
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 2000000) && in_array($extension, $allowedExts)){
	$id=mysqli_real_escape_string($dbc, trim($_POST["id"]));
	$cast=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM trending WHERE id='$id' LIMIT 1"));
	$image='../asset/thumbnails/'.$cast['thumbnails'];
	unlink($image);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($_FILES["file"]["tmp_name"], "../asset/thumbnails/" . $newfilename);
	mysqli_query($dbc, "UPDATE trending SET thumbnails='$newfilename' WHERE id='$id'");
	}echo "<script>window.location.href='".$url."/admin/check_article/".$id."';</script>";
}
function admin_article(){
	require_once("config.php");
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 2000000) && in_array($extension, $allowedExts)){
	$editor=mysqli_real_escape_string($dbc, trim($_POST["editor"]));
	$title=mysqli_real_escape_string($dbc, trim($_POST["title"]));
	$cat=mysqli_real_escape_string($dbc, trim($_POST["category"]));
	$newfilename = round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($_FILES["file"]["tmp_name"], "../asset/thumbnails/" . $newfilename);
	mysqli_query($dbc, "INSERT INTO trending VALUES('0','0','$title','$editor', '$newfilename','$cat','0','0','$datetime')");
	}echo "<script>window.location.href='".$url."/admin/ar';</script>";
}
function admin_category(){
	require_once("config.php");
	$cat=$_POST['cat'];
	mysqli_query($dbc, "INSERT INTO trending_cat VALUES('0', '$cat')");
	echo "<script>window.location.href='".$url."/admin/category';</script>";
}
function admin_page(){
	require_once("config.php");
	$title=mysqli_real_escape_string($dbc, trim($_POST['title']));
	$content=mysqli_real_escape_string($dbc, trim($_POST['content']));
	mysqli_query($dbc, "INSERT INTO pages VALUES('0', '$title','$content', 1, '$datetime', '$datetime')");
	echo "<script>window.location.href='".$url."/admin/pages';</script>";
}
function admin_wmethods(){
	require_once("config.php");
	$method=$_POST['method'];
	$scan=mysqli_query($dbc, "SELECT * FROM withdrawm WHERE method='$method'");
	if(mysqli_num_rows($scan)==1){
		echo"<script>alert('already added');</script>";
	}else{
		mysqli_query($dbc, "INSERT INTO withdrawm VALUES(0, '$method', '1')");
	}
	echo "<script>window.location.href='".$url."/admin/wmethods';</script>";
}
function admin_currency(){
	require_once("config.php");
	$currency=$_POST['currency'];
	$scan=mysqli_query($dbc, "SELECT * FROM currency WHERE currency='$currency'");
	if(mysqli_num_rows($scan)==1){
		echo"<script>alert('already added');</script>";
	}else{
		mysqli_query($dbc, "INSERT INTO currency VALUES(0, '$currency', '0')");
	}
	echo "<script>window.location.href='".$url."/admin/currency';</script>";
}
function admin_member(){
	require_once("config.php");
	$name=$_POST['name'];
	$amount=$_POST['amount'];
	mysqli_query($dbc, "INSERT INTO membership VALUES(0, '$name', '$amount', '0')");
	echo "<script>window.location.href='".$url."/admin/members';</script>";
}
function admin_hash(){
	require_once("config.php");
	$hash=$_POST['hash'];
	if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM hashrate WHERE hash='$hash'"))==1){
	echo"<script>alert('already added');</script>";
	}else{
	mysqli_query($dbc, "INSERT INTO hashrate VALUES(0, '$hash')");
	}
	echo "<script>window.location.href='".$url."/admin/hashpower';</script>";
}
function admin_plan(){
	require_once("config.php");
	$plan_name=mysqli_real_escape_string($dbc, trim($_POST['plan_name']));
	$percent=mysqli_real_escape_string($dbc, trim($_POST['percent']));
	$duration=mysqli_real_escape_string($dbc, trim($_POST['plan_duration']));
	$period=mysqli_real_escape_string($dbc, trim($_POST['period']));
	$max_deposit=mysqli_real_escape_string($dbc, trim($_POST['max_deposit']));
	$min_deposit=mysqli_real_escape_string($dbc, trim($_POST['min_deposit']));
	$min_withdraw=mysqli_real_escape_string($dbc, trim($_POST['min_withdraw']));
	$ref_percent=mysqli_real_escape_string($dbc, trim($_POST['ref_percent']));
	$profit=mysqli_real_escape_string($dbc, trim($_POST['profit']));
	$color=mysqli_real_escape_string($dbc, trim($_POST['color']));
	mysqli_query($dbc, "INSERT INTO plan VALUES('0','$plan_name','$percent','$duration','$period','$min_deposit','$max_deposit','$profit','$min_withdraw','1','$ref_percent','$color')");
	echo "<script>window.location.href='".$url."/admin/plans';</script>";
}
function admin_coin(){
	require_once("config.php");
	$name=mysqli_real_escape_string($dbc, trim($_POST['name']));
	$code=mysqli_real_escape_string($dbc, trim($_POST['code']));
	$wallet=mysqli_real_escape_string($dbc, trim($_POST['wallet']));
	mysqli_query($dbc, "INSERT INTO coins VALUES(0, '$name','$wallet','$code')");
	echo "<script>window.location.href='".$url."/admin/coins';</script>";
}
function admin_about(){
	require_once("config.php");
	$about=$_POST['about'];
	mysqli_query($dbc, "UPDATE about_site SET about='$about'");
	echo "<script>window.location.href='".$url."/admin/about';</script>";
}
function admin_sendemail(){
	require_once("config.php");
	$email=mysqli_real_escape_string($dbc, trim($_POST['email']));
	$message=mysqli_real_escape_string($dbc, trim($_POST['message']));
	$subject=mysqli_real_escape_string($dbc, trim($_POST['subject']));
	require '../lib/phpmailer/PHPMailerAutoload.php';
	require_once "../lib/mail/user.php";
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
	$mail->addAddress($email, $set['site_name']);          
	$mail->addReplyTo($eset['reply_to'], $set['site_name']);
	$mail->isHTML(true);                               
	$mail->Subject = $subject;
	$mail->Body=$email_content;
	$mail->AltBody = $set['site_name'];
	if ($mail->send()) {
	    echo "<script>alert('Email Sent');</script>";
	} else {
	    echo "<script>alert('Email Not Sent, ensure smtp settings is properly configured');</script>";
	}
	echo "<script>window.location.href='".$url."/admin/users';</script>";
}
function admin_sendpemail(){
	require_once("config.php");
	if($eset['status']==1){
		
		$message=mysqli_real_escape_string($dbc, trim($_POST['message']));
		$subject=mysqli_real_escape_string($dbc, trim($_POST['subject']));
		require '../lib/phpmailer/PHPMailerAutoload.php';
		require_once "../lib/mail/user.php";
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
		foreach ($_POST['email'] as $email) {
		$mail->AddCC($email, $set['site_name']);   
		}       
		$mail->addReplyTo($eset['reply_to'], $set['site_name']);
		$mail->isHTML(true);                               
		$mail->Subject = $subject;
		$mail->Body=$email_content;
		$mail->AltBody = $set['site_name'];
		$mail->send();
		echo "<script>alert('Email Sent');</script>";
	}else{
		echo "<script>alert('Email Not Sent, ensure smtp settings is properly configured');</script>";
	}
	echo "<script>window.location.href='".$url."/admin/promotion_emails';</script>";
}
function admin_editpage($id){
	require_once("config.php");
	$title=mysqli_real_escape_string($dbc, trim($_POST['title']));
	$content=mysqli_real_escape_string($dbc, trim($_POST['content']));
	$castro=mysqli_query($dbc, "UPDATE pages SET title='$title',content='$content',last_updated='$datetime' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/check_page/".$id."';</script>";
}
function admin_topup($id){
	require_once("config.php");
	$amount=mysqli_real_escape_string($dbc, trim($_POST['amount']));
	mysqli_query($dbc, "UPDATE profits SET profit='$amount' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/trading';</script>";
}
function admin_upwallet($id){
	require_once("config.php");
	$name=mysqli_real_escape_string($dbc, trim($_POST['name']));
	$wallet=mysqli_real_escape_string($dbc, trim($_POST['wallet']));
	$code=mysqli_real_escape_string($dbc, trim($_POST['code']));
	mysqli_query($dbc, "UPDATE coins SET name='$name',short_code='$code',wallet='$wallet' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/up_wallet/".$id."';</script>";
}
function admin_editcat($id){
	require_once("config.php");
	$cat=$_POST['cat'];
	mysqli_query($dbc, "UPDATE trending_cat SET categories='$cat' WHERE id='$id'");	
	echo "<script>window.location.href='".$url."/admin/check_category/".$id."';</script>";
}
function admin_editplan($id){
	require_once("config.php");
	$plan_name=mysqli_real_escape_string($dbc, trim($_POST['plan_name']));
	$percent=mysqli_real_escape_string($dbc, trim($_POST['percent']));
	$duration=mysqli_real_escape_string($dbc, trim($_POST['plan_duration']));
	$period=mysqli_real_escape_string($dbc, trim($_POST['period']));
	$max_deposit=mysqli_real_escape_string($dbc, trim($_POST['max_deposit']));
	$min_deposit=mysqli_real_escape_string($dbc, trim($_POST['min_deposit']));
	$min_withdraw=mysqli_real_escape_string($dbc, trim($_POST['min_withdraw']));
	$ref_percent=mysqli_real_escape_string($dbc, trim($_POST['ref_percent']));
	$profit=mysqli_real_escape_string($dbc, trim($_POST['profit']));
	$color=mysqli_real_escape_string($dbc, trim($_POST['color']));
	mysqli_query($dbc, "UPDATE plan SET name='$plan_name',min_withdraw='$min_withdraw',duration='$duration',period='$period',percent='$percent',min_deposit='$min_deposit',amount='$max_deposit',ref_percent='$ref_percent',bg_color='$color',profit='$profit' WHERE id='$id'");	
	echo "<script>window.location.href='".$url."/admin/check_plan/".$id."';</script>";
}function admin_editar($id){
	require_once("config.php");
	$title=mysqli_real_escape_string($dbc, trim($_POST['title']));
	$content=mysqli_real_escape_string($dbc, trim($_POST['content']));
	$date=mysqli_real_escape_string($dbc, trim($_POST['date']));
	$cat=mysqli_real_escape_string($dbc, trim($_POST['category']));
	mysqli_query($dbc, "UPDATE trending SET title='$title',content='$content',date='$date',cat_id='$cat' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/check_article/".$id."';</script>";
}
function admin_editfaq($id){
	require_once("config.php");
	$question=mysqli_real_escape_string($dbc, trim($_POST['question']));
	$answer=mysqli_real_escape_string($dbc, trim($_POST['answer']));
	$testy1="UPDATE faq SET question='$question', answer='$answer' WHERE id='$id'";
	$testy2=mysqli_query($dbc, $testy1);
	echo "<script>window.location.href='".$url."/admin/check_faq/".$id."';</script>";
}
function admin_faq(){
	require_once("config.php");
	$question=mysqli_real_escape_string($dbc, trim($_POST['question']));
	$answer=mysqli_real_escape_string($dbc, trim($_POST['answer']));
	$testy1="INSERT INTO faq VALUES(0, '$question', '$answer')";
	$testy2=mysqli_query($dbc, $testy1);
	echo "<script>window.location.href='".$url."/admin/faq';</script>";
}
function admin_img(){
	require_once("config.php");
	$allowedExts = array("jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if((($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 1000000) && in_array($extension, $allowedExts)){
	if($_FILES["file"]["error"]>0){echo "<script>window.location.href='".$url."/admin/settings';</script>";}else{
	$cast=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM logo LIMIT 1"));
	$image='../asset/'.$cast['image_link'];
	unlink($image);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($_FILES["file"]["tmp_name"], "../asset/images/" . $newfilename);
	$image2='images/'.$newfilename;
	$up=mysqli_query($dbc, "UPDATE logo SET  image_link='".$image2."' WHERE id=1");
	if($up){echo "<script>window.location.href='".$url."/admin/settings';</script>";}}}
	else{echo "<script>window.location.href='".$url."/admin/settings';</script>";}
}
function admin_logout(){
	session_start();
	unset($_SESSION['bitcrow_admin']);
	unset($_SESSION['bitcrow_adminlogin']);
	unset($_SESSION['bitcrow_adminpass']);
	echo"<script language='javascript'>document.location='../../admin';</script>";
}
function admin_eset(){
	require_once("config.php");
	$host=mysqli_real_escape_string($dbc, trim($_POST['host']));
	$username=mysqli_real_escape_string($dbc, trim($_POST['username']));
	$password=mysqli_real_escape_string($dbc, trim($_POST['password']));
	$from=mysqli_real_escape_string($dbc, trim($_POST['from']));
	$reply_to=mysqli_real_escape_string($dbc, trim($_POST['reply_to']));
	$port=mysqli_real_escape_string($dbc, trim($_POST['port']));
	if(empty($_POST['estat'])){
	$estat=0;	
	}else{
	$estat=$_POST['estat'];
	}
	$update="UPDATE eset SET hoste='$host',username='$username',password='$password',frome='$from',reply_to='$reply_to',porte='$port',status='$estat'";
	mysqli_query($dbc, $update);
	echo "<script>window.location.href='".$url."/admin/email_settings';</script>";
}
function admin_gateways(){
	require_once("config.php");
	$id=mysqli_real_escape_string($dbc, trim($_POST['id']));
	$name=mysqli_real_escape_string($dbc, trim($_POST['name']));
	$rate=mysqli_real_escape_string($dbc, trim($_POST['rate']));
	$minamo=mysqli_real_escape_string($dbc, trim($_POST['minamo']));
	$maxamo=mysqli_real_escape_string($dbc, trim($_POST['maxamo']));
	$chargefx=mysqli_real_escape_string($dbc, trim($_POST['chargefx']));
	$chargepc=mysqli_real_escape_string($dbc, trim($_POST['chargepc']));
	$val1=mysqli_real_escape_string($dbc, trim($_POST['val1']));
	$val2=mysqli_real_escape_string($dbc, trim($_POST['val2']));
	$status=mysqli_real_escape_string($dbc, trim($_POST['status']));

	$update="UPDATE gateways SET name='$name',rate='$rate',minamo='$minamo',maxamo='$maxamo',fixed_charge='$chargefx',percent_charge='$chargepc',val1='$val1',val2='$val2',status='$status' WHERE id='$id'";
	mysqli_query($dbc, $update);
	echo "<script>window.location.href='".$url."/admin/payment_gateway';</script>";
}
function admin_settings(){
	require_once("config.php");
	$title=mysqli_real_escape_string($dbc, trim($_POST['title']));
	$site_name=mysqli_real_escape_string($dbc, trim($_POST['site_name']));
	$site_desc=mysqli_real_escape_string($dbc, trim($_POST['site_desc']));
	$tawk_id=mysqli_real_escape_string($dbc, trim($_POST['tawk_id']));
	$email=mysqli_real_escape_string($dbc, trim($_POST['email']));
	$mobile=mysqli_real_escape_string($dbc, trim($_POST['mobile']));
	$address=mysqli_real_escape_string($dbc, trim($_POST['address']));
	$escrow_fee=mysqli_real_escape_string($dbc, trim($_POST['escrow_fee']));
	$bit_wallet=mysqli_real_escape_string($dbc, trim($_POST['bit_wallet']));
	$bit_wfee=mysqli_real_escape_string($dbc, trim($_POST['bit_wfee']));
	$cash_wfee=mysqli_real_escape_string($dbc, trim($_POST['cash_wfee']));
	$bal=mysqli_real_escape_string($dbc, trim($_POST['bal']));
	$bank_fee=mysqli_real_escape_string($dbc, trim($_POST['bank_fee']));
	if(empty($_POST['email_activation'])){
	$email_activation=0;	
	}else{
		$email_activation=mysqli_real_escape_string($dbc, trim($_POST['email_activation']));
	}
	if(empty($_POST['bank_withdraw'])){
	$bank_withdraw=0;	
	}else{
		$bank_withdraw=mysqli_real_escape_string($dbc, trim($_POST['bank_withdraw']));
	}

	$update="UPDATE settings SET title='$title',site_name='$site_name',site_desc='$site_desc',tawk_id='$tawk_id',email='$email',mobile='$mobile',address='$address',escrow_fee='$escrow_fee',bit_wallet='$bit_wallet',balance_reg='$bal',bank_fee='$bank_fee',email_activation='$email_activation',bank_withdraw='$bank_withdraw',cash_wfee='$cash_wfee',bit_wfee='$bit_wfee'";
	mysqli_query($dbc, $update);
	echo "<script>window.location.href='".$url."/admin/settings';</script>";
}
function admin_security(){
	require_once("config.php");
	$username=mysqli_real_escape_string($dbc, trim($_POST['username']));
	$pass=mysqli_real_escape_string($dbc, trim($_POST['password']));
	$password=password_hash($pass, PASSWORD_DEFAULT);
	if(mysqli_query($dbc, "UPDATE admin SET username='$username', password='$password',last_change='$datetime'")){
	echo "<script>window.location.href='".$url."/admin/security/1';</script>";}
	else{
	echo "<script>window.location.href='".$url."/admin/security/2';</script>";}
}
function admin_dmessage($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM contact WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/messages/';</script>";
}
function admin_amem($id, $page){
	require_once("config.php");
	$user_id =$page;
	mysqli_query($dbc, "DELETE FROM usr_member WHERE id != '$id' AND user_id='$user_id'"); 	
	mysqli_query($dbc, "UPDATE usr_member SET status='1' WHERE id = '$id'");
	echo "<script>window.location.href='".$url."/admin/members';</script>";
}
function admin_delsubscriber($id, $page){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM suscribers WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/subscribers/".$page."';</script>";
}
function admin_cashpay($id){
	require_once("config.php");
	$ad= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM w_history WHERE id ='$id' LIMIT 1" ));
	$user=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$ad['user_id']."'"));
	//mysqli_query($dbc, "UPDATE users SET profit='$a' WHERE id='".$ad['user_id']."'");
	mysqli_query($dbc, "UPDATE w_history SET status='1' WHERE id='$id'");
	session_start();
	if($eset['status']==1){
		require '../lib/phpmailer/PHPMailerAutoload.php';
		require_once "../lib/mail/cashwithdraw_ver.php";
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
		$mail->isHTML(true);
		$mail->Subject ='Withdrawal Approved.';
		$mail->Body=$email_content;
		$mail->AltBody = $set['site_name'];
		if($mail->send()){
		redirect($url."/admin/withdraw_cash/");
		}else{
			$_SESSION['bitcrow_smtpdown']='true';
			redirect($url."/admin/withdraw_cash/");
		}
	}
	redirect($url."/admin/withdraw_cash/");
}
function admin_bitpay($id){
	require_once("config.php");
	$ad= mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM withdraw WHERE id ='$id' LIMIT 1" ));
	$user=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$ad['user_id']."'"));
	mysqli_query($dbc, "UPDATE withdraw SET status='1' WHERE id='$id'");
	session_start();
	if($eset['status']==1){
		require '../lib/phpmailer/PHPMailerAutoload.php';
		require_once "../lib/mail/bitwithdraw_ver.php";
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
		$mail->isHTML(true);
		$mail->Subject ='Withdrawal Approved.';
		$mail->Body=$email_content;
		$mail->AltBody = $set['site_name'];
		if($mail->send()){
		redirect($url."/admin/withdraw_bitcoin/");
		}else{
			$_SESSION['bitcrow_smtpdown']='true';
			redirect($url."/admin/withdraw_bitcoin/");
		}
	}
	redirect($url."/admin/withdraw_bitcoin/");
}
function admin_delticket($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM support WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/ticket/';</script>";
}
function admin_closeticket($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE support SET status=1 WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/ticket/';</script>";
}
function admin_delcashdeposit($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM deposits WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/cash_deposit';</script>";
}
function admin_delbitdeposit($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM deposit WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/bitcoin_deposit';</script>";
}
function admin_dcategory($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM trending_cat WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/category';</script>";
}
function admin_vuser($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE users SET active='1' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/user';</script>";
}
function admin_akyc($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE users SET kyc_status='1' WHERE id ='$id'");
	echo "<script>window.location.href='".$url."/admin/manage_users/".$id."';</script>";
}function admin_rkyc($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE users SET kyc_link='',kyc_status='0' WHERE id ='$id'");
	echo "<script>window.location.href='".$url."/admin/manage_users/".$id."';</script>";
}function admin_aadd($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE users SET add_status='1' WHERE id ='$id'");
	echo "<script>window.location.href='".$url."/admin/manage_users/".$id."';</script>";
}function admin_radd($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE users SET add_link='',add_status='0' WHERE id ='$id'");
	echo "<script>window.location.href='".$url."/admin/manage_users/".$id."';</script>";
}function admin_buser($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE users SET status='1' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/manage_users/".$id."';</script>";
}
function admin_duser($id){
	require_once("config.php");
	$cast=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id ='$id'"));
	$image='../asset/profile/'.$cast['image_link'];
	unlink($image);
	mysqli_query($dbc, "DELETE FROM users WHERE id = '$id'"); 
	mysqli_query($dbc, "DELETE FROM review WHERE user_id = '$id'"); 
	mysqli_query($dbc, "DELETE FROM profits WHERE user_id = '$id'"); 
	mysqli_query($dbc, "DELETE FROM deposits WHERE user_id = '$id'"); 
	mysqli_query($dbc, "DELETE FROM withdraw WHERE user_id = '$id'"); 
	mysqli_query($dbc, "DELETE FROM support WHERE user_id = '$id'"); 
	mysqli_query($dbc, "DELETE FROM wallet_address WHERE user_id='$id'");
	mysqli_query($dbc, "DELETE FROM w_history WHERE user_id='$id'");
	echo "<script>window.location.href='".$url."/admin/users';</script>";
}
function admin_ubuser($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE users SET status='0' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/manage_users/".$id."';</script>";
}
function admin_dfaq($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM faq WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/faq';</script>";
}
function admin_dreview($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM review WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/reviews';</script>";
}
function admin_aplan($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE plan SET status='1' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/plans';</script>";
}
function admin_areview($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE review SET status='1' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/reviews';</script>";
}function admin_upreview($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE review SET status='0' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/reviews';</script>";
}
function admin_dplan($id){
	require_once("config.php");
	if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM profits WHERE plan_id='$id'"))>0){
		echo "<script>alert('users have already bought this plan, deleting it will create an error in the system.');</script>";
	}else{
		mysqli_query($dbc, "DELETE FROM plan WHERE id='$id'");
	}
	echo "<script>window.location.href='".$url."/admin/plans';</script>";
}
function admin_dcplan($id){
	require_once("config.php");
	if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM profits WHERE plan_id='$id'"))>0){
		echo "<script>alert('users have already bought this plan, deactivating plan it will create an error in the system.');</script>";
	}else{
		mysqli_query($dbc, "UPDATE plan SET status='0' WHERE id='$id'");
	}
	echo "<script>window.location.href='".$url."/admin/plans';</script>";
}
function admin_endtrade($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE profits SET status='1' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/trading';</script>";
}
function admin_mining($id){
	require_once("config.php");
	$view=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM profits WHERE id='$id'"));
	$user=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$view['user_id']."'"));
	$plan=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM plan WHERE id='".$view['plan_id']."'"));
	$coin=$plan['coin_id'];
	$user_id=$view['user_id'];
	$duration=$plan['duration'].' '.$plan['period'];
	$amount=$plan['price'];
	$a=$user['balance']-$amount;
	mysqli_query($dbc, "UPDATE users SET balance='$a' WHERE id='".$view['user_id']."'");
	mysqli_query($dbc, "UPDATE profits SET date='$datetime', status='1' WHERE id='$id'");
	if (mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM balance WHERE coin_id='$coin' AND user_id='$user_id'"))==0){
		mysqli_query($dbc, "INSERT INTO balance VALUES('0','$user_id','$coin','0','$datetime')");
	}
	if ($set['referral']==1){
		if (mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM referral WHERE user_id='".$user_id."'"))>0) {
			$ref_amount=($amount*$row['ref_percent'])/100;
			$ref_u=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM referral WHERE user_id='".$user_id."'"));
			$user_update=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM balance WHERE coin_id='$coin' AND user_id='".$ref_u['ref_id']."'"));
			if (mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM balance WHERE coin_id='$coin' AND user_id='".$ref_u['ref_id']."'"))==0) {
				mysqli_query($dbc, "INSERT INTO balance VALUES('0','".$ref_u['ref_id']."','$coin_id','$ref_amount','$datetime')");
			}else{
				$b=$user_update['amount']+$ref_amount;
				mysqli_query($dbc,"UPDATE balance SET amount='$b' WHERE id='".$user_update['id']."'");
			}
			mysqli_query($dbc,"INSERT INTO transfers VALUES('0', '$ref_amount', '$user_id', '".$ref_u['ref_id']."', '2', '$datetime')");
		}
	}
	if($eset['status']==1){
		require '../lib/phpmailer/PHPMailerAutoload.php';
		require_once "../lib/mail/plan_ap.php";
		$mail = new PHPMailer(true);                            
		$mail->SMTPDebug = 0;                                
		$mail->isSMTP();                                      
		$mail->Host = $eset['hoste'];; 
		$mail->SMTPAuth = true;                        
		$mail->Username = $eset['username'];                 
		$mail->Password = $eset['password'];                          
		$mail->SMTPSecure = 'ssl';                            
		$mail->setFrom($eset['frome'], $set['site_name']);
		$mail->addAddress($user['email'], $set['site_name']);          
		$mail->addReplyTo($eset['reply_to'], $set['site_name']);
		$mail->isHTML(true);                                
		$mail->Subject ='Plan has been Approved';
		$mail->Body=$email_content;
		$mail->AltBody = $set['site_name'];
		if($mail->send()){
			echo "<script>alert('Operation successful');</script>";
			echo "<script>window.location.href='".$url."/admin/mining';</script>";
		}else{
			echo "<script>window.location.href='".$url."/admin/mining';</script>";
		}
	}
	echo "<script>window.location.href='".$url."/admin/mining';</script>";
}
function admin_defaultcur($id){
	require_once("config.php");
	$scan=mysqli_query($dbc, "SELECT * FROM currency WHERE d_value='1'");
	if(mysqli_num_rows($scan)==1){
		$row=mysqli_fetch_array($scan);
		mysqli_query($dbc, "UPDATE currency SET d_value='0' WHERE id='".$row['id']."'");
	}
	mysqli_query($dbc, "UPDATE currency SET d_value='1' WHERE id = '$id'"); 
	echo "<script>window.location.href='".$url."/admin/currency';</script>";
}
function admin_dcurrency($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM currency WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/currency';</script>";
}
function admin_dmem($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM membership WHERE id = '$id'");
	echo "<script>window.location.href='".$url."/admin/members';</script>";
}
function admin_dcoin($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM coins WHERE id='$id'");
	mysqli_query($dbc, "DELETE FROM wallet_address WHERE coin_id='$id'");
	echo "<script>window.location.href='".$url."/admin/coins';</script>";
}
function admin_dhash($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM hashrate WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/hashpower';</script>";
}
function admin_dpage($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM pages WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/pages';</script>";
}
function admin_unpage($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE pages SET status='0', last_updated='$datetime' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/pages';</script>";
}
function admin_ppage($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE pages SET status='1', last_updated='$datetime' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/pages';</script>";
}
function admin_unarticle($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE trending SET status='0' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/ar';</script>";
}
function admin_particle($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE trending SET status='1' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/ar';</script>";
}
function admin_darticle($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM trending WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/ar/';</script>";
}
function admin_unmethod($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE withdrawm SET status='0' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/wmethods';</script>";
}
function admin_pmethod($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE withdrawm SET status='1' WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/wmethods';</script>";
}
function admin_dmethod($id){
	require_once("config.php");
	mysqli_query($dbc, "DELETE FROM withdrawm WHERE id='$id'");
	echo "<script>window.location.href='".$url."/admin/wmethods';</script>";
}
function admin_rticket(){
	require_once("config.php");
	$reply=mysqli_real_escape_string($dbc, trim($_POST['reply']));
	$id=mysqli_real_escape_string($dbc, trim($_POST['ticket_id']));
	mysqli_query($dbc, "INSERT INTO reply_support VALUES('0','$id','$reply','$datetime','0')");
	echo "<script>window.location.href='".$url."/admin/check_ticket/".$id."';</script>";
}
function admin_appcashdeposit($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE transaction SET status='1' WHERE id='$id'");
	//$row=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposits WHERE id='$id'"));
	//$bal=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$row['user_id']."'"));
	//$sumbal=$bal['dep_balance']+$row['amount'];
	//mysqli_query($dbc, "UPDATE users SET dep_balance='$sumbal' WHERE id='".$bal['id']."'");
	//session_start();
	/*if($eset['status']==1){
		require '../lib/phpmailer/PHPMailerAutoload.php';
		require_once "../lib/mail/cashdeposit_ver.php";
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
		$mail->addAddress($bal['email'], $set['site_name']);          
		$mail->addReplyTo($eset['reply_to'], $set['site_name']);
		$mail->isHTML(true);          
		$mail->Subject ='Confirmation of payment';
		$mail->Body=$email_content;
		$mail->AltBody = $set['site_name'];
		if($mail->send()){
		redirect($url."/admin/dcash_deposit");
		}else{
			$_SESSION['bitcrow_smtpdown']='true';
			redirect($url."/admin/cash_deposit");
		}
	} */
	redirect($url."/admin/approve_transaction");
}
function admin_appbitdeposit($id){
	require_once("config.php");
	mysqli_query($dbc, "UPDATE deposit SET status='1' WHERE id='$id'");
	$row=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM deposit WHERE id='$id'"));
	$bal=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id='".$row['user_id']."'"));
	$sumbal=$bal['bit_balance']+$row['amount'];
	mysqli_query($dbc, "UPDATE users SET bit_balance='$sumbal' WHERE id='".$bal['id']."'");
	session_start();
	if($eset['status']==1){
		require '../lib/phpmailer/PHPMailerAutoload.php';
		require_once "../lib/mail/bitdeposit_ver.php";
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
		$mail->addAddress($bal['email'], $set['site_name']);          
		$mail->addReplyTo($eset['reply_to'], $set['site_name']);
		$mail->isHTML(true);          
		$mail->Subject ='Confirmation of payment';
		$mail->Body=$email_content;
		$mail->AltBody = $set['site_name'];
		if($mail->send()){
		redirect($url."/admin/bitcoin_deposit");
		}else{
			$_SESSION['bitcrow_smtpdown']='true';
			redirect($url."/admin/bitcoin_deposit");
		}
	}
	redirect($url."/admin/bit_deposit");
}
function admin_social(){
	require_once("config.php");
	$facebook=mysqli_real_escape_string($dbc, trim($_POST['facebook']));
	$instagram=mysqli_real_escape_string($dbc, trim($_POST['instagram']));
	$twitter=mysqli_real_escape_string($dbc, trim($_POST['twitter']));
	$skype=mysqli_real_escape_string($dbc, trim($_POST['skype']));
	$pinterest=mysqli_real_escape_string($dbc, trim($_POST['pinterest']));
	$youtube=mysqli_real_escape_string($dbc, trim($_POST['youtube']));
	mysqli_query($dbc, "UPDATE social_links SET value='$facebook' WHERE id='1'");
	mysqli_query($dbc, "UPDATE social_links SET value='$instagram' WHERE id='2'");
	mysqli_query($dbc, "UPDATE social_links SET value='$twitter' WHERE id='3'");
	mysqli_query($dbc, "UPDATE social_links SET value='$skype' WHERE id='4'");
	mysqli_query($dbc, "UPDATE social_links SET value='$pinterest' WHERE id='5'");
	mysqli_query($dbc, "UPDATE social_links SET value='$youtube' WHERE id='6'");
	echo "<script>window.location.href='".$url."/admin/social';</script>";
}function admin_login(){
	session_start();
	require_once("config.php");
	$row = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM admin WHERE id = '1'"));
	$username=mysqli_real_escape_string($dbc, trim($_POST['username']));
	$pass=mysqli_real_escape_string($dbc, trim($_POST['password']));
	if(password_verify($pass, $row['password'])){
	$num=mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM admin WHERE username='$username'"));
	if($num>0){ 
		$_SESSION['bitcrow_admin']=$row['password'];
		$_SESSION['bitcrow_adminpass']=$row['password'];
		redirect($url."/admin/dashboard"); 
		}else {
			$_SESSION['bitcrow_adminlogin']='invaliddetails';
			redirect($url."/admin");  
		}	
	}else {
		$_SESSION['bitcrow_adminlogin']='invaliddetails';
		redirect($url."/admin");
	}
}
function admin_doffer($del){
	require_once("config.php");
	$dr=$del;
	mysqli_query($dbc,"DELETE FROM profits WHERE id = '$dr'"); 
	echo"<script>window.location.href='".$url."/admin/offers';</script>";
}


function admin_product(){
	require_once("config.php");
$bundle=$_POST['bundle'];

$net=$_POST['net'];

$deno=$_POST['deno'];
if($net=='mtn') {
// for mtn 
$exp = explode('
', $bundle);


		foreach($exp as $item)
		{
$xexp = explode(',', $item);
  $resultc = substr($xexp[0], 0, 16);
  $resultp = substr($xexp[0], 16, 17);


$dial='*555*'.$resultp.'#';

 $sto = mysqli_query($dbc,"INSERT INTO network (net,pin,seria,deno,descr)VALUES('$net','$resultp','$resultc','$deno','$dial');");


	echo "<script>window.location.href='".$url."/admin/product';</script>";
}

}

else if($net=='glo') {
// for glo
$string=str_replace(str_split('\\.:*?"<>=|+-'), ' ', $bundle)."\n";


$ab = array('NGGCVS1' => '','scratch1' => '','create,' => '','end_date' => '','pin' => '','scnum' =>'','SCRPREF' =>'','SUSP_F' =>'','senum' =>'',' '=>'');
$bundles= strtr($string, $ab);

$exp = explode(';', $bundles);

		foreach($exp as $item)
		{
$xexp = explode(',', $item);

$pin=$xexp[2].$xexp[1];

$dial='*123*'.$pin.'#';

 $sto = mysqli_query($dbc,"INSERT INTO network (net,pin,seria,deno,descr)VALUES('$net','$pin','$xexp[3]','$deno','$dial');");


	echo "<script>window.location.href='".$url."/admin/product';</script>";
}


} else {

// for airtel 
$exp = explode('
', $bundle);

		foreach($exp as $item)
		{
$xexp = explode(',', $item);

$dial='*126*'.$xexp[0].'#';

 $sto = mysqli_query($dbc,"INSERT INTO network (net,pin,seria,deno,descr)VALUES('$net','$xexp[0]','$xexp[1]','$deno','$dial');");


	echo "<script>window.location.href='".$url."/admin/product';</script>";
}

}


}