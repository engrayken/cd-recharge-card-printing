/*********************************************************************
* This script has been released with the aim that it will be useful.
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
* All Copy Rights Reserved by Vasplus Programming Blog
***********************************************************************/


//This is only for demo purpose - It will alert a loaded content when clicked on the content

function submit_without_page_refresh()
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var name = $("#name").val();
	var phone = $("#phone").val();
	var email = $("#email").val();
	var budget = $("#budget").val();
	var comment = $("#comment").val();
	
		var dataString = 'name='+ name + '&phone='+ phone + '&email='+ email + '&budget='+ budget + '&comment=' + comment;
		$.ajax({
			type: "POST",
			url: "mailproject.php",
			data: dataString,
			cache: false,
			beforeSend: function() 
			{
				$("#success-project-contact-form").html('<img src="images/loader.gif" alt="Loading...." align="absmiddle" title="Loading...."/>');
			},
			success: function(response)
			{
				$("#submit_without_page_refresh_status").hide().fadeIn('slow').html(response);
				$("#fullname").val('');
				$("#email").val('');
				$("#comment").val('');
			}
		});
	
}