<?php 
require_once("../app/config.php");
session_start();
if(isset($_SESSION['bitcrow_userid']) ){
    redirect($url."/user");
}
$title='Signup';
require_once("include/user_header.php");
//require_once('../lib/geoplugin.class.php');
//$geoplugin = new geoPlugin();
//$geoplugin->locate();


$token = round(microtime(true));
$secret_key      = 'hackerKojhtr'.$token.'nURmqwnsc'.$title.'bdoefg';  //change this
 $encrypted_value=$secret_key;

$_SESSION['regieeee']=$encrypted_value;
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
  
  		
<div  id="loader"><table><tr><td><div class="load"><div class="loader"></div></div>  </td><td> 
 </td><td>  <i class="text"><small>Please Wait...</small></i></td></tr></table></div>
 
				
                <!-- Login form -->
                <form id="reg" method="post" action="app/user/register">
		
                    <div class="row">
<?php 
if(!empty($_SESSION['bitcrow_regerror'])){?>
            <div class="col-lg-12">
              <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
<?php 
if($_SESSION['bitcrow_regerror']=='invaliddetails') {
    echo'An account already exists for the details you entered';
} 
 else if( $_SESSION['bitcrow_regerror']=='invalid') {
						echo $sec='Invalid details, contact support on 08126216200.';

			}
else if($_SESSION['bitcrow_regerror']=='invalidauto') {
    echo'Invalid authorization code, contact support on 08126216200 for the code';


}?>                 
                </div>
              </div>
<?php }?>
     
                                        <a href="./"><img src="asset/<?php echo $logo['image_link']; ?>" style="max-width:40%; height:auto;" class=""></a>
                                        <h5 class="text">Create account</h5>
                                        <small class="text"><small>All fields are required</small></small>
                                    </div>

                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                        <input type="text" class="form-control"  placeholder="Choose username" name="username" required>
                                        <div class="form-control-feedback">
                                            <i class="icon-user-plus text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="text" class="form-control" name="name" placeholder="Full name" required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-check text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="text" class="form-control" placeholder="Country" value="Nigeria" readonly name="country">
                                                <div class="form-control-feedback">
                                                    <i class="icon-location4 text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <div class="badge-indicator-absolute">
                                                    <input type="password" class="form-control" placeholder="Create password" name="password" required>
                                                    <span class="badge password-indicator-badge-absolute"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="text" name="format-international-phone" class="form-control" placeholder="Enter Mobile number" required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-phone text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


       

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Your email" required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

       <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="auto" class="form-control" name="auto" placeholder="Enter Authorization Code" required>
                                                <div class="form-control-feedback">
                                                    <i class="icon-key text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="news" class="form-input-styled" value="1" checked data-fouc>
                                                          <font color="white">    Subscribe to monthly newsletter</font>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="terms" class="form-input-styled" data-fouc required/>
                                       <font color="white">         Accept <a href="./terms">terms of service</a></font>
                                            </label>
                                        </div>
                                    </div>

<input value="<?php echo $encrypted_value;?>" name="ye_ran" id="temp_ran" type="hidden"  />
                                    <button id="submit"> Create account</button>
									   <button id="submite">Proceed Now</button>
									    <div class="signup">All ready a member? <a href="./login">Login now</a></div>   
                                </div>
                            </div>
                        </div>
                    </div>
					
					 <script>
			  $('#loader').hide();
			 $('#submite').hide();
    $('#reg').submit(function(event) {
        event.preventDefault();
        var email = $('#email').val();
		 $('#loader').show();
 $('#reg').hide();
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo $set['pkey']; ?>', {action: '<?php echo $encrypted_value; ?>'}).then(function(token) {
                $('#reg').prepend('<input type="hidden" name="token" value="' + token + '">');
                $('#reg').prepend('<input value="<?php echo $encrypted_value;?>" name="ye_ran" id="temp_ran" type="hidden"  />');
                $('#reg').unbind('submit').submit();
				alert(" You are about to register with this information below. \n If this Info is correct kindly click ok and proceed below");
			$('#submit').hide();
		$('#submite').show();
		$('#loader').hide();
 $('#reg').show();
            });;
        });
  });
  </script>
					
                </form>
                <!-- /login form -->

            
            <!-- /content area -->


            <!-- Footer -->
            <!-- /footer -->

       
        <!-- /main content -->

    </div>
<?php require_once("include/user_footer.php"); ?>