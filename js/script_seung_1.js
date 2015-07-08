


	//====================================================================================================
	// When small thumbnail images are clicked, function shows it in large image.
	// *** Applied page [/contents/productpage.php] ***
	// *** Written by Seung ***
	function thumbnailClick(){
		
		$('.thumbnails ul li a').on('click', function(event){
			
			event.preventDefault();
			$('.thumbnails ul li').css('opacity' , '0.4');
			
			/*
			$('.product-image').animate({right : '800px'}, 200, function(){
				$('.product-image').css({left : '0px'});
				//$('.product-image').animate({left : '0px'}, 200);
			});
			*/
				
			$('.product-image').animate({right : '800px'}, 200, function(){
			
				$('.product-image').css({left : '800px'});
				$('.product-image').animate({left : '0'}, 200, function(){
				
				});
				
			});
			
			
			
			var zoom1_image = $(this).attr('href');		
			$('#zoom1>img').attr('src', zoom1_image);
			
			$(this).parent().animate({opacity : '1'}, 400);
			
			
			
			if($(this).parent().next().is('li')){
				var zoom2_image = $(this).parent().next().children('a').attr('href');
				$('#zoom2>img').attr('src', zoom2_image);
				$('#zoom2>img').show()
				
				$(this).parent().next().animate({opacity : '1'}, 400);
			}
			else{
				$('#zoom2>img').hide();
			}
			
		});
		
		
		
		$('#zoom1').on('click', function(){
			
			var largeImageLocation = $(this).children('img').attr('src');
			$('#modal-largeimage').attr('src', largeImageLocation);


			var imageWidth = $('#zoom1>img').naturalWidth;
			//var imageWidth = $('#modal-largeimage').width();
			$('.modal-dialog').css('width', imageWidth);

		});
		
		
		$('#zoom2').on('click', function(){
			
			var largeImageLocation = $(this).children('img').attr('src');
			$('#modal-largeimage').attr('src', largeImageLocation);

		});
		
	}
	//====================================================================================================












	//====================================================================================================
	// Large image pop-up box title filler. (Modal product title filler.)
	// *** Applied page [/contents/productpage.php] ***
	// *** Written by Seung ***
	function modalTitleFiller(){
		
		var productname = $('.product-name>h2').text();
		$('#myModalLabel').text(productname);
		
	}
	//====================================================================================================
	
	
	
	
	
	
	
	

	//====================================================================================================
	// On document load, reset the large product image to prevent image cracks.
	// *** Applied page [/contents/productpage.php] ***
	// *** Written by Seung ***
	function largeImageLoader(){
	
		$('.thumbnails ul li').css('opacity' , '0.5');
		
		if($('.thumbnails ul li:nth-child(1) a').attr('href')){	
			var largeImageLocation1 = $('.thumbnails ul li:nth-child(1) a').attr('href');
			$('#zoom1>img').attr('src', largeImageLocation1);
			
			$('.thumbnails ul li:nth-child(1)').css('opacity' , '1');
		}
		
		if($('.thumbnails ul li:nth-child(2) a').attr('href'))
		{
			var largeImageLocation2 = $('.thumbnails ul li:nth-child(2) a').attr('href');
			$('#zoom2>img').attr('src', largeImageLocation2);
			
			$('.thumbnails ul li:nth-child(2)').css('opacity' , '1');
		}
	}
	//====================================================================================================
	
	
	
	
	
	
	


	$(document).ready(function() {

		thumbnailClick();
		modalTitleFiller();
		largeImageLoader();
		
    });