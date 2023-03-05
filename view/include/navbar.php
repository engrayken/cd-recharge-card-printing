<body>
<!-- start header -->
<header>
    <!-- start navigation -->
    <nav class="navbar navbar-default bootsnav bg-transparent navbar-top navbar-transparent-no-sticky white-link">
        <div class="container-fluid nav-header-container height-100px padding-three-half-lr xs-height-70px xs-padding-15px-lr">
            <!-- start header navigation -->
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-6 hidden-xs text-left">
                    <div class="header-social-icon border-none no-padding-left no-margin-left">
                        <?php
                        $data = mysqli_query($dbc, "SELECT * FROM social_links");
                        while($row1 = mysqli_fetch_array($data)){
                        if(!empty($row1['value'])){ ?>
                       <a class="<?php echo $row1['type'];?> text-white" href="<?php echo $row1['value'];?>" title="<?php echo $row1['type'];?>" target="_blank"><i class="fa fa-<?php echo $row1['type'];?>"></i></a>
                        <?php } } ?>                       
                    </div>
                </div>
                <!-- start logo -->
                <div class="col-md-4 col-sm-4 col-xs-6 text-center xs-text-left"  >
                    <a class="logo" href="./"><img src="asset/<?php echo $logo['image_link']; ?>" style="height: auto; max-width: 100%;"  alt="<?php echo $set['site_name'] ?>" /></a>
                </div>
                <!-- end logo -->
                <div class="col-md-4 col-sm-4 col-xs-6 text-right">
                    <div class="hamburger-menu">
                        <div class="btn btn-hamburger border-none">
                            <button class="navbar-toggle mobile-toggle" type="button" id="open-button" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="bg-orange"></span>
                                <span class="bg-orange"></span>
                                <span class="bg-orange"></span>
                            </button>
                        </div>
                        <div class="hamburger-menu-wrepper xs-text-center" style="background:green">
                            <div class="hamburger-logo text-left"><a class="logo" href="./"><img src="asset/<?php echo $logo['image_link']; ?>" style="height: auto; max-width: 100%;"  alt="<?php echo $set['site_name'] ?>" /></a></div>
                            <div class="btn btn-hamburger border-none">
                                <button class="close-menu close-button-menu" id="close-button"></button>
                            </div>
                            <div class="animation-box">
                                <div class="menu-middle">
                                    <div class="menu-wrapper display-table-cell vertical-align-middle text-left">
                                        <div class="equalize no-margin">
                                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 display-table">
                                                <div class="display-table-cell vertical-align-middle">
                                                    <ul class="hamburger-menu-links alt-font">
                                        <li><a href="./">Home</a></li>
                                        <li><a class=""href="./login" >Login</a></li>
                                        <li><a class=""href="./register" >Register</a></li>
                                        <li><a class=""href="./blog/1" >Latest news</a></li>
                                        <!--li><a class=""href="./partners" >Partners</a></li-->
                                        <!--li><a class=""href="./awards" >Awards</a></li-->
                                        <li><a class=""href="./contact" >Customer service</a></li>
                                        <?php if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM faq"))>0){?>
                                        <li><a class=""href="./faq" >FAQs</a></li>
                                        <?php }$sr=mysqli_query($dbc, "SELECT * FROM trending_cat");
                                        while($cat=mysqli_fetch_array($sr)){ ?>
                                        <!--li><a href="cat/<?php echo $cat['id'];?>/1"><?php echo$cat['categories']; ?></a></li-->
                                        <?php }if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM pages WHERE status = '1'"))>0){
                                        $result=mysqli_query($dbc, "SELECT * FROM pages WHERE status=1");
                                        while($df=mysqli_fetch_array($result)){?>
                                        <li><a href="./page/<?php echo $df['id'];?>"><?php echo $df['title'];?></a></li>
                                        <?php } }?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Navigation -->
    </nav>
    <!-- end navigation -->
</header>