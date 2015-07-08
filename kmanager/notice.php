<?php

	$step			= empty($_REQUEST["step"])		? null : $_REQUEST["step"];
    
	require_once("../include/function.php");
	include("head.php");
	include("header.php");
	include("sidebar.php");

	$DB 	= new myDB;
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">

<input type="hidden" id="step" name="step" value="<?php echo $step?>">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Notice <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Promotion</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Notice</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->


			<!-- BEGIN PAGE CONTENT-->
			
			
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Step 1-Branch Select
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								
							</div>
						</div>				
						<div class="portlet-body form" id="addnew" style="display:none;">
							<form enctype="multipart/form-data" action="notice_action.php" method="post" role="form" class="form-horizontal form-row-seperated">
								<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-1">Branch</label>
										<div class="col-md-9">
											<select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]">
												<option value="1">Fulloton</option>
												<option value="2">BuanaPark</option>
												<option value="3">Sandiego</option>
												<option value="4">Torrance</option>
												<option value="5">Los angeles</option>												
											</select>
										</div>
									</div>									
								
									<div class="form-group">
										<label class="control-label col-md-1">Date</label>
										<div class="col-md-3">
											<div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
												<input type="text" name="from_date" class="form-control" >
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											
										</div>
									
									<label class="control-label col-md-1">Time</label>
									
									<div class="col-md-3">
										<div class="input-group">
											<input type="text" name="from_time" class="form-control timepicker timepicker-24">
											
										</div>
									</div>
								</div>


								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green"><i class="fa fa-check"></i> Contiune</button>
											<button type="button" class="btn default" onclick="addcancel()">Cancel</button>
										</div>
									</div>
								</div>
							</form>								
						</div>
						
					<div class="portlet box blue-steel" >
						
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Step 2 -Detail Input
								</div>
								<div class="tools">
									<a href="javascript:;" class="collapse">
									</a>
									<a href="javascript:;" class="reload">
									</a>
									
								</div>
							</div>				
						<div class="portlet-body form" id="addnew2" style="display:none">

							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th class="col-sm-1">
									 Notice no
								</th>
								<th>
									 Market
								</th>
								<th>
									 Date
								</th>
								<th>
									 Time
								</th>
								<th class="col-md-5">
									 Description
								</th>
								<th>
									 Link
								</th>
								<th>
									 Edit
								</th>
								<th>
									 Delete
								</th>
							</tr>
							</thead>
							
							<tbody>
							<?php
							$strSQL = "SELECT * FROM notices_vendors";
				
							$DB->query($strSQL);
							while ($data = $DB->fetch_array($DB->res)){			
							
							echo '<tr>
								<td class="col-sm-1">'
									 .$data['id_notices'].
								'</td>
								<td>'
									 .$data['id_vendor'].
								'</td>
								<td>'
									 .$data['from_date'].
								'</td>
								<td class="center">'
									 .$data['from_time'].
								'</td>
								<td class="col-md-5">'
									 .$data['description'].
								'</td>
								<td>'
									 .$data['detail_link'].
								'</td>
								<td>
									<a class="edit" href="javascript:;">
									Edit </a>
								</td>
								<td>
									<a class="delete" href="javascript:;">
									Delete </a>
								</td>
							</tr>';
							}
							?>
							</tbody>
							</table>
							
							<p><button  class="btn green" onclick="finish()">
						Finish <i class="fa fa-check"></i></a>
						</button></p>

						</div>
						
					</div>
				</div>
					<div class="portlet box red-sunglo">	
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Managed Table
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<!--<a href="#portlet-config" data-toggle="modal" class="config">
								</a>-->
								<a href="javascript:;" class="reload">
								</a>
								<!--<a href="javascript:;" class="remove">
								</a>-->
							</div>
						</div>						



						

						<div class="portlet-body form">
						
							
									<div class="col-md-1">
										<div class="btn-group">
											<button  class="btn green" onclick="addbtn()">
											Add New <i class="fa fa-plus"></i></a>
											</button>
										</div>
									</div>
									
								

							<form  action="notice_action.php" method="post" >

							<div class="btn-group">
								<button id="sample_editable_1_new" class="btn green" onclick="return delnotice(this.form)">
								Delete <i class="fa fa-trash-o"></i></a>
								</button>
								<input type="hidden" name="action"  value="del"/>
							</div>
							<table class="table table-striped table-bordered table-hover" id="sample_3">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox"  class="group-checkable" data-set="#sample_3 .checkboxes"/>
								</th>
								<th style="text-align: center;">
									 Date
								</th>
								<th style="text-align: center;">
									 From
								</th>
								
								<th style="text-align: center;">
									 Description
								</th>
								<th style="text-align: center;">
									 Market
								</th>
								<th style="text-align: center;">
									 Status
								</th>
								
								<th style="text-align: center;">
									 Admin
								</th>
								<th style="text-align: center;">
									 Edit
								</th>
								
							</tr>
							</thead>
							<tbody>
							
							
						<?php
						$strSQL = "SELECT * FROM notices_vendors";
						$DB->query($strSQL);
						while ($data = $DB->fetch_array($DB->res)){
						
							echo '<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" name="delid[]" value="'.$data['id_notices'].'"/>
								</td>
								<td>
									 '.$data['from_date'].'
								</td>
								<td>
									'. $data['from_time'].'
								</td>
								
								<td>
									 '. $data['description'].'
								</td>
								<td >
									 '. $data['id_vendor'].'
								</td>
								<td>
									<span class="label label-sm label-success">
									'. $data['id_type_list'].' </span>
								</td>
								
								<td>
									 '. $data['id_user_updated'].'
								</td>
								<td>
									<a href="edit_notice.php?id_notices='.$data['id_notices'].'&action=update" class="ajax">
									Edit</a>
									<!--<button id="sample_editable_1_new" class="btn green">
											Edit <i class="fa fa-plus"></i></a>
											</button>-->
								</td>
															
							</tr>';
							} ?>

							
							</tbody>
							</table>
							</form>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>

				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
<?php
	include("footer.php");
	
	?>


<!-- jQuery Colorbox js/CSS ============================================================================================= -->
		<script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="/css/jquery.colorbox.css">
	
	<script type="text/javascript">
			$(document).ready(function(){
				$('.ajax').colorbox();
				
				if($('#step').val()==1)
				{	
					//alert('qqqq');
					$('#addnew').css('display','block');
					$('#addnew2').css('display','block');
				}

			});
	</script>

    
     <script type="text/javascript">

        function delnotice(frm){
		
			if (confirm("Do you want to delete notice?")) {
				frm.submit();
			}
			return false;

		}

		function addbtn(){		
			$('#addnew').css('display','block');
		}
		function addcancel(){		
			$('#addnew').css('display','none');
		}
     </script>
