	
	
	function isValidPassword(userInput) {
		var pattern = new RegExp(/^[0-9\sa-zA-Z\#\.\&\/]+$/i);
		return pattern.test(userInput);
	};





	
	function isValidFirstName(userInput) {
		var pattern = new RegExp(/^[a-zA-Z]+$/);
		return pattern.test(userInput);
	};
	
	
	
	function isValidLastName(userInput) {
		var pattern = new RegExp(/^[a-zA-Z]+$/);
		return pattern.test(userInput);
	};
	





	function isValidEmailAddress(userInput) {
		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
		return pattern.test(userInput);
	};
	

	
	
	
	function isValidPhoneNumber(userInput) {
		var pattern = new RegExp(/^[0-9]+$/i);
				
		if(pattern.test(userInput) == false)
		{
			var phoneNumberCorrected = $('#phone').val().slice(0, -1);	
			$('#phone').val(phoneNumberCorrected); 
			
			//$('#phone').html().split(" ").join(""));
		}
		
		
		
		return pattern.test( $('#phone').val() );
	};
	
	
	
	function isValidAddress(userInput) {
		var pattern = new RegExp(/^[0-9\sa-zA-Z\#\.\&\/]+$/i);
		return pattern.test(userInput);
	};
	
	
	
	function isValidCity(userInput) {
		var pattern = new RegExp(/^[+a-zA-Z\s]+$/i);
		return pattern.test(userInput);
	};
	
	
	
	function isValidZip(userInput) {
		var pattern = new RegExp(/^[0-9]{5}$/i);
		return pattern.test(userInput);
	};
	
	
	
	function myTrim(x) {
    	return x.replace(/^\s+|\s+|\#+|\!+|\@+|\$+|\%+|\^+|\&+|\*+|\(+|\)+|\~+$/gm,'');
	}
	
	
	function myEmailTrim(x) {
    	return x.replace(/^\s+|\s+|\#+|\!+|\$+|\%+|\^+|\&+|\*+|\(+|\)+|\~+$/gm,'');
	}
	
	
	
	
	
	
	function formValidation(){
		
		var validColor = {'display' : 'block' , 'background' : 'rgb(110, 234, 0)'};
		var invalidColor = {'display' : 'block' , 'background' : 'rgba(255,0,0,1)'};

		var validText = 'VALID';
		var invalidText = 'INVALID';
		

		
		
		// Email Validation Only ==========================================================
		$('#email').keyup(function(){
		
				$('#email').val(myEmailTrim($('#email').val()));
			
				if(isValidEmailAddress($(this).val()) == false && $(this).val() != '')
				{
					
					$('#email-error').text(invalidText).css(invalidColor);
		
				}
				else
				{
					
					if($(this).val() == '')
					{
						$('#email-error').css('display' , 'none');
					}
					else
					{
						$('#email-error').text(validText).css(validColor);
				
					}
					
					
			
				}
		});		
		
		
		
		
		
		// Sponsor Number Validation Only ==========================================================
		$('#password').keyup(function(){
			var ln=$('#password').val();
			$('#password').val(myTrim($('#password').val()));
			

			if((isValidPassword($(this).val()) == false && $(this).val() != '') || (ln.length<5) )
			{
				
				$('#password-error').text(invalidText).css(invalidColor);
				$('#msg1').css('display' , 'none');
	
			}
			
			else
			{
				if($(this).val() == '')
				{
					$('#password-error').css('display' , 'none');
				}
				else
				{
					$('#password-error').text(validText).css(validColor);
			
				}
			}
		});		
		
		
		
		
		
		
		// First Name Validation Only ==========================================================
		$('#firstname').keyup(function(){

			//if(isValidFirstName($(this).val()) == false && $(this).val() != '')
			if(false)
			{
				
				$('#firstname-error').text(invalidText).css(invalidColor);
			}
			else
			{
				if($(this).val() == '')
				{
					$('#firstname-error').css('display' , 'none');
				}
				else
				{
					$('#firstname-error').text(validText).css(validColor);
			
				}
			}
		});	
		
		
		
		// Last Name Validation Only ==========================================================
		$('#lastname').keyup(function(){

			//if(isValidLastName($(this).val()) == false && $(this).val() != '')
			if(false)
			{
				
				
				$('#lastname-error').text(invalidText).css(invalidColor);
				$('#lastname-error').css('top' , '48px');
			}
			else
			{
				
				if($(this).val() == '')
				{
					$('#lastname-error').css('display' , 'none');
				}
				else
				{
					$('#lastname-error').text(validText).css(validColor);
					$('#lastname-error').css('top' , '48px');
				}
			}
		});	
		
		
		
		
		
		// Phone Number Validation Only ==========================================================
		// Phone Number Validation Only ==========================================================
		// Phone Number Validation Only ==========================================================
		$('#phone').keyup(function(){

			if(isValidPhoneNumber($(this).val()) == false && $(this).val() != '')
			{
				$('#phone-error').text(invalidText).css(invalidColor);
				//$('#lastname-error').css('top' , '48px');
			}
			else
			{
				
				if($(this).val() == '')
				{
					$('#phone-error').css('display' , 'none');
				}
				else
				{
					$('#phone-error').text(validText).css(validColor);
				}
				//$('#lastname-error').css('top' , '48px');
			}
			
			
		});	
		
		
		
		
		
				
			
		// Address Validation Only ==========================================================
		$('#address').keyup(function(){

			//if(isValidAddress($(this).val()) == false && $(this).val() != '')
			if(false)
			{
				$('#address-error').text(invalidText).css(invalidColor);
				//$('#lastname-error').css('top' , '48px');
			}
			else
			{
				
				if($(this).val() == '')
				{
					$('#address-error').css('display' , 'none');
				}
				else
				{
					$('#address-error').text(validText).css(validColor);
				}
				//$('#lastname-error').css('top' , '48px');
			}
		});	
		
		
		
		
		// City Validation Only ==========================================================
		$('#city').keyup(function(){

			if(isValidCity($(this).val()) == false && $(this).val() != '')
			{
				$('#city-error').text(invalidText).css(invalidColor);
				$('#city-error').css({'top' : '48px' , 'right' : '145px'});
			}
			else
			{
				
				if($(this).val() == '')
				{
					$('#city-error').css('display' , 'none');
				}
				else
				{
					$('#city-error').text(validText).css(validColor);
				}
				$('#city-error').css({'top' : '48px' , 'right' : '145px'});
			}
		});	
		
		
		
		
		// ZIP Validation Only ==========================================================
		$('#zip').keyup(function(){

			if(isValidZip($(this).val()) == false && $(this).val() != '')
			{
				$('#zip-error').text(invalidText).css(invalidColor);
				$('#zip-error').css({'top' : '138px' , 'right' : '245px'});
			}
			else
			{
				
				if($(this).val() == '')
				{
					$('#zip-error').css('display' , 'none');
				}
				else
				{
					$('#zip-error').text(validText).css(validColor);
				}
				$('#zip-error').css({'top' : '138px' , 'right' : '245px'});
			}
		});	
		
		
		
	}








    function clearRegText(){
        $(".rg-clear").focus(function(){
            if($(this).val() == $(this).next().text())
            {
                $(this).val('');
            }
        });
		        
        $(".rg-clear").focusout(function(){
            if($(this).val() == '')
            {
                $(this).val($(this).next().text());
            }
        });
    }
    
	
	
	
	
	
    
	function errorMarker(el){
	
		if(el.text() != 'VALID')
		{
			this.prev().prev().css({'border' : 'none' , 'boxShadow' : '0 0 15px rgb(140, 0, 255)'});
			return true;
		}
		else
		{
			return false;	
		}
	}
	
	
	
	
	
	
	function regSubmit(){

		var errorCount = 0;
		
	
		/*
		if($('#sponsor-error').text() != 'VALID'){
			errorCount++;
			$('#sponsor-error').prev().prev().addClass('marked');
		}
		else
		{
			$('#sponsor-error').prev().prev().removeClass('marked');
		}
		*/
		
		
		
		if($('#firstname-error').text() != 'VALID'){
			errorCount++;
			$('#firstname-error').prev().prev().addClass('marked');
		}
		else
		{
			$('#firstname-error').prev().prev().removeClass('marked');
		}
		
		
		
		if($('#lastname-error').text() != 'VALID'){
			errorCount++;
			$('#lastname-error').prev().prev().addClass('marked');
		}
		else
		{
			$('#lastname-error').prev().prev().removeClass('marked');
		}
		
		
		
		
		if($('#email-error').text() != 'VALID'){
			errorCount++;
			$('#email-error').prev().prev().addClass('marked');
		}
		else
		{
			$('#email-error').prev().prev().removeClass('marked');
		}
		
		
		
		/*
		if($('#phone-error').text() != 'VALID'){
			errorCount++;
			$('#phone-error').prev().prev().addClass('marked');
		}
		else
		{
			$('#phone-error').prev().prev().removeClass('marked');
		}
		
		
		

		if($('#address-error').text() != 'VALID'){
			errorCount++;
			$('#address-error').prev().prev().addClass('marked');
		}
		else
		{
			$('#address-error').prev().prev().removeClass('marked');
		}
		
		
		
		if($('#city-error').text() != 'VALID'){
			errorCount++;
			$('#city-error').prev().prev().addClass('marked');
		}		
		else
		{
			$('#city-error').prev().prev().removeClass('marked');
		}
		
		
		
		
		if($('#zip-error').text() != 'VALID'){
			errorCount++;
			$('#zip-error').prev().prev().addClass('marked');
		}
		else
		{
			$('#zip-error').prev().prev().removeClass('marked');
		}
		
		
		
		
		if($('#wireless').val() == ''){
			errorCount++;
			$('#wireless').addClass('marked');
		}
		else
		{
			$('#wireless').removeClass('marked');
		}
		
		
		
		
		
		if($('#state').val() == ''){
			errorCount++;
			$('#state').addClass('marked');
		}
		else
		{
			$('#state').removeClass('marked');
		}
		
		*/
		
		if(errorCount != 0)
		{
			
			return false;
		}
		else
		{
			
			return true;
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	function CheckNew() {
		
		
		if(regSubmit() == false)
		{
			
			$('.submit-error').text('Please see all the INVALID tags and empty form spaces and fill them out correctlly before submit the form.').css({'display' : 'block'});
			return false;
		}
		
	/*
       if (document.Reg_New.tcSponsorX.value == "" ) { alert("Please enter sponsor");
          document.Reg_New.tcSponsorX.focus();
		  return false; }
       if (document.Reg_New.tcFistName.value == "" ) { alert("Please enter firstname");
          document.Reg_New.tcFistName.focus();
		  return false; }
       if (document.Reg_New.tcLastName.value == "" ) { alert("Please enter lastname");
          document.Reg_New.tcLastName.focus();
		  return false; }

       if (document.Reg_New.tcUserIDNO.value == "" ) { alert("Please enter email");
          document.Reg_New.tcUserIDNO.focus();
		  return false; }

       if (document.Reg_New.tcUserMail.value == "" ) { alert("Please enter confirm email");
          document.Reg_New.tcUserMail.focus();
		  return false; }

       if (document.Reg_New.tcUserIDNO.value != document.Reg_New.tcUserMail.value ) { alert("Mismatch email");
          document.Reg_New.tcUserIDNO.focus();
		  return false; }



       if (document.Reg_New.tcCellNumb.value == "" ) { alert("Please enter cell phone number");
          document.Reg_New.tcCellNumb.focus();
		  return false; }
       if (document.Reg_New.tnSMS_Numb.value == "" ) { alert("Please select phone company");
          document.Reg_New.tnSMS_Numb.focus();
		  return false; }
       if (document.Reg_New.tcAddressX.value == "" ) { alert("Please enter address");
          document.Reg_New.tcAddressX.focus();
		  return false; }
	*/
       return true;
	}
	
	
	
	
	
	
	
	
    $(document).ready(function(e) {
		formValidation();
        clearRegText();
		
		//regSubmit();
    });