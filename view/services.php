<?php
require_once("../app/config.php");
$title="Services | ".$set['site_name'];
$desc="Services";
require_once('include/header.php');
require_once('include/navbar.php');?>
<section id="reg" class="wow fadeIn no-padding bg-gradient-escrow">
    <div class="container-fluid">
        <div class="row equalize sm-equalize-auto">
            <div class="col-md-8 wow fadeIn center-col">
                <div class="margin-50px-top padding-eleven-all text-center xs-no-padding-lr">
                    <h3 class="text-white alt-font font-weight-600 xs-margin-ten-bottom">Crypto currency</h3>
                  <!--  <p class="margin-50px-bottom text-white alt-font margin-5px-bottom text-medium xs-margin-three-bottom"><?php echo $set['site_name'];?> is honoured to have received accolades for providing comprehensive financial services to our customers and partners</p>-->
                </div>
            </div>
        </div>
    </div>
</section>
<section class="wow fadeIn md-padding-two-lr bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-9 center-col margin-eight-bottom text-center last-paragraph-no-margin">
                <div class="alt-font text-gray margin-10px-bottom text-uppercase text-small"><?php echo $set['site_name'];?> services</div>
            <h6 class="text-black margin-10px-bottom alt-font font-weight-400">Never buy or sell Bitcoin without using <?php echo $set['site_name'];?></h6>
                <p class="alt-font text-black"><?php echo $set['site_name'];?> you can buy and sell bitcoin safetly without the risk of chargebacks. Truly secure payments.</p>                        
            </div>
        </div>
        <div class="row equalize">
            <!-- start feature box item -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin-six-bottom md-margin-six-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin">
                <div class="feature-box-5 position-relative">
                    <i class="fa fa-empire text-blue icon-large"></i>
                    <div class="feature-content">
                        <h6 class="text-black margin-10px-bottom alt-font font-weight-400">Reliable Services</h6>
                        <p class="alt-font text-black">As the largest online licensed and audited escrow operator, we safely hold the buyer's payment in a trust account until the entire transaction is complete. That way, Buyers can be confident the coin is sent to the escrow operators ans=d sellers can be sure they will be paid.</p>
                    </div>
                </div>
            </div>
            <!-- end feature box item -->
            <!-- start feature box item -->
            <!-- end feature box item-->
            <!-- start feature box item-->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin-six-bottom md-margin-six-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                <div class="feature-box-5 position-relative">
                    <i class="fa fa-phone text-blue icon-large"></i>
                    <div class="feature-content">
                        <h6 class="text-extra-dark-gray margin-10px-bottom alt-font font-weight-400">Customer support</h6>
                        <p class="alt-font text-black">We are always here for you, to make you understand everything of concern to you about business.</p>
                    </div>
                </div>
            </div>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin-six-bottom md-margin-six-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                <div class="feature-box-5 position-relative">
                    <i class="fa ti-user text-blue icon-large"></i>
                    <div class="feature-content">
                        <h6 class="text-extra-dark-gray margin-10px-bottom alt-font font-weight-400">Clients Privacy</h6>
                        <p class="alt-font text-black"><?php echo $set['site_name'];?> is the dominant payment method for the buying & selling of various types of cryptocurrency. Use <?php echo $set['site_name'];?> to assure that money is released only when you are happy with each step.</p>
                    </div>
                </div>
            </div>
            <!-- end feature box item-->
        </div>
    </div>
</section>
<?php
require_once('include/footer.php');
?>