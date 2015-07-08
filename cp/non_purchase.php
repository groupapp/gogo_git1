<?php
   $user_id=$_COOKIE["userID"];
//echo "cookie:".$_COOKIE["userID"];
if($user_id=='')
echo "<script type=\"text/javascript\">
alert(\"current log out. Please relogin.\");
//location.reload();
</script>";

?>
	<script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
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
			            var non_purchase_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'non_purchase_seq', type: 'number'},
					 { name: 'non_purchase_id', type: 'number'},
					 { name: 'poto_id', type: 'string'},
					 { name: 'po_date', type: 'date'},
					 { name: 'cancel_date', type: 'date'},
					 { name: 'open_chk', type: 'string'},
					 { name: 'total_qty', type: 'number'},
					 { name: 'total_balance_qty', type: 'number'},
					 { name: 'total_amount', type: 'float'},
					 { name: 'total_balance_amount', type: 'float'},
					 { name: 'non_purchase_token', type: 'string'},
					 
                ],
				id: 'non_purchase_seq',
                url: 'non_purchase_data.php',    
				//root: 'Rows',
				cache: false,
				/*
				beforeprocessing: function(data)
				{		
					
					non_purchase_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
					//if (non_purchase_source.totalrecords==0)
					
				},*/
                
            };
			var items = new Array();
            items.push('OPEN');
			items.push('CLOSE');
 		    var non_purchase_dataadapter = new $.jqx.dataAdapter(non_purchase_source);
           // initialize jqxGrid
            
			
			$("#non_purchase_jqxgrid").jqxGrid(
            {
                width: 1200,height:600,
				//selectionmode: 'singlecell',
                source: non_purchase_dataadapter,
                theme: theme,
				ready: function () {
                    $("#non_purchase_jqxgrid").jqxGrid('hidecolumn', 'non_purchase_seq');
					$("#non_purchase_jqxgrid").jqxGrid('hidecolumn', 'non_purchase_token');
					
                },
				editable: false,
				autoheight: false,
				//pageable: true,
                columnsresize: true,
                columnsreorder: true,
				sortable: true,
				showfilterrow: true,
				showstatusbar: true,
                statusbarheight: 30,
				 showaggregates: true,
                filterable: true,
				showtoolbar: true,
				//columnsresize: true,
				//virtualmode: true,
				/*rendergridrows: function(obj)
				{
					  return obj.data;     
				},*/
				
				
				
				
	 

				rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 1px;'></div>");
                    var newButton =$("<div style='margin-left: 10px; float: left;'><input id='non_purchase_updaterowbutton' type='button' value=' New ' style='margin-right: 20px;'/></div>");
					var excelExport =$("<div style='margin-left: 10px; float: left;'> <input type='button' value='Export to Excel' id='excelExport' /></div>");
					var csvExport =$("<div style='margin-left: 10px; float: left;'><input type='button' value='Export to CSV' id='csvExport' /></div>");
					
					toolbar.append(container);
                    container.append(newButton);
					container.append(excelExport);
                    container.append(csvExport);
					
					
                    
                    
					$("#excelExport").jqxButton({ theme: theme });
					$("#csvExport").jqxButton({ theme: theme });
					
				   $("#excelExport").click(function () {
						$("#non_purchase_jqxgrid").jqxGrid('exportdata', 'xls', 'jqxGrid');           
					});
					$("#csvExport").click(function () {
						$("#non_purchase_jqxgrid").jqxGrid('exportdata', 'csv', 'jqxGrid');
					});
					
                },	
                columns: [
					  {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer },	
                      { text: 'non_purchase seq', editable: false, datafield: 'non_purchase_seq', width: 20 },
					  { text: 'Status', filtertype: 'list', filteritems: items, datafield: 'open_chk', width: 100,align: 'center',cellsalign: 'center' },
					  { text: 'PO to', editable: false, datafield: 'poto_id', width: 170,align: 'center' },
					  { text: 'PO ID', editable: false, datafield: 'non_purchase_id', width: 100,align: 'center' },
					  { text: 'PO Date', editable: false, datafield: 'po_date',filtertype:'date', width: 150,align: 'center',cellsformat: 'd' },
					  { text: 'Cancel Date', editable: false, datafield: 'cancel_date',filtertype:'date', width: 150,align: 'center',cellsformat: 'd' },
					  
					  { text: 'PO Qty', datafield: 'total_qty', width: 120,align: 'center',cellsformat: 'n2',cellsalign: 'right',aggregates: ['sum'],
						  aggregatesrenderer: function (aggregates, column, element, summaryData,record) {
                          var renderstring = "<div class='jqx-widget-content jqx-widget-content-" + theme + "' style='float: left; width: 100%; height: 100%;'>";
                          $.each(aggregates, function (key, value) {
                              var name = key == 'sum' ? '' : 'Avg';
                              var color = '';
                              renderstring += '<div style="color: ' + color + '; position: relative; margin: 6px; text-align: right; overflow: hidden;">' + name  + value + '<input type="hidden" id="total_qty" value="'+value+'"></div>';
                          });
                          renderstring += "</div>";
                          return renderstring;
                      }
					  },
					   { text: 'Balance Qty', datafield: 'total_balance_qty', width: 120,align: 'center',cellsformat: 'n2',cellsalign: 'right',aggregates: ['sum'],
						  aggregatesrenderer: function (aggregates, column, element, summaryData,record) {
                          var renderstring = "<div class='jqx-widget-content jqx-widget-content-" + theme + "' style='float: left; width: 100%; height: 100%;'>";
                          $.each(aggregates, function (key, value) {
                              var name = key == 'sum' ? '' : 'Avg';
                              var color = '';
                              renderstring += '<div style="color: ' + color + '; position: relative; margin: 6px; text-align: right; overflow: hidden;">' + name  + value + '<input type="hidden" id="total_qty" value="'+value+'"></div>';
                          });
                          renderstring += "</div>";
                          return renderstring;
                      }
					  },
						{ text: 'PO Amount', datafield: 'total_amount', width: 120,align: 'center',cellsformat: 'c2',cellsalign: 'right',aggregates: ['sum'],
						  aggregatesrenderer: function (aggregates, column, element, summaryData,record) {
                          var renderstring = "<div class='jqx-widget-content jqx-widget-content-" + theme + "' style='float: left; width: 100%; height: 100%;'>";
                          $.each(aggregates, function (key, value) {
                              var name = key == 'sum' ? '' : 'Avg';
                              var color = '';
                              renderstring += '<div style="color: ' + color + '; position: relative; margin: 6px; text-align: right; overflow: hidden;">' + name  + value + '<input type="hidden" id="total_qty" value="'+value+'"></div>';
                          });
                          renderstring += "</div>";
                          return renderstring;
                      }
					  },
						{ text: 'Balance Amount', datafield: 'total_balance_amount', width: 120,align: 'center',cellsformat: 'c2',cellsalign: 'right',aggregates: ['sum'],
						  aggregatesrenderer: function (aggregates, column, element, summaryData,record) {
                          var renderstring = "<div class='jqx-widget-content jqx-widget-content-" + theme + "' style='float: left; width: 100%; height: 100%;'>";
                          $.each(aggregates, function (key, value) {
                              var name = key == 'sum' ? '' : 'Avg';
                              var color = '';
                              renderstring += '<div style="color: ' + color + '; position: relative; margin: 6px; text-align: right; overflow: hidden;">' + name  + value + '<input type="hidden" id="total_qty" value="'+value+'"></div>';
                          });
                          renderstring += "</div>";
                          return renderstring;
                      }
					  },
				{ text: 'token', editable: false, datafield: 'non_purchase_token', width: 170,align: 'center' },
						
					  
                      
                  ]
            });

			//$('#non_purchase_jqxgrid').jqxGrid('clear');
           
            //$("#salestax_deleterowbutton").jqxButton({ theme: theme });
            $("#non_purchase_updaterowbutton").jqxButton({ theme: theme });

            // update row.
			$("#non_purchase_updaterowbutton").bind('click', function () {
				
				location='?position=non_purchased&non_purchase_newcheck=Y';
					
            });
            

            $("#non_purchase_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
			$("#non_purchase_jqxgrid").on('rowclick', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
				
				var args = event.args;
				var row = args.rowindex;
				var selectedrowindex = row;//$("#non_purchase_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#non_purchase_jqxgrid").jqxGrid('getdatainformation').rowscount;
                ;
				if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
					
					//alert(selectedrowindex);
                    var id = $("#non_purchase_jqxgrid").jqxGrid('getrowid', selectedrowindex);
					
					//alert(id);
					// gets all rows loaded from the data source.
				
					var non_purchase_data = $('#non_purchase_jqxgrid').jqxGrid('getrowdatabyid', id);
					   location='?position=non_purchased&non_purchase_seq='+non_purchase_data.non_purchase_seq+'&non_purchase_id='+non_purchase_data.non_purchase_id+'&non_purchase_token='+non_purchase_data.non_purchase_token;			
					
                }
            });
			 
//===============================================================


		});
    </script>

	<div style="margin-left: 20px;">
	<div style=" width:1200px;">
	
		<div >
			<label style="font-size:20px;">Non Inventory Purchase List</label>
		</div>
		
		
	</div>
	<div id="non_purchase_jqxgrid">
	</div>
	<div>
