<?php
session_start();
require_once("../app/config.php");
if(isset($_SESSION['bitcrow_admin'])){
	echo "<script>window.location.href='".$url."/admin/dashboard';</script>";
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo $url; ?>/admin/"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../asset/<?php echo $logo['image_link']; ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="../asset/<?php echo $logo['image_link']; ?>">
	<title>Admin | <?php echo$set['site_name'];?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../asset/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="../asset/global_assets/js/main/jquery.min.js"></script>
	<script src="../asset/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="../asset/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="../asset/global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="../asset/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="../asset/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="../asset/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="../asset/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="../asset/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="../asset/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/selects/select2.min.js"></script>

	<script src="../asset/user/assets/js/app.js"></script>
	<script src="../asset/global_assets/js/demo_pages/dashboard.js"></script>
	<script src="../asset/global_assets/js/demo_pages/login.js"></script>
	<script src="../asset/global_assets/js/demo_pages/datatables_advanced.js"></script>
	<script src="../asset/global_assets/js/demo_pages/datatables_basic.js"></script>
	<script src="../asset/global_assets/js/demo_pages/form_layouts.js"></script>
	<script src="../asset/global_assets/js/demo_pages/form_select2.js"></script>
	<script src="../asset/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	<script src="../asset/global_assets/js/plugins/ui/prism.min.js"></script>
	<!-- /theme JS files -->

</head>
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper bg-indigo">
			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">
				<!-- Login form -->
				<form class="login-form" action="" method="post">
<?php 
if(!empty($_SESSION['bitcrow_adminlogin'])){?>
      	<div class="row">
            <div class="col-lg-12">
              <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
					<?php if($_SESSION['bitcrow_adminlogin']=='eruptx') {
					 	echo'Current account session has ended, log in with new password.';
					} else if($_SESSION['bitcrow_adminlogin']=='invaliddetails') {
						echo'Username or password is incorrect.';
					}?>                 
                </div>
              </div>
          </div>
<?php }?>
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<a href="../"><img src="../asset/<?php echo $logo['image_link']; ?>" style="max-width:20%; height:auto;" class=""></a>
								<h5 class="mb-0">Login to your account</h5>
								<span class="d-block text-muted">Your credentials</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" placeholder="Username" name="username" required>
								<div class="form-control-feedback">
									<i class="icon-user-plus text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-light btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
<?php require_once("include/user_footer.php"); ?>
