<?php 
include('connect.php');
include('function.php');
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}
//$non_po_token=$_COOKIE["non_potoken"];

$user_id=$_COOKIE["userID"];
//echo "cookie:".$_COOKIE["userID"];
if($user_id=='')
echo "<script type=\"text/javascript\">
alert(\"current log out. Please relogin.\");
//location.reload();
</script>";


$non_po_seq		= (!empty($_GET['non_po_seq']))?$_GET['non_po_seq']:0;
$non_po_id		= (!empty($_GET['non_po_id']))?$_GET['non_po_id']:null;
//$non_po_token		= (!empty($_GET['non_po_token']))?$_GET['non_po_token']:null;
$non_po_newcheck		= (!empty($_GET['non_po_newcheck']))?$_GET['non_po_newcheck']:null;
$non_po_savesucess=empty($_GET["non_po_savesucess"])?null:$_GET["non_po_savesucess"];
//print_r('non_po_newcheck'.$non_po_newcheck.'non_po_savesucess:'.$non_po_savesucess);



//print_r("/token:".$non_po_token);
//$gettoken="cookie:".$_COOKIE["non_potoken"];

$non_po_token=$_SESSION["non_po_token"];
//print_r("token".$non_po_token);
$d_query = "SELECT count(*) as cnt  FROM non_po a,non_po_detail b  where b.user_id='".$user_id."' and a.non_po_token=b.non_po_token  and b.save_chk='N'";

		$d_result = mysql_query($d_query) or die("SQL Error 1: " . mysql_error());
		
		while ($d_row = mysql_fetch_array($d_result, MYSQL_ASSOC)) {
		$non_po_detail_cnt = intval($d_row['cnt']);
		}



if($non_po_id>0)
{
$query = "SELECT  * FROM non_po where non_po_id=".$non_po_id;


		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$poto_id = $row['poto_id'];
				$payto_id = $row['payto_id'];
				$shipto_id = $row['shipto_id'];
				$shipto_location_id = $row['shipto_location'];
				$po_date = $row['po_date'];
				$start_ship_date = $row['start_ship_date'];
				$cancel_date = $row['cancel_date'];
				$open_chk = $row['open_chk'];       
				$shipvia = $row['shipvia'];
				$terms = $row['terms'];
				$incoterms = $row['incoterms'];
				$division = $row['division'];
				$total_qty= $row['total_qty'];
				$total_amount= $row['total_amount'];
				$ship_hand_fee= $row['ship_hand_fee'];
				$other_charge= $row['other_charge'];
				$salestax= $row['salestax'];
				$grand_total_amount= $row['grand_total_amount'];
				$jobno = $row['jobno'];
				$non_po_token = $row['non_po_token'];
				$note = $row['note'];
				$folder = $row['folder'];
				
				
		}
		if($non_po_savesucess=="Y")
		{	
			$serverURL = $_SERVER['DOCUMENT_ROOT'] . '/myfilemanager/dynamic_folder/' . $folder;
			//echo $serverURL;	
				if(!file_exists($serverURL))
				{
					mkdir($serverURL, 0777, true);
					echo "<script>alert('New Folder Created');</script>";
				}
		}
		
}
else
{
	/*echo "<script type=\"text/javascript\">
	alert(\"current cookie error Please relogin.\");
	location.reload();
	</script>";*/

}
			/*
			$tjournaldate = explode("-", $journaldate);
			$yjournaldate=$tjournaldate[0];
			$mjournaldate=$tjournaldate[1];
			$djournaldate=$tjournaldate[2];
			$sjournaldate=$yjournaldate.' ,'.$mjournaldate.' ,'.$djournaldate;	
		*/

		$DB = new myDB;
	$poto_name=$DB->getcustomername($poto_id);
	if($poto_name=="")
	$poto_name=$DB->getcompanyname($poto_id);
	$poto_location_add1=$DB->getDefaultlocationadd1($poto_id);	
	$poto_location_add2=$DB->getDefaultlocationadd2($poto_id);
	$poto_location_add3=$DB->getDefaultlocationadd3($poto_id);

	
	$payto_name=$DB->getcustomername($payto_id);
	if($payto_name=="")
	$payto_name=$DB->getcompanyname($payto_id);
	$payto_location_add1=$DB->getDefaultlocationadd1($payto_id);	
	$payto_location_add2=$DB->getDefaultlocationadd2($payto_id);
	$payto_location_add3=$DB->getDefaultlocationadd3($payto_id);

	$shipto_name=$DB->getcustomername($shipto_id);
	if($shipto_name=="")
	$shipto_name=$DB->getcompanyname($shipto_id);
	$shipto_location_add1=$DB->getlocationadd1($shipto_id,$shipto_location_id);	
	$shipto_location_add2=$DB->getlocationadd2($shipto_id,$shipto_location_id);
	$shipto_location_add3=$DB->getlocationadd3($shipto_id,$shipto_location_id);

	//$startpono=$DB->startpono();
//print_r($startpono);
	$tpodate = explode("-", $po_date);
	$ypodate=$tpodate[0];
	$mpodate=$tpodate[1];
	$dpodate=$tpodate[2];
	$podate=$ypodate.' ,'.$mpodate.' ,'.$dpodate;		

	$tstartdate = explode("-", $start_ship_date);
	$ystartdate=$tstartdate[0];
	$mstartdate=$tstartdate[1];
	$dstartdate=$tstartdate[2];
	$startdate=$ystartdate.' ,'.$mstartdate.' ,'.$dstartdate;		

	$tcanceldate = explode("-", $cancel_date);
	$ycanceldate=$tcanceldate[0];
	$mcanceldate=$tcanceldate[1];
	$dcanceldate=$tcanceldate[2];
	$canceldate=$ycanceldate.' ,'.$mcanceldate.' ,'.$dcanceldate;		


