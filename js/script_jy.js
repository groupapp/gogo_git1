function submitemail(frm) {
	if(frm.CustomerName.value==''){
		alert("Your name cannot be empty!");
		frm.CustomerName.focus();
		return false;
	}
	if(frm.CustomerEmailAddress.value==''){
		alert("E-mail address cannot be empty!");
		frm.CustomerEmailAddress.focus();
		return false;
	}
	if(frm.Subject.value==''){
		alert("Subject cannot be empty!");
		frm.Subject.focus();
		return false;
	}
	if(frm.Message.value==''){
		alert("Message cannot be empty!");
		frm.Message.focus();
		return false;
	}
	frm.submit();
}

function Confirm_ToNextPage(frm) {
	if (frm.GiftCertificate_Amount.value=='') {
	       alert("Select a gift certificate.");
	       frm.GiftCertificate_Amount.focus();
	       return false;
	    }
    if (frm.CreditCardName.value=='') {
       alert("Select a credit card for your payment.");
       frm.CreditCardName.focus();
       return false;
    }
    if (frm.CardNumber.value=='') {
       alert("Enter a credit card number for your payment.");
       frm.CardNumber.focus();
       return false;
    }
    if (isNaN(frm.CardNumber.value)) {
    	alert("Please enter numbers!");
        frm.CardNumber.focus();
        return false;
     }
    if (frm.CardSecurityCode.value=='') {
       alert("Enter the Card Security Code of the credit card.");
       frm.CardSecurityCode.focus();
       return false;
    }
    if (frm.CardExpireMonth.value=='') {
    	alert("Enter the expiration month of the credit card");
    	frm.CardExpireMonth.focus();
    	return false;
    }
    if (isNaN(frm.CardExpireMonth.value)) {
        alert("Please enter numbers!");
        frm.CardExpireMonth.focus();
        return false;
     }
    if ((frm.CardExpireMonth.value)>12) {
        alert("Enter the expiration month of the credit card.");
        frm.CardExpireMonth.focus();
        return false;
     }
    if (frm.CardExpireYear.value=='') {
       alert("Enter the expiration year of the credit card.");
       frm.CardExpireYear.focus();
       return false;
    }
    if (isNaN(frm.CardExpireYear.value)) {
    	alert("Please enter numbers!");
    	frm.CardExpireYear.focus();
    	return false;
    }
    if ((frm.CardExpireYear.value)<2013) {
    	alert("Enter the expiration year of the credit card.");
    	frm.CardExpireYear.focus();
    	return false;
    }
    if (frm.MailingFirstName.value=='') {
       alert("Enter the first name of the card holder.");
       frm.MailingFirstName.focus();
       return false;
    }
    if (frm.MailingLastName.value=='') {
       alert("Enter the last name of the card holder.");
       frm.MailingLastName.focus();
       return false;
    }
    if (frm.MailingStreet.value=='') {
       alert("Enter the street address of the billing address.");
       frm.MailingStreet.focus();
       return false;
    }
    if (frm.MailingCity.value=='') {
       alert("Enter the city of the billing address.");
       frm.MailingCity.focus();
       return false;
    }
    if (frm.MailingStateOrProvince.value=='') {
       alert("Enter the State or Province of the billing address.");
       frm.MailingStateOrProvince.focus();
       return false;
    }
    if (frm.MailingZipcode.value=='') {
       alert("Enter the zipcode of the billing address.");
       frm.MailingZipcode.focus();
       return false;
    }
    if (frm.MailingCountry.value=='') {
       alert("Enter the country of the billing address.");
       frm.MailingCountry.focus();
       return false;
    }
    if (frm.MailingPhone.value=='') {
       alert("Enter a phone number of the billing address.");
       frm.MailingPhone.focus();
       return false;
    }
    if (frm.MailingEmailAddress.value=='') {
       alert("Enter an e-mail address of the billing address.");
       frm.MailingEmailAddress.focus();
       return false;
    }

    //frm.submit();
    return true;
}
function delimgx() {
    alert('x');
}


function showStuff(id) {
    document.getElementById(id).style.display = 'block';
}
function hideStuff(id) {
    document.getElementById(id).style.display = 'none';
}

function Subscribe(frm){
	if(frm.email.value==''){
		alert("If you want to send newsletter, please enter your e-mail!");
		frm.email.focus();
		return false;
	} 
	if(checkNewsletter(frm.email.value)){
		alert("Your e-mail address is already registered with us.\nThank you.");
		frm.email.focus();
		return false;
	}
//	frm.action.value="submit";
	return ValidateEmail(frm);	
}

function ValidateEmail(frm){
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(frm.email.value.match(re)){
		return true;
	}else{
		alert("You have entered an invalid email address!"); 
		frm.email.focus();
		return false;
	}
	
	frm.submit();
}

function Retrieve(frm){
	if(frm.EmailAddress.value==''){
		alert("Enter your e-mail address.");
		frm.EmailAddress.focus();
		return false;
	}
	
	frm.submit();
}

