<?php require_once("header.php"); ?>


	<!-- sideMenu -->
	<div class="path" style='display:none'>
	About Us</div>

	<div id="bodywrapper">
    
    <!-- sideMenu -->
		<div id="navLeft">
			<div style="font:bold 16px/1.2 Palatino Linotype;color:#aaa;">Lemontree Events
			</div>
			<div id="eventCalendarDefault" class="eventCalendar_wrap">
				<br/>
				<p>test</p>
				
			</div>
			
		</div>
		
		
		<!-- content right -->
		<div id="contwrapper">
			<div id="title">
				Send E-mail to Customers with / without Catalogues
			</div>
			<div id="sub1">
				<table style="width: 90%;">
					<form name="SendEmailForm" method="post" action="ManageSendEmailForm_action.php">			
						<input type="hidden" name="Action" value="SendEmail"/>
						<input type="hidden" name="EmailFrom" value="info@Lemontreeclothing.com"/>
						<tbody>
							<tr class="subject_border_top">
								<th class="subject2">Company</th>
								<td class="general">Lemontreeclothing</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">From E-mail Address</th>
								<td class="general">info@Lemontreeclothing.com</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">E-mail Subject</th>
								<td class="general">
									<input type="text" name="EmailSubject"/>
								</td>
							</tr>
							<tr class="thin_border_bottom">
								<th class="subject2">To E-mail Address(es)</th>
								<td class="general">
									<b>First, you have 2 choices for your e-mail recipients. </b><br/><br/>
									1. Enter the e-mail addresses of your choice: &nbsp;
									<input type="text" name="EmailTo1"/><br/>
									(For multiple e-mail addresses, separate them with a comma.)<br/><br/>
									2. Or, select a group of customers: &nbsp;
									<select name="EmailTo2" class="arial12">
										<option value="">Select:</option>
										<option value="Send to registered and active customers who agreed to receive news letters"> &nbsp; 1. Send to registered and active customers who agreed to receive news letters.</option>
										<option value="Send to unregistered customeras who just placed orders online"> &nbsp; 2. Send to unregistered customers who just placed orders online.</option>
										<option value="Send to unregistered customers who signed up for news letters"> &nbsp; 3. Send to unregistered customers who signed up for news letters.</option>
									</select><br/><br/>
									<b>Next, if you want to include a catalogue in this e-mail message, select one of the following catalogues.</b><br/><br/>
									<select name="CatalogueID" class="arial12">
										<option value="">Select a catalogue:</option>
										<option value="6">(1) PromotionalCatalogue_11032008 .....</option>
										<option value="4">(2) PromotionalCatalogue_1002208 .....</option>
									</select> (Optional)
								</td>
							</tr>
							<tr class="subject_border_bottom">
								<th class="subject2">E-mail Message<br/>(Write your message)</th>
								<td class="general">
									<select name="TextOrHtml">
										<option value="Text">Text</option>
										<option value="HTML">HTML</option>
									</select>
									(If you select HTML, you can use HTML codes in the message content below.)<br/><br/>
									<textarea name="EmailContent" rows="13" style="margin: 0px; width: 70%; height: 182px; "></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="general_c">
									<input type="submit" name="btnSendEmail" onclick="return SendEmailConfirm(this.form);" value="Send E-mail"/> 
									<input type="submit" name="btnReset" onclick="this.form.reset();return false; value="Reset"/>
								</td>
							</tr>
						</tbody>
					</form>
				</table>
				<p align="center">
					Completion of sending e-mail with a catalogue to a number of customers may take several to 30 minutes.
				</p>
			</div>
		
<?php require_once("footer.php"); ?>