?>
	<script type="text/javascript">
        function elfinder(id){
			//alert(id);
			if(id===undefined)
			{
			alert('Purchase empty');
			return false;
			}
			var folder="PO_"+id;
		window.open('http://egcjc.org/myfilemanager/elfinder/elfinder.html?folderName='+folder,'new window','toolbar=0, location=no,status=no,etc,scrollbars=yes,resizable=yes,width=900px,height=450px');
		}
		
		
		$(document).ready(function () {
            // prepare the data
            var data = {};
			var podate=$("#podate").val();
			var startdate=$("#startdate").val();
			var canceldate=$("#canceldate").val();
			var non_po_newcheck=$('#non_po_newcheck').val();
			var non_po_savesucess=$('#non_po_savesucess').val();
			var non_po_token=$('#non_po_token').val();
			var open_chk=$('#open_chk').val();
			var theme = 'bootstrap';
			var lastid=0;
			//$("#jqxWidgetdate").jqxDateTimeInput({width: '250px', height: '25px', theme: theme,formatString:'yyyy/MM/dd'});
			//$('#jqxWidgetdate ').jqxDateTimeInput('setDate',getdate );
			

			$("#po_date").jqxDateTimeInput({width: '100px', height: '23px', theme: theme,formatString:'yyyy/MM/dd',readonly: true});
			$('#start_date').jqxDateTimeInput({width: '100px', height: '23px', theme: theme,formatString:'yyyy/MM/dd',readonly: true});
			$("#cancel_date").jqxDateTimeInput({width: '100px', height: '23px', theme: theme,formatString:'yyyy/MM/dd',readonly: true});
			$('#po_date').jqxDateTimeInput('setDate',podate );
			$('#start_date').jqxDateTimeInput('setDate',startdate );
			$('#cancel_date').jqxDateTimeInput('setDate',canceldate );

	
			$("#jqxCheckBox10").jqxCheckBox({ width: 120, height: 25, checked: true, disabled:true,theme: theme });
            $("#jqxCheckBox10").on('change', function (event) {
                var checked = event.args.checked;
                if (checked) {
                    $("#jqxCheckBox10").find('span')[1].innerHTML = 'Open';
                }
                else {
                    $("#jqxCheckBox10").find('span')[1].innerHTML = 'Close';
                }
            });
			if (open_chk=="CLOSE")
			{
				$("#jqxCheckBox10").jqxCheckBox({ checked: false });
			}
			else
				$("#jqxCheckBox10").jqxCheckBox({ checked: true });

			var non_po_d_generaterow = function (id,color_id,description) {
                var row = {};
                row["non_po_d_seq"] = id;
				row["non_po_id"] =0;
				row["description"] ="";
				row["qty"] =0;
				row["unit"] ="";
				row["unit_price"] =0;
				row["amount"] =0;
				
				/*row["description"] =jQuery("#nondescription").val();
				row["qty"] =jQuery("#qty").val();
				row["unit"] =jQuery("#unit").val();
				row["unit_price"] =jQuery("#unit_price").val();
				row["amount"] =parseInt(jQuery("#qty").val())*parseFloat(jQuery("#unit_price").val());
				*/
				
				
				row["non_po_token"] =jQuery("#non_po_token").val();
				row["user_id"] =jQuery("#user_id").val();
			//	alert(jQuery("#user_id").val());
				return row;
            }
			var non_po_lastid = function () {
               
				var result;
					$.ajax({
						async:false,
						type:"get",
						url:"garment_pono_data.php",
						//data:{"lastid":true},
						dataType:"json",
						success: function(data) {
							/*if( data==null)
									rowscount=1;
								else*/
								rowscount=parseInt(data[0].last_pono)+1;
								/*var startpono=$('#startpono').val();
							if (startpono>0)
							{
								result = parseInt(startpono);
							}
							else*/
								result = parseInt(rowscount);
						}
					});

					return result;

            }
             var numberrenderer = function (row, column, value) {
                 return '<div style="text-align: center; margin-top: 5px;">' + (1 + value) + '</div>';
             }

             // create Grid datafields and columns arrays.
            
			var cssclass = 'jqx-widget-header';
                     if (theme != '') cssclass += ' jqx-widget-header-' + theme;
            
			
			$('.text-input').jqxInput({ theme: theme });
			$('.text-input4').jqxInput({ theme: theme });
			$('.text-input300').jqxInput({ theme: theme });
			// initialize validator.
            
			$('#non_poForm').jqxValidator({
                hintType: 'label',
                animationDuration: 0,
             rules: [
                    { input: '#non_po_id', message: 'PO ID is required!', action: 'keyup, blur', rule: 'required' }
                    ], theme: theme
            });	
			/*
			$("#notesave").bind('click', function () {	
				$.ajax({
                            dataType: 'json',
                            url: 'non_po_data.php',
                            async:true,
							cache: false,
							type:"post",
							data:{"update":"true","":"1","onlynote":"true","note":note},
                            success: function (data) {
							alert('Successful update!');
							}
							
						});
				//}
			});*/
			$("#noteclose").bind('click', function () {	
			
				$('#window').jqxWindow('close');
			});
			
			//$('#ship_hand_fee').jqxNumberInput({ width: '92px', height: '21px', symbol: "$", min: 0,digits: 8, theme: theme, decimalDigits:2 });
            
			if (non_po_newcheck =='Y')
			{
				
				$('#non_po_listrowbutton').jqxInput({disabled: true, theme:theme});
				$('#non_po_id').jqxInput({disabled: true, theme:theme});
				
				$('#poto_name').jqxInput({disabled: true, theme:theme});
				$('#poto_location_add1').jqxInput({disabled: true, theme:theme});
				$('#poto_location_add2').jqxInput({disabled: true, theme:theme});
				$('#poto_location_add3').jqxInput({disabled: true, theme:theme});
				$('#payto_name').jqxInput({disabled: true, theme:theme});
				$('#payto_location_add1').jqxInput({disabled: true, theme:theme});
				$('#payto_location_add2').jqxInput({disabled: true, theme:theme});
				$('#payto_location_add3').jqxInput({disabled: true, theme:theme});
				
				$('#shipto_name').jqxInput({disabled: true, theme:theme});
				$('#shipto_location_add1').jqxInput({disabled: true, theme:theme});
				$('#shipto_location_add2').jqxInput({disabled: true, theme:theme});
				$('#shipto_location_add3').jqxInput({disabled: true, theme:theme});
				$('#jobno').jqxInput({disabled: false, theme:theme});
				$('#poto_id').jqxInput({disabled: false, theme:theme});
				$('#shipto_id').jqxInput({disabled: false, theme:theme});
				$('#payto_id').jqxInput({disabled: false, theme:theme});
				$('#shipto_location_id').jqxInput({disabled: false, theme:theme});
				$('#non_shipvia').jqxInput({disabled: false, theme:theme});
				$('#non_terms').jqxInput({disabled: false, theme:theme});
				$('#non_incoterms').jqxInput({disabled: false, theme:theme});
				$('#division').jqxInput({disabled: false, theme:theme});
				$("#showWindowButton").jqxButton({ theme:theme, disabled:false});		
				
				
				$('#ship_hand_fee').jqxInput({disabled: false, theme:theme});
				$('#other_charge').jqxInput({disabled: false, theme:theme});
				$('#salestax').jqxInput({disabled: false, theme:theme});
				
				$('#po_date').jqxDateTimeInput({ readonly: false});
				$('#start_date').jqxDateTimeInput({ readonly: false});
				$('#cancel_date').jqxDateTimeInput({ readonly: false});
				$('#grand_total_amount').jqxInput({disabled: true, theme:theme});
				
			}
			else
				{
				$('#non_po_listrowbutton').jqxInput({disabled: false, theme:theme});
				
				$('#non_po_id').jqxInput({disabled: true, theme:theme});

				$('#poto_id').jqxInput({disabled: true, theme:theme});
				$('#poto_name').jqxInput({disabled: true, theme:theme});
				$('#poto_location_add1').jqxInput({disabled: true, theme:theme});
				$('#poto_location_add2').jqxInput({disabled: true, theme:theme});
				$('#poto_location_add3').jqxInput({disabled: true, theme:theme});
				$('#payto_name').jqxInput({disabled: true, theme:theme});
				$('#payto_location_add1').jqxInput({disabled: true, theme:theme});
				$('#payto_location_add2').jqxInput({disabled: true, theme:theme});
				$('#payto_location_add3').jqxInput({disabled: true, theme:theme});
				$('#shipto_name').jqxInput({disabled: true, theme:theme});
				$('#shipto_location_add1').jqxInput({disabled: true, theme:theme});
				$('#shipto_location_add2').jqxInput({disabled: true, theme:theme});
				$('#shipto_location_add3').jqxInput({disabled: true, theme:theme});
				$('#jobno').jqxInput({disabled: true, theme:theme});
				$('#non_po_id').jqxInput({disabled: true, theme:theme});
				$('#poto_id').jqxInput({disabled: true, theme:theme});
				$('#shipto_id').jqxInput({disabled: true, theme:theme});
				$('#payto_id').jqxInput({disabled: true, theme:theme});
				$('#shipto_location_id').jqxInput({disabled: true, theme:theme});
				$('#non_shipvia').jqxInput({disabled: true, theme:theme});
				$('#non_terms').jqxInput({disabled: true, theme:theme});
				$('#non_incoterms').jqxInput({disabled: true, theme:theme});
				$('#division').jqxInput({disabled: true, theme:theme});
				$("#showWindowButton").jqxButton({ theme:theme ,disabled:true});		
				
					
				$('#ship_hand_fee').jqxInput({disabled: true, theme:theme});
				$('#other_charge').jqxInput({disabled: true, theme:theme});
				$('#salestax').jqxInput({disabled: true, theme:theme});
				
				$('#grand_total_amount').jqxInput({disabled: true, theme:theme});
				
				}
		
			$("#non_po_editrowbutton").bind('click', function () {
			
			$('#poto_id').jqxInput({disabled: false});
			$('#shipto_id').jqxInput({disabled: false});
			$('#payto_id').jqxInput({disabled: false});
			$('#shipto_location_id').jqxInput({disabled: false});
			$('#non_shipvia').jqxInput({disabled: false});
			$('#non_terms').jqxInput({disabled: false});
			$('#non_incoterms').jqxInput({disabled: false});
			$('#division').jqxInput({disabled: false});			
			$('#non_po_jqxgrid').jqxGrid({ editable: true});
			$("#non_po_d_deleterowbutton").jqxButton({  disabled:false});
            $("#non_po_d_addrowbutton").jqxButton({  disabled:false });
			$("#non_po_d_saverowbutton").jqxButton({  disabled:false});
			$("#non_po_d_cancelrowbutton").jqxButton({  disabled:false});
			$("#showWindowButton").jqxButton({  disabled:false});
			$("#jqxCheckBox10").jqxCheckBox({  disabled:false});
			$('#ship_hand_fee').jqxInput({disabled: false});
				$('#other_charge').jqxInput({disabled: false});
				$('#salestax').jqxInput({disabled: false});
				$('#po_date').jqxDateTimeInput({ readonly: false});
				$('#start_date').jqxDateTimeInput({ readonly: false});
				$('#cancel_date').jqxDateTimeInput({ readonly: false});
				
			});
			
			$("#qty").jqxNumberInput({ width: '92px', height: '21px',  min: 0, theme: theme,digits: 8, decimalDigits:0 });//
			$("#unit_price").jqxNumberInput({ width: '92px', height: '21px', symbol: "$", min: 0,digits: 8, theme: theme, decimalDigits:2 });
			var non_po_token=$("#non_po_token").val();
			var non_po_id=$("#non_po_id").val();

			var non_po_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'non_po_d_seq', type: 'number'},
					 { name: 'non_po_id', type: 'string'},
					 { name: 'description', type: 'string'},
					 { name: 'qty', type: 'number'},
					 { name: 'unit', type: 'string'},
					 { name: 'unit_price', type: 'float'},
					 { name: 'amount', type: 'float'},
					 { name: 'user_id', type: 'string'},
					 { name: 'non_po_token', type: 'string'},	 
					 
                ],
				id: 'non_po_d_seq',
                url: 'non_po_detail_data.php',    
				//root: 'Rows',
				data:{'non_po_token':non_po_token,'non_po_id':non_po_id},
				cache: false,
				/*
				beforeprocessing: function(data)
				{		
					
					non_po_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},*/
                addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param(rowdata);
					//alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'non_po_detail_data.php',
                            data: data,
							cache: false,
                            success: function (data, status, xhr) {
							   // insert command is executed.
								//alert(data);
								commit(true);
								
								if ($("#total_amount").val()=='')
								{
								//alert("xx:"+$("#total_amount").val());
								
								var total_amount=0;
								}
								else
								{
								//alert("yy:"+$("#total_amount").val());
								
								var	t_total_amount=$("#total_amount").val();
								var total_amount=parseFloat(t_total_amount);//t_total_amount.substring(1)
								}
								var	total_balance_amount=0
								if($("#ship_hand_fee").val()=="")
								var	ship_hand_fee=0;
								else
								var	ship_hand_fee=parseFloat($("#ship_hand_fee").val());
								if($("#other_charge").val()=="")
								var	other_charge=0;
								else
								var	other_charge=$("#other_charge").val();
								if($("#salestax").val()=="")
								var	salestax=0;
								else
								var	salestax=$("#salestax").val();
								var	grand_total_amount=parseFloat(total_amount)+parseFloat(ship_hand_fee)+parseFloat(other_charge)+parseFloat(salestax);
								$("#grand_total_amount").val(grand_total_amount);
							

								
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});							
			    },
                deleterow: function (rowid,commit) {
                    // synchronize with the server - send delete command
					 // var account_id = $('#non_po_jqxgrid').jqxGrid('getcellvaluebyid', rowid, "account_id");
					  var non_po_token = $('#non_po_jqxgrid').jqxGrid('getcellvaluebyid', rowid, "non_po_token");
            		   var data = "delete=true&" + $.param({non_po_d_seq: rowid,non_po_token:non_po_token});
				       $.ajax({
                            dataType: 'json',
                            url: 'non_po_detail_data.php',
							cache: false,
                            data: data,
                            success: function (data, status, xhr) {
							   // delete command is executed.
							   commit(true);

							   if ($("#total_amount").val()=="")
								{
								var total_amount=0;
								}
								else
								{
								var	t_total_amount=$("#total_amount").val();
								var total_amount=parseFloat(t_total_amount);
								}
								var	total_balance_amount=0
								if($("#ship_hand_fee").val()=="")
								var	ship_hand_fee=0;
								else
								var	ship_hand_fee=parseFloat($("#ship_hand_fee").val());
								if($("#other_charge").val()=="")
								var	other_charge=0;
								else
								var	other_charge=$("#other_charge").val();
								if($("#salestax").val()=="")
								var	salestax=0;
								else
								var	salestax=$("#salestax").val();
								var	grand_total_amount=parseFloat(total_amount)+parseFloat(ship_hand_fee)+parseFloat(other_charge)+parseFloat(salestax);
								$("#grand_total_amount").val(grand_total_amount);

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
						url: 'non_po_detail_data.php',
						data: data,
						success: function (data, status, xhr) {
							// update command is executed.
							commit(true);
							//$('#non_po_jqxgrid').jqxGrid('refreshaggregates');

						}
					});		
                }
            
            };

			 var cellclass = function (row, columnfield, value) {
                 return 'green';
            }

 		    var non_po_dataadapter = new $.jqx.dataAdapter(non_po_source);
           

			$("#non_po_jqxgrid").jqxGrid(
            {
                width: 1200,height:290,
				//selectionmode: 'singlecell',
                source: non_po_dataadapter,
                theme: theme,
				ready: function () {
                    $("#non_po_jqxgrid").jqxGrid('hidecolumn', 'non_po_d_seq');
					$("#non_po_jqxgrid").jqxGrid('hidecolumn', 'non_po_id');
					$("#non_po_jqxgrid").jqxGrid('hidecolumn', 'user_id');
					
					$("#non_po_jqxgrid").jqxGrid('hidecolumn', 'non_po_token');
                },
				editable: true,
				autoheight: false,
				//pageable: true,
                columnsresize: true,
                columnsreorder: true,
				sortable: true,
				//showfilterrow: true,
                filterable: true,
				showstatusbar: true,
                statusbarheight: 30,
				 showaggregates: true,
                showtoolbar: true,
				//selectionmode: 'multiplecellsadvanced',
				//columnsresize: true,
				//virtualmode: true,
			
				/*rendergridrows: function(obj)
				{
					  return obj.data;     
				},*/
				//filtertype: 'list', filteritems: items,
				rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 1px;'></div>");
                   var excelExport =$("<div style='margin-left: 10px; float: left;'> <input type='button' value='Export to Excel' id='excelExport' /></div>");
					var csvExport =$("<div style='margin-left: 10px; float: left;'><input type='button' value='Export to CSV' id='csvExport' /></div>");
					
					toolbar.append(container);
                   container.append(excelExport);
                    container.append(csvExport);
					
					
                    
                    
					$("#excelExport").jqxButton({ theme: theme });
					$("#csvExport").jqxButton({ theme: theme });
					
				   $("#excelExport").click(function () {
						$("#non_po_jqxgrid").jqxGrid('exportdata', 'xls', 'jqxGrid');           
					});
					$("#csvExport").click(function () {
						$("#non_po_jqxgrid").jqxGrid('exportdata', 'csv', 'jqxGrid');
					});
					
                },
                columns: [
					  {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer },	
                      { text: 'non_po seq', editable: false, datafield: 'non_po_d_seq', width: 20 },
					  { text: 'non_po ID', editable: false, datafield: 'non_po_id', width: 100,align: 'center' },
					 
 					  { text: 'Description', editable: true,datafield: 'description', width: 760,align: 'left'},
					  { text: 'QTY', editable: true,datafield: 'qty', width: 100,align: 'center',cellsformat: 'n2',cellsalign: 'right', aggregates: ['sum'],
						  aggregatesrenderer: function (aggregates, column, element, summaryData,record) {
                          var renderstring = "<div class='jqx-widget-content jqx-widget-content-" + theme + "' style='float: left; width: 100%; height: 100%;'>";
                          var datainformation = $('#non_po_jqxgrid').jqxGrid('getdatainformation');
							var rowscount = datainformation.rowscount;
							
							var summaryqty = $("#non_po_jqxgrid").jqxGrid('getcolumnaggregateddata', 'qty', ['sum']);
							if(rowscount>0)
							  {	sumcqty=summaryqty['sum'];
								$("#total_qty").val(sumcqty);
							  }
							else
								sumcqty='';		
							  renderstring += '<div style="color: ' + color + '; position: relative; margin: 6px; text-align: right; overflow: hidden;">$' + sumcqty + '</div>';

						  /*$.each(aggregates, function (key, value) {
                              var name = key == 'sum' ? '' : 'Avg';
                              var color = '';
                              renderstring += '<div style="color: ' + color + '; position: relative; margin: 6px; text-align: right; overflow: hidden;">' + name  + value + '</div>';
							  //$('#total_qty').val(value);
                          });*/
                          renderstring += "</div>";
                          return renderstring;
                      }
					  },
					  { text: 'Unit', editable: true,datafield: 'unit', width: 100,align: 'center',cellsalign: 'center'
					  },
					  { text: 'Price', editable: true,datafield: 'unit_price', width: 100,align: 'center',cellsformat: 'c2',cellsalign: 'right'
					  },
					  { text: 'Amount', editable: true,datafield: 'amount', width: 100,align: 'center',cellsformat: 'c2',cellsalign: 'right',cellclassname: cellclass, aggregates: ['sum'],
					  aggregatesrenderer: function (aggregates, column, element, summaryData,record) {
                          var renderstring = "<div class='jqx-widget-content jqx-widget-content-" + theme + "' style='float: left; width: 100%; height: 100%;'>";
						  var datainformation = $('#non_po_jqxgrid').jqxGrid('getdatainformation');
							var rowscount = datainformation.rowscount;
							
							var summaryamount = $("#non_po_jqxgrid").jqxGrid('getcolumnaggregateddata', 'amount', ['sum']);
							if(rowscount>0)
							{
								sumamount=summaryamount['sum'];	
								$("#total_amount").val(sumamount);
							}
							else
								sumamount='';		
							  renderstring += '<div style="color: ' + color + '; position: relative; margin: 6px; text-align: right; overflow: hidden;">$' + sumamount + '</div>';

                         /* $.each(aggregates, function (key, value) {
                              var name = key == 'sum' ? '' : 'Avg';
                              var color = '';
                              if (key == 'sum' && summaryData['sum'] < 650) {
                                  color = 'red';
                              }
                              renderstring += '<div style="color: ' + color + '; position: relative; margin: 6px; text-align: right; overflow: hidden;">' + name  + value + '</div>';
							  //$('#total_amount').val(value);
                          });*/
                          renderstring += "</div>";
                          return renderstring;
                      }
					  },
					   { text: 'user_id', editable: false,datafield: 'user_id', width: 100},	 
					  { text: 'non_po_token', editable: false,datafield: 'non_po_token', width: 100},
					  	  
                      
                  ]
            });

