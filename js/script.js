/******************************** scroll totop ********************************/
jQuery(function () {
 jQuery(window).scroll(function () {
  if (jQuery(this).scrollTop() > 100) {
   jQuery('#totop').fadeIn();
  } else {
   jQuery('#totop').fadeOut();
  }
 });

 // scroll body to 0px on click
 jQuery('#totop a').click(function () {
  jQuery('body,html').stop(false, false).animate({
   scrollTop: 0
  }, 800);
  return false;
 });
});
/********************************scroll totop ********************************/

String.prototype.padLeft = function(l,c) { return Array(l-this.length+1).join(c||" ")+this }

function listItems(page,v) {
    setCookie(page,v);
    location.reload();
}

function setCookie(cname,value,expdays) {
    var expdate = new Date();
    expdate.setDate(expdate.getDate() + expdays);
    var cvalue = value + ((expdays==null) ? "" : "; expires="+expdate.toUTCString());
    document.cookie=cname + "=" + cvalue;
}

function createCookie(name,value,days) {
//alert(name);
//alert(value);
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
function eraseCookie(name) {
	createCookie(name,"",-1);
}
 

function setLocation(url){
    window.location.href = url;
}
function setPLocation(url, setFocus){
    if( setFocus ) {
        window.opener.focus();
    }
    window.opener.location.href = url;
}
function popWin(url,win,para) {
    var win = window.open(url,win,para);
    win.focus();
}

function onepageLogin() {
	$('#login-form').submit();
}

function showStates() {
	var ccode = "US";
	$("#txt-region").css("display","none");
	$("#region").css("display","block");
	$("#region").html('');
	$.ajax({
		async:false, type:"post", dataType:"json", url:"/lib/states.php",
		data:{"code":ccode},
		success:function(d) {
			if (d) {
				for(var i=0; i<d.states.length; i++) {
					$("#region").append("<option value="+d.states[i].scode+">"+d.states[i].sname+"</option>");
				}
			}
		}
	});
}

function showStates2(arg1, arg2, ccode, scode) {
	var selected;
	if (!ccode) ccode = "US";
	$(arg1).css("display","none");
	$(arg2).css("display","block");
	if (arg1.indexOf("id")>=0) {
		$(arg2).val(scode);
	} else {
		$(arg2).html('');
		$.ajax({
			async:false, type:"post", dataType:"json", url:"/lib/states.php",
			data:{"code":ccode},
			success:function(d) {
				if (d) {
					for(var i=0; i<d.states.length; i++) {
						//$(arg2).append(new Option(d.states[i].sname,d.states[i].scode,false,false));
						if (scode.toUpperCase()==d.states[i].scode || scode.toUpperCase()==d.states[i].sname.toUpperCase()) {
							selected = "selected";
						} else {
							selected = "";
						}
						$(arg2).append("<option value='"+d.states[i].scode+"' "+selected+">"+d.states[i].sname+"</option>");
					}
				}
			}
		});
	}
}

function showStates3(ccode) {
	if (!ccode) ccode = $('#billing\\:country_id option:selected').val();
	if(ccode=="US" || ccode=="CA" || ccode=="MX") {
		$('#shipping\\:region').hide();
		$('#shipping\\:region_id').show();
		$('#shipping\\:region_id').html('');
		$.ajax({
			async:false, type:"post", dataType:"json", url:"/lib/states.php",
			data:{"code":ccode},
			success:function(d) {
				if (d) {
					for(var i=0; i<d.states.length; i++) {
						$('#shipping\\:region_id').append(new Option(d.states[i].sname,d.states[i].scode,false,false));
					}
				}
			}
		});
	}
}

function putShippingWeight(id, w) {
	$('#'+id).val(w);
}

/******************************** Checkout ********************************/
$(document).ready(function() {
	$('.step-title').click(function() {
		if($(this).parent('li[id^="opc-"]').attr('class')=="section allow") {
			var target = $(this).parent('li').attr('id').replace("opc-","");
			checkout_step(target);
		}
	});
});

function checkout_step(step) {
	var steps = ['login', 'billing', 'shipping', 'amazon-shipping', 'shipping_method', 'payment', 'review'];
	var pstep, flag = true, checkoutas = $('#billing\\:checkoutas').val();
	$('dt#b-address > div').removeClass("shown").addClass("hidden");
	$('dt#s-address > div').removeClass("shown").addClass("hidden");
	$('dt#s-method > div').removeClass("shown").addClass("hidden");
	jQuery.each(steps, function() {
		$('#opc-' + this).removeClass("active");
		$('#opc-' + this).removeClass("allow");
		$('#checkout-step-' + this).css("display","none");
		if (pstep && flag) {
			if (pstep!="billing" || checkoutas!="amazoncheckout") {
				$('#opc-' + pstep).addClass("allow");
				$('dt#b-address > div').removeClass("hidden").addClass("shown");
			}
			if (pstep=="shipping") $('dt#s-address > div').removeClass("hidden").addClass("shown");
			if (pstep=="shipping_method") $('dt#s-method > div').removeClass("hidden").addClass("shown");
		}
		if (this == step) {
			$('#opc-' + this).addClass("active");
			$('#opc-' + this).addClass("allow");
			if (checkoutas=="amazoncheckout" && this == "shipping") {
				$('#checkout-step-amazon-' + this).fadeIn("fast");
			} else {
				$('#checkout-step-' + this).fadeIn("fast");
			}
			flag = false;
		}
		pstep = this;
	});
}

function checkout_method() {
	var mcheckout = $('#loginregister').val();
	//alert('sss');
	//var mcheckout = $('input[name="checkout_method"]:checked').val();
	if (mcheckout) {
		checkout_step("billing");
		if (mcheckout=="guest")
			$('#register-customer-password').addClass('no-display');
		else
			$('#register-customer-password').removeClass('no-display');
	} else {
		alert("Please select one of the checkout methods.")
	}
}

function address_fillup(email) {
	$('body').addClass("loading");
	$.ajax({
		type:"post",
		url:"/lib/ajaxtools.php",
		data:{"mode":"address_fillup", "email": email},
		dataType:"json",
		success: function(d) {
			$('#billing\\:checkoutas').val('sshopmember');
			$('#billing\\:firstname').val(d.customer[0].fname);
			$('#billing\\:lastname').val(d.customer[0].lname);
			$('#billing\\:company').val(d.customer[0].company);
			$('#billing\\:email').val(d.customer[0].email);
			$('#billing\\:street1').val(d.customer[0].addr1);
			$('#billing\\:street2').val(d.customer[0].addr2);
			$('#billing\\:city').val(d.customer[0].city);
			$('#billing\\:postcode').val(d.customer[0].zip);
			$('#billing\\:country_id').val(d.customer[0].country);
			if (d.customer[0].country=="US"||d.customer[0].country=="USA"||d.customer[0].country=="CA"||d.customer[0].country=="MX") {
				showStates2('#billing\\:region', '#billing\\:region_id', d.customer[0].country, d.customer[0].state);
				//$('#billing\\:region_id').text(d.customer[0].state);
			} else {
				showStates2('#billing\\:region_id', '#billing\\:region', d.customer[0].country, d.customer[0].state);
			}
			$('#billing\\:telephone').val(d.customer[0].tel);
			$('#billing\\:fax').val(d.customer[0].fax);
			$('#billing\\:address_status').val('1')
		}
	});
	$('body').removeClass("loading");
	$('#billing\\:uid').val(email);
	$('#register-customer-password').addClass('no-display');
}

function billing_save() {
	var msg = "";
	$.each($('input[id^="billing:"], select[id^="billing:"]'), function() {
		if ($(this).hasClass("required-entry") && $(this).is(":visible") && $(this).val()=="") {
			if (!$(this).is(":hidden")) {
				msg += "\n " + $(this).attr("title") + " cannot be empty.";
				$(this).addClass("validation-failed");
			}
		}
	});
	if ($('#billing\\:checkoutas').val()=="register") {
		if (checkEmail($('#billing\\:email').val())) {
			msg += "\n The email address is already registered with us.";
			$('#billing\\:email').addClass("validation-failed");
		}
	}
	if (msg) {
		alert(msg);
		return false;
	} else {
		
		$('#billing-please-wait').show();
		var b_state = ($('#billing\\:region_id option:selected').val()&&$('#billing\\:region_id').is(":visible"))?$('#billing\\:region_id option:selected').val():$('#billing\\:region').val();
		var b_addr = '<dd class="complete b_address"><address>'+$('#billing\\:firstname').val()+' '+$('#billing\\:lastname').val()+'<br/>'+$('#billing\\:company').val()+'<br/>'+$('#billing\\:street1').val()+'<br/>'+$('#billing\\:city').val()+', '+b_state+', '+$('#billing\\:postcode').val()+'<br/>'+$('#billing\\:country_id option:selected').text()+'</address></dd>';
		var s_addr = b_addr.replace("b_address","s_address");
		if ($('#billing\\:use_for_shipping_yes:checked').val()>0) {
			$('#billing\\:address_status').val("1");
		} else {
			$('#billing\\:address_status').val("");
		}
		$('dd.b_address').remove();
		//alert(b_addr);
		$('dt#b-address')
			.addClass("complete")
			.after(b_addr);
		$('dt#b-address > div').removeClass("hidden").addClass("shown");
		if ($('#billing\\:use_for_shipping_yes:checked').val()>0) {
			$('dd.s_address').remove();
			$('dt#s-address')
				.addClass("complete")
				.after(s_addr);
			$('dt#s-address > div').removeClass("hidden").addClass("shown");
			// insert biling data into shipping form
			copyAddress();
			checkout_step("shipping_method");
			$('#shipping_quote').html('');
			getShippingRates();
		} else {
			checkout_step("shipping");
		}
		$('#billing-please-wait').hide();
	}

}

function shipping_save() {
	var msg = "";
	$.each($('input[id^="shipping:"], select[id^="shipping:"]'), function() {
		if ($(this).hasClass("required-entry") && $(this).is(":visible") && $(this).val()=="") {
			if (!$(this).is(":hidden")) {
				msg += "\n " + $(this).attr("title") + " cannot be empty.";
				$(this).addClass("validation-failed");
			}
		}
	});
	
	if (msg) {
		alert(msg);
		return false;
	} else {
		$('#shipping-please-wait').show();
		$('#billing\\:address_status').val("2");
		var s_state = ($('#shipping\\:region_id').val())?$('#shipping\\:region_id').val():$('#shipping\\:region').val();
		var s_addr = '<dd class="complete s_address"><address>'+$('#shipping\\:firstname').val()+' '+$('#shipping\\:lastname').val()+'<br/>'+$('#shipping\\:company').val()+'<br/>'+$('#shipping\\:street1').val()+'<br/>'+$('#shipping\\:city').val()+', '+s_state+', '+$('#shipping\\:postcode').val()+'<br/>'+$('#shipping\\:country_id option:selected').text()+'</address></dd>';
		
		$('dd.s_address').remove();
		$('dt#s-address')
			.addClass("complete")
			.after(s_addr);
		$('dt#s-address > div').removeClass("hidden").addClass("shown");
		checkout_step("shipping_method");
		$('#shipping-please-wait').hide();

		copyAddress();
		$('#shipping_quote').html('');
		getShippingRates();
	}
}

function amazon_shipping_save() {
	var sid = $('#amazon-sessionid').val();
	var now = new Date();
	//alert(now.toISOString());
	$.ajax({
		type:'get',
		//dataType:'html',
		url:'http://payments.amazon.com/cba/api/purchasecontract/',
		data:'Action=GetPurchaseContract&SignatureMethod=HmacSHA256&PurchaseContractId='+sid+'&AWSAccessKeyId=A21NYBZ973TA6V&SignatureVersion=2&Timestamp='+now.toISOString()+'&Signature=CLZOdtJGjAo81IxaLoE7af6HqK0EXAMPLE&Version=2012-12-31',
		success: function(d) {
			alert(d);
		}
	});
}

function shippingMethod_save() {
	var msg = "", temp, tmp, stotal, tax, shipping, gtotal, s_method;
	temp = $('input[id^="shippingMethod:rateoption"]:checked').val();
	if (!temp) {
		msg += "\n Select a shipping method.";
	}
	
	if (msg) {
		alert(msg);
		return false;
	} else {
		$('#shipping-method-please-wait').show();
		var strCarrier 	= (temp.split("|"))[0];
		var intRate 	= (temp.split("|"))[1];
		if (intRate > 0) {
			//s_method = '<dd class="complete s_method"><address>'+temp.replace("|","  $")+'</address></dd>';
			s_method = '<dd class="complete s_method"><address>'+strCarrier+' $'+intRate+'</address></dd>';
		} else {
			s_method = '<dd class="complete s_method"><address>'+strCarrier+'</address></dd>';
		}
		$('dd.s_method').remove();
		$('dt#s-method')
			.addClass("complete")
			.after(s_method);
		$('dt#s-method > div').removeClass("hidden").addClass("shown");
		setRate(temp);
		checkout_step("payment");
		$('#shipping-method-please-wait').hide();
	}
	calcTotal();
}

function payment_save() {
	if ($('input[name="payment[method]"]:checked').val()) {
		var msg = "", temp, p_info, g_val;
		$.each($('input[id^="ccsave"],select[id^="ccsave"]'), function() {
			if ($(this).hasClass("required-entry") && $(this).val()=="") {
				if (!$(this).is(":hidden")) {
					msg += "\n " + $(this).attr("title") + " cannot be empty.";
					$(this).addClass("validation-failed");
				}
			}
		});
		if ($('#chk_giftcode').is(':checked') && $('#giftcard_code').val()=="") {
			msg += "\nPlease enter GiftCard number.";
			$('#giftcard_code').addClass("validation-failed");
		}
		if (msg) {
			alert(msg);
			return false;
		} else {
			$('#payment-please-wait').show();
			if (readCookie('VIPMember')!="Y") {
				g_val	= checkgift($('#giftcard_code').val());
				if (isNaN(g_val)) {
					g_val = 0;
				}
				$('#my-giftcard-amount').val(g_val);
				if (g_val > 0) {
					$('#payment_giftcard_code').val($('#giftcard_code').val());
				} else {
					if ($('#giftcard_code').val()!="") {
						$('#payment_giftcard_code').val('');
						$("div.alert").slideDown(1000, function() {
							$(this).delay(6000).slideUp(1000);
							$('.inner_alert').html("Your Giftcard has no balance.<button></button>");
						});
					}
				}
			}
			temp = $('input[name="payment[method]"]:checked').attr("title");
			if (temp.indexOf("Paypal")>=0) {
				p_info = '<dd class="complete p_method"><address>'+temp+'<br/>'+'</address></dd>';
				$('#paypalbtn').show();
				$('#review-buttons-container').hide();
			} 
			else if (temp.indexOf("Phone")>=0) {
				//p_info = '<dd class="complete p_method"><address>'+temp+'<br/>'+'</address></dd>';
				$('#payment_di_status').val('D');
				$('#paypalbtn').hide();
				$('#review-buttons-container').show();
			} 
			
			else {
				var cc_num = $('#ccsave_cc_number').val().toString();
				var masked = maskNumbers(cc_num);
				p_info = '<dd class="complete p_method"><address>'+temp+'<br/>'+$('#ccsave_cc_fname').val()+' '+$('#ccsave_cc_lname').val()+'<br/>'+$('#ccsave_cc_type option:selected').text()+': '+masked+'</address></dd>';
				$('#paypalbtn').hide();
				$('#review-buttons-container').show();
			}
			$('dd.p_method').remove();
			$('dt#p-method')
				.addClass("complete")
				.after(p_info);
			checkout_step("review");
			calcTotal();
			$('#payment-please-wait').hide();
		}
	} else {
		alert("Please select payment type first.");
	}
}

function review_save(status, transid) {
	var frmdata, myurl;
	if (status=="PF") {
		alert("Your Paypal Checkout had not been aprroved. Please check with your Amazon customer support.");
		return false;
	}
	if (status=="RE") {
		alert("Your Paypal Checkout has put this order in refund status..");
		return false;
	}
	if (status=="PI") {
		alert("Your Paypal Checkout has put this order in pending status. We will process your order accordingly as Paypal releases its pending status.");
		$('#payment_az_status').val('I'+transid);
	} else if (status=="PS") {
		$('#payment_az_status').val('S'+transid);
	}

	//alert($('#payment_di_status').val());

	$('body').addClass("loading");
	frmdata = $("form").serializeArray();
	frmdata.push({name:"fact", value:"process_cart"});
	$.ajax({
		type:'post',
		url:'https://lemontreeclothing.com/lib/checkout_action.php',
		data:frmdata,
		dataType:'html',
		success: function (data) {
			//alert(data);
			if (data=="Cart Error!") {
				//location.href="/?page=thankyou&oid="+data;
				location.href="/?page=sorry";
			} 
			else if (data=="Carderror"){
				location.href="/?page=carderror";
			}
			else {
				location.href="/?page=thankyou&oid="+data;
			}
			//$('body').removeClass("loading");
		}
	});
}

//Prepare Sutotal, Tax, Shipping, Grand Total
function calcTotal() {
	var temp, tmp, stotal, tax, shipping, gtotal, s_method, g_val, tendered, promo,mlevel;
	temp	 = $('input[id^="shippingMethod:rateoption"]:checked').val();
	g_val	 = parseFloat($('#my-giftcard-amount').val());
	stotal	 = parseFloat($('#my-subtotal').html().replace("$",""));
	nontax	 = $('#my-nontaxabletotal').val();
	tax		 = 0;//$('#billing\\:region_id').val()=="CA" ? (stotal-nontax)*.09 : 0; don
	tmp		 = temp.split("|");
	shipping = parseFloat(tmp[1]);
	
	mlevel=$('#ml').val();

	if (mlevel=="gold")
	{
		mleveldc =parseFloat(stotal)*0.01;

		
//alert(mleveldc);
		//mleveldc=parseFloat(tstotal).toFixed(2);
	}
	else if (mlevel=="platinum")
	{
		mleveldc =parseFloat(stotal)*0.03;
		
		//mleveldc=parseFloat(tstotal).toFixed(2);
	}
	else if (mlevel=="diamond")
	{
		mleveldc=0;
		shipping=0;
	}
	else
		mleveldc=0;
	$('input[name="cart[dc_member]"]').val(mleveldc.toFixed(2));
	

	if($('#my-promo').html()){
		promo = parseFloat($('#my-promo').html().replace("$",""));
		gtotal = stotal + tax + shipping - promo- mleveldc;
		$('input[name="cart[dc_promo]"]').val(promo);
	}else{
		gtotal = stotal + tax + shipping - mleveldc;
	}
	
	if ($('#my-saving').val()) {
		$('input[name="cart[saving]"]').val($('#my-saving').val());
	}
	if (g_val > 0) {
		if (gtotal > g_val) {
			gtotal -= g_val;
			tendered = g_val;
		} else {
			tendered = gtotal;
			gtotal = 0;
		}
	}

	

	$('#hgrandtotal').val(gtotal);
	if (tax>0) {
		$('.local-tax').css("display","block");
		$('#my-tax').html("$"+tax.toFixed(2));
	} else {
		$('.local-tax').css("display","none");
		$('#my-tax').html('');
	}
	if (g_val>0) {
		$('#tr-giftcard').css("display","block");
		$('#my-discount').html("-$"+tendered.toFixed(2));
		$('input[name="cart[dc_giftcard]"]').val(tendered.toFixed(2));
	} else {
		$('#tr-giftcard').css("display","none");
		$('#my-discount').html("-");
		$('input[name="cart[dc_giftcard]"]').val('');
	}
	 
	$('#member-discount').html("$"+mleveldc.toFixed(2));
	
	$('#my-shipping').html("$"+shipping.toFixed(2));
	$('#my-grandtotal').html("$"+gtotal.toFixed(2));
	//
	//alert($('#hgrandtotal').val());
	$('input[name="cart[subtotal]"]').val(stotal);
	$('input[name="cart[tax]"]').val(tax.toFixed(2));
	$('input[name="cart[tax]"]').val(tax.toFixed(2));
	$('input[name="cart[grandtotal]"]').val(gtotal.toFixed(2));
	$('input[name="amount"]').val('usd '+gtotal.toFixed(2));
	if (gtotal < 0.6) {
		$('#amazonbtn').hide();
		$('#payment_az_status').val('SPaid in full with Giftcard - Amazon Checkout.')
		$('#review-buttons-container').show();
	}
}

function copyAddress() {
	var txtID;
	$('input[id^="billing:"],select[id^="billing:"]').each(function() {
		if ($(this).val() && $(this).is(':visible')) {
			txtID = $(this).attr("id").replace("billing:","shipping\\:");
			if ($(this).attr("id")=="billing:region_id") {
				$('#shipping\\:region').hide();
				$('#shipping\\:region_id').show();
				showStates3();
			} else if ($(this).attr("id")=="billing:region") {
				$('#shipping\\:region_id').hide();
				$('#shipping\\:region').show();
			}
			$('#'+txtID).val($(this).val());
		}
	});
}

function copyBilling() {
	if ($('#shipping\\:same_as_billing').is(":checked")) {
		$('#checkout-step-billing').css("display","block");
		copyAddress();
		$('#checkout-step-billing').css("display","none");
	}
}

function maskNumbers(mynum) {
	var len = mynum.toString().length;
	var masked = mynum.substring(len-4).padLeft(len, "*");
	return masked;
}

function checkEmail (email) {
	var result;
	$.ajax({
		async:false,
		type:"post",
		url:"/lib/ajaxtools.php",
		data:{"mode":"checkemail", "email": email},
		dataType:"html",
		success: function(data) {
			result = parseInt(data);
		}
	});
	return result;
}

function checkNewsletter (email) {
	var result;
	$.ajax({
		async:false,
		type:"post",
		url:"/lib/ajaxtools.php",
		data:{"mode":"newsletter", "email": email},
		dataType:"html",
		success: function(data) {
			result = parseInt(data);
		}
	});
	return result;
}

function saveform(frm, act) {
	var frmdata = frm.serializeArray();
	frmdata.push({name:"fact",value:act});
	$.ajax({
		async:false,
		type: "post",
		url: "/lib/checkout_action.php",
		data: frmdata,
		dataType:"html",
		success: function (data) {
			if (parseInt(data)>0) {
				checkout_step("shipping");
			} else {
				alert("Please contact administrator.");
			}
		}
	});
}

function getShippingRates(ccode, scode, zcode, weight) {
	if (!ccode) ccode = $('#shipping\\:country_id').val();
	if (!scode) scode = $('#shipping\\:region_id :selected').val() ? $('#shipping\\:region_id :selected').val() : $('#shipping\\:region').val();
	if (!zcode) zcode = $('#shipping\\:postcode').val();
	if (!weight) weight = $('#shipping\\:lb_weight').val();
	var coupontype = $('#shipping\\:coupon_opt').val();
	var isFreeShip = $('#shipping\\:isfreeShip').val();
	var memberlebel = $('#memberlebel').val();
	
//	alert(isFreeShip); /*undefined statement*/
	
if(memberlebel=='diamond'){
		$('#shipping_quote').html('');
		$("#shipping_quote").append("<span><strong>Estimated Shipping Rate:</strong></span>");
		var list = $("#shipping_quote").append("<ul>").find("ul");
		list.append('<li><input type="radio" name="shippingMethod[rateoption]" checked id="shippingMethod:rateoption" value="Free shipping|0"/> <label for="shippingMethod:rateoption">Diamond member:Free shipping</label></li>');
}
else
{
	if (ccode && scode && zcode) {
		if (weight) {
			$('#shipping-options-wait').show();
			try {
				$.ajax({
					type: "post",
					dataType: "json",
					url: "/lib/estimate_shipping.php",
					data: {"ccode":ccode, "scode":scode, "zcode":zcode, "lb_weight":weight, "mode":"getaquote", "coupon_opt":coupontype, "isfreeShip":isFreeShip},
					success: function (d) {
						$('#shipping-options-wait').hide();
						$('#shipping_quote').html('');
						$("#shipping_quote").append("<span><strong>Estimated Shipping Rate:</strong></span>");
						var list = $("#shipping_quote").append("<ul>").find("ul");
						for(var i=0; i<d.rates.length; i++) {
							list.append('<li><input type="radio" name="shippingMethod[rateoption]" id="shippingMethod:rateoption-'+i+'" value="'+d.rates[i].carrier+'|'+(((d.rates[i].carrier).indexOf("FREE")>=0) ? 0 : d.rates[i].value)+'"/> '+'<label for="shippingMethod:rateoption-'+i+'">$' + d.rates[i].value + ' ' + d.rates[i].carrier+'</label></li>');
						}
						$("#shipping_quote").append("<p class='note-msg category-label'>We must receive your order before 3:00 pm (Pacific Time).</p>");
					}
				});
			} catch(e) {
			}
		}
		
		else {
			$('#shipping_quote').html('');
			$("#shipping_quote").append("<span><strong>Estimated Shipping Rate:</strong></span>");
			var list = $("#shipping_quote").append("<ul>").find("ul");
			list.append('<li><input type="radio" name="shippingMethod[rateoption]" id="shippingMethod:rateoption" value="E-mail delivery|0"/> <label for="shippingMethod:rateoption">E-mail delivery</label></li>');
		}
	} else {
		alert("Shipping Calculation Error!!");
	}
}

}

function setRate(v) {
	$('#shippingMethod\\:choice').val(v);
}


function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*7*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function nobang() {
$('#bangicon').css('display','none');
$('#bang').css('display','none');

setCookie("bangicon", 2, 1) 
 
}

function showbang_1() {


//alert('show');
$("#bang").slideDown(500);
//$('#blkcart').css('display','block');
$('#hidebang').css('display','block');
$('#showbang').css('display','none');

document.cookie="bangshow=y";

}

function hidebang_1() {

//alert('hide');
//$('#blkcart').css('display','none');
$("#bang").slideUp(500);
$('#hidebang').css('display','none');
$('#showbang').css('display','block');

document.cookie="bangshow=;expires=Thu, 01 Jan 1970 00:00:00 UTC";

}




function hide_share(id) {
//alert('hide');

var effect = 'slide';

    // Set the options for the effect type chosen
    var options = { direction: 'Right' };

    // Set the duration (default: 400 milliseconds)
    var duration = 300;

    //$("#share_hide_"+id).css('display','none');
	$("#share_item_"+id).hide( "slide", { direction: "Left"  }, 600 );
	$("#share_hide_"+id).hide( "slide", { direction: "up"  }, 1 );

//$("#share_item_"+id).slideRight(500);
//$("#share_hide_"+id).slideRight(500);
}

function show_share(id) {
var effect = 'slide';

    // Set the options for the effect type chosen
    var options = { direction: 'Right' };

    // Set the duration (default: 400 milliseconds)
    var duration = 300;
$("#share_item_"+id).show( "slide", { direction: "Right"  }, 100 );
$("#share_hide_"+id).show( "slide", { direction: "down"  }, 1 );
    /*
	$("#share_hide_"+id).css('display','block');
	$("#share_item_"+id).toggle(effect, options, duration);*/
}


function showcart() {

/*
var userID=getCookie("userID");
if(userID=="")
	{
	location='?page=customer&account=login';
	return false;
	}
*/
//alert('show');
$("#blkcart").slideDown(500);
//$('#blkcart').css('display','block');
$('#aup').css('display','block');
$('#adown').css('display','none');

document.cookie="cartshow=y";

}

function hidecart() {

//alert('hide');
//$('#blkcart').css('display','none');
$("#blkcart").slideUp(500);
$('#aup').css('display','none');
$('#adown').css('display','block');

document.cookie="cartshow=;expires=Thu, 01 Jan 1970 00:00:00 UTC";

}


function updateMiniCart() {
	$.ajax({
		type:"post",
		dataType:"html",
		url:"/lib/ajaxtools.php",
		data:{"mode":"update_mini_cart"},
		success: function(data) {
			$('.advanced-search-title > .block-content').html(data);
		}
	});
}

function amazon_failed() {
	alert('Amazon Checkout Process has been failed.');
}


function list_show(id){
	$('#vendor_item_'+id).slideDown(500);
	$('#show_'+id).css('display','none');
	$('#hide_'+id).css('display','block');
}	
		
function list_hide(id){
	$('#vendor_item_'+id).slideUp(500);
	$('#show_'+id).css('display','block');
	$('#hide_'+id).css('display','none');
}


function enterForm(event,id_vendor) {
     if(event.keyCode == 13) {

		
		
		var name=$('#custominput_'+id_vendor).val();
		//var id_vendor=$('#vendor_id').val();
		if (name=="")
		{
		return false;
		}
		$.ajax({
				async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
				data:{
					"name":name,
					"id_vendor":id_vendor,		
					"action":"customadd"
				},success:function(d){
					updateMiniCart();
					//parent.location.reload();
				}
			});
	 }
}

function customadd(id_vendor) {
	var name=$('#custominput_'+id_vendor).val();
	if (name=="")
		{
		return false;
		}

	$.ajax({
			async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
			data:{
				"name":name,
				"id_vendor":id_vendor,	
				"action":"customadd"
			},success:function(d){
				updateMiniCart();
				//parent.location.reload();
			}
		});
}

function remove_mini_item(item,id) {
	//if (confirm("Remove selected item from your shopping list?")) {
		$.ajax({
			async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
			data:{
				"id":item,			
				"action":"remove"
			},success:function(d){
				$('#cartchk_'+id).css('display','none');
				updateMiniCart();
				//parent.location.reload();
			}
		});
	/*} else {
		return false;
	}*/
}

function est_giftcard(f, opt) {
	if (opt == 'gift') {
		var isvip = readCookie("VIPMember");
		if (isvip=='Y') {
			alert("Gift certificates cannot be used with VIP member benefits.");
			return false;
		} else {
			if ($('#gift_code').val()) {
				f.submit();
				return true;
			} else {
				alert("Please enter the Gift Certificate code.");
				return false;
			}
		}
	} else if (opt == 'promo') {
		if ($('#txt_promo_code').val()) {
			f.submit();
			return true;
		} else {
			alert("Please enter the Coupon code.");
			return false;
		}
	}
	return false;
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function submitFrm(values,target) {
	var frm = ['<form method="post" action="', target, '">'];
	for (var key in values) {
		frm.push('<input type="hidden" name="', key, '" value="', values[key], '"/>');
	}
	frm.push('</form>');
	$(frm.join('')).appendTo('body')[0].submit();
}

function product_tabselect(me) {
	$('.tabs li').each(function() {
		$(this).removeClass("active");
	});
	$('.tabs li:nth-child('+me+')').addClass("active");
	$('.padder li').each(function() {
		$(this).removeClass("active");
	});
	$('.padder li:nth-child('+me+')').addClass("active");
}
