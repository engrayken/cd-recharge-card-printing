<?php
require_once("../app/config.php");
$id=$_REQUEST['id'];
$post=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM pages WHERE id= '".$id."'"));
if($post['status']==0){
    redirect($url.'/404');
}
$title=$post['title'].' | '.$set['site_name'];
$desc=$post['title'];
require_once('include/header.php');
require_once('include/navbar.php');
?>
<section class="wow fadeIn bg-light-gray padding-100px-tb sm-padding-60px-tb xs-padding-30px-tb top-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-medium">
                <div class="display-table-cell vertical-align-middle text-center">
                    <h1 class="alt-font text-extra-dark-gray font-weight-600 no-margin"><?php echo $post['title'];?></h1>
                </div>
            </div>
        </div>
    </div>
</section>        
<section class="wow fadeIn bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-col">
                <span class="alt-font text-extra-dark-gray margin-20px-bottom"><?php echo $post['content'];?></span>
            </div> 
        </div>
    </div>
</section>
<?php require_once('include/footer.php');?>