//--------------------------------------------------------------------	
			$("#non_po_jqxgrid").on('cellendedit', function (event) 
				{
					var column = args.datafield;
					
					var row = args.rowindex;
					var value = args.value;
					var oldvalue = args.oldvalue;
					
					if(column=='qty')
					{
						var data = $('#non_po_jqxgrid').jqxGrid('getrowdata', row);
						var amount=parseInt(value)*parseFloat(data.unit_price);
						

						$("#non_po_jqxgrid").jqxGrid('setcellvalue', row, "amount",amount );
						
					}
					else if(column=='unit_price')
					{
						var data = $('#non_po_jqxgrid').jqxGrid('getrowdata', row);
						var amount=parseFloat(value)*parseInt(data.qty);
						//alert(value);
						//alert(amount);
						
						$("#non_po_jqxgrid").jqxGrid('setcellvalue', row, "amount",amount );
					
					
					}
					

				});
			
			$("#non_po_jqxgrid").on('cellvaluechanged', function (event) 
				{
					var column = args.datafield;var row = args.rowindex;
					var value = args.newvalue;var oldvalue = args.oldvalue;
					if ($("#total_amount").val()=="")
					{
						var	t_total_amount=$("#total_amount").val();

						var total_amount=0;
					}
					else
					{
					var	t_total_amount=$("#total_amount").val();
					var total_amount=parseFloat(t_total_amount);
					}


					var	total_balance_amount=0
					if($("#ship_hand_fee").val()=="")
					var	ship_hand_fee=0;
					else
					var	ship_hand_fee=parseFloat($("#ship_hand_fee").val());
					if($("#other_charge").val()=="")
					var	other_charge=0;
					else
					var	other_charge=$("#other_charge").val();
					if($("#salestax").val()=="")
					var	salestax=0;
					else
					var	salestax=$("#salestax").val();
					var	grand_total_amount=parseFloat(total_amount)+parseFloat(ship_hand_fee)+parseFloat(other_charge)+parseFloat(salestax);
					$("#grand_total_amount").val(grand_total_amount);

				});

				$("#ship_hand_fee").change(function() {
								if ($("#total_amount").val()=="")
								{
								var total_amount=0;
								}
								else
								{
								var	t_total_amount=$("#total_amount").val();
								var total_amount=parseFloat(t_total_amount);
								}
								
								var	total_balance_amount=0
								if($("#ship_hand_fee").val()=="")
								var	ship_hand_fee=0;
								else
								var	ship_hand_fee=parseFloat($("#ship_hand_fee").val());
								if($("#other_charge").val()=="")
								var	other_charge=0;
								else
								var	other_charge=$("#other_charge").val();
								if($("#salestax").val()=="")
								var	salestax=0;
								else
								var	salestax=$("#salestax").val();
								var	grand_total_amount=parseFloat(total_amount)+parseFloat(ship_hand_fee)+parseFloat(other_charge)+parseFloat(salestax);
								$("#grand_total_amount").val(grand_total_amount);
				});
				$("#other_charge").change(function() {
								if ($("#total_amount").val()=="")
								{
								var total_amount=0;
								}
								else
								{
								var	t_total_amount=$("#total_amount").val();
								var total_amount=parseFloat(t_total_amount);
								}				
								var	total_balance_amount=0
								if($("#ship_hand_fee").val()=="")
								var	ship_hand_fee=0;
								else
								var	ship_hand_fee=parseFloat($("#ship_hand_fee").val());
								if($("#other_charge").val()=="")
								var	other_charge=0;
								else
								var	other_charge=$("#other_charge").val();
								if($("#salestax").val()=="")
								var	salestax=0;
								else
								var	salestax=$("#salestax").val();
								var	grand_total_amount=parseFloat(total_amount)+parseFloat(ship_hand_fee)+parseFloat(other_charge)+parseFloat(salestax);
								$("#grand_total_amount").val(grand_total_amount);
				});
				$("#salestax").change(function() {
								if ($("#total_amount").val()=="")
								{
								var total_amount=0;
								}
								else
								{
								var	t_total_amount=$("#total_amount").val();
								var total_amount=parseFloat(t_total_amount);
								}				
								var	total_balance_amount=0
								if($("#ship_hand_fee").val()=="")
								var	ship_hand_fee=0;
								else
								var	ship_hand_fee=parseFloat($("#ship_hand_fee").val());
								if($("#other_charge").val()=="")
								var	other_charge=0;
								else
								var	other_charge=$("#other_charge").val();
								if($("#salestax").val()=="")
								var	salestax=0;
								else
								var	salestax=$("#salestax").val();
								var	grand_total_amount=parseFloat(total_amount)+parseFloat(ship_hand_fee)+parseFloat(other_charge)+parseFloat(salestax);
								$("#grand_total_amount").val(grand_total_amount);
				});
