var ca_taxrate = .09;
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function submitFrm(values, target) {
    if (target.indexOf("checkout") >= 0) { }
    var frm = ['<form method="post" action="', target, '">'];
    for (var key in values) {
    	if (key == "total" && values[key] == "0") {
    		alert("Total amount must be greater than 0.");
    		return false;
    	}
    	if (key == "oos" && parseInt(values[key]) > 0) {
    		alert("Your basket contains out-of-stock item(s).\nPlease move them to wishlist or remove them to proceed.");
    		return false;
    	}
        frm.push('<input type="hidden" name="', key, '" value="', values[key], '"/>');
    }
    frm.push('</form>');
    $(frm.join('')).appendTo('body')[0].submit();
}


function showStates() {
    var ccode = "US";
    $("#txt-region").css("display", "none");
    $("#region").css("display", "block");
    $("#region").html('');
    $.ajax({
        async: false, type: "post", dataType: "json", url: "/actionsjaxtools.asp",
        data: { "mode":"getStates", "code": ccode },
        success: function (d) {
            if (d) {
                for (var i = 0; i < d.states.length; i++) {
                    $("#region").append("<option value=" + d.states[i].scode + ">" + d.states[i].sname + "</option>");
                }
            }
        }
    });
}

function showStates2(arg1, arg2, ccode, scode) {
    var selected;
   
   /*
    if (!ccode) ccode = "US";
    $(arg1).css("display", "none");
    $(arg2).css("display", "block");
    */

    if (arg1.indexOf("id") >= 0) {
        $(arg2).val(scode);
    } else {
        $(arg2).html('');
        $.ajax({
            async: false, type: "post", dataType: "json", url: "/actions/ajaxtools.asp",
            data: { "mode":"getStates", "code": ccode },
            success: function (d) {
                if (d) {
                    for (var i = 0; i < d.states.length; i++) {
                        //$(arg2).append(new Option(d.states[i].sname,d.states[i].scode,false,false));
                        if (scode.toUpperCase() == d.states[i].scode || scode.toUpperCase() == d.states[i].sname.toUpperCase()) {
                            selected = "selected";
                        } else {
                            selected = "";
                        }
                        $(arg2).append("<option value='" + d.states[i].scode + "' " + selected + ">" + d.states[i].sname + "</option>");
                    }
                }
            }
        });
    }
}


function showStates4(arg1, arg2, ccode, scode) {
	var selected;

	if (!ccode) ccode = "US";
	$(arg1).css("display", "none");
	$(arg2).css("display", "block");


	if (arg1.indexOf("id") >= 0) {
		$(arg2).val(scode);
	} else {
		$(arg2).html('');
		$.ajax({
			async: false, type: "post", dataType: "json", url: "/actions/ajaxtools.asp",
			data: { "mode": "getStates", "code": ccode },
			success: function (d) {
				if (d) {
					for (var i = 0; i < d.states.length; i++) {
						//$(arg2).append(new Option(d.states[i].sname,d.states[i].scode,false,false));
						if (scode.toUpperCase() == d.states[i].scode || scode.toUpperCase() == d.states[i].sname.toUpperCase()) {
							selected = "selected";
						} else {
							selected = "";
						}
						$(arg2).append("<option value='" + d.states[i].scode + "' " + selected + ">" + d.states[i].sname + "</option>");
					}
				}
			}
		});
	}
}

function showStates3(ccode) {
    if (!ccode) ccode = $('#billing\\:country_id option:selected').val();
    if (ccode == "US" || ccode == "CA" || ccode == "MX") {
        $('#shipping\\:region').hide();
        $('#shipping\\:region_id').show();
        $('#shipping\\:region_id').html('');
        $.ajax({
            async: false, type: "post", dataType: "json", url: "/actions/ajaxtools.asp",
            data: { "mode":"getStates", "code": ccode },
            success: function (d) {
                if (d) {
                    for (var i = 0; i < d.states.length; i++) {
                        $('#shipping\\:region_id').append(new Option(d.states[i].sname, d.states[i].scode, false, false));
                    }
                }
            }
        });
    }
}

