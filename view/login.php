<?php 
require_once("../app/config.php");
session_start();
if(isset($_SESSION['bitcrow_userid']) ){
	redirect($url."/user");
}





$title='Signin';
require_once("include/user_header.php");


$token = round(microtime(true));
$secret_key      = 'fjd3vkenuwhackerKonURefg'.$title;  //change this
 $encrypted_value=$token.$secret_key.time().'cd';

//$token = round(microtime(true));
//$secret_key      = 'hackerKojhtr'.$token.'nURmqwnsc'.$title.'bdoefg';  //change this

$_SESSION['logieeee']=$encrypted_value;

$encrypted_log=password_hash($encrypted_value, PASSWORD_DEFAULT);

$rowlog=1;

$upd=$dbc->prepare("UPDATE godlog SET words= ? WHERE uid= ?"); 
$upd->bind_param("si", $encrypted_log, $rowlog);
$upd->execute();
$upd->close();

?>


<style>
   /* now add css code */
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins',sans-serif;
}
body{
    display: grid;
    place-items: center;
    text-align: center;
    background: #102057;
    height: 100%;

}

/*before*/
body::before{
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#fa9d74,#eb0069);
    clip-path: polygon(30% 10%, 50% 40%, 30% 75%, 10% 40%);
}
/* after*/
body::after{
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#f50202, #1928f5);
    clip-path: circle(20% at 70% 75%);
}
.content{
    width: 330px;
    border-radius: 10px;
    padding: 40px 30px;
    position: relative;
    background: rgba(255,255,255,0.05);
    border-radius: 6px;
    overflow: hidden;
    z-index: 10;
    top: 100px;
    backdrop-filter: blur(15px);
    border-top: 1px solid rgba(255,255,255,0.2);
    border-left: 1px solid rgba(255,255,255,0.2);
    box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
}
.content .text{
    font-size: 33px;
    font-weight: 600;
    margin-bottom: 35px;
    color: white;
}
.content .field{
    height: 50px;
    width: 100%;
    display: flex;
    position: relative;
}
.field input{
    height: 100%;
    width: 100%;
    padding-left: 45px;
    font-size: 18px;
    outline: none;
    border: none;
    color: #f5f5f5;
    background: #dde1e7;
    border-radius: 25px;
    background: rgba(255,255,255,0.05);
    border-top: 1px solid rgba(255,255,255,0.2);
    border-left: 1px solid rgba(255,255,255,0.2);
    box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
}
.field:nth-child(2){
    margin-top: 20px;
}
.field span{
    position: absolute;
    width: 50px;
    line-height: 50px;
    color: #595959;
}
.forgot-pass{
    text-align: left;
    margin: 10px 0 10px 5px;
}
.forgot-pass a{
    font-size: 16px;
    color: white;
    text-decoration: none;
}