//------------------------------------------------------------------------------			


            if (non_po_newcheck =='Y')
			{
				$('#non_po_jqxgrid').jqxGrid({ editable: true});
			}
			else if(non_po_savesucess=='Y')
				$('#non_po_jqxgrid').jqxGrid({ editable: true});
			else
				$('#non_po_jqxgrid').jqxGrid({ editable: true});

			$("#non_po_deleterowbutton").jqxButton({ theme: theme });
            $("#non_po_listrowbutton").jqxButton({ theme: theme });
			$("#non_po_addrowbutton").jqxButton({ theme: theme });
			$("#non_po_saverowbutton").jqxButton({ theme: theme });
			$("#non_po_editrowbutton").jqxButton({ theme: theme });
            
			// update row.
			$("#non_po_listrowbutton").bind('click', function () {
				
				
				location='?position=non_po';
					
            });
		/*	
			$("#non_po_jqxgrid").on('cellendedit', function (event) 
				{
					var column = args.datafield;
					
					var row = args.rowindex;
					var value = args.value;
					var oldvalue = args.oldvalue;
					if(column=='account_id')
					{
						
						
					}	
				});
		*/	
			
			$("#non_po_saverowbutton").bind('click', function () {
				
				var non_po_seq=$("#non_po_seq").val();

				
				var non_po_id=$("#non_po_id").val();
				
				
				if (non_po_id=="")
				{
					var non_po_id=non_po_lastid();		
				}
				//alert('xx:'+non_po_id);

				$("#non_po_id").val(non_po_id);
				

				var poto_id=$("#poto_id").val();
				var payto_id=$("#payto_id").val();
				var shipto_id=$("#shipto_id").val();
				var shipto_location_id=$("#shipto_location_id").val();
				var po_date=$("#po_date").val();
				var start_ship_date=$("#start_date").val();
				var cancel_date=$("#cancel_date").val();
				var shipvia=$("#non_shipvia").val();
				var terms=$("#non_terms").val();
				var incoterms=$("#non_incoterms").val();
				var division=$("#division").val();
				var non_po_token=$("#non_po_token").val();
				if ($("#total_qty").val()=="")
				{
					var total_qty=0;
				}
				else
				{
				var total_qty=$("#total_qty").val();
				}		
				var	total_balance_qty=0
				
				if ($("#total_amount").val()=="")
				{
					var total_amount=0;
				}
				else
				{
				var	t_total_amount=$("#total_amount").val();
				var total_amount=parseFloat(t_total_amount);
				}
			
				
				var	total_balance_amount=0
				if($("#ship_hand_fee").val()=="")
				var	ship_hand_fee=0;
				else
				var	ship_hand_fee=parseFloat($("#ship_hand_fee").val());
				if($("#other_charge").val()=="")
				var	other_charge=0;
				else
				var	other_charge=$("#other_charge").val();
				if($("#salestax").val()=="")
				var	salestax=0;
				else
				var	salestax=$("#salestax").val();
				var	grand_total_amount=parseFloat(total_amount)+parseFloat(ship_hand_fee)+parseFloat(other_charge)+parseFloat(salestax);
				//alert(grand_toal_amount);
				//return false;
				var user_id=$("#user_id").val();
				if($("#jqxCheckBox10").val()==true)
				var open_chk="OPEN";
				else
				var open_chk="CLOSE";
				var note=$('#note').val();
				var folder="PO_"+$('#non_po_id').val();
				//alert(note);
				if(confirm("Do you want to save?"))
				{
				
						if (non_po_seq ==0)
						{
						
						$.ajax({
									dataType: 'json',
									url: 'non_po_data.php',
									async:true,
									cache: false,
									type:"post",
									data:{"insert":"true","non_po_seq":non_po_seq,"non_po_id":non_po_id,"poto_id":poto_id,"payto_id":payto_id,"shipto_id":shipto_id,"shipto_location_id":shipto_location_id,"po_date":po_date,"start_ship_date":start_ship_date,"cancel_date":cancel_date,"shipvia":shipvia,"terms":terms,"incoterms":incoterms,"division":division,"open_chk":open_chk,"total_qty":total_qty,"total_balance_qty":total_balance_qty,"total_amount":total_amount,"total_balance_amount":total_balance_amount,"ship_hand_fee":ship_hand_fee,"other_charge":other_charge,"salestax":salestax,"grand_total_amount":grand_total_amount,"non_po_token":non_po_token,"user_id":user_id,"note":note,"folder":folder},
									success: function (data) {
									}
								});
						$.ajax({
									dataType: 'json',
									url: 'non_po_data.php',
									async:true,
									cache: false,
									type:"post",
									data:{"save":"true","user_id":user_id,"non_po_id":non_po_id,"non_po_token":non_po_token},
									success: function (data) {
									}
									
								});

						}
						else
						{
						//var data = "update=true&seq="+seq;
						$.ajax({
									dataType: 'json',
									url: 'non_po_data.php',
									async:true,
									cache: false,
									type:"post",
									data:{"update":"true","non_po_seq":non_po_seq,"non_po_id":non_po_id,"poto_id":poto_id,"payto_id":payto_id,"shipto_id":shipto_id,"shipto_location_id":shipto_location_id,"po_date":po_date,"start_ship_date":start_ship_date,"cancel_date":cancel_date,"shipvia":shipvia,"terms":terms,"incoterms":incoterms,"division":division,"open_chk":open_chk,"total_qty":total_qty,"total_balance_qty":total_balance_qty,"total_amount":total_amount,"total_balance_amount":total_balance_amount,"ship_hand_fee":ship_hand_fee,"other_charge":other_charge,"salestax":salestax,"grand_total_amount":grand_total_amount,"non_po_token":non_po_token,"user_id":user_id,"note":note,"folder":folder},
									success: function (data) {
									}
									
								});
						$.ajax({
									dataType: 'json',
									url: 'non_po_data.php',
									async:true,
									cache: false,
									type:"post",
									data:{"save":"true","user_id":user_id,"non_po_id":non_po_id,"non_po_token":non_po_token},
									success: function (data) {
									}
									
								});
							
							
						}
						alert('Successful Save!');
						location='?position=non_pod&non_po_seq='+non_po_seq+'&non_po_id='+non_po_id+'&non_po_token='+non_po_token+"&non_po_savesucess=Y";	
				}
				else
				{
				
						$.ajax({
                            dataType: 'json',
                            url: 'non_po_data.php',
                            async:true,
							cache: false,
							type:"post",
							data:{"cancel":"true","user_id":user_id,"non_po_token":non_po_token},

                            success: function (data) {
							//alert('Successful update!');
							//location.reload();
							location='?position=non_po';
							}
							
						});
						return false;
				  }	


            });
			$("#non_po_addrowbutton").bind('click', function () {
				location='?position=non_pod&non_po_newcheck=Y';
					
            });
            // delete row.
            
			$("#non_po_deleterowbutton").bind('click', function () {
              
			   if(confirm("Do you want to delete?")){
					
			   var non_po_seq=$("#non_po_seq").val();
			   var non_po_id=$("#non_po_id").val();
				//var data = "delete=true&seq="+seq;
				$.ajax({
                            dataType: 'json',
                            url: 'non_po_data.php',
                            async:true,
							cache: false,
							type:"post",
							data:{"delete":"true","non_po_seq":non_po_seq,"non_po_id":non_po_id},
							success: function (data) {
							alert('Successful delete!');
								location='?position=non_po';
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
					}
				 return false;

            });
			
			
//=============non_po-detail===========================
			if (non_po_newcheck=='Y')
			{
				$("#non_po_d_deleterowbutton").jqxButton({ theme: theme, disabled:false});
				$("#non_po_d_addrowbutton").jqxButton({ theme: theme, disabled:false });
				$("#non_po_d_saverowbutton").jqxButton({ theme: theme , disabled:false});
				$("#non_po_d_cancelrowbutton").jqxButton({ theme: theme , disabled:false});
            }
			else if (non_po_savesucess='Y')
			{
				$("#non_po_d_deleterowbutton").jqxButton({ theme: theme, disabled:false});
				$("#non_po_d_addrowbutton").jqxButton({ theme: theme, disabled:false });
				$("#non_po_d_saverowbutton").jqxButton({ theme: theme , disabled:false});
				$("#non_po_d_cancelrowbutton").jqxButton({ theme: theme , disabled:false});

			}
			else
			{
				$("#non_po_d_deleterowbutton").jqxButton({ theme: theme, disabled:true});
				$("#non_po_d_addrowbutton").jqxButton({ theme: theme, disabled:true });
				$("#non_po_d_saverowbutton").jqxButton({ theme: theme , disabled:true});
				$("#non_po_d_cancelrowbutton").jqxButton({ theme: theme , disabled:true});
            }
			// update row.
			/*
			$("#non_po_d_addrowbutton").bind('click', function () {
				$("#non_po_d_addrowbutton").hide();
				$("#non_po_d_saverowbutton").show();
				$("#non_po_d_cancelrowbutton").show();
				$("#nondescription").show();
				$("#qty").show();
				$("#unit").show();
				$("#unit_price").show();
				$("#nondescription").val('');
				$("#qty").val('');
				$("#unit").val('');
				$("#unit_price").val('');
				 });
			*/
			$("#non_po_d_cancelrowbutton").bind('click', function () {
				
				$("#non_po_d_addrowbutton").show();
				$("#non_po_d_saverowbutton").hide();
				$("#non_po_d_cancelrowbutton").hide();
				$("#nondescription").hide();
				$("#qty").hide();
				$("#unit").hide();
				$("#unit_price").hide();
				$("#nondescription").val('');
				$("#qty").val('');
				$("#unit").val('');
				$("#unit_price").val('');
				
            });
			//#non_po_d_saverowbutton
            $('#non_po_d_addrowbutton').on('click', function () {
               
			   var non_po_token=$("#non_po_token").val();
			   
			   
				var rowscount=0;
				var data = "lastid=true";
				$.ajax({
                            dataType: 'json',
                            url: 'non_po_detail_data.php',
                            data: data,
							cache: false,
                            success: function (data) {
							   // insert command is executed.
								if( data==null)
									rowscount=1;
								else
								rowscount=parseInt(data[0].non_po_d_seq)+1;
								
								var datarow = non_po_d_generaterow(rowscount);
								
								$("#non_po_jqxgrid").jqxGrid('addrow', null, datarow);	//'first'			
								$("#non_po_d_addrowbutton").show();
								$("#non_po_d_saverowbutton").hide();
								$("#non_po_d_cancelrowbutton").hide();
								$("#nondescription").hide();
								$("#qty").hide();
								$("#unit").hide();
								$("#unit_price").hide();
								$("#nondescription").val('');
								$("#qty").val('');
								$("#unit").val('');
								$("#unit_price").val('');
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
            });

            // delete row.
            $("#non_po_d_deleterowbutton").bind('click', function () {
                if(confirm("Do you want to delete?")){
					var selectedrowindex = $("#non_po_jqxgrid").jqxGrid('getselectedrowindex');
					
					var rowscount = $("#non_po_jqxgrid").jqxGrid('getdatainformation').rowscount;
				//alert(selectedrowindex);
				//alert(rowscount);
					if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
					
						var id = $("#non_po_jqxgrid").jqxGrid('getrowid', selectedrowindex);
					  //alert('xx:'+id);
					
						$("#non_po_jqxgrid").jqxGrid('deleterow', id);
					}
				}
				return false;
            });
//=====================================================


            $("#non_po_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
			 
//===============================================================
			var basicDemo = (function () {
            //Adding event listeners
            function _addEventListeners() {
                
				$('#showWindowButton').click(function () {
                    $('#window').jqxWindow('open');
                });

				/*$('#non_po_d_addrowbutton').click(function () {
                    $('#g_window0').jqxWindow('open');
                });*/
               
            };
			
			//Creating all page elements which are jqxWidgets
            function _createElements() {
                $('#showWindowButton').jqxButton({ theme: basicDemo.config.theme, width: '70px' });
               //$('#non_po_d_addrowbutton').jqxButton({ theme: basicDemo.config.theme, width: '70px',disabled:false });
			   };

            //Creating the demo window
            function _createWindow() {
                $('#window').jqxWindow({
                    showCollapseButton: true, maxHeight: 400, maxWidth: 700, minHeight: 200, minWidth: 200, height: 300, width: 500, theme: basicDemo.config.theme,
                    initContent: function () {
                        $('#window').jqxWindow('focus');
                    }
                });

				/*$('#g_window0').jqxWindow({
                    showCollapseButton: true, maxHeight: 400, maxWidth: 700, minHeight: 200, minWidth: 200, height: 300, width: 500, theme: basicDemo.config.theme,
                    initContent: function () {
                        $('#g_window0').jqxWindow('focus');
                    }
                });*/
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
			//$('#g_window0').jqxWindow('close');
		//============================================================
		$("#payto_id").change(function() {
				var apvalue=$("#payto_id").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"customer_data.php",
							data:{"payto":true,"company_id":apvalue},
							success:function(d)
							{
								//if (d) 
								//{
									$("#payto_name").val(d[0].name);
									//alert(d[0].location_id);
									/*var select = $("#payto_location_id");
									select.children().remove();
									for(var i=0; i<d.length; i++) 
									{
										select.append("<option value="+d[i].location_id+">"+d[i].location_id+"</option>");
									}*/
									$("#payto_location_add1").val(d[0].address1);
									$("#payto_location_add2").val(d[0].address2);
									$("#payto_location_add3").val(d[0].address3);

								//}
							}
						});	
            });
		//=============================================================
			//============================================================
		$("#poto_id").change(function() {
				var apvalue=$("#poto_id").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"customer_data.php",
							data:{"payto":true,"company_id":apvalue},
							success:function(d)
							{
								//if (d) 
								//{
									$("#poto_name").val(d[0].name);
									//alert(d[0].location_id);
									/*var select = $("#poto_location_id");
									select.children().remove();
									for(var i=0; i<d.length; i++) 
									{
										select.append("<option value="+d[i].location_id+">"+d[i].location_id+"</option>");
									}*/
									$("#poto_location_add1").val(d[0].address1);
									$("#poto_location_add2").val(d[0].address2);
									$("#poto_location_add3").val(d[0].address3);

								//}
							}
						});	
            });
		//=============================================================
		//============================================================
		$("#shipto_id").change(function() {
				var apvalue=$("#shipto_id").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"customer_data.php",
							data:{"payto":true,"company_id":apvalue},
							success:function(d)
							{
								//if (d) 
								//{
									$("#shipto_name").val(d[0].name);
									//alert(d[0].location_id);
									var select = $("#shipto_location_id");
									select.children().remove();
									for(var i=0; i<d.length; i++) 
									{
										select.append("<option value="+d[i].location_id+">"+d[i].location_id+"</option>");
									}
									/*$("#shipto_location_add1").val(d[0].address1);
									$("#shipto_location_add2").val(d[0].address2);
									$("#shipto_location_add3").val(d[0].address3);*/

								//}
							}
						});	
            });
		//=============================================================
		//============================================================
		$("#shipto_location_id").change(function() {
				var shipto_id=$("#shipto_id").val();
				var shipto_location_id=$("#shipto_location_id").val();	
                $.ajax({
							async:false, type:"post", dataType:"json", url:"customer_data.php",
							data:{"shiptolocation":true,"company_id":shipto_id,"location_id":shipto_location_id},
							success:function(d)
							{
								//if (d) 
								//{
									//$("#shipto_name").val(d[0].name);
									//alert(d[0].location_id);
									/*var select = $("#shipto_location_id");
									select.children().remove();
									for(var i=0; i<d.length; i++) 
									{
										select.append("<option value="+d[i].location_id+">"+d[i].location_id+"</option>");
									}*/
									//alert(d[0].address1);
									$("#shipto_location_add1").val(d[0].address1);
									$("#shipto_location_add2").val(d[0].address2);
									$("#shipto_location_add3").val(d[0].address3);

								//}
							}
						});	
            });
		//=============================================================


	});
    </script>
	<style type="text/css">
        .green, .jqx-widget .green {
            color: black;
            background-color: rgb(218, 226, 196);
        }
		.text-input
        {
            height: 21px;
            width: 200px;
			margin-top:-7px;
        }
		.text-input300
        {
            height: 21px;
            width: 300px;
			margin-top:-7px;
        }
		.text-input4
        {
            height: 21px;
            width: 100px;
			margin-top:-7px;
        }
		.text-input2
        {
            height: 21px;
            width: 150px;
        }
		.text-input1
        {
            height: 21px;
            width: 400px;
        }
		.select-style
        {
            height: 21px;
            width: 150px;
        }
        .register-table
        {
            margin-top: -4px;
            margin-bottom: -4px;
        }
        .register-table td, 
        .register-table tr
        {
             margin-top: -4px;
            margin-bottom: -4px;
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

	<div style="margin-left:20px">
	<input type="hidden" id="non_po_newcheck" value="<?php echo $non_po_newcheck?>">
	<input type="hidden" id="non_po_savesucess" value="<?php echo $non_po_savesucess?>">
	<input type="hidden" id="non_po_token" value="<?php echo $non_po_token?>">
	<input type="hidden" id="podate" value="<?php echo $podate?>"  />
	<input type="hidden" id="startdate" value="<?php echo $startdate?>"  />
	<input type="hidden" id="canceldate" value="<?php echo $canceldate?>"  />
	<input type="hidden" value="<?php echo $non_po_detail_cnt?>" id="non_po_detail_cnt" />
	<input type="hidden" value="<?php echo $user_id?>" id="user_id" />
	<input type="hidden" value="<?php echo $open_chk?>" id="open_chk" />
	<input type="hidden" value="<?php echo $startpono?>" id="startpono" />
	<input type="hidden" id="total_qty" value="">
	<input type="hidden" id="total_amount" value="">
	<div >
		<div>
		<table class="register-table" style="width:1200px;">
		<tr>
		<td>
		<div >
			<label style="font-size:20px">Non Invantory PO </label>
		</div>
		
		</td>
		<td>
				<div >
					<input id="non_po_listrowbutton" type="button" value="List" />
				</div>
		</td>
		<td>
					<div >
					<input id="non_po_addrowbutton" type="button" value=" New " />
					</div>
		</td>
		<td>
					<div >
					<input id="non_po_saverowbutton" type="button" value=" Save "  />
					</div>
		</td>
		<td>	
					<div >
					<input id="non_po_editrowbutton" type="button" value=" Edit "  />
					</div>
		</td>
		<td>
					<div >
					<input id="non_po_deleterowbutton" type="button" value="Delete"  />
					</div>
		</td>
		<td>
				<div >
					<input id="non_po_print" type="button" value="Print" />
				</div>
		</td>
		<td>
				<div>
					<input id="non_po_payment" type="button" value=" Make Payment " />
				</div>
		</td>
		<td>
				<div>
					<input type="button" value="Note" id="showWindowButton"/>
				</div>
		</td>
		<td>
				<div>
					<input type="button" value="GeneralLedger" id="generalledger"/>
				</div>
		</td>
		<td>
				<div>
					<input type="button" value="PaymentRecord" id="paymentrecord"/>
				</div>
		</td>
		<td>
				<div >
				<input type="button" value="File" id="savefile" onclick="elfinder(<?php echo $non_po_id?>)"/>
				</div>
		</td>
		
		<td>
				<div  style="margin-right: 20px;float: left;">
					<input type="button" value="Note" id="showWindowButton"/>
				</div>
				<div id='jqxCheckBox10' >
					<?php if($open_chk=="N")
					echo '<span>Close</span>';
				    else
					echo '<span>Open</span>';
					?>
					
				</div>
		</td>
		</tr>
		</table>
		</div>

		 <div id="register">
			<div style="overflow: hidden;">
					<table class="register-table">
						
						<tr>
							<td>
							<input type="hidden" id="non_po_seq" value="<?php echo $non_po_seq?>" class="text-input" />
							<table class="register-table">
							<tr>
								<td valign="top" >PO To</td>
							<tr>
								<td valign="top" >
								<select  id="poto_id" class="select-style">
											<?php 
											$query = "SELECT DISTINCT (l.company_id) 
											FROM location l
											LEFT JOIN company co ON ( l.company_id = co.company_id
											AND l.save_chk =  'Y' ) 
											LEFT JOIN customer cu ON ( l.company_id = cu.customer_id
											 ) ";

											$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
						
											while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
											if ($poto_id==$row['company_id'])
											echo "<option value=\"".$row['company_id']."\" selected>".$row['company_id']."</option>";
											else
											echo "<option value=\"".$row['company_id']."\" >".$row['company_id']."</option>";
											}
											
											?>
								</select>
								</td>
								<tr>
								<td valign="top" >
								<input type="text" id="poto_name" readonly value="<?php echo $poto_name ?>" class="text-input" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
								<tr>
								<td valign="top" >
								<input type="text" id="poto_location_add1" readonly value="<?php echo $poto_location_add1 ?>" class="text-input" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
								<tr>
								<td valign="top" >
								<input type="text" id="poto_location_add2" readonly value="<?php echo $poto_location_add2 ?>" class="text-input" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
								<tr>
								<td valign="top" >
								<input type="text" id="poto_location_add3" readonly value="<?php echo $poto_location_add3 ?>" class="text-input" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
							</table>
							</td>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
							<td>
							<table class="register-table">
							<tr>
								<td valign="top" >Pay To</td>
							<tr>
								<td valign="top" >
								<select  id="payto_id" class="select-style">
											<?php 
											$query = "SELECT DISTINCT (l.company_id) 
											FROM location l
											LEFT JOIN company co ON ( l.company_id = co.company_id
											AND l.save_chk =  'Y' ) 
											LEFT JOIN customer cu ON ( l.company_id = cu.customer_id
											 ) ";

											$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
						
											while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
											if ($payto_id==$row['company_id'])
											echo "<option value=\"".$row['company_id']."\" selected>".$row['company_id']."</option>";
											else
											echo "<option value=\"".$row['company_id']."\" >".$row['company_id']."</option>";
											}
											
											?>
								</select>
								</td>
								<tr>
								<td valign="top" >
								<input type="text" id="payto_name" readonly value="<?php echo $payto_name ?>" class="text-input" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
								<tr>
								<td valign="top" >
								<input type="text" id="payto_location_add1" readonly value="<?php echo $payto_location_add1 ?>" class="text-input" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
								<tr>
								<td valign="top" >
								<input type="text" id="payto_location_add2" readonly value="<?php echo $payto_location_add2 ?>" class="text-input" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
								<tr>
								<td valign="top" >
								<input type="text" id="payto_location_add3" readonly value="<?php echo $payto_location_add3 ?>" class="text-input" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
							</table>
							</td>
