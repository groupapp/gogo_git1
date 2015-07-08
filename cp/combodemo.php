<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="jquery,ui,easy,easyui,web">
	<meta name="description" content="easyui help you build your web page easily!">
	<title>Filter ComboGrid - jQuery EasyUI Demo</title>
	<link rel="stylesheet" type="text/css" href="/aw/css/easyui.css">
	<link rel="stylesheet" type="text/css" href="/aw/css/icon.css">
	<script type="text/javascript" src="/aw/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="/aw/js/jquery.easyui.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#cg').combogrid({
				panelWidth:150,
				url: 'aw_data.php',
				idField:'account_id',
				textField:'type',
				mode:'remote',
				fitColumns:true,
				columns:[[
					{field:'account_id',title:'Account ID',width:30,sortable:true},
					{field:'type',title:'Type',align:'right',width:50,sortable:true}
					
					//{field:'status',title:'Stauts',align:'center',width:60}
				]],
				onSelect: function(index, row) {
				$('#x').val(row.account_id);
				//alert(row.account_id);
				}
				
			});
			/*var g = $('#cg').combogrid('grid');	// get datagrid object
			var r = g.datagrid('getSelected');	// get the selected row
			alert(r);*/
		});
	</script>
</head>
<body>
	<input id="cg" style="width:150px"></input><input type="text" id="x" style="width:150px; border-width: 1px;"></input>
</body>
</html>