<!DOCTYPE html>
<html lang="en">
<?php 
include('connect.php');
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}
//$accountseq		= (!empty($_GET['accountseq']))?$_GET['accountseq']:0;
//$accountid		= (!empty($_GET['accountid']))?$_GET['accountid']:null;

$query = "SELECT *  FROM company ";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$company_seq = $row['company_seq'];
				$company_id = $row['company_id'];
				$companyname = $row['name'];				
				$account_receivable = $row['account_receivable'];
				$account_payable = $row['account_payable'];
				$inventory_asset = $row['inventory_asset'];
				$inventory_cogs = $row['inventory_cogs'];
				$cash_receipt_revenue = $row['cash_receipt_revenue'];
				$cash_receipt_discount = $row['cash_receipt_discount'];
				$payment_expense = $row['payment_expense'];
				$payment_discount = $row['payment_discount'];
				$account_receivable_description = $row['account_receivable_description'];
				$account_payable_description = $row['account_payable_description'];
				$inventory_asset_description = $row['inventory_asset_description'];
				$inventory_cogs_description = $row['inventory_cogs_description'];
				$cash_receipt_revenue_description = $row['cash_receipt_revenue_description'];
				$cash_receipt_discount_description = $row['cash_receipt_discount_description'];
				$payment_expense_description = $row['payment_expense_description'];
				$payment_discount_description = $row['payment_discount_description'];
				$ship_via_vendor = $row['ship_via_vendor'];
				$ship_via_customer = $row['ship_via_customer'];
				$terms_vendor = $row['terms_vendor'];
				$terms_customer = $row['terms_customer'];
				$incoterms_vendor = $row['incoterms_vendor'];
				$incoterms_customer = $row['incoterms_customer'];
				$salestax = $row['salestax'];
				$po_start = $row['po_start'];
				$puchase_start = $row['puchase_start'];
				$sales_order_start = $row['sales_order_start'];
				$invoice_start = $row['invoice_start'];
				$general_journal = $row['general_journal'];
				$note = $row['note'];
				$theme = $row['theme'];
				
		}

?>
<head>
    <link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.black.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.classic.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.darkblue.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.energyblue.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.fresh.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.highcontrast.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.metro.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.office.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.shinyblack.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.summer.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.ui-darkness.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.ui-le-frog.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.ui-lightness.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.ui-overcast.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.ui-redmond.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.ui-smoothness.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.ui-start.css" type="text/css" />
	<link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.ui-sunny.css" type="text/css" />
	
	
    <script type="text/javascript" src="/aw/scripts/jquery-1.10.1.min.js"></script>  
	
	<script type="text/javascript" src="/aw/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="/aw/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="/aw/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="/aw/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="/aw/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="/aw/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="/aw/jqwidgets/jqxdropdownlist.js"></script>
	 <script type="text/javascript" src="/aw/jqwidgets/jqxgrid.js"></script>
	<script type="text/javascript" src="/aw/jqwidgets/jqxgrid.sort.js"></script>
	
    <script type="text/javascript" src="/aw/jqwidgets/jqxgrid.filter.js"></script>
  

	<script type="text/javascript" src="/aw/jqwidgets/jqxpanel.js"></script>
   
    <script type="text/javascript" src="/aw/jqwidgets/jqxdata.js"></script>
	<script type="text/javascript" src="/aw/jqwidgets/jqxgrid.columnsresize.js"></script>
	 <script type="text/javascript" src="/aw/jqwidgets/jqxgrid.columnsreorder.js"></script> 
    <script type="text/javascript" src="/aw/jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="/aw/jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="/aw/jqwidgets/jqxgrid.pager.js"></script>
	<script type="text/javascript" src="/aw/jqwidgets/jqxtooltip.js"></script>
	<script type="text/javascript" src="/aw/jqwidgets/jqxvalidator.js"></script> 
    <script type="text/javascript" src="/aw/jqwidgets/jqxinput.js"></script>
	<script type="text/javascript" src="/aw/jqwidgets/jqxdatetimeinput.js"></script>
	<script type="text/javascript" src="/aw/jqwidgets/jqxcalendar.js"></script>
	<script type="text/javascript" src="/aw/jqwidgets/jqxcheckbox.js"></script>
	<script type="text/javascript" src="/aw/jqwidgets/jqxlistbox.js"></script>
	<script type="text/javascript" src="/aw/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="/aw/jqwidgets/jqxcombobox.js"></script>
	  <script type="text/javascript" src="/aw/jqwidgets/jqxwindow.js"></script>
	  
	  
	<script type="text/javascript">
		
	
        $(document).ready(function () {
            // prepare the data
            var data = {};
			var theme = $("#theme").val();
			
			
			
		/*
			var d = new Date();
			d.setMonth(d.getMonth() - 6);

			$("#jqxWidgetfrom").jqxDateTimeInput({width: '250px', height: '25px', theme: theme});
			$('#jqxWidgetfrom').jqxDateTimeInput('val', d);
			$("#jqxWidgetto").jqxDateTimeInput({width: '250px', height: '25px', theme: theme});
			
			$("#jqxCheckBox10").jqxCheckBox({ width: 120, height: 25, checked: true, theme: theme });
            $("#jqxCheckBox10").on('change', function (event) {
                var checked = event.args.checked;
                if (checked) {
                    $("#jqxCheckBox10").find('span')[1].innerHTML = 'Active';
                }
                else {
                    $("#jqxCheckBox10").find('span')[1].innerHTML = 'Inactive';
                }
            });*/

			var location_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
                row["location_seq"] = id;
				row["company_id"] =jQuery("#companyid").val();
				row["location_id"] =jQuery("#locationid").val();
				row["address1"] =jQuery("#address1").val();
				row["address2"] =jQuery("#address2").val();
				row["city"] =jQuery("#city").val();
				row["state"] =jQuery("#state").val();
				row["country"] =jQuery("#country").val();
				row["tel"] =jQuery("#tel").val();
                return row;
            }
			
			var division_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
                row["division_seq"] = id;
				row["company_id"] =jQuery("#companyid").val();
				row["division_id"] =jQuery("#divisionid").val();
				row["name"] =jQuery("#divisionname").val();
				return row;
            }
			var label_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
                row["division_seq"] = id;
				row["company_id"] =jQuery("#hcompany_id").val();
				row["division_id"] =jQuery("#hdivision_id").val();
				row["name"] =jQuery("#hname").val();
				row["labelname"] =jQuery("#labelname").val();
				row["labeladd1"] =jQuery("#labeladd1").val();
				row["labeladd2"] =jQuery("#labeladd2").val();
				row["labeladd3"] =jQuery("#labeladd3").val();
				row["labeltel"] =jQuery("#labeltel").val();
				return row;
            }
			
			// renderer for grid cells.
             var numberrenderer = function (row, column, value) {
                 return '<div style="text-align: center; margin-top: 5px;">' + (1 + value) + '</div>';
             }

             // create Grid datafields and columns arrays.
            
			var cssclass = 'jqx-widget-header';
                     if (theme != '') cssclass += ' jqx-widget-header-' + theme;
            
			
			$('.text-input').jqxInput({ theme: theme });
			// initialize validator.
            $('#companyForm').jqxValidator({
                hintType: 'label',
                animationDuration: 0,
             rules: [
                    { input: '#companyid', message: 'Company ID is required!', action: 'keyup, blur', rule: 'required' }
                    ], theme: theme
            });	
			
			$("#notesave").bind('click', function () {	
				$.ajax({
                            dataType: 'json',
                            url: 'company_data.php',
                            async:true,
							cache: false,
							type:"post",
							data:{"update":"true","companyseq":"1","onlynote":"true","note":note},
                            success: function (data) {
							alert('Successful update!');
							}
							
						});
				//}
			});
			$("#noteclose").bind('click', function () {	
			
				$('#window').jqxWindow('close');
			});

			$("#company_saverowbutton").bind('click', function () {
				var companyid=$("#companyid").val();
				var name=$("#name").val();
				var accountar=$("#accountar").val();
				var accountap=$("#accountap").val();
				var accountinventoryas=$("#accountinventoryas").val();
				var accountinventoryco=$("#accountinventoryco").val();
				var accountcashre=$("#accountcashre").val();
				var accountcashdc=$("#accountcashdc").val();
				var accountpayex=$("#accountpayex").val();
				var accountpaydc=$("#accountpaydc").val();
				var ar=$("#ar").val();
				var ap=$("#ap").val();
				var inventoryas=$("#inventoryas").val();
				var inventoryco=$("#inventoryco").val();
				var cashre=$("#cashre").val();
				var cashdc=$("#cashdc").val();
				var payex=$("#payex").val();
				var paydc=$("#paydc").val();
				var shipvendor=$("#shipvendor").val();
				var shipcustomer=$("#shipcustomer").val();
				var termvendor=$("#termvendor").val();
				var termcustomer=$("#termcustomer").val();
				var incotermvendor=$("#incotermvendor").val();
				var incotermcustomer=$("#incotermcustomer").val();
				var pono=$("#pono").val();
				var purchaseno=$("#purchaseno").val();
				var sono=$("#sono").val();
				var invoiceno=$("#invoiceno").val();
				var glno=$("#glno").val();
				var theme=$("#theme").val();
				$.ajax({
                            dataType: 'json',
                            url: 'company_data.php',
                            async:true,
							cache: false,
							type:"post",
							data:{"update":"true","companyseq":"1","companyid":companyid,"name":name,"shipvendor":shipvendor,"shipcustomer":shipcustomer,"termvendor":termvendor,"termcustomer":termcustomer,"incotermvendor":incotermvendor,"incotermcustomer":incotermcustomer,"pono":pono,"purchaseno":purchaseno,"sono":sono,"invoiceno":invoiceno,"glno":glno,"accountar":accountar,"accountap":accountap,"accountinventoryas":accountinventoryas,"accountinventoryco":accountinventoryco,"accountcashre":accountcashre,"accountcashdc":accountcashdc,"accountpayex":accountpayex,"ar":ar,"ap":ap,"inventoryas":inventoryas,"inventoryco":inventoryco,"cashre":cashre,"cashdc":cashdc,"payex":payex,"paydc":paydc,"theme":theme},
                            success: function (data) {
							alert('Successful update!');
							location.reload();
							}
							
						});
				//}
			});