<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
							<td>
							<table class="register-table">
							<tr>
								<td valign="top" >Ship To</td>
							<tr>
								<td valign="top" >
								<select  id="shipto_id" class="select-style">
											<?php 
											$query = "SELECT DISTINCT (l.company_id) 
											FROM location l
											LEFT JOIN company co ON ( l.company_id = co.company_id
											AND l.save_chk =  'Y' ) 
											LEFT JOIN customer cu ON ( l.company_id = cu.customer_id
											 ) ";

											$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
						
											while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
											if ($shipto_id==$row['company_id'])
											echo "<option value=\"".$row['company_id']."\" selected>".$row['company_id']."</option>";
											else
											echo "<option value=\"".$row['company_id']."\" >".$row['company_id']."</option>";
											}
											
											?>
								</select>
								</td>
								<td valign="top" >
								<select  id="shipto_location_id" class="select-style" style="margin-left:-156px;">
											<?php 
											$query1 = "SELECT  * FROM location where save_chk='Y' and company_id= '".$shipto_id."'  group by company_id";

											//$query = "SELECT  * FROM location where save_chk='Y' and company_id= '".$shipto_id."' group by company_id";
											//print_r($query);
											$result = mysql_query($query1) or die("SQL Error 1: " . mysql_error());
						
											while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
											if ($shipto_location_id==$row['location_id'])
											echo "<option value=\"".$row['location_id']."\" selected>".$row['location_id']."</option>";
											else
											echo "<option value=\"".$row['location_id']."\" >".$row['location_id']."</option>";
											}
											
											?>
								</select>
								</td>
								<tr>
								<td valign="top" >
								<input type="text" id="shipto_name" readonly value="<?php echo $shipto_name ?>" class="text-input300" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
								<tr>
								<td valign="top" >
								<input type="text" id="shipto_location_add1" readonly value="<?php echo $shipto_location_add1 ?>" class="text-input300" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
								<tr>
								<td valign="top" >
								<input type="text" id="shipto_location_add2" readonly value="<?php echo $shipto_location_add2 ?>" class="text-input300" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
								<tr>
								<td valign="top" >
								<input type="text" id="shipto_location_add3" readonly value="<?php echo $shipto_location_add3 ?>" class="text-input300" style="margin-left:-4px;margin-top:-7px;"/>
								</td>
								</tr>
							</table>
							</td>
						
