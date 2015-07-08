function SearchConfirm(frm) {
	if(frm.q.value==''){
		alert("Search character cannot be empty!");
		frm.q.focus();
		return false;
	}
	else if(frm.q.value.length <3){
		alert("Please input 2 more Character");
		frm.q.focus();
		return false;
	}
	else
	frm.submit();
}



function checkgift (Code) {
	var result;
	$.ajax({
		async:false,
		type:"post",
		url:"/lib/ajaxtools.php",
		data:{"mode":"checkgift", "Code": Code},
		dataType:"html",
		success: function(data) {
			result = (data);
		}
	});
	return result;
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


	