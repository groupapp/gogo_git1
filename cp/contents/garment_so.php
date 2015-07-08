<?php
 /*
   $user_id=$_COOKIE["userID"];
//echo "cookie:".$_COOKIE["userID"];
if($user_id=='')
echo "<script type=\"text/javascript\">
alert(\"current log out. Please relogin.\");
//location.reload();
</script>";*/

?>
	<script type="text/javascript">
        $(document).ready(function () {
            // prepare the data

			//$('.ajax').colorbox({rel:'ajax'});

            var data = {};
			var theme = 'bootstrap';
			// renderer for grid cells.
             var numberrenderer = function (row, column, value) {
                 return '<div style="text-align: center; margin-top: 5px;">' + (1 + value) + '</div>';
             }

             // create Grid datafields and columns arrays.
            
			var cssclass = 'jqx-widget-header';
                     if (theme != '') cssclass += ' jqx-widget-header-' + theme;
            
			var label_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
				row["Sponsorid"] =jQuery("#Sponsorid").val();
				row["cUser_Num"] =jQuery("#cUser_Num").val();
				row["cUserIDNO"] =jQuery("#cUserIDNO").val();
				row["cPassword"] =jQuery("#cPassword").val();
				row["cFistName"] =jQuery("#cFistName").val();
				row["cLastName"] =jQuery("#cLastName").val();
				row["cCellNumb"] =jQuery("#cCellNumb").val();

				row["cAddressX"] =jQuery("#cAddressX").val();
				row["cCityName"] =jQuery("#cCityName").val();
				row["cProvince"] =jQuery("#cProvince").val();
				row["cZipsCode"] =jQuery("#cZipsCode").val();
				row["nSMS_Numb"] =jQuery("#nSMS_Numb").val();
				
				row["cOpenDate"] =jQuery("#cOpenDate").val();
				row["cCarriers"] =jQuery("#cCarriers").val();
				
				row["s_name"] =jQuery("s_name").val();
				row["nUsePoint"] =jQuery("nUsePoint").val();
				row["cIPnumber"] =jQuery("#cIPnumber").val();
				
				
				return row;
            }

//==============salestax start=================================================
			            var garment_so_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'Sponsorid', type: 'string'},
					 { name: 'cUser_Num', type: 'string'},
					 { name: 'cUserIDNO', type: 'string'},
					 { name: 'cPassword', type: 'string'},
					 { name: 'cFistName', type: 'string'},
					 { name: 'cLastName', type: 'string'},
					 { name: 'cCellNumb', type: 'string'},
					 { name: 'cOpenDate', type: 'date'},
					 { name: 'cAddressX', type: 'string'},
					 { name: 'cCityName', type: 'string'},
					 { name: 'cProvince', type: 'string'},
					 { name: 'cZipsCode', type: 'string'},
					 { name: 'nSMS_Numb', type: 'number'},
						{ name: 'cIPnumber', type: 'string'},
					 { name: 'cCarriers', type: 'string'},
					  { name: 's_name', type: 'string'},
					 { name: 'nUsePoint', type: 'number'},
					 
                ],
				id: 'cUser_Num',
                url: 'garment_so_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					garment_so_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},

				


				addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param({cUser_Num: rowdata});
					alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'garment_so_data.php',
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
            		   var data = "delete=true&" + $.param({cUser_Num: rowid});
				       $.ajax({
                            dataType: 'json',
                            url: 'garment_so_data.php',
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
			       	var data = "update=true&" + $.param(rowdata);
								$.ajax({
									dataType: 'json',
									url: 'garment_so_data.php',
									data: data,
									success: function (data, status, xhr) {
										// update command is executed.
										commit(true);
									},
									error: function(jqXHR, textStatus, errorThrown)
										{
											commit(false);
										}
								});	
				   
				   
                }
				

                
            };

				var cellclass1 = function (row, columnfield, value) {
					if (value >4) {
						return 'gray';
					}
			    }
				var cellclass2 = function (row, columnfield, value) {
					if (value >4) {
						return 'yellow';
					}
			    }
				var cellclass3 = function (row, columnfield, value) {
					if (value >4) {
						return 'green';
					}
			    }

			


			$("#Sponsorid").jqxInput({ theme: theme });
            $("#cUser_Num").jqxInput({ theme: theme });
            $("#cUserIDNO").jqxInput({ theme: theme });
			$("#cPassword").jqxInput({ theme: theme });
			$("#cFistName").jqxInput({ theme: theme });
			$("#cLastName").jqxInput({ theme: theme });
			$("#cCellNumb").jqxInput({ theme: theme });


			$("#cUserIDNO").width(150);
            $("#cUserIDNO").height(23);

			$("#cPassword").width(150);
            $("#cPassword").height(23);

			$("#cFistName").width(150);
            $("#cFistName").height(23);

			$("#cLastName").width(150);
            $("#cLastName").height(23);

			$("#cCellNumb").width(150);
            $("#cCellNumb").height(23);

			var garment_so_dataadapter = new $.jqx.dataAdapter(garment_so_source);
           // initialize jqxGrid
		   var items = new Array();
            items.push('O');
			items.push('X');


			var coloritems = new Array();
            coloritems.push('green');
			coloritems.push('grey');
            coloritems.push('yellow');
			coloritems.push('red');



			var linkrenderer = function (row, column, value) {
                /*if (value.indexOf('#') != -1) {
                    value = value.substring(0, value.indexOf('#'));
                }*/
				value="sendmail.php"
                var format = { target: '' };
                var html = $.jqx.dataFormat.formatlink(value, format);
                return html;
            }

			var linkrenderer1 = function (row, column, value) {
               /* if (value.indexOf('#') != -1) {
                    value = value.substring(0, value.indexOf('#'));
                }*/
				//value ="http://www.lmontreeclothing.com";
                var format = { target: '"_blank"' };
                var html = $.jqx.dataFormat.formatlink(value, format);
                return html;
            }
			
			$("#garment_so_jqxgrid").jqxGrid(
            {
                width: 1200,height:810,
				//selectionmode: 'singlecell',
                source: garment_so_dataadapter,
                theme: theme,
				ready: function () {
                   $("#garment_so_jqxgrid").jqxGrid('hidecolumn', 'garment_so_token');
					
                },
				editable: true,
				autoheight: false,
				altrows: true,
				//pageable: true,
                columnsresize: true,
                columnsreorder: true,
				sortable: true,
				showfilterrow: true,
				showstatusbar: false,
                //statusbarheight: 50,
				 showaggregates: true,
                filterable: true,
				showtoolbar: true,
				scrollmode: 'logical',
				altrows: true,
				
				
				
				
	 

				rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 1px;'></div>");
                  // var excelExport =$("<div style='margin-left: 10px; float: left;'> <input type='button' value='Export to Excel' id='excelExport' /></div>");
					var csvExport =$("<div style='margin-left: 10px; float: left;'><input type='button' value='Export to CSV' id='csvExport' /></div>");
					var Delete =$("<div style='margin-left: 10px; float: left;'><input type='button' value='Delete' id='deleterowbutton' /></div>");
					
					toolbar.append(container);
                   container.append(Delete);
                    container.append(csvExport);
					
					
                    
                    
					//$("#excelExport").jqxButton({ theme: theme });
					$("#csvExport").jqxButton({ theme: theme });
					$("#deleterowbutton").jqxButton({ theme: theme });
				   /*$("#excelExport").click(function () {
						$("#garment_so_jqxgrid").jqxGrid('exportdata', 'xls', 'jqxGrid');           
					});*/
					$("#csvExport").click(function () {
						$("#garment_so_jqxgrid").jqxGrid('exportdata', 'csv', 'jqxGrid');
					});


					$("#deleterowbutton").bind('click', function () {
						
						var selectedrowindex = $("#garment_so_jqxgrid").jqxGrid('getselectedrowindex');
						var rowscount = $("#garment_so_jqxgrid").jqxGrid('getdatainformation').rowscount;
						if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
						
							var id = $("#garment_so_jqxgrid").jqxGrid('getrowid', selectedrowindex);
						  //alert(id);
						
							$("#garment_so_jqxgrid").jqxGrid('deleterow', id);
						}
					});
					
                },	
                columns: [
					  {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer },	
                      { text: 'SponsorID', editable: false, datafield: 'Sponsorid', width: 60,align: 'center' },
						{ text: 'S Name', editable: false, datafield: 's_name', width: 60,align: 'center' },
					 /*{ text: 'Status', filtertype: 'list', filteritems: items, datafield: 'open_chk', width: 100,align: 'center',cellsalign: 'center' },*/
					  { text: 'ID', editable: false, datafield: 'cUser_Num', width: 60,align: 'center' },
					  				  
					  { text: 'Email', datafield: 'cUserIDNO', width: 160,align: 'center'
						 /*,cellsformat: 'n2',cellsalign: 'right',aggregates: ['count'], aggregatesrenderer: function (aggregates, column, element, summaryData,record) {
                          var renderstring = "<div class='jqx-widget-content jqx-widget-content-" + theme + "' style='float: left; width: 100%; height: 100%;'>";
                          $.each(aggregates, function (key, value) {
                              var name = key == 'count' ? '' : 'Avg';
                              var color = '';
                              renderstring += '<div style="color: ' + color + '; position: relative; margin: 6px; text-align: right; overflow: hidden;">' + name  + value + '<input type="hidden" id="total_qty" value="'+value+'"></div>';
                          });
                          renderstring += "</div>";
                          return renderstring;
                      }*/
					  },
					{ text: 'Password', editable: true, datafield: 'cPassword', width: 100,align: 'center' },
					{ text: 'First', columngroup: 'name',editable: true, datafield: 'cFistName', width: 100,align: 'center' },
					{ text: 'Last', columngroup: 'name',editable: true, datafield: 'cLastName', width: 100,align: 'center' },	
					//{ text: 'N',columngroup: 'status', filtertype: 'list',filteritems: coloritems,editable: false, datafield: 'c1stValue',cellclassname: cellclass, width: 40,align: 'center' },
					//{ text: 'C',columngroup: 'status', filtertype: 'list',filteritems: coloritems,editable: false, datafield: 'c2ndValue',cellclassname: cellclass1, width: 40,align: 'center' },
					{ text: 'Cell', editable: true, datafield: 'cCellNumb', width: 80,align: 'center' },
					{ text: 'Carriers', editable: false, datafield: 'cCarriers', width: 120,align: 'center'  },
					{ text: 'Opendate', editable: false, filtertype:'date',datafield: 'cOpenDate',cellsformat: 'd', width: 80,align: 'center' },
                    { text: 'Commission', editable: false, datafield: 'nUsePoint', width: 80,align: 'center',cellsformat: 'c2',cellsalign: 'right' },
					//{ text: 'IP', editable: false, datafield: 'cIPnumber', width: 100,align: 'center' },
					//{ text: 'ClicZo', filtertype: 'list',filteritems: items,editable: true, datafield: 'cCliczoOX', cellsalign: 'center',width: 64,align: 'center',columntype: 'combobox' },
					{ text: 'History', columngroup: 'action',datafield: 'History', width: 70,align: 'center', columntype: 'button', cellsrenderer: function () {
							 return "History";
						  }, buttonclick: function (row) {
							 // open the popup window when the user clicks a button.
							 editrow = row;
								var dataRecord = $("#garment_so_jqxgrid").jqxGrid('getrowdata', editrow);
							 
							 window.open('http://lemontreeclothing.com/cp/kadmin/myhistory1.php?cUser_Num='+dataRecord.cUser_Num,'new window','toolbar=0, location=no,status=no,etc,scrollbars=yes,resizable=yes,width=900px,height=450px');
							  //location='admin_verify.php?cUser_Num='+dataRecord.cUser_Num;	
							 
						 }
					   },
					{ text: 'Send', columngroup: 'action',datafield: 'Send', width: 40,align: 'center', columntype: 'button', cellsrenderer: function () {
							 return "Send";
						  }, buttonclick: function (row) {
							 // open the popup window when the user clicks a button.
							 editrow = row;
								var dataRecord = $("#garment_so_jqxgrid").jqxGrid('getrowdata', editrow);
							 
							  location='admin_verify.php?cUser_Num='+dataRecord.cUser_Num;	
							 
						 }
					   },
					 { text: 'Edit', columngroup: 'action',datafield: 'Edit', width: 40,align: 'center', columntype: 'button', cellsrenderer: function () {
							 return "Edit";
						  }, buttonclick: function (row) {
							 // open the popup window when the user clicks a button.
							 editrow = row;

							 var offset = $("#garment_so_jqxgrid").offset();
							 $("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60 } });

							 // get the clicked row's data and initialize the input fields.
							 var dataRecord = $("#garment_so_jqxgrid").jqxGrid('getrowdata', editrow);
							 
							 var text = $('#garment_so_jqxgrid').jqxGrid('getcelltext', editrow, "cOpenDate");

							 //alert(text);
							 $("#Sponsorid").val(dataRecord.Sponsorid);
							 $("#cUser_Num").val(dataRecord.cUser_Num);
							 $("#cUserIDNO").val(dataRecord.cUserIDNO);
							 $("#cPassword").val(dataRecord.cPassword);
							 $("#cFistName").val(dataRecord.cFistName);
							 $("#cLastName").val(dataRecord.cLastName);
							 $("#cCellNumb").val(dataRecord.cCellNumb);
							  $("#cAddressX").val(dataRecord.cAddressX);
							   $("#cCityName").val(dataRecord.cCityName);
							    $("#cProvince").val(dataRecord.cProvince);
								 $("#cZipsCode").val(dataRecord.cZipsCode);
								  $("#nSMS_Numb").val(dataRecord.nSMS_Numb);
							$("#cCarriers").val(dataRecord.cCarriers);
									 $("#cOpenDate").val(text);
									  $("#cIPnumber").val(dataRecord.cIPnumber);
										$("#nUsePoint").val(dataRecord.nUsePoint);
									$("#s_name").val(dataRecord.s_name);
								
							
							
							 // show the popup window.
							 $("#popupWindow").jqxWindow('open');
							 
						 }
					   }   
                      
                  ],
				columngroups:
				[{ text: 'Name', align: 'center', name: 'name' },{ text: 'Action', align: 'center', name: 'action' },{ text: 'Status', align: 'center', name: 'status' }]	
			  
            });

			
           
            //$("#salestax_deleterowbutton").jqxButton({ theme: theme });
            /*$("#garment_so_updaterowbutton").jqxButton({ theme: theme });

            // update row.
			$("#garment_so_updaterowbutton").bind('click', function () {
				
				location='?position=garment_sod&garment_so_newcheck=Y';
					
            });*/

			var mainDemoContainer = $('#mainDemoContainer');
            var offset = mainDemoContainer.offset();
			// initialize the popup window and buttons.
            $("#popupWindow").jqxWindow({
                width: 350, resizable: true, theme: theme, isModal: true, autoOpen: false,  modalOpacity: 0.01 ,position: { x: offset.left + 100, y: offset.left + 100 }});

			
           /* $("#popupWindow").on('open', function () {
                $("#labelname").jqxInput('selectAll');
            });*/
         
           // $("#labelCancel").jqxButton({ theme: theme });
            $("#labelSave").jqxButton({ theme: theme });

            // update the edited row when the user clicks the 'Save' button.
            $("#labelSave").click(function () {
                
				if (editrow >= 0) {
                    /*
					var row = { labelname: $("#labelname").val(), labelaad1: $("#labelaad1").val(), labelaad2: $("#labelaad2").val(),
                        labelaad3: $("#labelaad3"), labeltel: $("#labeltel")
                    };*/
                    var rowID = $('#garment_so_jqxgrid').jqxGrid('getrowid', editrow);
					
					var row = label_generaterow(rowID);

					$('#garment_so_jqxgrid').jqxGrid('updaterow', rowID, row);
                    $("#popupWindow").jqxWindow('hide');
                }
            });

            

            $("#garment_so_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });

			/*$("#garment_so_jqxgrid").on('cellvaluechanged', function (event) 
			{
				
				
				
					// event arguments.
					var args = event.args;

					
					// column data field.
					var datafield = event.args.datafield;
					//alert(datafield);
					if (datafield=="cCliczoOX")
					{
						if (confirm("Do you want to change Cliczo active?"))
						{

							// row's bound index.
							var rowBoundIndex = args.rowindex;
							var value = args.value;	

							var cUser_Num = $('#garment_so_jqxgrid').jqxGrid('getcellvalue', rowBoundIndex, "cUser_Num");
							$("#garment_so_jqxgrid").jqxGrid('setcellvalue', rowBoundIndex, "cCliczoOX", value);
							$('#garment_so_jqxgrid').jqxGrid('addrow', rowBoundIndex, cUser_Num);
						}
						else
							return false;

					
					}
				

			});*/

			

			/*
			$("#garment_so_jqxgrid").on('rowclick', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
				
				var args = event.args;
				var row = args.rowindex;
				var selectedrowindex = row;//$("#garment_so_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#garment_so_jqxgrid").jqxGrid('getdatainformation').rowscount;
                ;
				if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
					
					//alert(selectedrowindex);
                    var id = $("#garment_so_jqxgrid").jqxGrid('getrowid', selectedrowindex);
					
					//alert(id);
					// gets all rows loaded from the data source.
				
					var garment_so_data = $('#garment_so_jqxgrid').jqxGrid('getrowdatabyid', id);
					   location='?position=garment_sod&garment_so_seq='+garment_so_data.garment_so_seq+'&garment_so_id='+garment_so_data.garment_so_id+'&garment_so_token='+garment_so_data.garment_so_token;			
					
                }
            });*/
			 
//===============================================================


		});
    </script>
	<style>     
        .green {
            color: black\9;
            background-color: #b6ff00\9;
        }
        .yellow {
            color: black\9;
            background-color: yellow\9;
        }
        .red {
            color: black\9;
            background-color: red\9;
        }
		.gray {
            color: black\9;
            background-color: gray\9;
        }

        .green:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .green:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: #b6ff00;
        }
        .yellow:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .yellow:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: yellow;
        }
        .red:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .red:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: red;
        }
		.gray:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .gray:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
            color: black;
            background-color: gray;
        }
		
    </style>
