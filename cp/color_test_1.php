<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="/aw/jqwidgets/styles/jqx.bootstrap.css" type="text/css" />
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
            

			var color_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
                row["color_id"] = id;
				row["description"] =jQuery("#test").val();
                //row["description"] = firstNames[firtnameindex];
                
                return row;
            }
			var color_source =
            {
                 datatype: "json",
				unboundmode: true,
                
                 datafields: [
					 { name: 'color_id', type: 'number'},
					 { name: 'description', type: 'string'},
					 {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer },
					 
                ],
				id: 'color_id',
                url: 'color_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					color_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},
				updaterow: function (rowid, rowdata) {
                    // synchronize with the server - send update command   
                },
				addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param(rowdata);
					//alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'color_data.php',
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
            		   var data = "delete=true&" + $.param({color_id: rowid});
				       $.ajax({
                            dataType: 'json',
                            url: 'color_data.php',
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
						url: 'color_data.php',
						data: data,
						success: function (data, status, xhr) {
							// update command is executed.
							commit(true);
						}
					});		
                }
            };
 		    var color_dataadapter = new $.jqx.dataAdapter(color_source);
           // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {
                width: 400,height:210,
				//selectionmode: 'singlecell',
                source: color_dataadapter,
                theme: theme,
				ready: function () {
                    $("#jqxgrid").jqxGrid('hidecolumn', 'color_id');
                },
				editable: true,
				autoheight: false,
				pageable: true,
                columnsresize: true,
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
                      {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer, width: 20},
					  { text: 'Color ID', editable: false, datafield: 'color_id', width: 100 },
                      { text: 'Description', datafield: 'description', width: 354,align: 'center' },
                      
                  ]
            });
			$("#color_addrowbutton").jqxButton({ theme: theme });
            $("#color_deleterowbutton").jqxButton({ theme: theme });
            $("#color_updaterowbutton").jqxButton({ theme: theme });
			$("#color_cancelrowbutton").jqxButton({ theme: theme });

            // update row.
			$("#color_updaterowbutton").bind('click', function () {
				
				$("#color_updaterowbutton").hide();
				$("#color_addrowbutton").show();
				$("#color_cancelrowbutton").show();
				$("#test").show();			
					
            });
			$("#color_cancelrowbutton").bind('click', function () {
				
				$("#color_updaterowbutton").show();
				$("#color_addrowbutton").hide();
				$("#color_cancelrowbutton").hide();
				$("#test").val('');
				$("#test").hide();			
					
            });

            // create new row.
            // create new row.
            $("#color_addrowbutton").on('click', function () {
               
			   var textval=$("#test").val();
			   if (textval=='')
			   {
			      alert('Please input description.');
				  return false;
			   }
				var rowscount=0;
				var data = "lastid=true";
				$.ajax({
                            dataType: 'json',
                            url: 'color_data.php',
                            data: data,
							cache: false,
                            success: function (data) {
							   // insert command is executed.
								if( data==null)
									rowscount=1;
								else
								rowscount=parseInt(data[0].color_id)+1;
								
								var datarow = color_generaterow(rowscount);
								$("#jqxgrid").jqxGrid('addrow', null, datarow,'first');				
								$("#test").val('');
								$("#test").hide();
								$("#color_updaterowbutton").show();
								$("#color_addrowbutton").hide();
								$("#color_cancelrowbutton").hide();
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
            });

            // delete row.
            $("#color_deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
				
                    var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                  
				
					$("#jqxgrid").jqxGrid('deleterow', id);
                }
            });


            $("#jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
//==============incoterms start=================================================
			// prepare the data
            
			var incoterms_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
                row["incoterms_id"] = id;
				row["description"] =jQuery("#incoterms_test").val();
                //row["description"] = firstNames[firtnameindex];
                
                return row;
            }

            var incoterms_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'incoterms_id', type: 'number'},
					 { name: 'description', type: 'string'},
					 
                ],
				id: 'incoterms_id',
                url: 'incoterms_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					incoterms_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},
				addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param(rowdata);
					//alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'incoterms_data.php',
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
            		   var data = "delete=true&" + $.param({incoterms_id: rowid});
				       $.ajax({
                            dataType: 'json',
                            url: 'incoterms_data.php',
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
						url: 'incoterms_data.php',
						data: data,
						success: function (data, status, xhr) {
							// update command is executed.
							commit(true);
						}
					});		
                }
            };
 		    var incoterms_dataadapter = new $.jqx.dataAdapter(incoterms_source);
           // initialize jqxGrid
            $("#incoterms_jqxgrid").jqxGrid(
            {
                width: 400,height:210,
				//selectionmode: 'singlecell',
                source: incoterms_dataadapter,
                theme: theme,
				ready: function () {
                    $("#incoterms_jqxgrid").jqxGrid('hidecolumn', 'incoterms_id');
                },
				editable: true,
				autoheight: false,
				pageable: true,
                columnsresize: true,
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
					  {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer, width: 20}, 	
                      { text: 'Incoterms ID', editable: false, datafield: 'incoterms_id', width: 100 },
                      { text: 'Description', datafield: 'description', width: 354,align: 'center' },
                      
                  ]
            });
			$("#incoterms_addrowbutton").jqxButton({ theme: theme });
            $("#incoterms_deleterowbutton").jqxButton({ theme: theme });
            $("#incoterms_updaterowbutton").jqxButton({ theme: theme });
			$("#incoterms_cancelrowbutton").jqxButton({ theme: theme });

            // update row.
			$("#incoterms_updaterowbutton").bind('click', function () {
				
				$("#incoterms_updaterowbutton").hide();
				$("#incoterms_addrowbutton").show();
				$("#incoterms_cancelrowbutton").show();
				$("#incoterms_test").show();			
					
            });
			$("#incoterms_cancelrowbutton").bind('click', function () {
				
				$("#incoterms_updaterowbutton").show();
				$("#incoterms_addrowbutton").hide();
				$("#incoterms_cancelrowbutton").hide();
				$("#incoterms_test").val('');
				$("#incoterms_test").hide();			
					
            });

            // create new row.
            // create new row.
            $("#incoterms_addrowbutton").on('click', function () {
               
			   var textval=$("#incoterms_test").val();
			   if (textval=='')
			   {
			      alert('Please input description.');
				  return false;
			   }
				var rowscount=0;
				var data = "lastid=true";
				$.ajax({
                            dataType: 'json',
                            url: 'incoterms_data.php',
                            data: data,
							cache: false,
                            success: function (data) {
							   // insert command is executed.
								if( data==null)
									rowscount=1;
								else
								rowscount=parseInt(data[0].incoterms_id)+1;
								
								var datarow = incoterms_generaterow(rowscount);
								$("#incoterms_jqxgrid").jqxGrid('addrow', null, datarow,'first');				
								$("#incoterms_test").val('');
								$("#incoterms_test").hide();
								$("#incoterms_updaterowbutton").show();
								$("#incoterms_addrowbutton").hide();
								$("#incoterms_cancelrowbutton").hide();
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
            });

            // delete row.
            $("#incoterms_deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#incoterms_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#incoterms_jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
				
                    var id = $("#incoterms_jqxgrid").jqxGrid('getrowid', selectedrowindex);
                  
				
					$("#incoterms_jqxgrid").jqxGrid('deleterow', id);
                }
            });


            $("#incoterms_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
//===============================================================
//==============shipvia start=================================================
			// prepare the data
            
			var shipvia_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
                row["shipvia_id"] = id;
				row["description"] =jQuery("#shipvia_test").val();
                //row["description"] = firstNames[firtnameindex];
                
                return row;
            }

            var shipvia_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'shipvia_id', type: 'number'},
					 { name: 'description', type: 'string'},
					 
                ],
				id: 'shipvia_id',
                url: 'shipvia_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					shipvia_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},
				addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param(rowdata);
					//alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'shipvia_data.php',
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
            		   var data = "delete=true&" + $.param({shipvia_id: rowid});
				       $.ajax({
                            dataType: 'json',
                            url: 'shipvia_data.php',
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
						url: 'shipvia_data.php',
						data: data,
						success: function (data, status, xhr) {
							// update command is executed.
							commit(true);
						}
					});		
                }
            };
 		    var shipvia_dataadapter = new $.jqx.dataAdapter(shipvia_source);
           // initialize jqxGrid
            $("#shipvia_jqxgrid").jqxGrid(
            {
                width: 400,height:210,
				//selectionmode: 'singlecell',
                source: shipvia_dataadapter,
                theme: theme,
				ready: function () {
                    $("#shipvia_jqxgrid").jqxGrid('hidecolumn', 'shipvia_id');
                },
				editable: true,
				autoheight: false,
				pageable: true,
                columnsresize: true,
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
                      { text: 'shipvia ID', editable: false, datafield: 'shipvia_id', width: 100 },
                      { text: 'Description', datafield: 'description', width: 354,align: 'center' },
                      
                  ]
            });
			$("#shipvia_addrowbutton").jqxButton({ theme: theme });
            $("#shipvia_deleterowbutton").jqxButton({ theme: theme });
            $("#shipvia_updaterowbutton").jqxButton({ theme: theme });
			$("#shipvia_cancelrowbutton").jqxButton({ theme: theme });

            // update row.
			$("#shipvia_updaterowbutton").bind('click', function () {
				
				$("#shipvia_updaterowbutton").hide();
				$("#shipvia_addrowbutton").show();
				$("#shipvia_cancelrowbutton").show();
				$("#shipvia_test").show();			
					
            });
			$("#shipvia_cancelrowbutton").bind('click', function () {
				
				$("#shipvia_updaterowbutton").show();
				$("#shipvia_addrowbutton").hide();
				$("#shipvia_cancelrowbutton").hide();
				$("#shipvia_test").val('');
				$("#shipvia_test").hide();			
					
            });

            // create new row.
            // create new row.
            $("#shipvia_addrowbutton").on('click', function () {
               
			   var textval=$("#shipvia_test").val();
			   if (textval=='')
			   {
			      alert('Please input description.');
				  return false;
			   }
				var rowscount=0;
				var data = "lastid=true";
				$.ajax({
                            dataType: 'json',
                            url: 'shipvia_data.php',
                            data: data,
							cache: false,
                            success: function (data) {
							   // insert command is executed.
								if( data==null)
									rowscount=1;
								else
								rowscount=parseInt(data[0].shipvia_id)+1;
								
								var datarow = shipvia_generaterow(rowscount);
								$("#shipvia_jqxgrid").jqxGrid('addrow', null, datarow,'first');				
								$("#shipvia_test").val('');
								$("#shipvia_test").hide();
								$("#shipvia_updaterowbutton").show();
								$("#shipvia_addrowbutton").hide();
								$("#shipvia_cancelrowbutton").hide();
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
            });

            // delete row.
            $("#shipvia_deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#shipvia_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#shipvia_jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
				
                    var id = $("#shipvia_jqxgrid").jqxGrid('getrowid', selectedrowindex);
                  
				
					$("#shipvia_jqxgrid").jqxGrid('deleterow', id);
                }
            });


            $("#shipvia_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
//===============================================================
//==============category start=================================================
			// prepare the data
            
			var category_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
                row["category_id"] = id;
				row["description"] =jQuery("#category_test").val();
                //row["description"] = firstNames[firtnameindex];
                
                return row;
            }

            var category_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'category_id', type: 'number'},
					 { name: 'description', type: 'string'},
					 
                ],
				id: 'category_id',
                url: 'category_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					category_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},
				addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param(rowdata);
					//alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'category_data.php',
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
            		   var data = "delete=true&" + $.param({category_id: rowid});
				       $.ajax({
                            dataType: 'json',
                            url: 'category_data.php',
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
						url: 'category_data.php',
						data: data,
						success: function (data, status, xhr) {
							// update command is executed.
							commit(true);
						}
					});		
                }
            };
 		    var category_dataadapter = new $.jqx.dataAdapter(category_source);
           // initialize jqxGrid
            $("#category_jqxgrid").jqxGrid(
            {
                width: 400,height:210,
				//selectionmode: 'singlecell',
                source: category_dataadapter,
                theme: theme,
				ready: function () {
                    $("#category_jqxgrid").jqxGrid('hidecolumn', 'category_id');
                },
				editable: true,
				autoheight: false,
				pageable: true,
                columnsresize: true,
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
                      { text: 'category ID', editable: false, datafield: 'category_id', width: 100 },
                      { text: 'Description', datafield: 'description', width: 354,align: 'center' },
                      
                  ]
            });
			$("#category_addrowbutton").jqxButton({ theme: theme });
            $("#category_deleterowbutton").jqxButton({ theme: theme });
            $("#category_updaterowbutton").jqxButton({ theme: theme });
			$("#category_cancelrowbutton").jqxButton({ theme: theme });

            // update row.
			$("#category_updaterowbutton").bind('click', function () {
				
				$("#category_updaterowbutton").hide();
				$("#category_addrowbutton").show();
				$("#category_cancelrowbutton").show();
				$("#category_test").show();			
					
            });
			$("#category_cancelrowbutton").bind('click', function () {
				
				$("#category_updaterowbutton").show();
				$("#category_addrowbutton").hide();
				$("#category_cancelrowbutton").hide();
				$("#category_test").val('');
				$("#category_test").hide();			
					
            });

            // create new row.
            // create new row.
            $("#category_addrowbutton").on('click', function () {
               
			   var textval=$("#category_test").val();
			   if (textval=='')
			   {
			      alert('Please input description.');
				  return false;
			   }
				var rowscount=0;
				var data = "lastid=true";
				$.ajax({
                            dataType: 'json',
                            url: 'category_data.php',
                            data: data,
							cache: false,
                            success: function (data) {
							   // insert command is executed.
								if( data==null)
									rowscount=1;
								else
								rowscount=parseInt(data[0].category_id)+1;
								
								var datarow = category_generaterow(rowscount);
								$("#category_jqxgrid").jqxGrid('addrow', null, datarow,'first');				
								$("#category_test").val('');
								$("#category_test").hide();
								$("#category_updaterowbutton").show();
								$("#category_addrowbutton").hide();
								$("#category_cancelrowbutton").hide();
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
            });

            // delete row.
            $("#category_deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#category_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#category_jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
				
                    var id = $("#category_jqxgrid").jqxGrid('getrowid', selectedrowindex);
                  
				
					$("#category_jqxgrid").jqxGrid('deleterow', id);
                }
            });


            $("#category_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
//===============================================================
//==============salestax start=================================================
			// prepare the data
            
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
            }

            var salestax_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'salestax_id', type: 'number'},
					 { name: 'code', type: 'string'},
					 { name: 'rate', type: 'float'},
					 
                ],
				id: 'salestax_id',
                url: 'salestax_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					salestax_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},
				addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param(rowdata);
					//alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'salestax_data.php',
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
                }
            };
 		    var salestax_dataadapter = new $.jqx.dataAdapter(salestax_source);
           // initialize jqxGrid
            $("#salestax_jqxgrid").jqxGrid(
            {
                width: 400,height:210,
				//selectionmode: 'singlecell',
                source: salestax_dataadapter,
                theme: theme,
				ready: function () {
                    $("#salestax_jqxgrid").jqxGrid('hidecolumn', 'salestax_id');
                },
				editable: true,
				autoheight: false,
				pageable: true,
                columnsresize: true,
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
                      { text: 'salestax ID', editable: false, datafield: 'salestax_id', width: 100 },
                      { text: 'Code', datafield: 'code', width: 300,align: 'center' },
					  { text: 'Rate', datafield: 'rate', width: 54,align: 'center',cellsalign: 'right', cellsformat: 'F2' },	
                      
                  ]
            });
			$("#salestax_addrowbutton").jqxButton({ theme: theme });
            $("#salestax_deleterowbutton").jqxButton({ theme: theme });
            $("#salestax_updaterowbutton").jqxButton({ theme: theme });
			$("#salestax_cancelrowbutton").jqxButton({ theme: theme });

            // update row.
			$("#salestax_updaterowbutton").bind('click', function () {
				
				$("#salestax_updaterowbutton").hide();
				$("#salestax_addrowbutton").show();
				$("#salestax_cancelrowbutton").show();
				$("#salestax_code").show();
				$("#salestax_rate").show();
					
            });
			$("#salestax_cancelrowbutton").bind('click', function () {
				
				$("#salestax_updaterowbutton").show();
				$("#salestax_addrowbutton").hide();
				$("#salestax_cancelrowbutton").hide();
				$("#salestax_code").val('');
				$("#salestax_code").hide();
				$("#salestax_rate").val('');
				$("#salestax_rate").hide();
					
            });

            // create new row.
            // create new row.
            $("#salestax_addrowbutton").on('click', function () {
               
			   var textcode=$("#salestax_code").val();
			   var textrate=$("#salestax_rate").val();
			   if (textcode=='')
			   {
			      alert('Please input code.');
				  return false;
			   }
			   if (textrate=='')
			   {
			      alert('Please input rate.');
				  return false;
			   }
				var rowscount=0;
				var data = "lastid=true";
				$.ajax({
                            dataType: 'json',
                            url: 'salestax_data.php',
                            data: data,
							cache: false,
                            success: function (data) {
							   // insert command is executed.
								if( data==null)
									rowscount=1;
								else
								rowscount=parseInt(data[0].salestax_id)+1;
								
								var datarow = salestax_generaterow(rowscount);
								$("#salestax_jqxgrid").jqxGrid('addrow', null, datarow,'first');				
								$("#salestax_code").val('');
								$("#salestax_code").hide();
								$("#salestax_rate").val('');
								$("#salestax_rate").hide();
								$("#salestax_updaterowbutton").show();
								$("#salestax_addrowbutton").hide();
								$("#salestax_cancelrowbutton").hide();
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
            });

            // delete row.
            $("#salestax_deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#salestax_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#salestax_jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
					
					//alert(selectedrowindex);
                    var id = $("#salestax_jqxgrid").jqxGrid('getrowid', selectedrowindex);
						
					$("#salestax_jqxgrid").jqxGrid('deleterow', id);
                }
            });


            $("#salestax_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
//===============================================================
//==============term start=================================================
			// prepare the data
            
			var term_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
                row["term_id"] = id;
				row["code"] =jQuery("#term_code").val();
				row["due_no_day"] =jQuery("#term_due_no_day").val();
				row["due_nextmonth_day"] =jQuery("#term_due_nextmonth_day").val();
				row["due_nextnextmonth_day"] =jQuery("#term_due_nextnextmonth_day").val();
                //row["description"] = firstNames[firtnameindex];
                
                return row;
            }

            var term_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'term_id', type: 'number'},
					 { name: 'code', type: 'string'},
					 { name: 'due_no_day', type: 'number'},
					 { name: 'due_nextmonth_day', type: 'number'},
					 { name: 'due_nextnextmonth_day', type: 'number'},
					 
                ],
				id: 'term_id',
                url: 'term_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					term_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},
				addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param(rowdata);
					//alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'term_data.php',
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
            		   var data = "delete=true&" + $.param({term_id: rowid});
				       $.ajax({
                            dataType: 'json',
                            url: 'term_data.php',
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
						url: 'term_data.php',
						data: data,
						success: function (data, status, xhr) {
							// update command is executed.
							commit(true);
						}
					});		
                }
            };
 		    var term_dataadapter = new $.jqx.dataAdapter(term_source);
           // initialize jqxGrid
            var tooltiprenderer = function (element) {
                $(element).jqxTooltip({position: 'mouse', content: $(element).text() });
            }
			$("#term_jqxgrid").jqxGrid(
            {
                width: 400,height:210,
				//selectionmode: 'singlecell',
                source: term_dataadapter,
                theme: theme,
				ready: function () {
                    $("#term_jqxgrid").jqxGrid('hidecolumn', 'term_id');
                },
				editable: true,
				autoheight: false,
				pageable: true,
                columnsresize: true,
				columnsreorder: true,
                sortable: true,
				showfilterrow: true,
                filterable: true,
				//showtoolbar: true,
				//columnsresize: true,
				//virtualmode: true,
				/*rendergridrows: function(obj)
				{
					  return obj.data;     
				},*/
                columns: [
					  {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer },	
                      { text: 'term ID', editable: false, datafield: 'term_id', width: 100 },
                      { text: 'Code<br>', datafield: 'code', width: 104,align: 'center' },
					  { text: 'Due in  number of days', datafield: 'due_no_day', width: 84,align: 'center',cellsalign: 'right', cellsformat: 'n2' ,rendered: tooltiprenderer},
					  { text: 'Due on the day of next month', datafield: 'due_nextmonth_day', width: 84,align: 'center',cellsalign: 'right', cellsformat: 'n2',rendered: tooltiprenderer },
					  { text: 'Due on the day of next next month', datafield: 'due_nextnextmonth_day', width: 84,align: 'center',cellsalign: 'right', cellsformat: 'n2',rendered: tooltiprenderer },
                      
                  ]
            });
			$("#term_addrowbutton").jqxButton({ theme: theme });
            $("#term_deleterowbutton").jqxButton({ theme: theme });
            $("#term_updaterowbutton").jqxButton({ theme: theme });
			$("#term_cancelrowbutton").jqxButton({ theme: theme });

            // update row.
			$("#term_updaterowbutton").bind('click', function () {
				
				$("#term_updaterowbutton").hide();
				$("#term_addrowbutton").show();
				$("#term_cancelrowbutton").show();
				$("#term_code").show();
				$("#term_due_no_day").show();
				$("#term_due_nextmonth_day").show();
				$("#term_due_nextnextmonth_day").show();
					
            });
			$("#term_cancelrowbutton").bind('click', function () {
				
				$("#term_updaterowbutton").show();
				$("#term_addrowbutton").hide();
				$("#term_cancelrowbutton").hide();
				$("#term_code").val('');
				$("#term_code").hide();
				$("#term_due_no_day").val('');
				$("#term_due_no_day").hide();
				$("#term_due_nextmonth_day").val('');
				$("#term_due_nextmonth_day").hide();
				$("#term_due_nextnextmonth_day").val('');
				$("#term_due_nextnextmonth_day").hide();
					
            });

            // create new row.
            // create new row.
            $("#term_addrowbutton").on('click', function () {
               
			   var textcode=$("#term_code").val();
			   var textterm_due_no_day=$("#term_due_no_day").val();
			   var textterm_due_nextmonth_day=$("#term_due_nextmonth_day").val();
			   var textterm_due_nextnextmonth_day_due_no_day=$("#term_due_nextnextmonth_day").val();
			   if (textcode=='')
			   {
			      alert('Please input code.');
				  return false;
			   }
			   if (textterm_due_no_day=='')
			   {
			      $("#term_due_no_day").val(0);
			   }
			   if (textterm_due_nextmonth_day=='')
			   {
			      $("#term_due_nextmonth_day").val(0);
			   }
			   if (textterm_due_nextnextmonth_day_due_no_day=='')
			   {
			      $("#term_due_nextnextmonth_day").val(0);
			   }
			   
				var rowscount=0;
				var data = "lastid=true";
				$.ajax({
                            dataType: 'json',
                            url: 'term_data.php',
                            data: data,
							cache: false,
                            success: function (data) {
							   // insert command is executed.
								if( data==null)
									rowscount=1;
								else
								rowscount=parseInt(data[0].term_id)+1;
								
								var datarow = term_generaterow(rowscount);
								$("#term_jqxgrid").jqxGrid('addrow', null, datarow,'first');				
								$("#term_code").val('');
								$("#term_code").hide();
								$("#term_due_no_day").val('');
								$("#term_due_no_day").hide();
								$("#term_due_nextmonth_day").val('');
								$("#term_due_nextmonth_day").hide();
								$("#term_due_nextnextmonth_day").val('');
								$("#term_due_nextnextmonth_day").hide();
								$("#term_updaterowbutton").show();
								$("#term_addrowbutton").hide();
								$("#term_cancelrowbutton").hide();
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
            });

            // delete row.
            $("#term_deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#term_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#term_jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
				
                    var id = $("#term_jqxgrid").jqxGrid('getrowid', selectedrowindex);
                  
				
					$("#term_jqxgrid").jqxGrid('deleterow', id);
                }
            });


            $("#term_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
			 
//===============================================================
//==============size start=================================================
			// prepare the data
            
			var size_generaterow = function (id) {
                var row = {};
               // var descriptionindex = Math.floor(Math.random() * firstNames.length);
                //var lastnameindex = Math.floor(Math.random() * lastNames.length);
               //alert(id);
                row["size_id"] = id;
				row["s1"] =jQuery("#s1").val();
				row["s2"] =jQuery("#s2").val();
				row["s3"] =jQuery("#s3").val();
				row["s4"] =jQuery("#s4").val();
				row["s5"] =jQuery("#s5").val();
				row["s6"] =jQuery("#s6").val();
				row["s7"] =jQuery("#s7").val();
				row["s8"] =jQuery("#s8").val();
				row["s9"] =jQuery("#s9").val();
				row["s10"] =jQuery("#s10").val();
				row["s11"] =jQuery("#s11").val();
				row["s12"] =jQuery("#s12").val();
				//row["description"] = firstNames[firtnameindex];
                
                return row;
            }

            var size_source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'size_id', type: 'number'},
					 { name: 's1', type: 'string'},
					 { name: 's2', type: 'string'},
					 { name: 's3', type: 'string'},
					 { name: 's4', type: 'string'},
					 { name: 's5', type: 'string'},
					 { name: 's6', type: 'string'},
					 { name: 's7', type: 'string'},
					 { name: 's8', type: 'string'},
					 { name: 's9', type: 'string'},
					 { name: 's10', type: 'string'},
					 { name: 's11', type: 'string'},
					 { name: 's12', type: 'string'},
					 
                ],
				id: 'size_id',
                url: 'size_data.php',    
				root: 'Rows',
				cache: false,
				beforeprocessing: function(data)
				{		
					
					size_source.totalrecords = data[0].TotalRows;
					//alert(source.totalrecords);
				},
				addrow: function (rowid, rowdata, position, commit) {
               // alert(position);
					// synchronize with the server - send insert command
					
					var data = "insert=true&" + $.param(rowdata);
					//alert(data);
					   $.ajax({
                            dataType: 'json',
                            url: 'size_data.php',
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
            		   var data = "delete=true&" + $.param({size_id: rowid});
				       $.ajax({
                            dataType: 'json',
                            url: 'size_data.php',
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
						url: 'size_data.php',
						data: data,
						success: function (data, status, xhr) {
							// update command is executed.
							commit(true);
						}
					});		
                }
            };
 		    var size_dataadapter = new $.jqx.dataAdapter(size_source);
           // initialize jqxGrid
            
			$("#size_jqxgrid").jqxGrid(
            {
                width: 406,height:210,
				//selectionmode: 'singlecell',
                source: size_dataadapter,
                theme: theme,
				ready: function () {
                    $("#size_jqxgrid").jqxGrid('hidecolumn', 'size_id');
                },
				editable: true,
				autoheight: false,
				pageable: true,
                columnsresize: true,
				columnsreorder: true,
                sortable: true,
				showfilterrow: true,
                filterable: true,
				//showtoolbar: true,
				//columnsresize: true,
				//virtualmode: true,
				/*rendergridrows: function(obj)
				{
					  return obj.data;     
				},*/
                columns: [
					  {pinned: true, exportable: false, text: "", columntype: 'number', cellclassname: cssclass, cellsrenderer: numberrenderer },	
                      { text: 'size ID', editable: false, datafield: 'size_id', width: 100 },
						{ text: 'S1', editable: true, datafield: 's1', width: 30,align: 'center' },
					  { text: 'S2', editable: true, datafield: 's2', width: 30,align: 'center' },
					  { text: 'S3', editable: true, datafield: 's3', width: 30,align: 'center' },
					  { text: 'S4', editable: true, datafield: 's4', width: 30,align: 'center' },
					  { text: 'S5', editable: true, datafield: 's5', width: 30,align: 'center' },
					  { text: 'S6', editable: true, datafield: 's6', width: 30,align: 'center' },
					  { text: 'S7', editable: true, datafield: 's7', width: 30,align: 'center' },
					  { text: 'S8', editable: true, datafield: 's8', width: 30,align: 'center' },
					  { text: 'S9', editable: true, datafield: 's9', width: 30,align: 'center' },
					  { text: 'S10', editable: true, datafield: 's10', width: 30,align: 'center' },
					  { text: 'S11', editable: true, datafield: 's11', width: 30,align: 'center' },
					  { text: 'S12', editable: true, datafield: 's12', width: 30,align: 'center' },
                      
                  ]
            });
			$("#size_addrowbutton").jqxButton({ theme: theme });
            $("#size_deleterowbutton").jqxButton({ theme: theme });
            $("#size_updaterowbutton").jqxButton({ theme: theme });
			$("#size_cancelrowbutton").jqxButton({ theme: theme });

            // update row.
			$("#size_updaterowbutton").bind('click', function () {
				
				$("#size_updaterowbutton").hide();
				$("#size_addrowbutton").show();
				$("#size_cancelrowbutton").show();
				$("#s1").show();
				$("#s2").show();
				$("#s3").show();
				$("#s4").show();
				$("#s5").show();
				$("#s6").show();
				$("#s7").show();
				$("#s8").show();
				$("#s9").show();
				$("#s10").show();
				$("#s11").show();
				$("#s12").show();
					
            });
			$("#size_cancelrowbutton").bind('click', function () {
				
				$("#size_updaterowbutton").show();
				$("#size_addrowbutton").hide();
				$("#size_cancelrowbutton").hide();
				$("#s1").val('');
				$("#s2").val('');
				$("#s3").val('');
				$("#s4").val('');
				$("#s5").val('');
				$("#s6").val('');
				$("#s7").val('');
				$("#s8").val('');
				$("#s9").val('');
				$("#s10").val('');
				$("#s11").val('');
				$("#s12").val('');
				$("#s1").hide();
				$("#s2").hide();
				$("#s3").hide();
				$("#s4").hide();
				$("#s5").hide();
				$("#s6").hide();
				$("#s7").hide();
				$("#s8").hide();
				$("#s9").hide();
				$("#s10").hide();
				$("#s11").hide();
				$("#s12").hide();
					
            });

            // create new row.
            // create new row.
            $("#size_addrowbutton").on('click', function () {
               
			   
			   
				var rowscount=0;
				var data = "lastid=true";
				$.ajax({
                            dataType: 'json',
                            url: 'size_data.php',
                            data: data,
							cache: false,
                            success: function (data) {
							   // insert command is executed.
								if( data==null)
									rowscount=1;
								else
								rowscount=parseInt(data[0].size_id)+1;
								
								var datarow = size_generaterow(rowscount);
								$("#size_jqxgrid").jqxGrid('addrow', null, datarow,'first');				
								$("#s1").val('');
								$("#s2").val('');
								$("#s3").val('');
								$("#s4").val('');
								$("#s5").val('');
								$("#s6").val('');
								$("#s7").val('');
								$("#s8").val('');
								$("#s9").val('');
								$("#s10").val('');
								$("#s11").val('');
								$("#s12").val('');
								$("#s1").hide();
								$("#s2").hide();
								$("#s3").hide();
								$("#s4").hide();
								$("#s5").hide();
								$("#s6").hide();
								$("#s7").hide();
								$("#s8").hide();
								$("#s9").hide();
								$("#s10").hide();
								$("#s11").hide();
								$("#s12").hide();
								$("#size_updaterowbutton").show();
								$("#size_addrowbutton").hide();
								$("#size_cancelrowbutton").hide();
							},
							error: function(jqXHR, textStatus, errorThrown)
							{
								commit(false);
							}
						});
            });

            // delete row.
            $("#size_deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#size_jqxgrid").jqxGrid('getselectedrowindex');
          		var rowscount = $("#size_jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
				
                    var id = $("#size_jqxgrid").jqxGrid('getrowid', selectedrowindex);
                  
				
					$("#size_jqxgrid").jqxGrid('deleterow', id);
                }
            });


            $("#size_jqxgrid").on("sort", function (event) {

                var sortinformation = event.args.sortinformation;
                var sortdirection = sortinformation.sortdirection.ascending ? "ascending" : "descending";
                if (!sortinformation.sortdirection.ascending && !sortinformation.sortdirection.descending) {
                    sortdirection = "null";
                }

            });
			 