$(document).ready(function() {
	$('.color-sprite-cell').live({
		mouseenter:
		function() {
			var txtColor = $(this).attr('rel');
			$('#txt-color > span').html(txtColor);
		},
		mouseleave:
		function() {
			if($('#color').val() != ""){
				$('#txt-color > span').html($('#color').val());
			}else{
				$('#txt-color > span').html('');
			}
		}
	});
	$('.color-sprite-cell').click(function(){
		$('#color').val($(this).attr('rel'));
		$('#colorid').val($(this).attr('id'));
		$('.color-sprite-cell').each(function(){
			$(this).parent().removeClass();
		});
		$(this).parent().addClass("selected-sprite");
	}).mouseover(function(){
		$(this).parent().addClass("hovered-sprite");
	}).mouseout(function(){
		$(this).parent().removeClass("hovered-sprite");
	});
	
	$('.star-select').click(function(){
		var qstar
		$('input[name="rated"]').val($(this).html());
		qstar = $(this).parent().attr("class") + "star";
		$(this).closest('dl').removeClass();
		$(this).closest('dl').addClass("rating "+qstar);
	});
});	

function showName() {
	var p_name = document.getElementById("p_name");
	var show_name = document.getElementById("show_name");
	show_name.value = p_name.value.toUpperCase();
}

function showNumber() {
	var p_number = document.getElementById("p_number");
	var show_number = document.getElementById("show_number");
	show_number.value = p_number.value;
}

function Review(frm) {
	if(frm.memid.value==''){
		alert('Please login first');
		window.location='/?page=customer&account=login';
	}else{
		if(frm.rated.value==''){
			alert("Please select your rate!");
			return false;
		}
		if(frm.review.value==''){
			alert("Please post your review!");
			frm.review.focus();
			return false;
		}
		frm.submit();
	}
}

function Focus(frm){
	var search = document.getElementById("search");
	if(search.value=='Search product, item #...'){
		search.value = '';
	}
}

function Blur(frm){
	var search = document.getElementById("search");
	if(search.value==''){
		search.value = 'Search product, item #...';
	}
}

function confirmPassword(frm) {
	if(frm.password.value!=frm.confirm_password.value){
		alert('Please enter same password!');
		frm.confirm_password.focus();
		return false;
	}
	frm.submit();
}

function bulkList(id){
	//var bulk = document.getElementById('bulk');
	if($('#bulk').is(":checked")){
		document.getElementById(id).style.display = 'block';
		document.getElementById('addcart').style.display = 'none';
	}else{
		document.getElementById(id).style.display = 'none'
		document.getElementById('addcart').style.display = 'block';
	}
}

function bulk_row(){
	var qty = $('#quantity_wanted').val();
	if(qty){
		var tr_max = parseInt($("#bulk_table > tbody > tr").length)-1;
		var max_no = 0;
//		alert(tr_max);
//		alert(parseInt(qty));
		if(tr_max > parseInt(qty)){
			max_no = tr_max-parseInt(qty);
			for(var i = 0; i < max_no; i++){
				$("#bulk_table > tbody > tr:last").remove();
			}
		}
		else if(tr_max < parseInt(qty)){
			max_no = parseInt(qty)-tr_max;
			for(var i = 0; i < max_no; i++){
				j=i+2;
				$("<tr>",{
	/*				css:{
						"background-color":"#FFF"
					}*/
				}).appendTo("#bulk_table > tbody");
				$("<td>",{
					html:(i+1 + tr_max),
				/*	css:{
						"padding":"2px"
					}*/
				}).appendTo("#bulk_table > tbody > tr:last");
				$("<td>").appendTo("#bulk_table > tbody > tr:last");
				$("<input>",{
					type:"text",
					name:"bulk_size[]",
					id:"bulk_size_"+j,
					value:"",
					class:"inputbox"
			//		css:{"font-size":"11px","border":"none","width":"100%"}
				}).appendTo("#bulk_table > tbody > tr:last > td:last");
				
				$("<td>").appendTo("#bulk_table > tbody > tr:last");
				$("<input>",{
					type:"text",
					name:"bulk_color[]",
					id:"bulk_color_"+j,
					value:"",
					class:"inputbox"
			//		css:{"font-size":"11px","border":"none","width":"100%"}
				}).appendTo("#bulk_table > tbody > tr:last > td:last");
				$("<td>").appendTo("#bulk_table > tbody > tr:last");
				$("<input>",{
					type:"text",
					name:"bulk_BigNo[]",
					id:"bulk_BigNo_"+j,
					value:"",
					"maxlength":"2",
					class:"inputbox"
			//		css:{"font-size":"11px","border":"none","width":"100%"}
				}).appendTo("#bulk_table > tbody > tr:last > td:last");
				$("<td>").appendTo("#bulk_table > tbody > tr:last");
				$("<input>",{
					type:"text",
					name:"bulk_smallNo[]",
					id:"bulk_smallNo_"+j,
					value:"",
					"maxlength":"2",
					class:"inputbox"
			//		css:{"font-size":"11px","border":"none","width":"100%"}
				}).appendTo("#bulk_table > tbody > tr:last > td:last");
				$("<td>").appendTo("#bulk_table > tbody > tr:last");
				$("<input>",{
					type:"text",
					name:"bulk_ShortsNo[]",
					id:"bulk_ShotsNo_"+j,
					value:"",
					"maxlength":"2",
					class:"inputbox"
			//		css:{"font-size":"11px","border":"none","width":"100%"}
				}).appendTo("#bulk_table > tbody > tr:last > td:last");
				$("<td>").appendTo("#bulk_table > tbody > tr:last");
				$("<input>",{
					type:"text",
					name:"bulk_name[]",
					id:"bulk_name_"+j,
					value:"",
					class:"inputbox"
			//		css:{"font-size":"11px","border":"none","width":"100%"}
				}).appendTo("#bulk_table > tbody > tr:last > td:last");
				
			}
		}
	}
	var bulk_row = document.getElementById('bulk_row');
	bulk_row.value = qty;
}

