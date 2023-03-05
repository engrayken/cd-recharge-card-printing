<?php
header('X-Frame-Options: Deny');

require_once("../app/config.php");

$title=addslashes('data');
require_once('include/user_header.php');
require_once('include/user_navbar.php');
require_once('include/user_sidebar.php');




$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
// Output: 54esmdr0qf
$per= substr(str_shuffle($permitted_chars), 0, 10);

$token = round(microtime(true));
$secret_key      = $per.$row['id'].$title;  //change this
 $encrypted_value=$token.$secret_key;

$_SESSION['good']=$encrypted_value;
$_SESSION['goch']=$_SERVER['PHP_SELF'];


$encrypted_values=password_hash($encrypted_value, PASSWORD_DEFAULT);
$_SESSION['enscripted']=$encrypted_values;

//fetch category
//$c =$da = mysqli_query($dbc, "SELECT * FROM pcat where cat_name='$title' ");
$da = $dbc->prepare("SELECT * FROM pcat where cat_name= ?");
$da->bind_param("s", $title);
$da->execute();
$c=$da->get_result();
if($c->num_rows > 0){ 

while($cate = $c->fetch_assoc()){
  $cat_id=$cate['cat_id'];


}
}
$da->close();
  ?>





    <div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
          <div class="page-title d-flex">
            <h4><i class="icon-cart-add mr-2"></i> <span class="font-weight-semibold">Order For Data</span></h4>
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



<?php 
//echo $_SESSION['good'];
if(isset($_GET['n2o7t18'])) { ?>
 <div class="alert bg-orange alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1 text-uppercase">alert</h6>
         Sorry The field can not be empty refill & request again.
          </div>

<?php }?>


<?php if(isset($_GET['f'])) { ?>
 <div class="alert bg-orange alert-styled-left alert-arrow-left alert-dismissible">
          <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
          <h6 class="alert-heading font-weight-semibold mb-1 text-uppercase">alert</h6>
         Transaction Failed.
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

<?php }?>


     <div class="card border-top-3 border-top-danger rounded-left-0">
        <div class="card-header header-elements-inline">
          <h6 class="card-title font-weight-semibold">Get instant top up</h6>

              <div class="header-elements">
                <div class="list-icons text-orange-600">
                <a class="list-icons-item" data-action="collapse"></a>

              </div>
            </div>
        </div>

        <div class="card-body">

          <form id="pur" action="" method="post">

<table><tr><td><h5><div id='nt' style='text-transform:uppercase'></div>
  </h5></td><td>
</td></tr></table>

<br/>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Select Network</label>
                <div class="col-lg-10">
                  <select class="form-control select" name="net" id="net" data-dropdown-css-class="bg-purple" data-fouc required>

    <option value="select">Click To Select network</option>

           <?php   
//$pq =$da = mysqli_query($dbc, "SELECT * FROM pidentifier where identifier_cat='$cat_id' ");

$da = $dbc->prepare("SELECT * FROM pidentifier where identifier_cat= ?");
$da->bind_param("s", $cat_id);
$da->execute();
$pq=$da->get_result();
$da->close();


if($pq->num_rows > 0){ 

         while($ident_row = $pq->fetch_assoc()){
   $identifier_serviceID=$ident_row['identifier_serviceID'];

$ident_serviceID=strtoupper($ident_row['identifier_serviceID']);

  ?>


    <option value="<?php echo clean($identifier_serviceID); ?>"><?php echo clean($ident_serviceID);?></option>


  <?php
  }
}
  ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Phone Number</label>
                <div class="col-lg-10">
                  <div class="input-group">
                  <input type="text" name="phone" id="phone" maxlength="11" class="form-control" placeholder="08126216200" required />
                  <input type="hidden" name="user_id" id="user_id" value="<?php echo clean($row['id']);?>"> 

  <input type="hidden" name="page" id="page" value="data"> 

    <input type="hidden" class="form-control" name="deno" id="deno" value="100" required />

<input value="<?php echo clean($encrypted_value);?>" name="temp_ran" id="temp_ran" type="hidden"  />

  <input type="hidden" name="token" id="token" value="<?php echo clean($token);?>"> 


                    <span class="input-group-append">
                   
                    </span>
                  </div>
                </div>
              </div>
        
              <p>Amount</p>
             <select class="form-control select" name="variation" id="variation" data-dropdown-css-class="bg-purple" data-fouc required>
  <option value="select">Waiting for network selection....</option>
</select>
           
                  </div>
           

            <p>Amount To Pay</p>
<div id='percent'>waiting for Amount...</div>
                       
            <div class="text-right">
                <button id="submit"  class="btn bg-orange">Submit<i class="icon-paperplane ml-2"></i></button>
 <button id="submitairt"  class="btn bg-green">Confirm<i class="icon-paperplane ml-2"></i></button>

 </div>    
     </div>
</div>
         		 <script>
    $('#pur').submit(function(event) {
        event.preventDefault();
       //  var submitair = $('#submitair').val();
	//   $('#submitairt').show();

		
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo $set['pkey']; ?>', {action: '<?php echo clean($encrypted_value);?>'}).then(function(token) {
                $('#pur').prepend('<input type="hidden" id="gtoken" name="gtokens" value="' + token + '">');
                $('#pur').prepend('<input type="hidden" id="ll" name="ll" value="<?php echo clean($_SESSION['goch']); ?>">');
                $('#pur').unbind('submit').submit();
				$('#submit').hide();
				$('#submitairt').show();
				alert("Are you sure you want proceed. Click confirm buttton");
            });;
        });
  });
  </script>  
 
          </form>

        </div>
      </div>
  </div>
<div class="load" id="loader"><div class="loader"></div></div>

<?php require_once('include/user_footer.php');?>
<?php include('../asset/global_assets/js/main/kenspay.php');?>
