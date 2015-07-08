<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="apparel,wizard,account,web">
	<meta name="description" content="Apparel Wizard">
	<title>test</title>
	<link rel="stylesheet" href="/shopadmin/jw/jqx.base.css" type="text/css" />
   
	<script type="text/javascript" src="/shopadmin/jw//jquery-1.11.1.min.js"></script>  
	<script type="text/javascript" src="/shopadmin/jw/jqxcore.js"></script>
    <script type="text/javascript" src="/shopadmin/jw/jqxdatetimeinput.js"></script>
	<script type="text/javascript" src="/shopadmin/jw/jqxtooltip.js"></script>
	<script type="text/javascript" src="/shopadmin/jw/jqxcalendar.js"></script>
	<script type="text/javascript" src="/shopadmin/jw/globalize.js"></script>
	
	
</head>
<body>
    <div id='content'>
        <script type="text/javascript">
            $(document).ready(function () {               
                // Create a jqxDateTimeInput
                $("#jqxWidget").jqxDateTimeInput({formatString: 'yyyy-MM-dd'});
            });
        </script>
        <div id='jqxWidget'>
        </div>
    </div>
</body>
</html>