//==========================location======================
            var location_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'location_seq', type: 'number'},
					 { name: 'company_id', type: 'string'},
					 { name: 'location_id', type: 'string'},
					 { name: 'address1', type: 'string'},
					 { name: 'address2', type: 'string'},
					 { name: 'city', type: 'string'},
					 { name: 'state', type: 'string'},
					 { name: 'country', type: 'string'},
					 { name: 'tel', type: 'string'},
					 
                ],
				id: 'location_seq',
                url: 'location_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					location_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},
				addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param(rowdata);
					//alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'location_data.php',
                            data: data,
							cache: false,
                            success: function (data, status, xhr) {
							   // insert command is executed.
								//alert(data);
								commit(true);
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});							
			    },
                deleterow: function (rowid, commit) {
                    // synchronize with the server - send delete command
            		   var data = "delete=true&" + $.param({location_seq: rowid});
				       $.ajax({
                            dataType: 'json',
                            url: 'location_data.php',
							cache: false,
                            data: data,
                            success: function (data, status, xhr) {
							   // delete command is executed.
							   commit(true);
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});							
			   },	
                updaterow: function (rowid, rowdata, commit) {
			        // synchronize with the server - send update command
                   //alert(rowid);
					var data = "update=true&" + $.param(rowdata);
					$.ajax({
						dataType: 'json',
						url: 'location_data.php',
						data: data,
						success: function (data, status, xhr) {
							// update command is executed.
							commit(true);
						}
					});		
                }
            
                
            };

 		    var location_dataadapter = new $.jqx.dataAdapter(location_source);
           // initialize jqxGrid
            
			var items = new Array();
           items.push('AL');
			items.push('AK');
			items.push('AZ');
			items.push('AR');
			items.push('CA');
			items.push('CO');
           items.push('CT');
			items.push('DE');
			items.push('DC');
			items.push('FL');
			items.push('GA');
			items.push('HI');
           items.push('ID');
			items.push('IL');
			items.push('IN');
			items.push('IA');
			items.push('KS');
			items.push('KY');
           items.push('LA');
			items.push('ME');
			items.push('MD');
			items.push('MA');
			items.push('MI');
			items.push('MN');
           items.push('MS');
			items.push('MO');
			items.push('MT');
			items.push('NW');
			items.push('NV');
			items.push('NH');
           items.push('NJ');
			items.push('NC');
			items.push('ND');
			items.push('OH');
			items.push('OK');
			items.push('OR');
           items.push('PA');
			items.push('PI');
			items.push('SC');
			items.push('SD');
			items.push('TN');
			items.push('TX');
           items.push('UT');
			items.push('VT');
			items.push('VA');
			items.push('WA');
			items.push('WV');
			items.push('WI');
			items.push('WY');

			$("#location_jqxgrid").jqxGrid(
            {
                width: 960,height:300,
				//selectionmode: 'singlecell',
                source: location_dataadapter,
                theme: theme,
				ready: function () {
                    $("#location_jqxgrid").jqxGrid('hidecolumn', 'location_seq');
                },
				editable: true,
				autoheight: false,
				pageable: true,
                columnsresize: true,
                columnsreorder: true,
				sortable: true,
				showfilterrow: true,
                filterable: true,
				//columnsresize: true,
				//virtualmode: true,
				/*rendergridrows: function(obj)
				{
					  return obj.data;     
				},*/
                columns: [
					  {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer },	
                      { text: 'Location seq', editable: false, datafield: 'location_seq', width: 20 },
					  { text: 'Location ID', editable: true, datafield: 'location_id', width: 100,align: 'center' },
					  { text: 'Address1', editable: true, datafield: 'address1', width: 200,align: 'center' },
					  { text: 'Address2', editable: true, datafield: 'address2', width: 200,align: 'center' },	
					  { text: 'City', editable: true, datafield: 'city', width: 100,align: 'center' },
					  { text: 'State',  filtertype: 'list', filteritems: items,datafield: 'state',columntype: 'combobox', width: 100,align: 'center',
						createeditor: function (row, column, editor) {
                            // assign a new data source to the combobox.
                            var list = ['AK', 'AZ', 'AR','CA', 'CO', 'CT','DE', 'DC', 'FL','GA', 'HI', 'ID','IL', 'IN', 'KS','KY', 'LA', 'ME','MD', 'MA', 'MI','MN', 'MS', 'MO','MT', 'NE', 'NV','NH', 'NJ', 'NM','NY', 'NC', 'ND','OH', 'OK', 'OR','PA', 'RI', 'SC','SD', 'TN', 'TX','UT', 'VT', 'VA','WA', 'WV', 'WI','WY'];
                            editor.jqxComboBox({ autoDropDownHeight: true, source: list, promptText: "Please Choose:" });
                        },
                        // update the editor's value before saving it.
                        cellvaluechanging: function (row, column, columntype, oldvalue, newvalue) {
                            // return the old value, if the new value is empty.
                            if (newvalue == "") return oldvalue;
                        }		
					  },
					  { text: 'Zip', editable: true, datafield: 'zip', width: 50,align: 'center' }, 
					  { text: 'Country', editable: true, datafield: 'country', width: 100,align: 'center' },
					  { text: 'tel', datafield: 'tel', width:66,align: 'center' },
					  
                      
                  ]
            });
            $("#location_deleterowbutton").jqxButton({ theme: theme });
            $("#location_addrowbutton").jqxButton({ theme: theme });
			$("#location_saverowbutton").jqxButton({ theme: theme });
			$("#location_cancelrowbutton").jqxButton({ theme: theme });
            // update row.
			
			$("#location_addrowbutton").bind('click', function () {
				
				$("#locationid").val('');
				$("#address1").val('');
				$("#address2").val('');
				$("#city").val('');
				$("#state").val('');
				$("#zip").val('');
				$("#country").val('');
				$("#tel").val('');
				$.ajax({
							async:false, type:"post", dataType:"json", url:"location_data.php",
							data:{"type":true},
							success:function(d) {
								if (d) {
									
									var select = $("#state");
									select.children().remove();
									for(var i=0; i<d[0].Rows.length; i++) {
										select.append("<option value="+d[0].Rows[i].code+">"+d[0].Rows[i].code+"</option>");	
									}
								}
							}
						});	


				$("#location_addrowbutton").hide();
				$("#location_saverowbutton").show();
				$("#location_cancelrowbutton").show();
				$("#locationid").show();
				$("#address1").show();
				$("#address2").show();
				$("#city").show();
				$("#state").show();
				$("#zip").show();
				$("#country").show();
				$("#tel").show();
					
            });
			$("#location_cancelrowbutton").bind('click', function () {
				
				$("#location_addrowbutton").show();
				$("#location_saverowbutton").hide();
				$("#location_cancelrowbutton").hide();
				$("#locationid").val('');
				$("#locationid").hide();
				$("#address1").val('');
				$("#address1").hide();
				$("#address2").val('');
				$("#address2").hide();
				$("#city").val('');
				$("#city").hide();
				$("#state").val('');
				$("#state").hide();
				$("#country").val('');
				$("#country").hide();
				$("#zip").val('');
				$("#zip").hide();
				$("#tel").val('');
				$("#tel").hide();
            });

            $("#location_saverowbutton").on('click', function () {
               
			   var locationid=$("#locationid").val();
			   if (locationid=='')
			   {
			      alert('Please input location ID.');
				  return false;
			   }
			   
			   
				var rowscount=0;
				var data = "lastid=true";
				$.ajax({
                            dataType: 'json',
                            url: 'location_data.php',
                            data: data,
							cache: false,
                            success: function (data) {
							   // insert command is executed.
								if( data==null)
									rowscount=1;
								else
								rowscount=parseInt(data[0].location_seq)+1;
								
								var datarow = location_generaterow(rowscount);
								$("#location_jqxgrid").jqxGrid('addrow', null, datarow,'first');				
								$("#locationid").val('');
								$("#locationid").hide();
								$("#location_addrowbutton").show();
								$("#location_saverowbutton").hide();
								$("#location_cancelrowbutton").hide();
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
            });

            // delete row.
            $("#location_deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#location_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#location_jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
				
                    var id = $("#location_jqxgrid").jqxGrid('getrowid', selectedrowindex);
                  
				
					$("#location_jqxgrid").jqxGrid('deleterow', id);
                }
            });

			

            $("#location_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
			
//===============================================================			 
//==========================division======================
            var division_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'division_seq', type: 'number'},
					 { name: 'company_id', type: 'string'},
					 { name: 'division_id', type: 'string'},
					 { name: 'name', type: 'string'},
					 { name: 'labelname', type: 'string'},
					 { name: 'labeladd1', type: 'string'},
					 { name: 'labeladd2', type: 'string'},
					 { name: 'labeladd3', type: 'string'},
					 { name: 'labeltel', type: 'string'},
					 
                ],
				id: 'division_seq',
                url: 'division_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					division_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},
				addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param(rowdata);
					//alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'division_data.php',
                            data: data,
							cache: false,
                            success: function (data, status, xhr) {
							   // insert command is executed.
								//alert(data);
								commit(true);
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});							
			    },
                deleterow: function (rowid, commit) {
                    // synchronize with the server - send delete command
            		   var data = "delete=true&" + $.param({division_seq: rowid});
				       $.ajax({
                            dataType: 'json',
                            url: 'division_data.php',
							cache: false,
                            data: data,
                            success: function (data, status, xhr) {
							   // delete command is executed.
							   commit(true);
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});							
			   },	
                updaterow: function (rowid, rowdata, commit) {
			        // synchronize with the server - send update command
                    var data = "update=true&" + $.param(rowdata);
					//alert('ttt'+data);
					$.ajax({
						dataType: 'json',
						url: 'division_data.php',
						data: data,
						success: function (data, status, xhr) {
							// update command is executed.
							commit(true);
						}
					});		
                }
            
                
            };
			
			 // initialize the input fields.
            $("#labelname").jqxInput({ theme: theme });
            $("#labeladd1").jqxInput({ theme: theme });
            $("#labeladd2").jqxInput({ theme: theme });
			$("#labeladd3").jqxInput({ theme: theme });
			$("#labeltel").jqxInput({ theme: theme });
            $("#labelname").width(150);
            $("#labelname").height(23);
            $("#labeladd1").width(150);
            $("#labeladd1").height(23);
            $("#labeladd2").width(150);
            $("#labeladd2").height(23);
			$("#labeladd3").width(150);
            $("#labeladd3").height(23);
			$("#labeltel").width(150);
            $("#labeltel").height(23);

 		    var division_dataadapter = new $.jqx.dataAdapter(division_source);
			var editrow = -1;
		   // initialize jqxGrid
            
			
			$("#division_jqxgrid").jqxGrid(
            {
                width: 460,height:300,
				//selectionmode: 'singlecell',
                source: division_dataadapter,
                theme: theme,
				ready: function () {
                    $("#division_jqxgrid").jqxGrid('hidecolumn', 'division_seq');
					$("#division_jqxgrid").jqxGrid('hidecolumn', 'labelname');
					$("#division_jqxgrid").jqxGrid('hidecolumn', 'labeladd1');
					$("#division_jqxgrid").jqxGrid('hidecolumn', 'labeladd2');
					$("#division_jqxgrid").jqxGrid('hidecolumn', 'labeladd3');
					$("#division_jqxgrid").jqxGrid('hidecolumn', 'labeladd4');
					$("#division_jqxgrid").jqxGrid('hidecolumn', 'labeltel');
                },
				editable: true,
				autoheight: false,
				pageable: true,
                columnsresize: true,
                columnsreorder: true,
				sortable: true,
				showfilterrow: true,
                filterable: true,
				//columnsresize: true,
				//virtualmode: true,
				/*rendergridrows: function(obj)
				{
					  return obj.data;     
				},*/
                columns: [
					  {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer },	
                      { text: 'division seq', editable: false, datafield: 'division_seq', width: 20 },
					  { text: 'Division ID', editable: true, datafield: 'division_id', width: 100,align: 'center' },
					  { text: 'Name', editable: true, datafield: 'name', width: 230,align: 'center' },
					  { text: 'labelame',  datafield: 'labelname', width: 100,align: 'center' },
					  { text: 'labeladd1',  datafield: 'labeladd1', width: 100,align: 'center' },
					  { text: 'labeladd2',  datafield: 'labeladd2', width: 100,align: 'center' },
					  { text: 'labeladd3',  datafield: 'labeladd3', width: 100,align: 'center' },
					  { text: 'labeltel',  datafield: 'labeltel', width: 100,align: 'center' },
					  { text: 'Letterhead', datafield: 'Edit', width: 86,align: 'center', columntype: 'button', cellsrenderer: function () {
							 return "Edit";
						  }, buttonclick: function (row) {
							 // open the popup window when the user clicks a button.
							 editrow = row;
							 var offset = $("#division_jqxgrid").offset();
							 $("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60 } });

							 // get the clicked row's data and initialize the input fields.
							 var dataRecord = $("#division_jqxgrid").jqxGrid('getrowdata', editrow);
							 //alert(dataRecord.labelname);
							 $("#hdivision_id").val(dataRecord.division_id);
							 $("#hcompany_id").val(dataRecord.company_id);
							 $("#hname").val(dataRecord.name);
							 $("#labelname").val(dataRecord.labelname);
							 $("#labeladd1").val(dataRecord.labeladd1);
							 $("#labeladd2").val(dataRecord.labeladd2);
							 $("#labeladd3").val(dataRecord.labeladd3);
							 $("#labeltel").val(dataRecord.labeltel);

							 // show the popup window.
							 $("#popupWindow").jqxWindow('open');
						 }
					   }
                      
                  ]
            });
			
			// initialize the popup window and buttons.
            $("#popupWindow").jqxWindow({
                width: 250, resizable: false, theme: theme, isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01           
            });

            $("#popupWindow").on('open', function () {
                $("#labelname").jqxInput('selectAll');
            });
         
            $("#labelCancel").jqxButton({ theme: theme });
            $("#labelSave").jqxButton({ theme: theme });

            // update the edited row when the user clicks the 'Save' button.
            $("#labelSave").click(function () {
                
				if (editrow >= 0) {
                    /*
					var row = { labelname: $("#labelname").val(), labelaad1: $("#labelaad1").val(), labelaad2: $("#labelaad2").val(),
                        labelaad3: $("#labelaad3"), labeltel: $("#labeltel")
                    };*/
                    var rowID = $('#division_jqxgrid').jqxGrid('getrowid', editrow);
					
					var row = label_generaterow(rowID);

					$('#division_jqxgrid').jqxGrid('updaterow', rowID, row);
                    $("#popupWindow").jqxWindow('hide');
                }
            });

            $("#division_deleterowbutton").jqxButton({ theme: theme });
            $("#division_addrowbutton").jqxButton({ theme: theme });
			$("#division_saverowbutton").jqxButton({ theme: theme });
			$("#division_cancelrowbutton").jqxButton({ theme: theme });
            // update row.
			
			$("#division_addrowbutton").bind('click', function () {
				
				$("#division_addrowbutton").hide();
				$("#division_saverowbutton").show();
				$("#division_cancelrowbutton").show();
				$("#divisionid").show();
				$("#divisionname").show();
				$("#divisionid").val('');
				$("#divisionname").val('');
            });
			$("#division_cancelrowbutton").bind('click', function () {
				
				$("#division_addrowbutton").show();
				$("#division_saverowbutton").hide();
				$("#division_cancelrowbutton").hide();
				$("#divisionid").val('');
				$("#divisionid").hide();
				$("#divisionname").val('');
				$("#divisionname").hide();
				
            });

            $("#division_saverowbutton").on('click', function () {
               
			   var divisionid=$("#divisionid").val();
			   if (divisionid=='')
			   {
			      alert('Please input Division ID.');
				  return false;
			   }
			   
			   
				var rowscount=0;
				var data = "lastid=true";
				$.ajax({
                            dataType: 'json',
                            url: 'division_data.php',
                            data: data,
							cache: false,
                            success: function (data) {
							   // insert command is executed.
								if( data==null)
									rowscount=1;
								else
								rowscount=parseInt(data[0].division_seq)+1;
								
								var datarow = division_generaterow(rowscount);
								$("#division_jqxgrid").jqxGrid('addrow', null, datarow,'first');				
								$("#divisionid").val('');
								$("#divisionid").hide();
								$("#divisionname").val('');
								$("#divisionname").hide();
								$("#division_addrowbutton").show();
								$("#division_saverowbutton").hide();
								$("#division_cancelrowbutton").hide();
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
            });

            // delete row.
            $("#division_deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#division_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#division_jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
				
                    var id = $("#division_jqxgrid").jqxGrid('getrowid', selectedrowindex);
                  
				
					$("#division_jqxgrid").jqxGrid('deleterow', id);
                }
            });

			

            $("#division_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
//=========================account======================================
			$("#accountar").change(function() {
				var arvalue=$("#accountar").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"account_data.php",
							data:{"accountar":true,"accountseq":arvalue},
							success:function(d) {
								if (d) {
									$("#ar").val(d[0].Rows[0].description);
									}
								}
							//}
						});	
            });
			$("#accountap").change(function() {
				var apvalue=$("#accountap").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"account_data.php",
							data:{"accountap":true,"accountseq":apvalue},
							success:function(d) {
								if (d) {
									$("#ap").val(d[0].Rows[0].description);
									}
								}
							//}
						});	
            });
			$("#accountinventoryas").change(function() {
				var apvalue=$("#accountinventoryas").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"account_data.php",
							data:{"accountinventoryas":true,"accountseq":apvalue},
							success:function(d) {
								if (d) {
									$("#inventoryas").val(d[0].Rows[0].description);
									}
								}
							//}
						});	
            });
			$("#accountinventoryco").change(function() {
				var apvalue=$("#accountinventoryco").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"account_data.php",
							data:{"accountinventoryco":true,"accountseq":apvalue},
							success:function(d) {
								if (d) {
									$("#inventoryco").val(d[0].Rows[0].description);
									}
								}
							//}
						});	
            });
			$("#accountcashre").change(function() {
				var apvalue=$("#accountcashre").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"account_data.php",
							data:{"accountcashre":true,"accountseq":apvalue},
							success:function(d) {
								if (d) {
									$("#cashre").val(d[0].Rows[0].description);
									}
								}
							//}
						});	
            });
			$("#accountcashdc").change(function() {
				var apvalue=$("#accountcashdc").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"account_data.php",
							data:{"accountcashdc":true,"accountseq":apvalue},
							success:function(d) {
								if (d) {
									$("#cashdc").val(d[0].Rows[0].description);
									}
								}
							//}
						});	
            });
			$("#accountpayex").change(function() {
				var apvalue=$("#accountpayex").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"account_data.php",
							data:{"accountpayex":true,"accountseq":apvalue},
							success:function(d) {
								if (d) {
									$("#payex").val(d[0].Rows[0].description);
									}
								}
							//}
						});	
            });
			$("#accountpaydc").change(function() {
				var apvalue=$("#accountpaydc").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"account_data.php",
							data:{"accountpaydc":true,"accountseq":apvalue},
							success:function(d) {
								if (d) {
									$("#paydc").val(d[0].Rows[0].description);
									}
								}
							//}
						});	
            });
			$("#salestax").change(function() {
				var apvalue=$("#salestax").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"account_data.php",
							data:{"salestax":true,"salestaxseq":apvalue},
							success:function(d) {
								if (d) {
									$("#rate").val(d[0].Rows[0].rate);
									}
								}
							//}
						});	
            });
