<?php 
require_once('../app/config.php');
require_once('include/pagination.php');
$catz=$_REQUEST['id'];
$cat=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM trending_cat WHERE id = '" .$catz. "'"));            
$limit = 6;
$offset = !empty($_GET['page'])?(($_GET['page']-1)*$limit):0;
$rowCount = mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM trending WHERE cat_id=$catz AND status=1"));
$pagConfig = array('baseURL'=>'./cat/'.$catz,'totalRows'=>$rowCount,'perPage'=>$limit);
$pagination =  new Pagination($pagConfig);
$title=$cat['categories'].' | '.$set['site_name'];
$desc=$cat['categories'];
require_once('include/header.php');
require_once('include/navbar.php'); ?>            
<section class="wow fadeIn bg-gradient-future">
    <div class="sm-padding-50px-all xs-padding-50px-all"></div>
            <div class="container">
                <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom sm-padding-15px-lr">
<?php $query="SELECT * FROM trending WHERE cat_id=$catz order by trending.id desc LIMIT $offset,$limit";
$result=mysqli_query($dbc, $query);
if(mysqli_num_rows($result)>0){
while($df=mysqli_fetch_array($result)){
$mainnewstxt = strip_tags(implode(' ', array_slice(explode(' ', $df['content']), 0, 20)));?>
                        <div class="equalize sm-equalize-auto blog-post-content margin-60px-bottom padding-60px-bottom display-inline-block border-bottom border-color-extra-light-gray sm-margin-30px-bottom sm-padding-30px-bottom xs-text-center sm-no-border">
                            <div class="blog-image col-md-5 no-padding sm-margin-30px-bottom xs-margin-20px-bottom margin-45px-right sm-no-margin-right display-table">
                                <div class="display-table-cell vertical-align-middle">
                                    <a href="./single/<?php echo $df['id'];?>/"><img src="./asset/thumbnails/<?php echo $df['thumbnails'];?>" alt="" /></a>
                                </div>
                            </div>
                            <div class="blog-text col-md-6 display-table no-padding">
                                <div class="display-table-cell vertical-align-middle">
                                    <div class="content margin-20px-bottom sm-no-padding-left ">
                                        <a href="./single/<?php echo $df['id'];?>" class="text-extra-dark-gray margin-5px-bottom alt-font text-extra-large font-weight-500 display-inline-block"><?php echo $df['title'];?></a>
                                        <div class="text-medium-gray text-extra-small margin-15px-bottom text-uppercase alt-font"><span>By <a href="javascript:void;" class="text-medium-gray">Admin</a></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span><?php echo date("M j, Y", strtotime($df['date']));?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="cat/<?php echo $cat['id'];?>/1" class="text-medium-gray"><?php echo $cat['categories'];?></a></div>
                                        <p class="no-margin width-95 alt-font"><?php echo $mainnewstxt; ?>....</p>
                                    </div>
                                    <a class="btn btn-very-small btn-white border-radius-2" href="./single/<?php echo $df['id'];?>">Continue Reading</a>
                                </div>
                            </div>
                        </div>
<?php } }else{?>
<div class="col-md-8 col-sm-12 col-xs-12 text-center center-col">
                <img src="asset/images/027-search.png" style="max-width:40%; height:auto;">
               <h2 class="alt-font font-weight-400 text-black">Nothing found</h2>
           </div>


<?php }?>
<div class="text-center margin-50px-top margin-50px-bottom sm-margin-50px-top wow fadeInUp"><?php echo $pagination->createLinks();?></div>
                </main> 
                <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                     <div class="margin-45px-bottom xs-margin-25px-bottom">
<?php require_once('include/sidebar.php');?>
                </aside>
                <!-- start pagination -->
</section>
  
<?php     
require_once('include/footer.php');