function putShippingWeight(id, w) {
    $('#' + id).val(w);
}

function checkout_step(step) {
    var steps = ['login', 'billing', 'shipping', 'paypal-shipping', 'shipping_method', 'payment', 'review'];
    var pstep, flag = true, checkoutas = $('#billing\\:checkoutas').val();
    $('dt#b-address > div').removeClass("shown").addClass("hidden");
    $('dt#s-address > div').removeClass("shown").addClass("hidden");
    $('dt#s-method > div').removeClass("shown").addClass("hidden");
    $('dt#p-method > div').removeClass("shown").addClass("hidden");
	$('#checkout-statusbar').attr('class', step)
    jQuery.each(steps, function () {
        $('#opc-' + this).removeClass("active");
        $('#opc-' + this).removeClass("allow");
        $('#checkout-step-' + this).css("display", "none");
        if (pstep && flag) {
            if (pstep != "billing" || checkoutas != "paypalcheckout") {
                $('#opc-' + pstep).addClass("allow");
                $('dt#b-address > div').removeClass("hidden").addClass("shown");
            }
            if (pstep == "shipping") $('dt#s-address > div').removeClass("hidden").addClass("shown");
            if (pstep == "shipping_method") $('dt#s-method > div').removeClass("hidden").addClass("shown");
            if (pstep == "payment") $('dt#p-method > div').removeClass("hidden").addClass("shown");
        }
        if (this == step) {
            $('#opc-' + this).addClass("active");
            $('#opc-' + this).addClass("allow");
            if (checkoutas == "paypalcheckout" && this == "shipping") {
                $('#checkout-step-paypal-' + this).fadeIn("fast");
            } else {
                $('#checkout-step-' + this).fadeIn("fast");
            }
            flag = false;
        }
        pstep = this;
    });
}

function checkout_method() {
    var mcheckout = $('input[name="checkout_method"]:checked').val();
    if (mcheckout) {
        $('#billing\\:checkoutas').val(mcheckout);
        checkout_step("billing");
        $('#register-customer-password').removeClass('no-display');
    } else {
        alert("Please select one of the checkout methods.")
    }
}

$(document).ready(function () {
    $('.step-title').click(function () {
        if ($(this).parent('li[id^="opc-"]').attr('class') == "section allow") {
            var target = $(this).parent('li').attr('id').replace("opc-", "");
            checkout_step(target);
        }
    });
});

function address_fillup(email) {
    $('body').addClass("loading");
    $.ajax({
        type: "post",
        url: "/actions/ajaxtools.asp",
        data: { "mode": "address_fillup", "email": email },
        dataType: "json",
        success: function (d) {
		
            $('#billing\\:checkoutas').val('kurveshopmember');
            $('#billing\\:firstname').val(d.fname);
            $('#billing\\:lastname').val(d.lname);
            $('#billing\\:company').val(d.company);
            $('#billing\\:email').val(d.email);
            $('#billing\\:street1').val(d.addr1);
            $('#billing\\:street2').val(d.addr2);
            $('#billing\\:city').val(d.city);
            $('#billing\\:postcode').val(d.zip);
            if ((d.country).length > 2) {
                $('#billing\\:country_id').val(getCountryID(d.country));
            } else {
                $('#billing\\:country_id').val(d.country);
            }
            if (d.country == "US" || d.country == "USA" || d.country == "United States" || d.country == "CA" || d.country == "MX") {
                showStates2('#billing\\:region', '#billing\\:region_id', d.country, d.state);
                //$('#billing\\:region_id').text(d.state);
            } else {
                showStates2('#billing\\:region_id', '#billing\\:region', d.country, d.state);
            }
            $('#billing\\:telephone').val(d.tel);
            $('#billing\\:fax').val(d.fax);
            $('#billing\\:address_status').val('1')
        }
    });
    $('body').removeClass("loading");
    $('#billing\\:uid').val(email);
    $('#register-customer-password').addClass('no-display');
}