<!------------------------------------------------------------------------------------------------------------------------------------------------>
							<td>
							<table class="register-table">
							<form id="customerForm" action="./">
							<tr>
								<td valign="top" >PO Number </td>
							</tr>
							<tr>
								<td valign="top" >
								<input type="text" id="non_po_id" readonly value="<?php echo $non_po_id ?>" class="text-input2" style="margin-left:-4px;"/>
								</td>
							</tr>
							</form>
							<tr>
								<td valign="top" >Job Number </td>
							</tr>
							<tr>
								<td valign="top" >
								<input type="text" id="jobno" readonly value="<?php echo $jobno ?>" class="text-input2" style="margin-left:-4px;"/>
								
								</td>
							</tr>
							<tr>
								<td valign="top" >Division</td>
							</tr>
							<tr>
								<td valign="top" >
								<select  id="division" class="select-style">
								<?php 
								$query = "SELECT  * FROM division";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($division==$row['division_seq'])
								echo "<option value=\"".$row['division_seq']."\" selected>".$row['division_id']."</option>";
								else
								echo "<option value=\"".$row['division_seq']."\" >".$row['division_id']."</option>";
								}
								?>
								</select>
								</td>
							</tr>
							</table>
							</td>
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------>
							<td>
							<table class="register-table">
							<tr>
								<td valign="top" >PO Date </td>
							</tr>
							<tr>
								<td valign="top" >
								<div id='po_date'></div>
								</td>
							</tr>
							<tr>
								<td valign="top" >Start Ship Date </td>
							</tr>
							<tr>
								<td valign="top" >
								<div id='start_date'></div>
								</td>
							</tr>
							<tr>
								<td valign="top" >Cancel Date</td>
							</tr>
							<tr>
								<td valign="top" >
								<div id='cancel_date'></div>
								</td>
							</tr>
							</table>
							</td>
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------>
							<td>
							<table class="register-table">
							<tr>
								<td valign="top" >Ship Via </td>
							<tr>
							<tr>
								<td valign="top"  >
								<select  id="non_shipvia" class="select-style">
								<?php 
								$query = "SELECT  * FROM shipvia";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($shipvia==$row['shipvia_id'])
								echo "<option value=\"".$row['shipvia_id']."\" selected>".$row['description']."</option>";
								else
								echo "<option value=\"".$row['shipvia_id']."\" >".$row['description']."</option>";
								}
								?>
								</select>
								</td>
							<tr>
							<tr>
								<td valign="top" >Terms </td>
							<tr>
							<tr>
								<td valign="top" >
								<select  id="non_terms" class="select-style">
								<?php 
								$query = "SELECT  * FROM term";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($terms==$row['term_id'])
								echo "<option value=\"".$row['term_id']."\" selected>".$row['code']."</option>";
								else
								echo "<option value=\"".$row['term_id']."\" >".$row['code']."</option>";
								}
								?>
								</select>
								</td>
							<tr>
							<tr>
								<td valign="top" >Incoterms</td>
							<tr>
							<tr>
								<td valign="top" >
								<select  id="non_incoterms" class="select-style">
								<?php 
								$query = "SELECT  * FROM incoterms";

								$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
			
								while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
								if ($incoterms==$row['incoterms_id'])
								echo "<option value=\"".$row['incoterms_id']."\" selected>".$row['description']."</option>";
								else
								echo "<option value=\"".$row['incoterms_id']."\" >".$row['description']."</option>";
								}
								?>
								</select>
								</td>
							<tr>
							</table>
							</tr>
					</table>
				</div>
			<div>	