//===============================================================


		});
    </script>
</head>
<body class='default'>
	<div >
	<ul>
	<li style="float:left;padding:10px;list-style: none">
	<div style="border: 1px solid #e5e5e5; width:400px;">
		<div class="jqx-grid-column-header jqx-grid-column-header-bootstrap jqx-widget-header jqx-widget-header-bootstrap">
			<label style="margin-left: 10px;">Color</label>
		</div>
		<div >
				<div style="margin: 6px;">
					<input id="color_updaterowbutton" type="button" value=" New " style="margin-right: 20px;"/>
					<input id="color_cancelrowbutton" type="button" value="Cancel" style="display:none;margin-right: 20px;"/>
					<input id="color_addrowbutton" type="button" value=" Save " style="display:none;margin-right: 20px;" />
					<input id="color_deleterowbutton" type="button" value="Delete" />
				</div>
				
		 </div>
	 
		 <div>
		<input  type="text" id="test" value="" style="display:none;width:350px;margin: 6px;margin-left: 26px;">
		</div>
	</div>
	<div id="jqxgrid">
	</div>
	</li>
	<li style="float:left;padding:10px;list-style: none">
	<div style="border: 1px solid #e5e5e5; width:400px;">
		<div class="jqx-grid-column-header jqx-grid-column-header-bootstrap jqx-widget-header jqx-widget-header-bootstrap">
			<label style="margin-left: 10px;">Incoterms</label>
		</div>
		<div >
				<div style="margin: 6px;">
					<input id="incoterms_updaterowbutton" type="button" value=" New " style="margin-right: 20px;"/>
					<input id="incoterms_cancelrowbutton" type="button" value="Cancel" style="display:none;margin-right: 20px;"/>
					<input id="incoterms_addrowbutton" type="button" value=" Save " style="display:none;margin-right: 20px;" />
					<input id="incoterms_deleterowbutton" type="button" value="Delete" />
				</div>
				
		 </div>
	 
		 <div>
		<input  type="text" id="incoterms_test" value="" style="display:none;width:350px;margin: 6px;margin-left: 26px;">
		</div>
	</div>
	<div id="incoterms_jqxgrid">
	</div>
	</li>
	<li style="float:left;padding:10px;list-style: none">
	<div style="border: 1px solid #e5e5e5; width:400px;">
		<div class="jqx-grid-column-header jqx-grid-column-header-bootstrap jqx-widget-header jqx-widget-header-bootstrap">
			<label style="margin-left: 10px;">Ship Via</label>
		</div>
		<div >
				<div style="margin: 6px;">
					<input id="shipvia_updaterowbutton" type="button" value=" New " style="margin-right: 20px;"/>
					<input id="shipvia_cancelrowbutton" type="button" value="Cancel" style="display:none;margin-right: 20px;"/>
					<input id="shipvia_addrowbutton" type="button" value=" Save " style="display:none;margin-right: 20px;" />
					<input id="shipvia_deleterowbutton" type="button" value="Delete" />
				</div>
				
		 </div>
	 
		 <div>
		<input  type="text" id="shipvia_test" value="" style="display:none;width:350px;margin: 6px;margin-left: 26px;">
		</div>
	</div>
	<div id="shipvia_jqxgrid">
	</div>
	</li>
	<li style="float:left;padding:10px;list-style: none">
	<div style="border: 1px solid #e5e5e5; width:400px;">
		<div class="jqx-grid-column-header jqx-grid-column-header-bootstrap jqx-widget-header jqx-widget-header-bootstrap">
			<label style="margin-left: 10px;">Garment Category</label>
		</div>
		<div >
				<div style="margin: 6px;">
					<input id="category_updaterowbutton" type="button" value=" New " style="margin-right: 20px;"/>
					<input id="category_cancelrowbutton" type="button" value="Cancel" style="display:none;margin-right: 20px;"/>
					<input id="category_addrowbutton" type="button" value=" Save " style="display:none;margin-right: 20px;" />
					<input id="category_deleterowbutton" type="button" value="Delete" />
				</div>
				
		 </div>
	 
		 <div>
		<input  type="text" id="category_test" value="" style="display:none;width:350px;margin: 6px;margin-left: 26px;">
		</div>
	</div>
	<div id="category_jqxgrid">
	</div>
	</li>
	<li style="float:left;padding:10px;list-style: none">
	<div style="border: 1px solid #e5e5e5; width:400px;">
		<div class="jqx-grid-column-header jqx-grid-column-header-bootstrap jqx-widget-header jqx-widget-header-bootstrap">
			<label style="margin-left: 10px;">Sales Tax</label>
		</div>
		<div >
				<div style="margin: 6px;">
					<input id="salestax_updaterowbutton" type="button" value=" New " style="margin-right: 20px;"/>
					<input id="salestax_cancelrowbutton" type="button" value="Cancel" style="display:none;margin-right: 20px;"/>
					<input id="salestax_addrowbutton" type="button" value=" Save " style="display:none;margin-right: 20px;" />
					<input id="salestax_deleterowbutton" type="button" value="Delete" />
				</div>
				
		 </div>
	 
		 <div>
		<input  type="text" id="salestax_code" value="" style="display:none;width:300px;margin: 6px;margin-left: 26px;">
		<input  type="text" id="salestax_rate" value="" style="display:none;width:50px;">
		</div>
	</div>
	<div id="salestax_jqxgrid">
	</div>
	</li>
	<li style="float:left;padding:10px;list-style: none">
	<div style="border: 1px solid #e5e5e5; width:400px;">
		<div class="jqx-grid-column-header jqx-grid-column-header-bootstrap jqx-widget-header jqx-widget-header-bootstrap">
			<label style="margin-left: 10px;">Terms</label>
		</div>
		<div >
				<div style="margin: 6px;">
					<input id="term_updaterowbutton" type="button" value=" New " style="margin-right: 20px;"/>
					<input id="term_cancelrowbutton" type="button" value="Cancel" style="display:none;margin-right: 20px;"/>
					<input id="term_addrowbutton" type="button" value=" Save " style="display:none;margin-right: 20px;" />
					<input id="term_deleterowbutton" type="button" value="Delete" />
				</div>
				
		 </div>
	 
		 <div>
		<input  type="text" id="term_code" value="" style="display:none;width:94px;margin-left: 26px;">
		<input  type="text" id="term_due_no_day" value="" style="display:none;width:75px;">
		<input  type="text" id="term_due_nextmonth_day" value="" style="display:none;width:75px;">
		<input  type="text" id="term_due_nextnextmonth_day" value="" style="display:none;width:75px;">
		</div>
	</div>
	<div id="term_jqxgrid">
	</div>
	</li>
	<li style="float:left;padding:10px;list-style: none">
	<div style="border: 1px solid #e5e5e5; width:406px;">
		<div class="jqx-grid-column-header jqx-grid-column-header-bootstrap jqx-widget-header jqx-widget-header-bootstrap">
			<label style="margin-left: 10px;">Size</label>
		</div>
		<div >
				<div style="margin: 6px;">
					<input id="size_updaterowbutton" type="button" value=" New " style="margin-right: 20px;"/>
					<input id="size_cancelrowbutton" type="button" value="Cancel" style="display:none;margin-right: 20px;"/>
					<input id="size_addrowbutton" type="button" value=" Save " style="display:none;margin-right: 20px;" />
					<input id="size_deleterowbutton" type="button" value="Delete" />
				</div>
				
		 </div>
	 
		 <div>
		<input  type="text" id="s1" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;margin-left: 22px;">
		<input  type="text" id="s2" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		<input  type="text" id="s3" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		<input  type="text" id="s4" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		<input  type="text" id="s5" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		<input  type="text" id="s6" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		<input  type="text" id="s7" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		<input  type="text" id="s8" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		<input  type="text" id="s9" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		<input  type="text" id="s10" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		<input  type="text" id="s11" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		<input  type="text" id="s12" value="" class="jqx-widget jqx-widget-bootstrap jqx-input jqx-input-bootstrap jqx-widget-content jqx-widget-content-bootstrap" style="display:none;width:20px;margin: 2px;">
		</div>
	</div>
	<div id="size_jqxgrid">
	</div>
	</li>

	</ul>
	<div>
</body>
</html>
