

function display_on($element){
	$element.css({display: 'block'});
}

function display_off($element){
	$element.css({display: 'none'});
}

$(function(){
	$(window).resize(function(){
		$qw = $('.product-imgbox').width()
		$zoom =  ($qw / 920);
		$('.test-only span').text($zoom);
		$('.qslider-container').css({zoom : $zoom});
	});

	$qw = $('.product-imgbox').width()
	$zoom =  ($qw / 920);
	$('.test-only span').text($zoom);
	$('.qslider-container').css({zoom : $zoom});
});

$(function(){
	//$('.test-only span').text('AAAAA');
	
	$('.thumbnail-container ul li').each(function(){
		$c = $(this).children();
		$url = $c.attr('image-data');
		$('.bigimage-container>div').append('<div style="background: url(' + $url + ');"></div>');
	});
	
	/*
	var $image1 = $('.thumbnail-container ul li:nth-child(1) div').attr('image-data');
	var $image2 = $('.thumbnail-container ul li:nth-child(2) div').attr('image-data');
	var $image3 = $('.thumbnail-container ul li:nth-child(3) div').attr('image-data');
	var $image4 = $('.thumbnail-container ul li:nth-child(4) div').attr('image-data');
	var $image5 = $('.thumbnail-container ul li:nth-child(5) div').attr('image-data');
	var $image6 = $('.thumbnail-container ul li:nth-child(6) div').attr('image-data');
	
	$('.bigimage-container>div').append('<div nth="1" style="background: url(' + $image1 + ');"></div>');
	$('.bigimage-container>div').append('<div nth="2" style="background: url(' + $image2 + ');"></div>');
	$('.bigimage-container>div').append('<div nth="3" style="background: url(' + $image3 + ');"></div>');
	$('.bigimage-container>div').append('<div nth="4" style="background: url(' + $image4 + ');"></div>');
	$('.bigimage-container>div').append('<div nth="5" style="background: url(' + $image5 + ');"></div>');
	$('.bigimage-container>div').append('<div nth="6" style="background: url(' + $image6 + ');"></div>');
	*/
	
	$thumbs_up = $('.thumbs-up');
	$thumbs_down = $('.thumbs-down');
	
	display_off($thumbs_up);

	$thumbs = $('.thumbnail-container ul li');
	$thumbs_count = $thumbs.length;
	
	if($thumbs_count > 6){		
		display_on($thumbs_down);
	}
	else{
		display_off($thumbs_down);
	}
	
	
	$current_position = 1;
	$thumbs_group_count = Math.floor($thumbs_count / 6);
	
	if($thumbs_count % 6){
		$thumbs_group_count++;
	}
	
	//$('.test-only span').append($thumbs_group_count);
	
	$down_flag = 0;
	$up_flag = 0;
	
	
	//==========================================================================
	$('.thumbs-left').click(function(){
		//alert('LEFT');
		$t = $('.thumbnail-container ul li div');
		
		$t_length = $t.length;
		$top_thumb_flag = 0;
		
		$t.each(function(index){
			$css_value = $(this).css('opacity');
			//console.log($css_value);
			if($css_value == 1 && $top_thumb_flag == 0){
				$top_thumb_flag = 1;
				if( (index-2) >= 0 ){
					$(this).parent().prev().prev().trigger("click");
					if( ((index)%6) == 0 ){
						$('.thumbs-up').trigger("click");
					}
					return false;
				}
			}
			else{
				$top_thumb_flag = 0;
			}
		});	
		
		$first_opacity = $('.thumbnail-container ul li').first().children().css('opacity');
		if($first_opacity != '1'){
			$('.thumbs-left').stop( true, true ).animate({'opacity' : '1'}, 200);
		}
		else{
			$('.thumbs-left').stop( true, true ).animate({'opacity' : '0'}, 200);
			
		}
		
		
		$('.thumbs-right').stop( true, true ).animate({'opacity' : '1'}, 200);

		
		
	});

	//==========================================================================

	$('.thumbs-right').click(function(){
		//alert('RIGHT');


		$t = $('.thumbnail-container ul li div');
		
		$t_length = $t.length;
		$top_thumb_flag = 0;
		
		$t.each(function(index){
			
			$css_value = $(this).css('opacity');
			//console.log($css_value);
			
			if($css_value == 1 && $top_thumb_flag == 0){
				$top_thumb_flag = 1;
				if( (index+2) < $t_length ){
					$(this).parent().next().next().trigger("click");
					if( ((index+2)%6) == 0 ){
						$('.thumbs-down').trigger("click");
					}
					return false;
				}
			}
			else{
				$top_thumb_flag = 0;
			}
		});
		
		
		$first_opacity = $('.thumbnail-container ul li').first().children().css('opacity');
		//alert($first_opacity);
		
		if($first_opacity != '1'){
			$('.thumbs-left').stop( true, true ).animate({'opacity' : '1'}, 200);
		}
		else{
			$('.thumbs-left').stop( true, true ).animate({'opacity' : '0'}, 200);
			
		}
		
		

		$last_opacity = $('.thumbnail-container ul li').last().children().css('opacity');
		if($last_opacity == '1'){
			$('.thumbs-right').stop( true, true ).animate({'opacity' : '0'}, 200);
		}
		
		/*
		else{
			$('.thumbs-right').stop( true, true ).animate({'opacity' : '0'}, 200);
			
		}
		*/
		
	});
	//==========================================================================

	$('.thumbs-up').click(function(){
		if($down_flag == 1){
			$current_position--;		
		}
			
		$down_flag = 0;
		$up_flag = 1;

		$current_position--;
		$top_position = $current_position * (-534);
		
		$('.thumbnail-container>ul').animate({ 'top' : $top_position}, 500);
		
		//$('.test-only span').text($current_position);
		if($current_position == 0){
			display_off($thumbs_up);			
		}
		display_on($thumbs_down);
	});
	
	$('.thumbs-down').click(function(){
		
		if($up_flag == 1){
			$current_position++;
			
			
		}
			
		$up_flag = 0;
		$down_flag = 1;
		
		$top_position = $current_position * (-534);
		$current_position++;
		
		$('.thumbnail-container>ul').animate({ 'top' : $top_position}, 500);
		
		if($current_position == $thumbs_group_count){
			display_off($thumbs_down);			
		}
			
		display_on($thumbs_up);
	});

	//=============================================================================================
	var $i = $('.bigimage-container>div');
	
	$('.thumbnail-container ul li').click(function(){
		
		var $number = $(this).index();
		if($number%2 == 0){
			var $the_position = $number * -410;
			$i.animate({'left' : $the_position }, 300);
			$('.thumbnail-container ul li div').css({'opacity' : '0.6'});
			$(this).children().css({'opacity' : '1'});
			$(this).next().children().css({'opacity' : '1'});
		}
		else{
			var $the_position = ($number-1) * -410;
			$i.animate({'left' : $the_position }, 300);
			$('.thumbnail-container ul li div').css({'opacity' : '0.6'});
			$(this).children().css({'opacity' : '1'});
			$(this).prev().children().css({'opacity' : '1'});
		}
	});
	//=============================================================================================
	
	
	$('.bigimage-container').mouseenter(function(){
		
		$first_opacity = $('.thumbnail-container ul li').first().children().css('opacity');
		$last_opacity = $('.thumbnail-container ul li').last().children().css('opacity');
		//alert($first_opacity);
		
		if($first_opacity != '1'){
			$('.thumbs-left').stop( true, true ).animate({'opacity' : '1'}, 200);
		}
		
		if($last_opacity != '1'){
			$('.thumbs-right').stop( true, true ).animate({'opacity' : '1'}, 200);
		}	
	})
	.mouseleave(function(){
						
		$('.thumbs-left').stop( true, true ).animate({'opacity' : '0'}, 200);
		$('.thumbs-right').stop( true, true ).animate({'opacity' : '0'}, 200);			
			
	});

});


