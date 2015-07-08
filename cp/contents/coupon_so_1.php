<?php
 
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
            
			
//==============salestax start=================================================
			            var garment_so_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'cSponsorX', type: 'string'},
					 { name: 'cUser_Num', type: 'string'},
					 { name: 'cUserIDNO', type: 'string'},
					 { name: 'cFistName', type: 'string'},
					 { name: 'cLastName', type: 'string'},
					 { name: 'cCouponNo', type: 'string'},
					 { name: 'cUse_Location', type: 'string'},
					 { name: 'cShop', type: 'string'},
					 { name: 'cItem', type: 'string'},
					 { name: 'dFrom', type: 'string'},
					  { name: 'dTo', type: 'string'},
					  { name: 'dFrom', type: 'string'},
					 	{ name: 'nCouponID', type: 'string'},
					 { name: 'cName', type: 'string'},
					  { name: 'nActive', type: 'string'},
					 { name: 'dActive_date', type: 'date'},
					 { name: 'fOrigin', type: 'number'},
					 { name: 'fSale', type: 'number'},
					 { name: 'dUse_date', type: 'date'},
					 { name: 'nFinishSeq', type: 'number'},
					 
                ],
				id: 'cCouponNo',
                url: 'coupon_so_data.php',    
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
                            url: 'coupon_so_data.php',
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
                            url: 'coupon_so_data.php',
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
									url: 'coupon_so_data.php',
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

			


			

			
			var garment_so_dataadapter = new $.jqx.dataAdapter(garment_so_source);
           // initialize jqxGrid
		  



		
			
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
                      { text: 'CouponNo', editable: false, datafield: 'cCouponNo', width: 200,align: 'center' },
					  { text: 'ID', editable: false, datafield: 'nCouponID', width: 20,align: 'center' },
					  { text: 'Name', editable: false, datafield: 'cName', width: 60,align: 'center' },
						
					  { text: 'Location', editable: false, datafield: 'cUse_Location', width: 20,align: 'center' },
					  { text: 'Shop', editable: false, datafield: 'cShop', width: 20,align: 'center' },
					  				  
					  { text: 'Item', datafield: 'cItem', width: 20,align: 'center'},
					{ text: 'From', editable: false,filtertype:'date', datafield: 'dFrom',cellsformat: 'd', width: 60,align: 'center' },
					{ text: 'To', editable: false,filtertype:'date', datafield: 'dTo',cellsformat: 'd', width: 60,align: 'center' },	
					 { text: 'Active', editable: false, datafield: 'nActive', width: 60,align: 'center' },
					  { text: 'Active date', editable: false, filtertype:'date',datafield: 'dActive_date',cellsformat: 'd', width: 80,align: 'center' },
                    { text: 'Origin', editable: false, datafield: 'fOrigin', width: 60,align: 'center',cellsformat: 'c2',cellsalign: 'right' },
					{ text: 'Sale', editable: false, datafield: 'fSale', width: 60,align: 'center',cellsformat: 'c2',cellsalign: 'right' },
					  { text: 'Use date', editable: false, filtertype:'date',datafield: 'dUse_date',cellsformat: 'd', width: 80,align: 'center' },
                     { text: 'FinishSeq', editable: false, datafield: 'nFinishSeq', width: 10,align: 'center',cellsformat: 'n2',cellsalign: 'right' },
					 
					  { text: 'User Num', editable: false, datafield: 'cUser_Num', width: 60,align: 'center' },
					  { text: 'Email', editable: false, datafield: 'cUserIDNO', width: 60,align: 'center' },
					 { text: 'Sponsor', editable: false, datafield: 'cSponsorX', width: 60,align: 'center' },
					 
					  { text: 'First', columngroup: 'name',editable: false, datafield: 'cFistName', width: 60,align: 'center' },
					{ text: 'Last', columngroup: 'name',editable: false, datafield: 'cLastName', width: 60,align: 'center' },	
					  
                  ],
				columngroups:
				[{ text: 'Name', align: 'center', name: 'name' }]	
			  
            });

			
		    

            $("#garment_so_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });

			 
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
	<div style="margin-left: 20px;">
	<div style=" width:1400px;margin: 0 auto;">
	
		<div >
			<span style="font-size:20px;">Coupon List</span>
			<span style="font-size:20px;margin-left: 40px;" ><a href="/cp/kadmin/Manage_PackCharts.php">Coupon</a> </span>
			<span style="font-size:20px;margin-left: 40px;" ><a href="index.php">Member</a> </span>

			<span style="font-size:20px;margin-left: 40px;" ><a href="/cp/kadmin/logout.php">Logout</a> </span>

			
		</div>
		
		
		
	</div>
	
	<div id="garment_so_jqxgrid" style="margin: 0 auto;">
	</div>
</div>

