<?php
	require_once("../include/function.php");
	$aid	= (!empty($_GET['id']))?$_GET['id']:null;
	$act	= (!empty($_GET['act']))?$_GET['act']:null;
?>

		<div style="padding: 20px;">
			
		</div>
		<script type="text/javascript">
			$('#cbClose').click(function() {
				parent.jQuery.fn.colorbox.close();
			});
		</script>