/* hover*/
.forgot-pass:hover a{
    text-decoration: underline;
}
button{
    margin: 15px 0;
    width: 100%;
    height: 50px;
    color: #a8a8a5;
    font-size: 18px;
    font-weight:600;
    background: #dde1e7;
    border: none;
    cursor: pointer;
    outline: none;
    border-radius: 25px;
    background: rgba(255,255,255,0.05);
    border-top: 1px solid rgba(255,255,255,0.2);
    border-left: 1px solid rgba(255,255,255,0.2);
    box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
}
.signup{
    font-size: 16px;
    color: white;
    margin: 10px 0;
}
.signup a{
    color: white;
    text-decoration: none;
}
.signup a:hover{
    text-decoration: underline;
}
.form-control::-webkit-input-placeholder {
  color: white; //#999999
}
.form-control {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.428571429;
  color: white;
  vertical-align: middle;
  background-color: ;
  border: 1px solid #cccccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

.loader {
  border: 1px solid #f3f3f3;
  border-radius: 50%;
  border-top: 1px solid blue;
  border-bottom: 1px solid blue;
  width: 20px;
  height: 20px;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
      </style>



  <div class="content">
        <div class="text">Login Form</div>
		
				
<div  id="loader"><table><tr><td><div class="load"><div class="loader"></div></div>  </td><td> 
 </td><td>  <i class="text"><small>Please Wait...</small></i></td></tr></table></div>
 
        <form id="login" action="app/user/login" method="post">



<?php 
if(!empty($_SESSION['bitcrow_loginerror'])){?>
      	<div class="row">
            <div class="col-lg-12">
              <div class="alert <?php if($_SESSION['bitcrow_loginerror']=='success' || $_SESSION['bitcrow_loginerror']=='email_versent' || $_SESSION['bitcrow_loginerror']=='email_vconfirm') {echo 'bg-success';}else{echo 'bg-danger';}?> text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
					<?php


 if($_SESSION['bitcrow_loginerror']=='eruptx') {
					 	echo $sec='Current account session has ended, log in with new password.';
					} else if($_SESSION['bitcrow_loginerror']=='invaliddetails') {
						echo $sec='Email or password entered is incorrect.';

			}else if($_SESSION['bitcrow_loginerror']=='success') {
						echo $sec='Password was successfully recovered, login with your new password.';

					}else if($_SESSION['bitcrow_loginerror']=='email_versent') {
						echo $sec='Verification email was successfully sent.';
					}else if($_SESSION['bitcrow_loginerror']=='email_failed') {
						echo $sec='An error occured while sending verification email, try again later.';
					}else if($_SESSION['bitcrow_loginerror']=='blockeduser') {
						echo $sec='Account has been suspended temporary.';
					}else if($_SESSION['bitcrow_loginerror']=='email_confirm') {
						echo $sec='Account activated, Welcome to '.$set['site_name'];
					}?>                 
                </div>
              </div>
          </div>
<?php }
if(!empty($_SESSION['bitcrow_status'])){?>
            <div class="col-lg-12">
              <div class="alert bg-success text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
<?php 
if($_SESSION['bitcrow_status']=='success') {
    echo $sec='Registration was successful';
$_SESSION['bitcrow_status']='';
}?>                 
                </div>
              </div>
<?php }


if(isset($sec)) {
$_SESSION['bitcrow_loginerror']='';
}
		

?>

									<a href="./"><img src="asset/<?php echo $logo['image_link']; ?>" style="max-width:40%; height:auto;" class=""></a>
			<h5 class="text"><small>Login to your account</smaill></h5>				




            <div class="field">
                <span class="fa fa-user"></span>
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
            </div>
			

			
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="password" class="form-control" name="password" placeholder="Password"  required>
            </div>
            <input value="<?php echo $encrypted_value;?>" name="ye_ran" id="temp_ran" type="hidden"  />
			
			<!-- exter links-->
			
			
            <div class="forgot-pass"><a href="./r_pass" >Forgot Password?</a></div>
           
            <button id="submit">Sign in</button>
            <button id="submite">Proceed Now</button>
            <div class="signup">Not a member? <a href="./register">Signup now</a></div>
			
					
			 <script>
		
			 $('#loader').hide();
			 $('#submite').hide();
    $('#login').submit(function(event) {
        event.preventDefault();
        var email = $('#email').val();

	
 $('#loader').show();
 $('#login').hide();
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo $set['pkey']; ?>', {action: '<?php echo $encrypted_value; ?>'}).then(function(token) {
                $('#login').prepend('<input type="hidden" name="token" value="' + token + '">');
                $('#login').prepend('<input value="<?php echo $encrypted_value;?>" name="ye_ran" id="temp_ran" type="hidden"  />');
                $('#login').unbind('submit').submit();
				
		alert("Email: "+email+" \n You are about to login with this information above. \n If this Info is correct kindly click ok and proceed below");
		
		$('#submit').hide();
		$('#submite').show();
		$('#loader').hide();
 $('#login').show();
		
            });
        });
  });
  </script> 
			
        </form>
    </div>
      