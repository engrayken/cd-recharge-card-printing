<div class="margin-45px-bottom xs-margin-25px-bottom">
    <div class="text-black margin-20px-bottom alt-font text-uppercase font-weight-500 text-small"><span>Categories</span></div>
    <ul class="list-style-6 margin-50px-bottom text-small">
<?php $tr="SELECT * FROM trending_cat";
$sr=mysqli_query($dbc, $tr);
while($cat=mysqli_fetch_array($sr)){
$rate=mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM trending WHERE status=1 AND cat_id = '" . $cat['id'] . "'")); ?>    
<li><a class="text-black alt-font" href="cat/<?php echo $cat['id'];?>/1"><?php echo $cat['categories'];?></a><span class="text-black alt-font"><?php echo $rate;?></span></li>
<?php } ?>
    </ul>   
</div>
<div class="text-black margin-25px-bottom alt-font text-uppercase font-weight-500 text-small"><span>Recent post</span></div>
    <ul class="latest-post position-relative">
<?php $query="SELECT * FROM trending WHERE status=1 order by trending.id desc LIMIT 10";
$result=mysqli_query($dbc, $query);
while($df=mysqli_fetch_array($result)){?>
        <li>
            <div class="display-table-cell vertical-align-top text-small"><a href="./single/<?php echo $df['id'];?>" class="text-black"><span class="display-inline-block margin-5px-bottom alt-font"><?php echo $df['title'];?></span></a> <span class="clearfix text-black alt-font text-small"><?php echo date("M j, Y", strtotime($df['date'])); ?></span></div>
        </li>
<?php } ?>
    </ul>
</div>