//===============================================================
			var basicDemo = (function () {
            //Adding event listeners
            function _addEventListeners() {
                $('#showWindowButton').click(function () {
                    $('#window').jqxWindow('open');
                });
               
            };

            //Creating all page elements which are jqxWidgets
            function _createElements() {
                $('#showWindowButton').jqxButton({ theme: basicDemo.config.theme, width: '70px' });
               };

            //Creating the demo window
            function _createWindow() {
                $('#window').jqxWindow({
                    showCollapseButton: true, maxHeight: 400, maxWidth: 700, minHeight: 200, minWidth: 200, height: 300, width: 500, theme: basicDemo.config.theme,
                    initContent: function () {
                        $('#window').jqxWindow('focus');
                    }
                });
            };

            return {
                config: {
                    dragArea: null,
                    theme: null
                },
                init: function () {
                    //Creating all jqxWindgets except the window
                    _createElements();
                    //Attaching event listeners
                    _addEventListeners();
                    //Adding jqxWindow
                    _createWindow();
                }
            };
        } ());

            //Setting demo's theme
            basicDemo.config.theme = theme;
            //Initializing the demo
            basicDemo.init();
			$('#window').jqxWindow('close');

//===============================================================
			
		});
    </script>
	<style type="text/css">
        .text-input
        {
            height: 21px;
            width: 100px;
        }
		 .text-nameinput
        {
            height: 21px;
            width: 300px;
        }
        .register-table
        {
            margin-top: 10px;
            margin-bottom: 10px;
			border: 1px solid #e5e5e5;
        }
        .register-table td, 
        .register-table tr
        {
            margin: 0px;
            padding: 2px;
            border-spacing: 0px;
            border-collapse: collapse;
            font-family: Verdana;
            font-size: 12px;
			
        }
        h3 
        {
            display: inline-block;
            margin: 0px;
        }
    </style>
