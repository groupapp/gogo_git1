<?php
	$info	= empty($_GET["info"])?"":$_GET["info"];	
	$submit	= empty($_GET["submit"])?"":$_GET["submit"];
	
	$DB 	= new myDB;
?>

<div class="main-col1 col-md-9">
<?php 
	if($info=="contactus"){
?>
	<div class="page-title">
		<h1>
			<span>Contact Us</span>
		</h1>	
	</div>
	<div class="contents">
		<div class="sub1">
			<?php 
			}
			if($submit=="true"){
			?>
			<p class="p_general">Submit Complete!</p>
			<?php }else{?>
			<p class="redstar , p_general">If you are looking for our store addresses, directions (maps) and phone numbers, please go to 
			<a href="?info=aboutus">About Us</a> (click here, please).</p><br/>
			<p class="p_general">While you can always directly contact us via phone, you can also send us your messages through this page. We welcome your requests, questions, comments, opinions, and suggestions and will respond to your message via e-mail or phone.</p>
			
		</div>
		<br/>
		<div class="sub2">
			<p class="required">* Required Fields</p>
			<form name="form1" method="post" action="../lib/contactus_action.php">
				<input type="hidden" name="action" value="Submit"/>
				<input type="hidden" name="CustomerIP_Address" value="">
				<table class="table_jy">
					<tbody>
						<tr class="thin_border_bottom">
							<td class="subject2">Your Name: <span class="redstar">*</span></td>
							<td colspan="3" class="general">
								<input type="text" name="CustomerName" maxlength="50"/> (Ex: John Smith)
							</td>
						</tr>
						<tr class="thin_border_bottom">
							<td class="subject2">E-mail Address: <span class="redstar">*</span></td>
							<td  class="general"><input type="email" name="CustomerEmailAddress" maxlength="40"/></td>
							<td class="subject2">Phone Number:</td>
							<td  class="general"><input type="text" name="CustomerPhoneNumber" maxlength="20"/> (Ex: 337-456-1234)</td>
						</tr>
						<tr class="thin_border_bottom">
							<td class="subject2">Title / Subject: <span class="redstar">*</span></td>
							<td colspan="3"  class="general"><input type="text" name="Subject" maxlength="100" style="width: 100%;"/></td>
						</tr>
						<tr>
							<td class="subject2">Message: <span class="redstar">*</span></td>
							<td colspan="3"  class="general">
								<textarea name="Message" rows="16" style="width: 100%;"></textarea>
							</td>
						</tr>
					</tbody>
				</table>
				<p class="btns">
					<button type="button" name="btnSubmit" class="button" onclick="submitemail(this.form)">
						<span>Submit</span>
					</button>
					<input type="hidden" name="action" value="submit"/>
				</p>
			</form>
			<?php }?>
		</div>
	</div>
</div>

</div>
<!-- container CLOSE -->