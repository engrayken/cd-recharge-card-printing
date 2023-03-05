<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/<?php echo $set['tawk_id']; ?>/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark bg-indigo sidebar-main sidebar-expand-md"style="background:darkgreen" >

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center" style="background:green">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">
				
				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
							<a href="#">
								<img src="<?php echo $cast;?>" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark"><?php echo clean($row['name']);?></h6>

<h6 class="mb-0 text-white text-shadow-dark" title="Account balance"><?php echo clean($scan2['currency'].number_format($row['dep_balance']));?></h6>

<span class="font-size-sm text-white text-shadow-dark"><?php echo clean($row['country']);?></span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="./profile/0" class="nav-link" title="My profile">
									<i class="icon-user-plus"></i>
									<span>My Profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="security/0" class="nav-link" title=" security">
									<i class="icon-lock"></i>
									<span>Security Settings</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="ticket" class="nav-link" title="Help center">
									<i class="icon-bubbles5"></i>
									<span>Help center</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="../app/user/logout" class="nav-link" title="Logout">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->
	
				
				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						<li class="nav-item">
							<a href="./" class="nav-link" title="Dashboard">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<!--li class="nav-item">
							<a href="./sell_bitcoin" class="nav-link" title="Bitcoin offers">
								<i class="icon-cart4"></i>
								<span>
									Bitcoin offers
								</span>
							</a>
						</li-->	
						<!--li class="nav-item">
							<a href="./buy_bitcoin" class="nav-link" title="Buy bitcoin">
								<i class="icon-coin-dollar"></i>
								<span>
									Buy bitcoin
								</span>
							</a>
						</li-->
						<li class="nav-item">
							<a href="./myproduct" class="nav-link" title="Product records">
								<i class="icon-folder-open2"></i>
								<span>
									My Products
								</span>
							</a>
						</li>
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-cart-add"></i><span>Order New Product</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Order New Product">
								<li class="nav-item">
							<a href="./order_product" class="nav-link" title="Order New Product">
							<span>
							Print Recharge Card
								</span>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="./airtime" class="nav-link" title="Order New Product">
							<span>
							Airtime VTU
								</span>
							</a>
						</li>
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><span>Data Subscription</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Order New Product">
							
								<li class="nav-item"><a href="./data" class="nav-link" title="Data">Data Bundle</a></li>
								
								<li class="nav-item"><a href="./sme" class="nav-link" title="Data">SME Data</a></li>
								
								</ul>
						</li>
							
						<li class="nav-item"><a href="./tv" class="nav-link" title="TV Subscription">TV Subscription</a></li>
								
						<li class="nav-item"><a href="./elect" class="nav-link" title="Electricity Bill Payment">Electricity Bill Payment</a></li>
							
							
						
								<li class="nav-item"><a href="./education" class="nav-link" title="Education Payment"><span>Education Payment</span></a></li>
							
						
						</ul>
						</li>
						
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-credit-card"></i><span>Fund Wallet</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Deposit & withdraw">
								<li class="nav-item"><a href="./fund/0" class="nav-link">Instant wallet funding</a></li>
								<!--li class="nav-item"><a href="#"  data-toggle="modal" data-target="#bitcoin_preview" class="nav-link">Deposit With Card</a></li-->
							</ul>
						</li>
						<li class="nav-item">
							<a href="./transaction" class="nav-link" title="Deposit history">
								<i class="icon-alarm"></i>
								<span>
									Transaction history
								</span>
							</a>
						</li>
						<?php if($set['internal_transfer']==1){?>
						<li class="nav-item">
							<a href="./int_transfer/0" class="nav-link" title="Internal transfer">
								<i class="icon-paperplane"></i>
								<span>
									Internal transfer
								</span>
							</a>
						</li>
						<?php }?>
						<!--li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-wallet"></i><span>Withdraw</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Withdraw">
								<li class="nav-item"><a href="./wallet" class="nav-link" title="Wallet address <?php if($set['bank_withdraw']==1){echo '& Bank';}?>">
									<li class="icon-folder-open"></i>
									<span>Payout details <?php if($set['bank_withdraw']==1){echo '& Bank';}?></span>
								</a>
								</li>
								<li class="nav-item"><a href="./withdraw_bitcoin" class="nav-link"><i class="icon-coin-yen"></i>Bitcoin</a></li>
								<li class="nav-item"><a href="./withdraw_deposit" class="nav-link"><i class="icon-cash4"></i>Cash</a></li>
							</ul>
						</li-->	
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
    <div id="bitcoin_preview" class="modal fade" tabindex="-1">
      <div class="modal-dialog modal-xs">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
           <form class = "form" action = "#" method="POST">
                <p class="font-weight-semibold ml-2">Deposit amount #100 - 15 million</p>
                <p class="font-weight-semibold ml-2">Charged  #0.5 + 2.52%</p>
            <div class = "form-group">
               <label for = "amount" class = "ml-2"> Amount:</label>
               <input type="text" class="form-control" id = "amount" placeholder="Enter Amount" name="amount" required>
            </div>
            <script src="https://checkout.flutterwave.com/v3.js"></script>
            <button type="button" class = "form-control btn btn-primary" onClick="makePayment()">Pay Now</button>
          </form>

  
        </div>
      </div>
    </div>