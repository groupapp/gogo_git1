// JavaScript Document



	function noValueFader(){
		
		//$("span:contains('0.00')").parent().animate({'opacity': '0.3'} , 1000);
		//$("span").text().parent().animate({'opacity': '0.3'} , 1000);
		
		//$("span:contains('POINTS')").parent().animate({'opacity': '0.3'} , 1000);
		
		
		
		$('span').filter(function(index) { return $(this).text() === "0.00 POINTS"; }).parent().animate({'opacity': '0.3'} , 1000);
		
		$('span').filter(function(index) { return $(this).text() === " POINTS"; }).parent().animate({'opacity': '0.3'} , 1000);
		
		$('span').filter(function(index) { return $(this).text() === "0 POINTS"; }).parent().animate({'opacity': '0.3'} , 1000);
		
	}






	$(document).ready(function(e) {
        
		noValueFader();		
		
    });