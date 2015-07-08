<?php


require_once("../include/function.php");
$DB = new myDB;
$DBa = new myDB;
$id_vendor			= empty($_REQUEST["id_vendor"])		? null : $_REQUEST["id_vendor"];

//print_r($id_vendor);

$action			= empty($_REQUEST["action"])		? null : $_REQUEST["action"];
//$id_events=1;
//$id_events=1;//$_REQUEST['id_events'];
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 3.9.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>gogmarket</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="../../assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
	<div class="container">
	  <div class="row">
	    <div class="col-xs-12">
		  <form enctype="multipart/form-data" action="market_action.php" method="post" role="form">
		  <input type="hidden" name="id_vendor" value="<?php echo $id_vendor?>">
		  

		  <div class="form-group">
			<?php 
			
				
			
			if($action=='add')
			{
				
				echo '<input type="hidden" name="action" value="add">';
				echo '<div class="col-xs-8">
					<label for="name">Days</label>
					<input type="text" name="start_date[]" class="form-control" value=""/>
					</div>';
				
				echo '<div class="col-xs-2">
					<label for="name">Start Time</label>
					<input type="text" name="start_time[]" class="form-control" value=""/>
					</div>';
				echo '<div class="col-xs-2">
					<label for="name">End Time</label>
					<input type="text" name="end_time[]" class="form-control" value=""/>
					</div>';	
			}
			else
			{
				
				$strSQLa = "SELECT * FROM address WHERE id_vendor=".$id_vendor;
				
				$DBa->query($strSQLa);
				while ($dataa = $DBa->fetch_array($DBa->res)){	
					
					echo'<input type="hidden" name="id_address"  value="'.$dataa['id_address'].'"/>';

					echo '<div class="col-xs-10">
					<label for="name">Address</label>
					<input type="text" name="address1" class="form-control" value="'.$dataa['address1'].'"/>
					</div>';
					echo '<div class="col-xs-10">
					<label for="name">Address2</label>
					<input type="text" name="address2" class="form-control" value="'.$dataa['address2'].'"/>
					</div>';
					
					echo '<div class="col-xs-3">
					<label for="name">City</label>
					<input type="text" name="City" class="form-control" value="'.$dataa['city'].'"/>
					</div>';
					echo '<div class="col-xs-3">
					<label for="name">State</label>
					<input type="text" name="id_state" class="form-control" value="'.$dataa['id_state'].'"/>
					</div>';
					echo '<div class="col-xs-3">
					<label for="name">Zipcode</label>
					<input type="text" name="zip_code" class="form-control" value="'.$dataa['zip_code'].'"/>
					</div>';

					echo '<div class="col-xs-3">
					<label for="name">Country</label>
					<input type="text" name="id_country" class="form-control" value="'.$dataa['id_country'].'"/>
					</div>';
					echo '<div class="col-xs-3">
					<label for="name">Phone</label>
					<input type="text" name="phone" class="form-control" value="'.$dataa['phone'].'"/>
					</div>';
					echo '<div class="col-xs-3">
					<label for="name">Fax</label>
					<input type="text" name="fax" class="form-control" value="'.$dataa['fax'].'"/>
					</div>';
				
				}
				
				
				$strSQL = "SELECT * FROM vendors_openhour WHERE id_vendor=".$id_vendor;
				
				$DB->query($strSQL);
				while ($data = $DB->fetch_array($DB->res)){	
				
				echo '<div class="col-xs-8">
					<label for="name">Days</label>
					<input type="text" name="start_date[]" class="form-control" value="'.$data['start_date'].'"/>
					</div>';
				
				echo '<div class="col-xs-2">
					<label for="name">Start Time</label>
					<input type="text" name="start_time[]" class="form-control" value="'.$data['start_time'].'"/>
					</div>';
				echo '<div class="col-xs-2">
					<label for="name">End Time</label>
					<input type="text" name="end_time[]" class="form-control" value="'.$data['end_time'].'"/>
					</div>';
				}
			}
					
		  ?>
		  </div>
		  <div style="height:420px;"><span >&nbsp;</span></div>
		  <div><button type="submit" class="btn btn-default" style="margin-left:15px;">Save</button></div>		  
		  </form>
	    </div>	  
	</div>
	
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/components-pickers.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
           ComponentsPickers.init();
        });   
    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>