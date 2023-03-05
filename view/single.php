<?php
require_once("../app/config.php");
$id=$_REQUEST['id'];
$post=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM trending WHERE id= '".$id."'"));
$title=$post['title'];
$views=1+$post['views'];
mysqli_query($dbc, "UPDATE trending SET views='".$views."' WHERE id='".$id."'");
require_once('include/header.php');
require_once('include/navbar.php');
?>
<section class="wow fadeIn no-padding cover-background" style="background:url('./asset/thumbnails/<?php echo $post['thumbnails'];?>'); background-repeat: no-repeat;">
    <div class="opacity-full-dark bg-black-opacity"></div>
    <div class="container full-screen position-relative">
        <div class="slider-typography text-left">
            <div class="slider-text-middle-main">
                <div class="slider-text-middle">
                    <div class="col-lg-10 col-md-10 col-sm-10 center-col text-center">
            <h2 class="alt-font text-white font-weight-600 letter-spacing-minus-1 text-extra-dark-gray"><?php echo $post['title'];?></h2>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
<section class="bg-white wow fadeIn">
    <div class="sm-padding-20px-all xs-padding-30px-all"></div>
        <div class="container">
            <div class="row">
                <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text text-black last-paragraph-no-margin">
                <span class="alt-font text-black margin-20px-bottom display-inline-block"><?php echo $post['content'];?></span>
                </div>
<?php require_once('include/share.php');?>
                </main> 
                <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                     <div class="margin-45px-bottom xs-margin-25px-bottom">
<?php require_once('include/sidebar.php');?>
                 </aside>
            </div>
        </div>
    </section>
<?php require_once('include/footer.php');?>