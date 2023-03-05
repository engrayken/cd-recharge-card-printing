<?php
require_once("../app/config.php");
$title="Order New Product";
$titles="OrderNewProduct";
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');




$token = round(microtime(true));
$secret_key      = 'fjd3vkenuw'.$row['id'].'KonURefg'.$titles;  //change this
 $encrypted_value=$token.$secret_key.time();

$_SESSION['good']=$encrypted_value;

$_SESSION['goch']=$_SERVER['PHP_SELF'];

$encrypted_values=password_hash($encrypted_value, PASSWORD_DEFAULT);
$_SESSION['enscripted']=$encrypted_values;


?>
<style>
.load{
background: rgb(136, 66, 213, 0.4); 
position: absolute;

  border: 1px solid #f3f3f3;
  border-radius: 1%;
  
  width: 100%;
  height: 100%;

}

.loader { position: absolute;
  left: 50%;
   top: 50%;
  z-index: 1;
  border: 1px solid #f3f3f3;
  border-radius: 50%;
  border-top: 2px solid blue;
  border-bottom: 2px solid blue;
  width: 30px;
  height: 30px;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(720deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(720deg); }
}
</style>
    <div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
            <h4><i class="icon-cart-add mr-2"></i> <span class="font-weight-semibold">Order New Product</span></h4>
          </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
            <div class="breadcrumb">
              <a href="./" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            </div>
          </div>

      
      </div>
      <!-- /page header -->



<div class="content">
  <div class="card border-left-3 border-left-orange rounded-left-0">
    <div class="card-body">
      <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
        <div>
          <ul class="list list-unstyled mb-0">
            <li><span class="font-weight-semibold">Note</span></li>
            <li>that you have to fill all necessary filed.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>



<?php if(isset($_GET['n2o7t18'])) { ?>
 <div class="alert bg-orange alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1 text-uppercase">alert</h6>
         Sorry The Quantity you are requesting for is not upto.  Kindly reduce and request again.
          </div>

<?php }?>


<?php if(isset($_GET['2718f'])) { ?>
 <div class="alert bg-orange alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1 text-uppercase">alert</h6>
         Sorry the lowest you can order is 10 quantity.
          </div>

<?php }?>


<?php  

if(isset($_GET['n2o7tp18'])) { ?>
 <div class="alert bg-orange alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1 text-uppercase">alert</h6>
         Sorry The field can not be empty refill & request again.
          </div>

<?php }?>

<?php if(isset($_GET['lowwallet'])) { 
?>
 <div class="alert bg-orange alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1 text-uppercase">insufficient fund</h6>
         Sorry you did not have enough. Please kindly fund your wallet.
          </div>

<?php }
?>


<?php if(isset($_GET['success'])) { ?>
 <div class="alert bg-green alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1 text-uppercase">success</h6> Your order as been automaticaly dispatch.
          </div>

<?php }
//../app/card/norder order_product
?>


     <div class="card border-top-3 border-top-danger rounded-left-0">
        <div class="card-header header-elements-inline">
          <h6 class="card-title font-weight-semibold">Order New Product and make profit</h6>

              <div class="header-elements">
                <div class="list-icons text-orange-600">
                <a class="list-icons-item" data-action="collapse"></a>

              </div>
            </div>
        </div>

        <div class="card-body">
      <h4>Order For Pins</h4>
          <form id="cd" action="order_product" method="post">
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Select Network</label>
                <div class="col-lg-10">
                  <select class="form-control select" name="net" id="net" data-dropdown-css-class="bg-purple" data-fouc required>
                  <option value="mtn">MTN</option>
         <option value="airtel">AIRTEL</option>
         <option value="glo">GLO</option>
         <option value="9mobile">9MOBILE</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Quantity</label>
                <div class="col-lg-10">
                  <div class="input-group">
                  <input type="number" name="quantity" id="quantity" maxlength="" value="1" class="form-control" required="">
                  <input type="hidden" name="user_id" id="user_id" value="<?php echo clean($row['id']);?>"> 
                  <input type="hidden" name="token" id="token" value="<?php echo clean($token);?>"> 
				  <input value="<?php echo clean($encrypted_value);?>" name="temp_ran" id="temp_ran" type="hidden"  />
                    <span class="input-group-append">
                   
                    </span>
                  </div>
                </div>
              </div>
        
              <p>Denomination</p>
              <div class="form-group row">
               <div class="col-lg-6">
                  <select class="form-control select" name="deno" id='deno' data-dropdown-css-class="bg-purple" data-fouc required>
                  <option value="50">50 <?php echo clean($scan2['currency']);?></option>
         <option value="100">100 <?php echo clean($scan2['currency']);?></option>
         <option value="200">200 <?php echo clean($scan2['currency']);?></option>
         <option value="500">500 <?php echo clean($scan2['currency']);?></option>
       <option value="1000">1000 <?php echo clean($scan2['currency']);?></option>
                  </select>
     
                  </div>
                </div>
            <p>Amount To Pay</p>