<!---------------------------------------------------------------------------------------------------------------------->					
							
	<div style="width: 100%;  " id="mainDemoContainer">
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
					<!--<div style="margin-right: 20px;float: left;">
					<input type="button" id="notesave" value="Save">
					</div>-->
					<div >
					<input type="button" id="noteclose" value="Close">
					</div>
				</div>
			</div>
	

		 </div>

	<div >
			<div style="margin: 6px;">
				<input id="non_po_d_addrowbutton" type="button" value=" Add " style="margin-right: 20px; margin-bottom:-6px;"/>
				<input id="non_po_d_cancelrowbutton" type="button" value="Cancel" style="display:none;margin-right: 20px;margin-bottom:-6px;"/>
				<input id="non_po_d_saverowbutton" type="button" value=" Save " style="display:none;margin-right: 20px;margin-bottom:-6px;" />
				<input id="non_po_d_deleterowbutton" type="button" value="Delete" style="margin-bottom:-6px;"/>
			</div>
			
	 </div>
	 <div>
	 <table>
	 <tr>
	 <td>
	 <input  type="text" id="nondescription" value="" style="display:none;width:752px;margin-left:26px;">
	 </td>
	 <td>
	  <div style='display:none;' id='qty'>
        </div>
	  </td>
	  <td>
	  <!--<input  type="text" id="qty" value="" style="display:none;width:92px;">-->
	  <input  type="text" id="unit" value="" style="display:none;width:92px;">
	 </td>
	 <td>
	 <div style='display:none;' id='unit_price'>
        </div>
	 <!--<input  type="text" id="unit_price" value="" style="display:none;width:92px;">-->	
	</td>
	 </tr>
	</table>
	</div>
	
	<div id="non_po_jqxgrid" >
	</div>
	<div>
		<table class="register-table" style="width:1200px;">
		<tr>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td valign="top" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		
		<td valign="top" >S & H:$</td>
		<td valign="top" ><input type="text" id="ship_hand_fee" value="<?php echo $ship_hand_fee?>" class="text-input4"></td>
		<td valign="top" >Other Charge:$</td>
		<td valign="top" ><input type="text" id="other_charge" value="<?php echo $other_charge?>" class="text-input4"></td>
		<td valign="top" >Sales Tax:$</td>
		<td valign="top" ><input type="text" id="salestax" value="<?php echo $salestax?>" class="text-input4"></td>
		<td valign="top" >Total Due:$</td>
		<td valign="top" ><input type="text" id="grand_total_amount" value="<?php echo $grand_total_amount?>" class="text-input4"></td>
		</tr>
<div>
