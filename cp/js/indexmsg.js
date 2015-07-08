// JavaScript Document




	function textClear(){
		
		$('.message-name').focus(function(){
			if($(this).val() == $(this).next().text()){
				$(this).val('');
			}
		});
		
		$('.message-name').focusout(function(){
			if($(this).val() == ''){
				$(this).val($(this).next().text());
			}
		});
		
		
		
		
		$('.message-email').focus(function(){
			if($(this).val() == $(this).next().text()){
				$(this).val('');
			}
		});
		
		$('.message-email').focusout(function(){
			if($(this).val() == ''){
				$(this).val($(this).next().text());
			}
		});
		
		
		
		
		
		
		$('.message-subject').focus(function(){
			if($(this).val() == $(this).next().text()){
				$(this).val('');
			}
		});
		
		$('.message-subject').focusout(function(){
			if($(this).val() == ''){
				$(this).val($(this).next().text());
			}
		});
		
		
		
		
		
		$('.message-text').focus(function(){
			if($(this).text() == $(this).next().text()){
				$(this).text('');
			}
		});
		
		$('.message-text').focusout(function(){
			
			
			
			if($(this).text() == ''){
				$(this).text($(this).next().text());
			}
			
		});


		
		
	}



	
	
	
	
	
	$(document).ready(function(e) {
        
		textClear();
		
		
		
    });