function ship_address_fillup(idx) {
    //alert(idx);
    $('body').addClass("loading");
    //alert(idx);
	$.ajax({
        type: "post",
        url: "/actions/ajaxtools.asp",
        data: { "mode": "ship_address_fillup", "idx": idx },
        dataType: "json",
        success: function (d) {
        	//alert(d.fname);
            $('#idx').val(idx);
            $('#shipping\\:firstname').val(d.fname);
            $('#shipping\\:lastname').val(d.lname);
            $('#shipping\\:email').val(d.email);
            $('#shipping\\:street1').val(d.addr1);
            $('#shipping\\:street2').val(d.addr2);
            $('#shipping\\:city').val(d.city);
            $('#shipping\\:postcode').val(d.zip);
			if ((d.country).length > 2) {
			    $('#shipping\\:country_id').val(getCountryID(d.country));
            } else {
			    $('#shipping\\:country_id').val(d.country);
            }
            if (d.country == "US" || d.country == "USA" || d.country == "United States" || d.country == "CA" || d.country == "MX") {
                showStates4('#shipping\\:region', '#shipping\\:region_id', d.country, d.state);
                //$('#billing\\:region_id').text(d.state);
            } else {
				showStates4('#shipping\\:region_id', '#shipping\\:region', d.country, d.state);
            }
            $('#shipping\\:telephone').val(d.tel);
            $('#shipping\\:addressname').val(d.addname);
           
        }
    });
    $('body').removeClass("loading");
    $('#register-customer-password').addClass('no-display');
}

function fship_address_fillup(email) {
    $('body').addClass("loading");
    //alert(idx);
	$.ajax({
        type: "post",
        url: "/actions/ajaxtools.asp",
        data: { "mode": "fship_address_fillup", "email": email },
        dataType: "json",
        success: function (d) {
        	$('#idx').val(idx);
        	//alert(d.fname);
			$('#ship\\:firstname').val(d.fname);
            $('#ship\\:lastname').val(d.lname);
            $('#ship\\:email').val(d.email);
            $('#ship\\:street1').val(d.addr1);
            $('#ship\\:street2').val(d.addr2);
            $('#ship\\:city').val(d.city);
            $('#ship\\:postcode').val(d.zip);
			if ((d.country).length > 2) {
			    $('#shipping\\:country_id').val(getCountryID(d.country));
            } else {
			    $('#shipping\\:country_id').val(d.country);
            }
            if (d.country == "US" || d.country == "USA" || d.country == "United States" || d.country == "CA" || d.country == "MX") {
                showStates2('#shipping\\:region', '#shipping\\:region_id', d.country, d.state);
                //$('#billing\\:region_id').text(d.state);
            } else {
				showStates2('#shipping\\:region_id', '#shipping\\:region', d.country, d.state);
            }
			$('#ship\\:phone').val(d.tel);
			$('#ship\\:addressname').val(d.addname);
            
        }
    });
    $('body').removeClass("loading");
    $('#register-customer-password').addClass('no-display');
}

function getCountryID(cname) {
    var ccode;
    if (cname.length > 2) {
        $.ajax({
            async: false,
            type: "post",
            url: "/actions/ajaxtools.asp",
            data: { "mode": "getCountryCode", "cname": cname },
            dataType: "json",
            success: function (d) {
                ccode = d.ccode;
            }
        });
        return ccode;
    }
}

// Tax calculation and Order Summary Update
function updateSummary(ship, state) {
	var itemtotal, order_subtotal, myshipping, temp, tax;
	itemtotal = ($('#est-itemtotal').html()).substring(1);
	if (ship > 0) {
		myshipping = parseFloat(ship);
	} else {
		myshipping = parseFloat(($('#est-shipping').html()).substring(1));
	}
	if (state) {
		if (state == "CA") {
			tax = parseFloat(itemtotal) * ca_taxrate;
		} else {
			tax = 0;
		}
	} else {
		temp = parseFloat(($('#est-tax').html()).substring(1));
		tax = temp > 0 ? temp : 0;
	}
	order_subtotal = parseFloat(itemtotal) + parseFloat(tax) + parseFloat(myshipping);
	$('#est-shipping').html("$" + myshipping.toFixed(2));
	$('#est-tax').html("$" + tax.toFixed(2));
	$('#est-total').html("$" + order_subtotal.toFixed(2));
}