<div id='percent'>48.5 NGN</div>
              </div>              
            <div class="text-right">
           <button id="submit"  class="btn bg-orange">Submit<i class="icon-paperplane ml-2"></i></button>
 <button id="submitairt"  class="btn bg-green">Confirm<i class="icon-paperplane ml-2"></i></button>




            </div>
			
			<script>

 $('#submitairt').hide();

  $('#cd').submit(function(event) {
        event.preventDefault();
      

		
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo $set['pkey']; ?>', {action: '<?php echo clean($encrypted_value);?>'}).then(function(token) {
                $('#cd').prepend('<input type="hidden" id="gtoken" name="gtokens" value="' + token + '">');
                $('#cd').prepend('<input type="hidden" id="ll" name="ll" value="<?php echo clean($_SESSION['goch']); ?>">');
                $('#cd').unbind('submit').submit();
				 alert("Are you sure you want proceed. Click confirm buttton");
				$('#submit').hide();
				$('#submitairt').show();
            });
        });
  });
  
				 </script>
 
          </form>

        </div>
      </div>
  </div>
<div class="load" id="loader"><div class="loader"></div></div>

<?php require_once('include/user_footer.php');?>


<script type="text/javascript">

  $('#net').on('change', function(e){

  var buy = $("#deno").val();

  var net = $("#net").val();

  var quantity = $("#quantity").val();
 // var rate = (buy) * (quantity);

  //$("#percent").text(rate);

    $.ajax({
            url:'rate.php',
            data:{'buy':buy, 'quantity':quantity, 'net':net},
            
            type:'POST',
 success:function(data)
            {
              var serv=data;

                $('#percent').html(serv);
               },
});
});

$('#deno').on('change', function(e){

  var buy = $("#deno").val();

  var net = $("#net").val();

  var quantity = $("#quantity").val();
 // var rate = (buy) * (quantity);

  //$("#percent").text(rate);

    $.ajax({
            url:'rate.php',
            data:{'buy':buy, 'quantity':quantity, 'net':net},
            
            type:'POST',
 success:function(data)
            {
              var serv=data;

                $('#percent').html(serv);
               },
});
});


$('#quantity').on('keyup', function(e){

  
  var buy = $("#deno").val();

  var net = $("#net").val();

  var quantity = $("#quantity").val();
 // var rate = (buy) * (quantity);

  //$("#percent").text(rate);

    $.ajax({
            url:'rate.php',
            data:{'buy':buy, 'quantity':quantity, 'net':net},
            
            type:'POST',

 success:function(data)
            {
              var serv=data;

                $('#percent').html(serv);
               },
});
});


$('#loader').hide();
//$('#submit').hide();


$('#submitairt').on('click', function(e){

  

  var deno = $("#deno").val();

  var net = $("#net").val();

  var user_id = $("#user_id").val();
  
  var token = $("#token").val();

 var gtoken = $("#gtoken").val();
 
  var ll = $("#ll").val();

  var quantity = $("#quantity").val();
  var temp_ran = $("#temp_ran").val();

  //$("#percent").text(rate);

    $.ajax({
            url:'../app/card/norder',
			 dataType: 'json',
            data:{'deno':deno, 'quantity':quantity, 'net':net,'user_id':user_id,'token':token,'gtoken':gtoken,'ll':ll,'temp_ran':temp_ran},
            
            type:'POST',
beforeSend:function(){
            $('#loader').show();
$('#hideicon').hide();
            },

 success:function(data)
            {
              //var fetch=data;
if(data.code=='786') { window.location.href='order_product?n2o7t18=1';

} else if(data.code=='s0c') { window.location.href='order_product?success=success';

} else if(data.code=='141') { window.location.href='order_product?n2o7tp18=1';

} else if(data.code=='140') { window.location.href='order_product?lowwallet=i';

} else if(data.code=='131') { window.location.href='order_product?2718f=f';

}
//action="../app/user/norder"

               },
			   
						    error:function(data) {
					 window.location.href='order_product?success=success';
				
}
   
});
});



				
</script> 

 