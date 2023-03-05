
<div class="display-inline-block width-100 margin-45px-bottom md-margin-45px-top xs-margin-25px-bottom" id="search_trans">
	<div class="text-yellow margin-20px-bottom alt-font text-uppercase font-weight-500 text-small"><span>View Transaction</span></div>
	<div class="margin-100px-bottom">
    <form method="post" action="app/home/search/" id="modal-details2">
        <div class="position-relative">
            <input type="text" class="bg-white alt-font text-small no-margin border-color-medium-white medium-input pull-left margin-45px-bottom" name="trans_id" placeholder="Transaction Id" /><br><br>
            <input type="email" class="bg-white alt-font text-small no-margin border-color-medium-white medium-input pull-left" name="email" placeholder="Email" /><br><br>
            <input type="hidden" name="verification_code1" value="<?php echo $token;?>">
            <input type="hidden" name="security_code1" id="security_code1" value="1">
            <a class="btn btn-success border-radius-2 btn-medium popup-with-zoom-anim wow fadeInUp" data-wow-delay="0.6s" href="#modal-popup3">proceed  <i class="fa fa-arrow-right text-white"></i></a>
            <div class="col-md-12 text-center">
<div id="modal-popup3" class="zoom-anim-dialog mfp-hide col-lg-3 col-md-6 col-sm-7 col-xs-11 center-col bg-gradient-red text-center modal-popup-main padding-50px-all">
<span class="text-black text-uppercase alt-font text-extra-large font-weight-500 margin-15px-bottom display-block">Are you are human?</span>
<div class="margin-four text-medium letter-spacing-3 alt-font text-black text-uppercase margin-70px-bottom sm-margin-50px-bottom xs-margin-30px-bottom display-inline-block border-black-light padding-five-all bg-white "><?php echo $token;?></div>
<input type="number" id="security_cd1" id="boom1" placeholder="Security code *" class="bg-white border-color-medium-white medium-input alt-font" required/>
<button type="submit" class="btn btn-black border-radius-2 btn-medium" form="modal-details2">Confirm <i class="fa fa-arrow-right text-white"></i></button>
</div>
</div>
        </div>   
    </form>
    </div>
    <span class="text-white alt-font text-small">Please verify the details of your transaction using the above form. We can only protect you if the transaction exists on our system and all details are correct.</span>
</div>