function billing_save() {
	var ccode, msg = "";
    $.each($('input[id^="billing:"], select[id^="billing:"]'), function () {
        if ($(this).hasClass("required-entry") && $(this).is(":visible") && $(this).val() == "") {
            if (!$(this).is(":hidden")) {
                msg += "\n " + $(this).attr("title") + " cannot be empty.";
                $(this).addClass("validation-failed");
            }
        }
    });
    if ($('#billing\\:checkoutas').val() == "register") {
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
        var b_state = ($('#billing\\:region_id option:selected').val() && $('#billing\\:region_id').is(":visible")) ? $('#billing\\:region_id option:selected').val() : $('#billing\\:region').val();
        var b_addr = '<dd class="complete b_address"><div>' + $('#billing\\:firstname').val() + ' ' + $('#billing\\:lastname').val() + '<br/>' + $('#billing\\:company').val() + '<br/>' + $('#billing\\:street1').val() + '<br/>' + $('#billing\\:city').val() + ', ' + b_state + ', ' + $('#billing\\:postcode').val() + '<br/>' + $('#billing\\:country_id option:selected').text() + '</div></dd>';
        var s_addr = b_addr.replace("b_address", "s_address");
        if ($('#billing\\:use_for_shipping_yes:checked').val() > 0) {
            $('#billing\\:address_status').val("1");
        } else {
            $('#billing\\:address_status').val("");
        }

    	// Tax calculation and Order Summary Update
		/*
        itemtotal	= ($('#est-itemtotal').html()).substring(1);
        myshipping = ($('#est-shipping').html()).substring(1);
		if (b_state == "CA") mytax = parseFloat(itemtotal) * ca_taxrate;
        order_subtotal = parseFloat(itemtotal) + parseFloat(mytax) + parseFloat(myshipping);
        $('#est-tax').html("$" + mytax.toFixed(2));
        $('#est-total').html("$" + order_subtotal.toFixed(2));
		*/
        updateSummary(0, b_state);

        $('dd.b_address').remove();
        $('dt#b-address')
			.addClass("complete")
			.after(b_addr);
        $('dt#b-address > div').removeClass("hidden").addClass("shown");
        if ($('#billing\\:use_for_shipping_yes:checked').val() > 0) {
            $('dd.s_address').remove();
            $('dt#s-address')
				.addClass("complete")
				.after(s_addr);
            $('dt#s-address > div').removeClass("hidden").addClass("shown");
            // insert biling data into shipping form
            copyAddress();
            ccode = $('#billing\\:country_id option:selected').val();
            $.ajax({
                async: false, type: "post", dataType: "json", url: "/actions/ajaxtools.asp",
                data: { "mode": "getCountryName", "code": ccode },
                success: function (d) {
                    if (d) {
                        $('#country_name').val(d.cname);
                    }
                }
            });
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
    var ccode, msg = "";
    $.each($('input[id^="shipping:"], select[id^="shipping:"]'), function () {
        if ($(this).hasClass("required-entry") && $(this).is(":visible") && $(this).val() == "") {
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
        var s_state = ($('#shipping\\:region_id').val()) ? $('#shipping\\:region_id').val() : $('#shipping\\:region').val();
        var s_addr = '<dd class="complete s_address"><div>' + $('#shipping\\:firstname').val() + ' ' + $('#shipping\\:lastname').val() + '<br/>' + $('#shipping\\:company').val() + '<br/>' + $('#shipping\\:street1').val() + '<br/>' + $('#shipping\\:city').val() + ', ' + s_state + ', ' + $('#shipping\\:postcode').val() + '<br/>' + $('#shipping\\:country_id option:selected').text() + '</div></dd>';

        $('dd.s_address').remove();
        $('dt#s-address')
			.addClass("complete")
			.after(s_addr);
        $('dt#s-address > div').removeClass("hidden").addClass("shown");
        checkout_step("shipping_method");
        $('#shipping-please-wait').hide();
        copyAddress();
        ccode = $('#shipping\\:country_id option:selected').val();
        $.ajax({
            async: false, type: "post", dataType: "json", url: "/actions/ajaxtools.asp",
            data: { "mode": "getCountryName", "code": ccode },
            success: function (d) {
                if (d) {
                    $('#country_name').val(d.cname);
                }
            }
        });
        $('#shipping_quote').html('');
        getShippingRates();
    }
}

function copyAddress() {
    var txtID;
    $('input[id^="billing:"],select[id^="billing:"]').each(function () {
        if ($(this).val() && $(this).is(':visible')) {
            txtID = $(this).attr("id").replace("billing:", "shipping\\:");
            if ($(this).attr("id") == "billing:region_id") {
                $('#shipping\\:region').hide();
                $('#shipping\\:region_id').show();
                showStates3();
            } else if ($(this).attr("id") == "billing:region") {
                $('#shipping\\:region_id').hide();
                $('#shipping\\:region').show();
            }
            $('#' + txtID).val($(this).val());
        }
    });
}

function copyBilling() {
    if ($('#shipping\\:same_as_billing').is(":checked")) {
        $('#checkout-step-billing').css("display", "block");
        copyAddress();
        $('#checkout-step-billing').css("display", "none");
    }
}

function saveform(frm, act) {
    var frmdata = frm.serializeArray();
    frmdata.push({ name: "fact", value: act });
    $.ajax({
        async: false,
        type: "post",
        url: "/lib/checkout_action.php",
        data: frmdata,
        dataType: "html",
        success: function (data) {
            if (parseInt(data) > 0) {
                checkout_step("shipping");
            } else {
                alert("Please contact administrator.");
            }
        }
    });
}

function getShippingRates(cname, ccode, scode, zcode, weight, intl) {
    if (!cname) cname = $('#country_name').val();
    if (!ccode) ccode = $('#shipping\\:country_id').val();
    if (!scode) scode = $('#shipping\\:region_id :selected').val() ? $('#shipping\\:region_id :selected').val() : $('#shipping\\:region').val();
    if (!zcode) zcode = $('#shipping\\:postcode').val();
    if (!weight) weight = Math.ceil($('#shipping\\:lb_weight').val());
    if (!intl) { intl = (ccode != "US") ? "2" : "1"; }
    var coupontype = $('#shipping\\:coupon_opt').val();
    if (ccode && scode && zcode) {
        if (weight) {
            $('#shipping-options-wait').show();
            try {
                $.ajax({
                    type: "post",
                    dataType: "html",
                    url: "/actions/ship_cal.asp",
                    /* data: { "ccode": ccode, "scode": scode, "zcode": zcode, "lb_weight": weight, "mode": "getaquote", "coupon_opt": coupontype }, */
                    data: { "cname": cname, "country": ccode, "state": scode, "zipcode": zcode, "weight": weight, "intl": intl, "coupon_opt": coupontype },
                    success: function (d) {
                        $('#shipping-options-wait').hide();
                        $('#shipping_quote').html('');
                        /* ===========( When d is json )============
                        $("#shipping_quote").append("<span><strong>Estimated Shipping Rate:</strong></span>");
                        var list = $("#shipping_quote").append("<ul>").find("ul");
                        for (var i = 0; i < d.rates.length; i++) {
                            list.append('<li><input type="radio" name="shippingMethod_rateoption" id="shippingMethod:rateoption-' + i + '" value="' + d.rates[i].carrier + '|' + (((d.rates[i].carrier).indexOf("FREE") >= 0) ? 0 : d.rates[i].value) + '"/> ' + '<label for="shippingMethod:rateoption-' + i + '">$' + parseInt(d.rates[i].value).toFixed(2) + ' ' + d.rates[i].carrier + '</label></li>');
                        }
                        $("#shipping_quote").append("<p class='note-msg category-label'>We must receive your order before 3:00 pm (Pacific Time).</p>");
                        =========================================== */
                        $('#shipping_quote').html(d);
                    }
                });
            } catch (e) {
            }
        } else {
            $('#shipping_quote').html('');
            $("#shipping_quote").append("<span><strong>Estimated Shipping Rate:</strong></span>");
            var list = $("#shipping_quote").append("<ul>").find("ul");
            list.append('<li><input type="radio" name="shippingMethod_rateoption" id="shippingMethod:rateoption" value="Store pickup|0"/> <label for="shippingMethod:rateoption">Store pickup</label></li>');
            //Standard Shipping Option added
            list.append('<li><input type="radio" name="shippingMethod_rateoption" id="shippingMethod:rateoption-0" value="Standard|6.00" checked /> <label for="shippingMethod:rateoption-0">Standard Shipping : $6.00</label></li>');
        }
    } else {
        alert("Shipping Calculation Error!!");
    }
}

function setRate(v) {
    $('#shippingMethod\\:choice').val(v);
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
        var strCarrier = (temp.split("|"))[0];
        var intRate = (temp.split("|"))[1];
        if (intRate > 0) {
            //s_method = '<dd class="complete s_method"><address>'+temp.replace("|","  $")+'</address></dd>';
            s_method = '<dd class="complete s_method"><div>' + strCarrier + ' $' + intRate + '</div></dd>';
        } else {
            s_method = '<dd class="complete s_method"><div>' + strCarrier + '</div></dd>';
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
    updateSummary(intRate);
}

function payment_save() {
    if ($('input[name="payment_method"]:checked').val()) {
        var msg = "", temp, p_info, g_val;
        $.each($('input[id^="ccsave"],select[id^="ccsave"]'), function () {
            if ($(this).hasClass("required-entry") && $(this).val() == "") {
                if (!$(this).is(":hidden")) {
                    msg += "\n " + $(this).attr("title") + " cannot be empty.";
                    $(this).addClass("validation-failed");
                }
            }
        });
        if ($('#chk_giftcode').is(':checked') && $('#giftcard_code').val() == "") {
            msg += "\nPlease enter GiftCard number.";
            $('#giftcard_code').addClass("validation-failed");
        }
        if (msg) {
            alert(msg);
            return false;
        } else {
            $('#payment-please-wait').show();
            // check gift card balance
            if (readCookie('VIPMember') != "Y") {
                g_val = checkgift($('#giftcard_code').val());
                if (isNaN(g_val)) {
                    g_val = 0;
                }
                $('#my-giftcard-amount').val(g_val);
                if (g_val > 0) {
                    $('#payment_giftcard_code').val($('#giftcard_code').val());
                } else {
                    if ($('#giftcard_code').val() != "") {
                        $('#payment_giftcard_code').val('');
                        $("div.alert").slideDown(1000, function () {
                            $(this).delay(6000).slideUp(1000);
                            $('.inner_alert').html("Your Giftcard has no balance.<button></button>");
                        });
                    }
                }
            }
            temp = $('input[name="payment_method"]:checked').attr("title");
            if (temp.indexOf("PayPal") >= 0) {
                p_info = '<dd class="complete p_method"><div>' + temp + '<br/>' + '</div></dd>';
                $('#paypalbtn').show();
                $('#review-buttons-container').hide();
            } else {
                var cc_num = $('#ccsave_cc_number').val().toString();
                var masked = maskNumbers(cc_num);
                p_info = '<dd class="complete p_method"><div>' + temp + '<br/>' + $('#ccsave_cc_fname').val() + ' ' + $('#ccsave_cc_lname').val() + '<br/>' + $('#ccsave_cc_type option:selected').text() + ': ' + masked + '</div></dd>';
                $('#paypalbtn').hide();
                $('#review-buttons-container').show();
            }
            $('dd.p_method').remove();
            $('dt#p-method')
				.addClass("complete")
				.after(p_info);
            $('dt#p-method > div').removeClass("hidden").addClass("shown");

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
    if (status == "CA") {
        alert("Your Paypal Checkout had been canceled. Please select another payment method.");
        return false;
    }
	if (status == "SU") {
        //alert("Your PayPal Checkout has been approved.");
        $('#payment_pp_status').val('SU' + transid);
    }
/*	else if (status == "PS") {
        $('#payment_az_status').val('S' + transid);
    }
*/	
    $('body').addClass("loading");
    frmdata = $("form").serializeArray();
    frmdata.push({ name: "fact", value: "process_cart" });
    $.ajax({
        type: 'post',
        url: '/actions/checkout_action.asp',
        data: frmdata,
        dataType: 'json',
		timeout: 20000,
        success: function (res) {
         //alert(data);
        	if (res.flag == 1) {
        		location.href = "/?inc=thankyou&s=success&o=" + res.oid;
        	}
        	else {
        		location.href = "/?inc=thankyou&s=carderror&err=" + res.msg;
        	}
            //$('body').removeClass("loading");
        },
        error: function (xmlreq, txtStat, msg) {
        	if (txtStat == "timeout") {
        		alert("Request timed out. Please try later.");
        	} else {
        		alert(txtStat);
        	}
        	location.reload()
        }
    });
}

//Prepare Sutotal, Tax, Shipping, Grand Total
function calcTotal() {
    var temp, tmp, stotal, tax, shipping, gtotal, s_method, g_val, tendered;
    temp = $('input[id^="shippingMethod:rateoption"]:checked').val();
    g_val = parseFloat($('#my-giftcard-amount').val());
    stotal = parseFloat($('#my-subtotal').html().replace("$", ""));
    nontax = $('#my-notaxtotal').val();
    tax = $('#billing\\:region_id').val() == "CA" ? (stotal - nontax) * ca_taxrate : 0;
    tax = Math.ceil(tax * 100) / 100;
    tmp = temp.split("|");
    shipping = parseFloat(tmp[1]);
    gtotal = stotal + tax + shipping;
    if ($('#my-saving').val()) {
        $('input[name="cart_saving"]').val($('#my-saving').val());
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
    if (tax > 0) {
        $('.local-tax').css("display", "block");
        $('#my-tax').html(tax.toFixed(2));
    } else {
        $('.local-tax').css("display", "none");
        $('#my-tax').html('');
    }
    if (g_val > 0) {
        $('#tr-giftcard').css("display", "block");
        $('#my-discount').html("-$" + tendered.toFixed(2));
        $('input[name="cart_dc_giftcard"]').val(tendered.toFixed(2));
    } else {
        $('#tr-giftcard').css("display", "none");
        $('#my-discount').html("-");
        $('input[name="cart_dc_giftcard"]').val('');
    }
    $('#my-shipping').html("$" + shipping.toFixed(2));
    $('#my-grandtotal').html("$" + gtotal.toFixed(2));
    $('input[name="cart_subtotal"]').val(stotal);
    $('input[name="cart_tax"]').val(tax.toFixed(2));
    $('input[name="cart_grandtotal"]').val(gtotal.toFixed(2));
	//$('input[name="amount_1"]').val(gtotal.toFixed(2)); //real value
	//$('input[name="shipping_1"]').val(shipping.toFixed(2));	
    $('input[name="amount_1"]').val($('#cart_grandtotal').val());
	$('input[name="shipping_1"]').val(0);	
	
	
	$('input[name="amount"]').val('usd ' + gtotal.toFixed(2));
    if (gtotal < 0.6) {
        $('#paypalbtn').hide();
        $('#payment_az_status').val('SPaid in full with Giftcard - PayPal Checkout.')
        $('#review-buttons-container').show();
    }
}

function checkgift(Code) {
    var result;
    $.ajax({
        async: false,
        type: "post",
        url: "/actions/ajaxtools.asp",
        data: { "mode": "checkGiftBal", "Code": Code },
        dataType: "html",
        success: function (data) {
            result = (data);
        }
    });
    return result;
}

String.prototype.padLeft = function (l, c) {
    return Array(l - this.length + 1).join(c || " ") + this 
}

function maskNumbers(mynum) {
    var len = mynum.toString().length;
    var masked = mynum.substring(len - 4).padLeft(len, "*");
    return masked;
}
