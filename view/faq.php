<?php
require_once("../app/config.php");
$title="Frequently asked questions | ".$set['site_name'];
$desc="Frequently Asked Questions";
require_once('include/header.php');
require_once('include/navbar.php');
?>  
<section class="wow fadeIn no-padding main-slider height-100 mobile-height cover-background" style="background:url('./asset/images/services-classic-03.jpg'); background-repeat: no-repeat;">
    <div class="opacity-full-dark bg-footer-2"></div>
    <div class="container full-screen position-relative">
        <div class="slider-typography text-left">
            <div class="slider-text-middle-main">
                <div class="slider-text-middle">
                    <div class="col-lg-10 col-md-10 col-sm-10 center-col text-center">
            <h2 class="alt-font text-white font-weight-600 letter-spacing-minus-1 text-extra-dark-gray">Frequently asked Questions</h2>
            <p class="text-medium alt-font text-white margin-20px-bottom display-inline-block">Browse our customer service directory and receive answers to the most common questions.</p>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
<section class="bg-gradient-future" id="down-section">
                <div class="row">
                    <div class="container">
<?php 
$result=mysqli_query($dbc, "SELECT * FROM faq");
while($faq=mysqli_fetch_array($result)){
?>
                    <div class="col-md-8 col-sm-12 col-xs-12 center-col">
                        <!-- start accordion -->
                        <div class="panel-group accordion-style1" id="accordion-one">
                            <!-- start accordion item -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-one" href="#<?php echo $faq['id'];?>" class="collapsed" aria-expanded="false">
                                        <div class="panel-title text-black position-relative padding-20px-right alt-font text-medium font-weight-400" style="font-size: 14px;">
<?php echo $faq['question'];?>
                                        <span class="position-absolute right-0 top-0 text-medium text-extra-dark-gray"><i class="fa fa-chevron-circle-down" style="font-size: 16px; color: #ffba58;"></i></span></div></a>
                                </div>
                                <div id="<?php echo $faq['id'];?>" class="panel-collapse collapse">
                                    <div class="panel-body text-black  text-small alt-font ">
<?php echo $faq['answer'];?>
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <!-- end accordion -->
                    </div>
<?php }?>
                    </div>
                </div>
            </div>
        </section>
<?php require_once('include/footer.php');?>