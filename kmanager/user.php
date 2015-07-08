<?php


	require_once("../include/function.php");
	include("head.php");
	include("header.php");
	include("sidebar.php");

	$DB 	= new myDB;
	$DBa 	= new myDB;
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
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
			User Management <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Setting</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">User Management</a>
					</li>
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->


			<!-- BEGIN PAGE CONTENT-->
			
			
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						
						<!--<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Branch Select
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								</a>
							</div>
						</div>						
						<div class="portlet-body form">
							<form action="index.html" class="form-horizontal form-row-seperated">
								<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-3">Default</label>
										<div class="col-md-9">
											<select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]">
												<option>Dallas Cowboys</option>
												<option>New York Giants</option>
												<option selected>Philadelphia Eagles</option>
												<option selected>Washington Redskins</option>
												<option>Chicago Bears</option>
												<option>Detroit Lions</option>
												<option>Green Bay Packers</option>
												<option>Minnesota Vikings</option>
												<option selected>Atlanta Falcons</option>
												<option>Carolina Panthers</option>
												<option>New Orleans Saints</option>
												<option>Tampa Bay Buccaneers</option>
												<option>Arizona Cardinals</option>
												<option>St. Louis Rams</option>
												<option>San Francisco 49ers</option>
												<option>Seattle Seahawks</option>
											</select>
										</div>
									</div>									
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green"><i class="fa fa-check"></i> Submit</button>
											<button type="button" class="btn default">Cancel</button>
										</div>
									</div>
								</div>
							</form>							
						</div>-->

						
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>User Managed Table
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

							<div class="col-md-12" style="border-bottom: 1px solid #ccc;padding-bottom:10px;">
									<h4 class="page-title">
									Profile <small></small>
									</h4>
									<form enctype="multipart/form-data" action="user_action.php" method="post" role="form">
									<input type="hidden" name="action" value="self">
								<?php
								$strSQLa = "SELECT u.id_user,u.first_name,u.last_name,e.id_department,e.id_position,u.user_type,u.email,u.active,u.user_password,u.birthday FROM users u LEFT JOIN users_employee e ON u.id_user=e.id_user LEFT JOIN users_vendors v ON u.id_user=v.id_user WHERE u.email='".$_COOKIE["aduserID"]."'";
								//print_r($strSQLa);
								$DBa->query($strSQLa);
								while ($dataa = $DBa->fetch_array($DBa->res)){	
									echo '<input type="hidden" name="id_user" value="'.$dataa['id_user'].'">';
									echo '<div class="col-xs-3">
									<label for="name">First Name</label>
									<input type="text" name="first_name" class="form-control" value="'.$dataa['first_name'].'"/>
									</div>';
									echo '<div class="col-xs-3">
									<label for="name">First Name</label>
									<input type="text" name="last_name" class="form-control" value="'.$dataa['last_name'].'"/>
									</div>';
									echo '<div class="col-xs-3">
									<label for="name">Department</label>
									<input type="text" name="id_department" class="form-control" value="'.$dataa['id_department'].'"/>
									</div>';

									echo '<div class="col-xs-3">
									<label for="name">Position</label>
									<input type="text" name="id_position" class="form-control" value="'.$dataa['id_position'].'"/>
									</div>';

									echo '<div class="col-xs-3">
									<label for="name">Email</label>
									<input type="text" name="email" class="form-control" value="'.$dataa['email'].'"/>
									</div>';

									echo '<div class="col-xs-3">
									<label for="name">Password</label>
									<input type="password" name="user_password" class="form-control" value="'.$dataa['user_password'].'"/>
									</div>';

									echo '<div class="col-xs-3">
									<label for="name">Phone</label>
									<input type="text" name="phone" class="form-control" value=""/>
									</div>';
								}	
									
									
								?>
									<div class="col-xs-3">							
									<input style="margin-top: 25px;" type="submit" class="btn green" value="Save">
									</div>
								</form>
							</div>

						<form enctype="multipart/form-data" action="user_action.php" method="post" role="form">
							<div class="table-toolbar">
								<div class="row">

									

									<div class="col-md-6" style="margin-top:10px;margin-left:10px;">
										<div class="btn-group" style="">
											<a href="edit_user.php?action=add" class="ajax"><button id="sample_editable_1_new" class="btn green">
											Add New <i class="fa fa-plus"></i></a>
											</button>
										</div>
								
										<div class="btn-group">
											<button id="sample_editable_1_new" class="btn green" onclick="return delbang(this.form)">
											Delete </a>
											</button>
											<input type="hidden" name="action"  value="del"/>
										</div>
									</div>
									<div class="col-md-6">
										<div class="btn-group pull-right">
											<!--<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													Print </a>
												</li>
												<li>
													<a href="javascript:;">
													Save as PDF </a>
												</li>
												<li>
													<a href="javascript:;">
													Export to Excel </a>
												</li>
											</ul>-->
										</div>
									</div>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="sample_3">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox"  class="group-checkable" data-set="#sample_3 .checkboxes"/>
								</th>
								<th style="text-align: center;">
									 First Name
								</th>
								<th style="text-align: center;">
									 Last Name
								</th>
								<th style="text-align: center;">
									 Department
								</th>
								<th style="text-align: center;">
									 Type
								</th>								
								
								<th style="text-align: center;">
									 Position
								</th>
								<th style="text-align: center;">
									 Email
								</th>
								<th style="text-align: center;">
									 Active
								</th>
								<th style="text-align: center;">
									 Edit
								</th>
								
							</tr>
							</thead>
							<tbody>
							
							
						<?php
						$strSQL = "SELECT u.id_user,u.first_name,u.last_name,e.id_department,e.id_position,u.user_type,u.email,u.active FROM users u LEFT JOIN users_employee e ON u.id_user=e.id_user LEFT JOIN users_vendors v ON u.id_user=v.id_user WHERE u.email<>'".$_COOKIE["aduserID"]."'";
						
						//print_r($strSQL);
						
						$DB->query($strSQL);
						while ($data = $DB->fetch_array($DB->res)){
						
							echo '<tr class="odd gradeX">
								<td>
									<input type="checkbox" class="checkboxes" name="delid[]" value="'.$data['id_user'].'"/>
								</td>
								<td>
									 '.$data['first_name'].'
								</td>
								<td>
									'. $data['last_name'].'
								</td>
								<td>
									'. $data['id_department'].'
								</td>
								<td>
									'. $data['id_position'].'
								</td>
								<td>
									'. $data['user_type'].'
								</td>
								
								<td>
									 '. $data['email'].'
								</td>
								<td >';
								 if($data['active']=='1')
								 echo 'Y';
								 else
								 echo 'N';	
								 echo '</td>
								
								<td>
									<a href="edit_user.php?id_user='.$data['id_user'].'&action=update" class="ajax">
											<span class="btn green">Edit <i class="fa fa-pencil"></i></span></a>
											
								</td>
															
							</tr>';
							} ?>

							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
</form>
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
			});
	</script>

    
     <script type="text/javascript">

        function delbang(frm){
		
			if (confirm("Do you want to delete user?")) {
				frm.submit();
			}
			return false;

		}
     </script>
