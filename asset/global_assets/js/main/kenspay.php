
<script type="text/javascript">
//$row['id']

  var user_id =<?php echo $row['id'];?>;
 function load_unseen_notification(view = '')


 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view,user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '#dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 


  $('#net').on('change', function(e){

  var buy = $("#deno").val();

  var net = $("#net").val();

  var quantity = $("#quantity").val();

  //$("#percent").text(rate);


    $.ajax({
            url:'com.php',
            data:{'buy':buy, 'quantity':quantity, 'net':net},
            
            type:'POST',
 success:function(data)
            {
              var serv=data;

                $('#percent').html(serv);
$('#nt').html(net);

//img
if(net) {

$.ajax({
            url:'img.php',
            data:{'net':net},
            
            type:'POST',
 success:function(data)
            {
              var imge=data;
$('#img').html(imge);
   },
});
} // end img




//amount
if(net) {

$.ajax({
            url:'amount.php',
            data:{'net':net},
            
            type:'POST',
 success:function(data)
            {
              var amount=data;
$('#variation').html(amount);
   },
});
} // end amount


 //$('#img').html(' <img src="../asset/images/dashboard/MTN.jpg" height="100" width="100" />');


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
            url:'com.php',
            data:{'buy':buy, 'quantity':quantity, 'net':net},
            
            type:'POST',
 success:function(data)
            {
              var serv=data;

                $('#percent').html(serv);
               },
});
});


$('#deno').on('keyup', function(e){

  var buy = $("#deno").val();

  var net = $("#net").val();

  var quantity = $("#quantity").val();
 // var rate = (buy) * (quantity);

  //$("#percent").text(rate);

    $.ajax({
            url:'com.php',
            data:{'buy':buy, 'quantity':quantity, 'net':net},
            
            type:'POST',
 success:function(data)
            {
              var serv=data;

                $('#percent').html(serv);
               },
});
});


$('#variation').on('change', function(e){

  var buy = $("#deno").val();

  var net = $("#net").val();

  var variation = $("#variation").val();
 // var rate = (buy) * (quantity);

  //$("#percent").text(rate);

    $.ajax({
            url:'com.php',
            data:{'buy':buy, 'variation':variation, 'net':net},
            
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
            url:'com.php',
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

 $('#vloading').hide();

$('#billersCode').on('keyup', function(e){

  var billersCode=$('#billersCode').val();
  var net = $("#net").val();

  var variation = $("#variation").val();


        $.ajax({
            url:'v.php',
            data:{'billersCode':billersCode,'service':net,'type':variation},
            
            type:'POST',
  beforeSend:function(){
            $('#vloading').show();
            },

            success:function(data)
            {
              var verify_name=data;

      
if(verify_name!=''){//Thats if signed up

 $('#vloading').hide();
$('#verify_name').html(verify_name);
}
 },
});
});

$('#net').on('change', function(e){

  var billersCode=$('#billersCode').val();
  var net = $("#net").val();

  var variation = $("#variation").val();


        $.ajax({
            url:'v.php',
            data:{'billersCode':billersCode,'service':net,'type':variation},
            
            type:'POST',
  beforeSend:function(){
            $('#vloading').show();
            },

            success:function(data)
            {
              var verify_name=data;

      
if(verify_name!=''){//Thats if signed up

 $('#vloading').hide();
$('#verify_name').html(verify_name);
}
 },
});
});


 $('#submitairt').hide();
//start airtime
$('#submitairt').on('click', function(e) {
       e.preventDefault();


  var deno = $("#deno").val();

  var net = $("#net").val();

  var user_id = $("#user_id").val();

  var phone = $("#phone").val();

  var variation = $("#variation").val();

var page = $("#page").val();

  var billersCode=$('#billersCode').val();
 
  var quantity = $("#quantity").val();

  var temp_ran = $("#temp_ran").val();
  
   var token = $("#token").val();
   var gtoken = $("#gtoken").val();
 var ll = $("#ll").val();


 // var rate = (buy) * (quantity);

  //$("#percent").text(rate);
   if(phone.length!=11 || net=='select' || variation=='select' || deno<50) {
   alert('Please make a valid selection in all fields. Kindly also note that minimum amount is ₦50'); 



}// block execution if any of the fields is empty 
    
    
    else if(phone.length==11 && net!='select' && variation!='select' && deno>49) {
		

    $.ajax({ type:'POST',
            url:'../app/calculator/norder',
			 dataType: 'json',
            data:{deno:deno, phone:phone, net:net,user_id:user_id, page:page,variation:variation,billersCode:billersCode, quantity:quantity,token:token,gtoken:gtoken,temp_ran:temp_ran, ll:ll},
            
           
			
beforeSend:function(){
            $('#loader').show();
$('#hideicon').hide();
            },

 success:function(data)
            {       
if(data.code=='786') { 
window.location.href=page+'?n2o7t18=1';

} else if(data.code=='s0c') {
window.location.href=page+'?success=success';


} else if(data.code=='140') { window.location.href=page+'?lowwallet=i';

} else if(data.code=='141') { window.location.href=page+'?f=f';

}

//action="../app/user/norder"

               },
			    error:function(data) {
					alert("This transaction as been achieved. Click ok for more details");
 window.location.href='transaction';
				
}
					
});

} //end if


}); //end airtime


</script> 