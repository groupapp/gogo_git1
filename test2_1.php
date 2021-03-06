<?php 
session_start();

echo $_SESSION['test'] . " for the second time.";

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>jQuery SlideDown() / SlideUp() With Bottom-Positioned Elements</title>
	<style type="text/css">
 
		#container {
			bottom: 0px ;
			display: none ;
			left: 20px ;
			position: fixed ;
			width: 90% ;
			}
 
		#inner {
			background-color: #F0F0F0 ;
			border: 1px solid #666666 ;
			border-bottom-width: 0px ;
			padding: 20px 20px 100px 20px ;
			}
 
	</style>
	<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript">
 
		// When the DOM is ready, initialize the scripts.
		jQuery(function( $ ){
 
			// Get a reference to the container.
			var container = $( "#container" );
 
 
			// Bind the link to toggle the slide.
			$( "a" ).click(
				function( event ){
					// Prevent the default event.
					event.preventDefault();
 
					// Toggle the slide based on its current
					// visibility.
					if (container.is( ":visible" )){
 
						// Hide - slide up.
						container.slideUp( 2000 );
 
					} else {
 
						// Show - slide down.
						container.slideDown( 2000 );
 
					}
				}
			);
 
		});
 
	</script>
</head>
<body>
 
	<h1>
		jQuery SlideDown() / SlideUp() With Bottom-Positioned Elements
	</h1>
 
	<p>
		<a href="#">Show Div With SlideDown()</a>
	</p>
 
	<div id="container">
		<div id="inner">
 
			Check it out! This DIV is positioned based on its
			very sexy Bottom and then is opened using a slide-down
			animation effect (and closed using a slide-up)
			animation effect.
 
		</div>
	</div>
 
</body>
</html>