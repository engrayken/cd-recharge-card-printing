<?php
$token=$_REQUEST['id'];
require_once ('../app/config.php');
$ad=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE token ='$token'"));
session_start();
if(isset($_SESSION['hexmine_userid']) ){
	redirect($url."/user");
}

if($ad['email']==''){
	redirect($url."/forgot");
}

$title='Reset Password';
require_once("include/user_header.php");
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

      </style>


	<div class="content">

				<form action="app/user/resetpass" method="post">
					
								<a href="./"><img src="asset/<?php echo $logo['image_link']; ?>" style="max-width:40%; height:auto;" class=""></a>
			<h5 class="text"><small>Recover your account</small></h5>
							<span class="d-block text-muted">Your credentials</span>
							

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="email" class="form-control" value="<?php echo $ad['email'];?>" readonly>
								<input type="hidden" name="token" value="<?php echo $token;?>">
								<div class="form-control-feedback">
									<i class="icon-envelop text-muted"></i>
								</div>
							</div>
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <div class="badge-indicator-absolute">
                                    <input type="password" class="form-control" placeholder="New password" name="password">
                                    <span class="badge password-indicator-badge-absolute"></span>
                                </div>
                            </div>

						
            <!-- exter links-->
            <div class="forgot-pass"><a href="./login" >Already A Member Login</a></div>
            <button>Reset Now</button>
            <div class="signup">Not a member? <a href="./register">Signup now</a></div>
						  </form>
				<!-- /login form -->

			</div>
		