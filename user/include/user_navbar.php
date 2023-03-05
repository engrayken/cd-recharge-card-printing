<body class="">
	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark navbar-static" style="background:green; z-index:1;" >

		<!-- Header with logos -->
			<div class="navbar-brand">
				<a href="../" class="d-inline-block">
					<img src="../asset/<?php echo $logo['image_link']; ?>"  alt="<?php echo $set['site_name'] ?>"/>
				</a>
			</div>
		<!-- /header with logos -->

<div class="d-md-none" style="margin-top:8px">
<?php echo $scan2['currency'].number_format($row['dep_balance']);?>	</div>

<div class="d-md-none" style="margin-top:8px">
<small>
<a href="javascript:void(0);" onclick="msgnav()" id="dropdown-toggle">
<div class="msg count"></div>  <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a></small>
</div>

		<!-- Mobile controls -->
		<div class="d-md-none">
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>
			<span class="navbar-text ml-md-3 mr-md-auto">
				<span class="badge badge-mark border-purple mr-2"></span>
				Welcome, <?php echo $row['username'];?>!
			</span>

			<ul class="navbar-nav">
								<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-make-group mr-2"></i>
						Social media
					</a>

						<div class="dropdown-menu dropdown-menu-right alpha-success dropdown-content wmin-md-350">
						<div class="dropdown-content-body p-2">
							<div class="row no-gutters">
<?php
//$data = mysqli_query($dbc, "SELECT * FROM social_links");
$dataa =$dbc->prepare("SELECT * FROM social_links");
$dataa->execute();
$data=$dataa->get_result();
$dataa->close();
while($row1 = $data->fetch_assoc()){
if(!empty($row1['value'])){ ?>
								<div class="col-4 col-sm-4">
									<a href="<?php echo $row1['value'];?>" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="fa fa-<?php echo $row1['type'];?> mr-2"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2"><?php echo clean($row1['type']);?></div>
									</a>
								</div>
<?php } 

} ?> 
							</div>
						</div>
					</div>
				</li>
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<!--img src="<?php echo $cast;?>" class="rounded-circle" alt=""-->
						<span><?php echo clean($row['username']);?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="./profile/0" class="dropdown-item"><i class="icon-user-plus"></i> My profile & KYC</a>
						<div class="dropdown-divider"></div>
						<a href="security/0" class="dropdown-item"><i class="icon-lock"></i> Account security</a>
						<a href="../app/user/logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>

<li style="margin-top:8px">
<small>
<a href="javascript:void(0);" onclick="msgnav()" id="dropdown-toggle">
<div class="msg count"></div>  <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a></small>
</li>
			</ul>
		</div>
		<!-- /navbar content -->
		
	</div> </div>
	<!-- /main navbar -->



<div class="msgnav"   id="msgnav">
<div class="msgnav1"  style="position: fixed; top:0px; z-index: 1000; width:99%">
What's New<hr/>
 <ol  id="dropdown-menu"></ol>
</div></div>

<?php include('../asset/global_assets/js/main/kenspay.php');?>


