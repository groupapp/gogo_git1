   
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
			// prepare the data
            /*
			var salestax_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
                row["salestax_id"] = id;
				row["code"] =jQuery("#salestax_code").val();
				row["rate"] =jQuery("#salestax_rate").val();
                //row["description"] = firstNames[firtnameindex];
                
                return row;
            }*/

            var journal_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'journal_seq', type: 'number'},
					 { name: 'journal_id', type: 'string'},
					 { name: 'date', type: 'date'},
					 { name: 'description', type: 'string'},
					 { name: 'amount', type: 'float'},
					 
                ],
				id: 'journal_seq',
                url: 'journal_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					journal_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},
                /*
				deleterow: function (rowid, commit) {
                    // synchronize with the server - send delete command
            		   var data = "delete=true&" + $.param({salestax_id: rowid});
				       $.ajax({
                            dataType: 'json',
                            url: 'salestax_data.php',
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
						url: 'salestax_data.php',
						data: data,
						success: function (data, status, xhr) {
							// update command is executed.
							commit(true);
						}
					});		
                }*/
            };
 		    var journal_dataadapter = new $.jqx.dataAdapter(journal_source);
           // initialize jqxGrid
            
			
			$("#journal_jqxgrid").jqxGrid(
            {
                width: 960,height:600,
				//selectionmode: 'singlecell',
                source: journal_dataadapter,
                theme: theme,
				ready: function () {
                    $("#journal_jqxgrid").jqxGrid('hidecolumn', 'journal_seq');
                },
				editable: false,
				autoheight: false,
				pageable: true,
                columnsresize: true,
                columnsreorder: true,
				sortable: true,
				showfilterrow: true,
				showstatusbar: true,
                statusbarheight: 50,
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
                    var newButton =$("<div style='margin-left: 10px; float: left;'><input id='journal_updaterowbutton' type='button' value=' New ' style='margin-right: 20px;'/></div>");
					var excelExport =$("<div style='margin-left: 10px; float: left;'> <input type='button' value='Export to Excel' id='excelExport' /></div>");
					var csvExport =$("<div style='margin-left: 10px; float: left;'><input type='button' value='Export to CSV' id='csvExport' /></div>");
					
					toolbar.append(container);
                    container.append(newButton);
					container.append(excelExport);
                    container.append(csvExport);
					
					
                    
                    
					$("#excelExport").jqxButton({ theme: theme });
					$("#csvExport").jqxButton({ theme: theme });
					
				   $("#excelExport").click(function () {
						$("#journal_jqxgrid").jqxGrid('exportdata', 'xls', 'jqxGrid');           
					});
					$("#csvExport").click(function () {
						$("#journal_jqxgrid").jqxGrid('exportdata', 'csv', 'jqxGrid');
					});
					
                },	
                columns: [
					  {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer },	
                      { text: 'journal seq', editable: false, datafield: 'journal_seq', width: 20 },
					  { text: 'Journal ID', editable: false, datafield: 'journal_id', width: 170,align: 'center' },
					  { text: 'Date', editable: false, datafield: 'date',filtertype:'date', width: 170,align: 'center',cellsformat: 'd' },
 					  { text: 'Description', datafield: 'description', width: 476,align: 'center',
							aggregates: [
							  { 'Total journals':
								function (aggregatedValue, currentValue) {
									//if (currentValue == "Cappuccino") {
										return aggregatedValue + 1;
									//}

									return aggregatedValue;
								}
							  }
						  ]
						},
					  
                      
                  ]
            });

			
           
            //$("#salestax_deleterowbutton").jqxButton({ theme: theme });
            $("#journal_updaterowbutton").jqxButton({ theme: theme });

            // update row.
			$("#journal_updaterowbutton").bind('click', function () {
				
				location='?position=journald';
					
            });
            // delete row.
            /*
			$("#salestax_deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#salestax_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#salestax_jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
					
					//alert(selectedrowindex);
                    var id = $("#salestax_jqxgrid").jqxGrid('getrowid', selectedrowindex);
						
					$("#salestax_jqxgrid").jqxGrid('deleterow', id);
                }
            });*/


            $("#journal_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
			$("#journal_jqxgrid").on('rowclick', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
				
				var args = event.args;
				var row = args.rowindex;
				var selectedrowindex = row;//$("#journal_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#journal_jqxgrid").jqxGrid('getdatainformation').rowscount;
                ;
				if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
					
					//alert(selectedrowindex);
                    var id = $("#journal_jqxgrid").jqxGrid('getrowid', selectedrowindex);
					
					//alert(id);
					// gets all rows loaded from the data source.
				
					var journal_data = $('#journal_jqxgrid').jqxGrid('getrowdatabyid', id);
					   location='?position=journald&journal_seq='+journal_data.journal_seq+'&journal_id='+journal_data.journal_id;			
					
                }
            });
			 
//===============================================================


		});
    </script>

	<div >
	<ul>
	<li style="float:left;padding:10px;list-style: none">
	<div style="border: 1px solid #e5e5e5; width:960px;">
		<div class="jqx-grid-column-header jqx-grid-column-header-bootstrap jqx-widget-header jqx-widget-header-bootstrap">
			<label style="margin-left: 10px;">Genenal Journal</label>
		</div>
		
		
	</div>
	<div id="journal_jqxgrid">
	</div>
	</li>
	</ul>
	<div>