</head>
<body class='default' style="width:980px;">

<div>
<ul>
	<li style="list-style: none">

	<div style="border: 1px solid #e5e5e5; width:960px;">
		<?php
		echo '<div class="jqx-grid-column-header jqx-grid-column-header-'.$theme.' jqx-widget-header jqx-widget-header-'.$theme.'">';
		?>
			<label style="margin-left: 10px;">Company</label>
		</div>
		
		<div >
				<div style="margin:10px;margin-right: 20px;float: left;">
				<?php	
				echo	'<input id="company_saverowbutton" type="button" value=" Save " class="jqx-rc-all jqx-rc-all-bootstrap jqx-button jqx-button-bootstrap jqx-widget jqx-widget-'.$theme.' jqx-fill-state-normal jqx-fill-state-normal-'.$theme.'">';
				?>
				</div>
				<div style="margin:10px;margin-right: 50px;float: left;">
					<input type="button" value="Note" id="showWindowButton" />
				</div>
				<div>
				<input type="button" onclick="window.open('glaccount.php','xxxxx','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=400')"></a>
				</div>
				
		 </div>

		<div style="width: 100%;  margin-top: 50px;" id="mainDemoContainer">
            <div id="window">
                <div id="windowHeader">
                    <span>
                        Note
                    </span>
                </div>
                <div style="overflow: hidden;" id="windowContent">
					<div>
					<textarea id="note" rows="12" cols="59">	
                            <?php echo $note?>
                     </textarea>
					 <!--<iframe src="customcolumn.htm "frameborder="0" scrolling="auto" width="500" height="180" marginwidth="5" marginheight="5" ></iframe>-->
					 </div>
					<div style="margin-right: 20px;float: left;">
					<input type="button" id="notesave" value="Save">
					</div>
					<div >
					<input type="button" id="noteclose" value="Close">
					</div>
				</div>
			</div>	
		 </div>

		 <div id="register">
			<div style="overflow: hidden;">
				<form id="companyForm" action="./">
					<table class="register-table">
						<tr>
							<td valign="top" >ID:</td>
							<td valign="top"><input type="hidden" id="companyseq" value="<?php echo $company_seq?>" class="text-input" /><input type="text" id="companyid" value="<?php echo $company_id?>" class="text-input" /></td>
							<td valign="top" >Name:</td>
							<td valign="top"><input type="text" id="companyname" value="<?php echo $companyname?>" class="text-nameinput" /></td>
							<td valign="top" >Theme:</td>
							<td valign="top">
							<select id="theme">
							<?php 
								$query = "SELECT  * FROM theme ";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($theme==$row['theme'])
								echo "<option value=\"".$row['theme']."\" selected>".$row['theme']."</option>";
								else
								echo "<option value=\"".$row['theme']."\" >".$row['theme']."</option>";
								}
								?>
							
							</select>
							</td>
						</tr>
					</table>
				</form>
			</div>	
		</div>
	</div>
		
	<div >
			<div style="margin: 6px;">
				<input id="location_addrowbutton" type="button" value=" New " style="margin-right: 20px;"/>
				<input id="location_cancelrowbutton" type="button" value="Cancel" style="display:none;margin-right: 20px;"/>
				<input id="location_saverowbutton" type="button" value=" Save " style="display:none;margin-right: 20px;" />
				<input id="location_deleterowbutton" type="button" value="Delete" />
			</div>
			
	 </div>
	
	 <div>
		<input  type="text" id="locationid" value="" style="display:none;width:92px;margin-left: 26px;">
		<input  type="text" id="address1" value="" style="display:none;width:192px;">
		<input  type="text" id="address2" value="" style="display:none;width:192px;">
		<input  type="text" id="city" value="" style="display:none;width:92px;">
		<select  id="state" style="display:none;width:93px;" >
							<?php 
							$query = "SELECT  * FROM state";

							$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
							while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
							echo "<option value=\"".$row['code']."\" >".$row['code']."</option>";
							}
							?>
		</select>

		<input  type="text" id="zip" value="" style="display:none;width:42px;">
		<input  type="text" id="country" value="" style="display:none;width:84px;">
		<input  type="text" id="tel" value="" style="display:none;width:50px;">
	</div>
	
	<div id="location_jqxgrid">
	</div>
	

	<div >
			<div style="margin: 6px;">
				<input id="division_addrowbutton" type="button" value=" New " style="margin-right: 20px;"/>
				<input id="division_cancelrowbutton" type="button" value="Cancel" style="display:none;margin-right: 20px;"/>
				<input id="division_saverowbutton" type="button" value=" Save " style="display:none;margin-right: 20px;" />
				<input id="division_deleterowbutton" type="button" value="Delete" />
			</div>
			
	 </div>
	
	<div>
	<table class="register-table" style="width:960px;">
	<tr>
	<td>
		<div>
			<input  type="text" id="divisionid" value="" style="display:none;width:94px;margin-left: 26px;">
			<input  type="text" id="divisionname" value="" style="display:none;width:225px;">
			
		</div>
	
		<div id="division_jqxgrid">
		</div>
		
		<div id="popupWindow">
				<div>Letter Head</div>
				<div style="overflow: hidden;">
					<table>
						<tr>
							<td align="right">Company Name:</td>
							<td align="left"><input id="labelname" />
							<input type="hidden" id="hcompany_id">
							<input type="hidden" id="hdivision_id">
							<input type="hidden" id="hname">
							</td>
						</tr>
						<tr>
							<td align="right">Address1:</td>
							<td align="left"><input id="labeladd1" /></td>
						</tr>
						<tr>
							<td align="right">Address2:</td>
							<td align="left"><input id="labeladd2" /></td>
						</tr>
						<tr>
							<td align="right">Address3:</td>
							<td align="left"><div id="labeladd3"></div></td>
						</tr>
						<tr>
							<td align="right">Tel:</td>
							<td align="left"><div id="labeltel"></div></td>
						</tr>
						<tr>
							<td align="right"></td>
							<td style="padding-top: 10px;" align="right"><input style="margin-right: 5px;" type="button" id="labelSave" value="Save" /><input id="labelCancel" type="button" value="Cancel" /></td>
						</tr>
					</table>
				</div>
		 </div>		
		</td>
		<td>
		<div>	
		<table class="register-table">
				<tr>
					<td valign="top" >Area</td>
					<td valign="top" >Default G/L Account</td>
					<td valign="top" >Account Description</td>
				</tr>
				<tr>
					<td valign="top" >Account Receivable</td>
					<td valign="top" >
					<select  id="accountar" >
								<?php 
								$query = "SELECT  * FROM account where type=2";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($account_receivable==$row['account_seq'])
								echo "<option value=\"".$row['account_seq']."\" selected>".$row['account_id']."</option>";
								else
								echo "<option value=\"".$row['account_seq']."\" >".$row['account_id']."</option>";
								}
								?>
					</select>
					</td>
					<td valign="top" ><input type="text" id="ar" readonly value="<?php echo $account_receivable_description?>" class="text-input" /></td>				
				</tr>
				<tr>
					<td valign="top" >Account Payable</td>
					<td valign="top" >
					<select  id="accountap" >
								<?php 
								$query = "SELECT  * FROM account where type=5";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($account_payable==$row['account_seq'])
								echo "<option value=\"".$row['account_seq']."\" selected>".$row['account_id']."</option>";
								else
								echo "<option value=\"".$row['account_seq']."\" >".$row['account_id']."</option>";
								}
								?>
					</select>
					</td>
					<td valign="top" ><input type="text" id="ap" readonly value="<?php echo $account_payable_description?>" class="text-input" /></td>				
				</tr>
				<tr>
					<td valign="top" >Inventory - Asset</td>
					<td valign="top" >
					<select  id="accountinventoryas" >
								<?php 
								$query = "SELECT  * FROM account where (type=3 or type=4)";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($inventory_asset==$row['account_seq'])
								echo "<option value=\"".$row['account_seq']."\" selected>".$row['account_id']."</option>";
								else
								echo "<option value=\"".$row['account_seq']."\" >".$row['account_id']."</option>";
								}
								?>
					</select>
					</td>
					<td valign="top" ><input type="text" id="inventoryas" readonly value="<?php echo $inventory_asset_description ?>" class="text-input" /></td>				
				</tr>
				<tr>
					<td valign="top" >Inventory - COGS</td>
					<td valign="top" >
					<select  id="accountinventoryco" >
								<?php 
								$query = "SELECT  * FROM account where type=11 ";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($inventory_cogs==$row['account_seq'])
								echo "<option value=\"".$row['account_seq']."\" selected>".$row['account_id']."</option>";
								else
								echo "<option value=\"".$row['account_seq']."\" >".$row['account_id']."</option>";
								}
								?>
					</select>
					</td>
					<td valign="top" ><input type="text" id="inventoryco" readonly value="<?php echo $inventory_cogs_description?>" class="text-input" /></td>				
				</tr>
				<tr>
					<td valign="top" >Cash Receipt-Revenue</td>
					<td valign="top" >
					<select  id="accountcashre" >
								<?php 
								$query = "SELECT  * FROM account where type=10 ";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($cash_receipt_revenue ==$row['account_seq'])
								echo "<option value=\"".$row['account_seq']."\" selected>".$row['account_id']."</option>";
								else
								echo "<option value=\"".$row['account_seq']."\" >".$row['account_id']."</option>";
								}
								?>
					</select>
					</td>
					<td valign="top" ><input type="text" id="cashre" readonly value="<?php echo $cash_receipt_revenue_description ?>" class="text-input" /></td>				
				</tr>
				<tr>
					<td valign="top" >Cash Receipt - Discount</td>
					<td valign="top" >
					<select  id="accountcashdc" >
								<?php 
								$query = "SELECT  * FROM account where type=10 ";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($cash_receipt_discount ==$row['account_seq'])
								echo "<option value=\"".$row['account_seq']."\" selected>".$row['account_id']."</option>";
								else
								echo "<option value=\"".$row['account_seq']."\" >".$row['account_id']."</option>";
								}
								?>
					</select>
					</td>
					<td valign="top" ><input type="text" id="cashdc" readonly value="<?php echo $cash_receipt_discount_description ?>" class="text-input" /></td>				
				</tr>
				<tr>
					<td valign="top" >Payment - Expense</td>
					<td valign="top" >
					<select  id="accountpayex" >
								<?php 
								$query = "SELECT  * FROM account where type=11 or type=12 ";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($payment_expense  ==$row['account_seq'])
								echo "<option value=\"".$row['account_seq']."\" selected>".$row['account_id']."</option>";
								else
								echo "<option value=\"".$row['account_seq']."\" >".$row['account_id']."</option>";
								}
								?>
					</select>
					</td>
					<td valign="top" ><input type="text" id="payex" readonly value="<?php echo $payment_expense_description ?>" class="text-input" /></td>				
				</tr>
				<tr>
					<td valign="top" >Payment - Discount</td>
					<td valign="top" >
					<select  id="accountpaydc" >
								<?php 
								$query = "SELECT  * FROM account where type=11 or type=12 ";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($payment_discount   ==$row['account_seq'])
								echo "<option value=\"".$row['account_seq']."\" selected>".$row['account_id']."</option>";
								else
								echo "<option value=\"".$row['account_seq']."\" >".$row['account_id']."</option>";
								}
								?>
					</select>
					</td>
					<td valign="top" ><input type="text" id="paydc" readonly value="<?php echo $$payment_discount_description ?>" class="text-input" /></td>				
				</tr>
			</table>
		</div>
		</td>
		</tr>
		</table>
	</div>
	
	<div>	
	<table class="register-table" style="width:960px;">
	<tr>
		<td>
		<table class="register-table">
				<tr>
					<td valign="top" >Area</td>
					<td valign="top" >Default</td>
					
				</tr>
				<tr>
					<td valign="top" >Ship Via(Vendor)</td>
					<td valign="top" >
					<select  id="shipvendor" >
								<?php 
								$query = "SELECT  * FROM shipvia";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($ship_via_vendor==$row['shipvia_id'])
								echo "<option value=\"".$row['shipvia_id']."\" selected>".$row['description']."</option>";
								else
								echo "<option value=\"".$row['shipvia_id']."\" >".$row['description']."</option>";
								}
								?>
					</select>
					</td>								
				</tr>
				<tr>
					<td valign="top" >Ship Via(Customer)</td>
					<td valign="top" >
					<select  id="shipcustomer" >
								<?php 
								$query = "SELECT  * FROM shipvia";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($ship_via_customer==$row['shipvia_id'])
								echo "<option value=\"".$row['shipvia_id']."\" selected>".$row['description']."</option>";
								else
								echo "<option value=\"".$row['shipvia_id']."\" >".$row['description']."</option>";
								}
								?>
					</select>
					</td>								
				</tr>
		</table>
		</td>
		<td>
		<table class="register-table">
				<tr>
					<td valign="top" >Area</td>
					<td valign="top" >Default</td>
					
				</tr>
				<tr>
					<td valign="top" >Terms(Vendor)</td>
					<td valign="top" >
					<select  id="termvendor" >
								<?php 
								$query = "SELECT  * FROM term";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($terms_vendor ==$row['term_id'])
								echo "<option value=\"".$row['term_id']."\" selected>".$row['code']."</option>";
								else
								echo "<option value=\"".$row['term_id']."\" >".$row['code']."</option>";
								}
								?>
					</select>
					</td>								
				</tr>
				<tr>
					<td valign="top" >Terms(Customer)</td>
					<td valign="top" >
					<select  id="termcustomer" >
								<?php 
								$query = "SELECT  * FROM term";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($terms_customer  ==$row['term_id'])
								echo "<option value=\"".$row['term_id']."\" selected>".$row['code']."</option>";
								else
								echo "<option value=\"".$row['term_id']."\" >".$row['code']."</option>";
								}
								?>
					</select>
					</td>								
				</tr>
		</table>
		</td>
		<td>
		<table class="register-table">
				<tr>
					<td valign="top" >Area</td>
					<td valign="top" >Default</td>
					
				</tr>
				<tr>
					<td valign="top" >Incoterms(Vendor)</td>
					<td valign="top" >
					<select  id="incotermvendor" >
								<?php 
								$query = "SELECT  * FROM incoterms";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($incoterms_vendor   ==$row['incoterms_id'])
								echo "<option value=\"".$row['incoterms_id']."\" selected>".$row['description']."</option>";
								else
								echo "<option value=\"".$row['incoterms_id']."\" >".$row['description']."</option>";
								}
								?>
					</select>
					</td>								
				</tr>
				<tr>
					<td valign="top" >Incoterms(Customer)</td>
					<td valign="top" >
					<select  id="incotermcustomer" >
								<?php 
								$query = "SELECT  * FROM incoterms";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($incoterms_customer    ==$row['incoterms_id'])
								echo "<option value=\"".$row['incoterms_id']."\" selected>".$row['description']."</option>";
								else
								echo "<option value=\"".$row['incoterms_id']."\" >".$row['description']."</option>";
								}
								?>
					</select>
					</td>								
				</tr>
		</table>
		</td>
		</tr>
		</table>
	</div>
	
	<div>
	<table class="register-table" style="width:960px;">
	<tr>
		<td>
		<table class="register-table">
				<tr>
					<td valign="top" >Area</td>
					<td valign="top" >Default</td>
					<td valign="top" >Rate</td>
				</tr>
				<tr>
					<td valign="top" >Sales Tax</td>
					<td valign="top" >
					<select  id="salestax" >
								<?php 
								$query = "SELECT  * FROM salestax";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($salestax    ==$row['salestax_id'])
								echo "<option value=\"".$row['salestax_id']."\" selected>".$row['code']."(".$row['rate']."%)</option>";
								else
								echo "<option value=\"".$row['salestax_id']."\" >".$row['code']."(".$row['rate']."%)</option>";
								}
								?>
					</select>
					</td>
					<td valign="top" ><input type="text" id="rate" readonly value="<?php echo $rate?>" class="text-input" /></td>
				</tr>
				
		</table>
		</td>
		<td>
		<table class="register-table">
				<tr>
					<td valign="top" >PO Start#</td>
					
				</tr>
				<tr>
					<td valign="top" ><input type="text" id="pono" value="<?php echo $po_start?>" class="text-input" /></td>								
				</tr>
				
		</table>
		</td>
		<td>
		<table class="register-table">
				<tr>
					<td valign="top" >Purchase Start#</td>
					
				</tr>
				<tr>
					<td valign="top" ><input type="text" id="purchaseno" value="<?php echo $puchase_start?>" class="text-input" /></td>								
				</tr>
				
		</table>
		</td>
		<td>
		<table class="register-table">
				<tr>
					<td valign="top" >Sales Order Start#</td>
					
				</tr>
				<tr>
					<td valign="top" ><input type="text" id="sono" value="<?php echo $sales_order_start?>" class="text-input" /></td>								
				</tr>
				
		</table>
		</td>
		<td>
		<table class="register-table">
				<tr>
					<td valign="top" >Invoice Start#</td>
					
				</tr>
				<tr>
					<td valign="top" ><input type="text" id="invoiceno" value="<?php echo $invoice_start?>" class="text-input" /></td>								
				</tr>
				
		</table>
		</td>
		<td>
		<table class="register-table">
			<tr>
				<td valign="top" >General Journal#</td>
				
			</tr>
			<tr>
				<td valign="top" ><input type="text" id="glno" value="<?php echo $general_journal?>" class="text-input" /></td>								
			</tr>
			
		</table>
		</td>
		</tr>
	</table>
	</div>
	</li>
	</ul>
</div>	
</body>
</html>
