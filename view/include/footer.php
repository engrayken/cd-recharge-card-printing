<footer class="bg-indigo padding-five-bottom xs-padding-30px-bottom"> 
    <div class="bg-indigo footer-widget-area padding-five-tb xs-padding-30px-tb">
        <div class="container">
            <div class="row equalize xs-equalize-auto">
                <div class="col-md-3 col-sm-12 col-xs-12 widget sm-margin-30px-bottom xs-text-left">
                    <div class="widget-title alt-font text-small text-white text-uppercase margin-10px-bottom font-weight-600"><?php echo $set['site_name'];?></div>
                    <p class="text-small text-white width-90 xs-width-100 alt-font"><?php echo $set['title'];?></p>
                    <ul class="list-unstyled alt-font">
                        <?php if(!empty($set['mobile'])){?>
                        <li><a class="text-small text-white" href="javascript:void;"><b>Call or Whatsapp us on:</b> <?php echo $set['mobile'];?></a></li>
                        <?php }?>
                        <?php if(!empty($set['email'])){?>
                        <li><a class="text-small text-white" href="javascript:void;"><b>Email Us on:</b> <?php echo $set['email'];?></a></li>
                        <?php }?>
                        <?php if(!empty($set['address'])){?>
                        <li><a class="text-small text-white" href="javascript:void;"><?php echo $set['address'];?></a></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 widget sm-margin-30px-bottom xs-text-left">
                    <div class="widget-title alt-font text-small text-white text-uppercase margin-10px-bottom font-weight-600">Follow us</div>
                    <p class="text-small text-white width-90 xs-width-100 alt-font">Stay up to date with <?php echo$set['site_name'];?> activities.</p>
                        <div class="social-icon-style-8 display-inline-block vertical-align-middle">
                            <ul class="small-icon no-margin-bottom alt-font">
                                <?php
                                $data = mysqli_query($dbc, "SELECT * FROM social_links");
                                while($row1 = mysqli_fetch_array($data)){
                                if(!empty($row1['value'])){ ?>
                                <li><a class="<?php echo $row1['type'];?> text-white" href="<?php echo $row1['value'];?>" title="<?php echo $row1['type'];?>" target="_blank"><i class="fa fa-<?php echo $row1['type'];?>"></i></a></li>
                                <?php } } ?>                                        
                            </ul>
                        </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 widget padding-45px-left sm-padding-15px-left sm-margin-30px-bottom xs-text-left">
                    <div class="widget-title alt-font text-small text-white text-uppercase margin-10px-bottom font-weight-600">Additional Links</div>
                    <ul class="list-unstyled alt-font">
                        <li><a class="text-small text-white" href="home">Home</a></li>
                        <?php $sr=mysqli_query($dbc, "SELECT * FROM trending_cat");
                        while($cat=mysqli_fetch_array($sr)){ ?>
                        <!--li><a class="text-small text-white" href="cat/<?php echo $cat['id'];?>/1"><?php echo$cat['categories']; ?></a></li-->
                        <?php } ?>
                        <?php if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM pages WHERE status = '1'"))>0){
                        $result=mysqli_query($dbc, "SELECT * FROM pages WHERE status=1");
                        while($df=mysqli_fetch_array($result)){?>
                        <li><a class="text-small text-white"href="./page/<?php echo $df['id'];?>"><?php echo $df['title'];?></a></li>
                        <?php } }?>
                        <?php if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM faq"))>0){?>
                        <li><a class="text-small text-white" href="./faq" >Frequently asked questions</a></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 widget padding-45px-left sm-padding-15px-left sm-clear-both sm-no-border-right  xs-margin-30px-bottom xs-text-left">
                    <div class="widget-title alt-font text-small text-white text-uppercase margin-10px-bottom font-weight-600">More</div>
                    <ul class="list-unstyled alt-font">
                        <li><a class="text-small text-white" href="./login" >Login</a></li>
                        <li><a class="text-small text-white" href="./register" >Register</a></li>
                        <li><a class="text-small text-white" href="./blog/1">Latest news</a></li>
                        <!--li><a class="text-small text-white" href="./partners" >Partners</a></li-->
                        <!--li><a class="text-small text-white" href="./awards" >Awards</a></li-->
                        <li><a class="text-small text-white" href="./contact" >Help center</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-indigo">
        <div class="container">
            <div class="footer-bottom padding-30px-top">
                <div class="row">
                    <!-- start copyright -->
                    <div class="col-md-12 col-sm-12 col-xs-12 text-white text-small xs-text-center">We offer Competable rates without compromising on quality. We are able to do this due to the large number of Recharge card generated every day by our customers.<br/><br/><b><?php echo$set['site_name'];?> powered by Kenspay Technology</b>
</div>
                    <!-- end copyright -->
                </div>
            </div>
        </div>
    </div>
</footer>
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
        <!-- end footer -->
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up text-orange"></i></a>
        <!-- end scroll to top  -->
        <!-- javascript libraries -->
        <script type="text/javascript" src="asset/js/jquery.js"></script>
        <script type="text/javascript" src="asset/js/modernizr.js"></script>
        <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="asset/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="asset/js/skrollr.min.js"></script>
        <script type="text/javascript" src="asset/js/smooth-scroll.js"></script>
        <script type="text/javascript" src="asset/js/jquery.appear.js"></script>
        <!-- menu navigation -->
        <script type="text/javascript" src="asset/js/bootsnav.js"></script>
        <script type="text/javascript" src="asset/js/jquery.nav.js"></script>
        <!-- animation -->
        <script type="text/javascript" src="asset/js/wow.min.js"></script>
        <!-- page scroll -->
        <script type="text/javascript" src="asset/js/page-scroll.js"></script>
        <!-- swiper carousel -->
        <script type="text/javascript" src="asset/js/swiper.min.js"></script>
        <!-- counter -->
        <script type="text/javascript" src="asset/js/jquery.count-to.js"></script>
        <!-- parallax -->
        <script type="text/javascript" src="asset/js/jquery.stellar.js"></script>
        <!-- magnific popup -->
        <script type="text/javascript" src="asset/js/jquery.magnific-popup.min.js"></script>
        <!-- portfolio with shorting tab -->
        <script type="text/javascript" src="asset/js/isotope.pkgd.min.js"></script>
        <!-- images loaded -->
        <script type="text/javascript" src="asset/js/imagesloaded.pkgd.min.js"></script>
        <!-- pull menu -->
        <script type="text/javascript" src="asset/js/classie.js"></script>
        <script type="text/javascript" src="asset/js/hamburger-menu.js"></script>
        <!-- counter  -->
        <script type="text/javascript" src="asset/js/counter.js"></script>
        <!-- fit video  -->
        <script type="text/javascript" src="asset/js/jquery.fitvids.js"></script>
        <!-- equalize -->
        <script type="text/javascript" src="asset/js/equalize.min.js"></script>
        <!-- skill bars  -->
        <script type="text/javascript" src="asset/js/skill.bars.jquery.js"></script> 
        <!-- justified gallery  -->
        <script type="text/javascript" src="asset/js/justified-gallery.min.js"></script>
        <!--pie chart-->
        <script type="text/javascript" src="asset/js/jquery.easypiechart.min.js"></script>
        <!-- instagram -->
        <script type="text/javascript" src="asset/js/instafeed.min.js"></script>
        <!-- retina -->
        <script type="text/javascript" src="asset/js/retina.min.js"></script>
        <!-- revolution -->
        <script type="text/javascript" src="asset/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="asset/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="asset/js/main.js"></script>
    </body>
</html>