<?php

include "../function.php";

$DB 	= new myDB;
		$strSQL = "SELECT ID FROM comision Order by ID DESC Limit 0,1";
		$DB->query($strSQL);
		if($DB->rows>0)
		{
			while ($data = $DB->fetch_array($DB->res)){ 
				$last=(int)$data["ID"];
				$last_date=$data["fDate"];
				$current=$last+1;
			}
		}
		else
		{
			$last=0;
			$last_date="";
			$current=1;
		}
$DB->close();
?>
	<div style="margin-left: 20px;">
	<div style=" width:1400px;margin: 0 auto;">
	
		<div >
			<span style="font-size:20px;">Member List</span>
			<span style="font-size:20px;margin-left: 40px;" ><a href="/cp/kadmin/Manage_PackCharts.php">Coupon</a> </span>
			<span style="font-size:20px;margin-left: 40px;" ><a href="index.php?position=coupon">Coupon List</a> </span>

			<span style="font-size:20px;margin-left: 40px;" ><a href="/cp/kadmin/logout.php">Logout</a> </span>

			<span style="font-size:20px;margin-left: 100px;" > Last finish:<?php echo $last?></span> 
			<span style="font-size:20px;margin-left: 40px;" > Last finish month:<?php echo $last_date?></span>
			<span style="font-size:20px;margin-left: 40px;" ><a href="Comision_action.php?current="<?php echo $current?> onclick="if(confirm('Do you want to calculate comision?')){return true;}else{return false;}">Finish</a> </span>
			
		</div>
		
		
		
	</div>
	
	<div id="garment_so_jqxgrid" style="margin: 0 auto;">
	</div>
	

	<div id="mainDemoContainer">
	<div id="popupWindow">
				<div>Edit</div>
				<div style="overflow: hidden;">
					<table>
						<input  type="hidden" id="cOpenDate">
						<input  type="hidden" id="cIPnumber">
					
						
				<input  type="hidden" id="cCarriers">
						<tr>
							<td align="right">SponsorID:</td>
							<td align="left"><input  id="Sponsorid" /></td>
						</tr>
						<tr>
							<td align="right">Sponsor Name:</td>
							<td align="left"><input readonly id="s_name" /></td>
						</tr>
						<tr>
							<td align="right">Commission:</td>
							<td align="left"><input readonly  id="nUsePoint" /></td>
						</tr>
						<tr>
							<td align="right">ID:</td>
							<td align="left"><input  id="cUser_Num" /></td>
						</tr>
						<!--<tr>
							<td align="right">Direct:</td>
							<td align="left"><input readonly id="nDirectCT" /></td>
						</tr>
						<tr>
							<td align="right">TOTAL:</td>
							<td align="left"><input readonly id="nEntireCT" /></td>
						</tr>
						<tr>
							<td align="right">Visit:</td>
							<td align="left"><input readonly id="nVisitSum" /></td>
						</tr>-->
						<tr>
							<td align="right">Email:</td>
							<td align="left"><input id="cUserIDNO"></div></td>
						</tr>
						<tr>
							<td align="right">Password:</td>
							<td align="left"><input id="cPassword"></div></td>
						</tr>
						
						<tr>
							<td align="right">Firstname:</td>
							<td align="left"><input id="cFistName"></div></td>
						</tr>
						<tr>
							<td align="right">LastName:</td>
							<td align="left"><input id="cLastName"></div></td>
						</tr>
						<!--<tr>
							<td align="right">Hire:</td>
							<td align="left"><input readonly id="nHire_Sum"></div></td>
						</tr>
						<!--<tr>
							<td align="right">1st Grade:</td>
							<td align="left"><input type="hidden"  id="c1stValue"></div></td>
						</tr>-->
						
						<!--<tr>
							<td align="right">2nd Grade:</td>
							<td align="left"><input readonly id="c2ndValue"></div></td>
						</tr>-->
						<tr>
							<td align="right">Phone:</td>
							<td align="left"><input id="cCellNumb"></div></td>
						</tr>
						<!--<tr>
							<td align="right">Join Date:</td>
							<td align="left"><input readonly id="cOpenDate"></div></td>
						</tr>
						<tr>
							<td align="right">IP:</td>
							<td align="left"><input readonly id="cIPnumber"></div></td>
						</tr>-->
						
						<tr>
							<td align="right">Address:</td>
							<td align="left"><input id="cAddressX"></div></td>
						</tr>
						<tr>
							<td align="right">City:</td>
							<td align="left"><input id="cCityName"></div></td>
						</tr>
						<tr>
							<td align="right">State:</td>
							<td align="left"><input id="cProvince"></div></td>
						</tr>
						<tr>
							<td align="right">Zipcode:</td>
							<td align="left"><input id="cZipsCode"></div></td>
						</tr>
						<tr>
							<td align="right"></td>
							<td style="padding-top: 10px;" align="right"><input style="margin-right: 5px;" type="button" id="labelSave" value="Save" /></td>
						</tr>
					</table>
				</div>
		 </div>	
	</div>	 
