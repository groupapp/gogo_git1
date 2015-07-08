// JavaScript Document

	var flag1 = 0;

	function menuMover(){		
		
		$(window).scroll(function(){						
			var pos = ($("#top-menu").offset()).top - ($(window).scrollTop());			
			if(pos <= 0 && flag1 == 0){				
				$("#top-menu-float").css("visibility", "visible");
				$(".nav-box").stop().animate({backgroundColor: "rgb(0, 216, 255)"}, 400);
				//$(".nav-box").css("box-shadow", "0 0 13px #000");
				flag1 = 1;
			}
			
			if(pos > 0 && flag1 == 1){				
				$("#top-menu-float").css("visibility", "hidden");
				$(".nav-box").stop().animate({backgroundColor: "#00344A"}, 400);
				//$(".nav-box").css("box-shadow", "none");
				flag1 = 0;
			}
		});		
	}
	
	function loginboxDisplay(){
		
		var windowWidth = $(window).width();
		if(windowWidth < 1183){
			$("#login-box").hide();
			$("#sm-register").show();
		}
		else{
			
			$("#login-box").show();
			$("#sm-register").hide();
		}
		
		
		$(window).resize(function(){
			var windowWidth = $(window).width();
			if(windowWidth < 1183){
				$("#login-box").hide();
				$("#sm-register").show();
			}
			else{
				
				$("#login-box").show();
				$("#sm-register").hide();
			}
			
			
		
		});
	}
	
	
	
	function menuFiller(){
		
		$("#top-menu-float").html($("#top-menu").html());		
	}
	
	function loginboxFiller(){
		
		$("#login-box-float").html($("#login-box").html());
		
	}
	
	
	
	function googlemapResizer(){
	
		var mapBlockWidth = $("#map-block").width();
		$("#google-map").width(mapBlockWidth);
	
		$(window).resize(function(){
			var mapBlockWidth = $("#map-block").width();
			$("#google-map").width(mapBlockWidth);
			
		});
		
		
	}
	
	
	
	$(document).ready(function(){
		loginboxFiller();
		menuFiller();
		menuMover();
		loginboxDisplay();
		
		googlemapResizer();

	});