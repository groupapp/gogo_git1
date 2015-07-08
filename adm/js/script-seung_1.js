// JavaScript Document

	function serverReboot(){
		
		$('#reboot-button').click(function(){
			
			event.preventDefault();

			$.ajax({
				url: 'functions/reboot.php',
				success: function(data){

					$('#reboot-status').html('<span>Reboot Status</span> Server is rebooting');
					
				},
				dataType: 'text',
				type: 'post',
				async: true
			});
		});
	}
	


	function chmod(){
		
		$('#chmod-button').click(function(){
			
			event.preventDefault();

			$.ajax({
				url: 'functions/chmod.php',
				success: function(data){

					$('#chmod-status').html('<span>Chmod Status</span> Permission changed');
					
				},
				dataType: 'text',
				type: 'post',
				async: true
			});
		});
	}
	












	$(document).ready(function(e) {
        serverReboot();
		chmod();
		
    });