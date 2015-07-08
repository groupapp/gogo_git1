<?php
	$info	= empty($_GET["info"])?"":$_GET["info"];
	
	$DB 	= new myDB;
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('a[rel="vermont"]').colorbox();
	    $('a[rel="figueroa"]').colorbox();
	    $('a[rel="vannuys"]').colorbox();
	});
</script>
<div class="main-col1 col-md-9">
	<div class="page-title">
		<h1>
			<span>About Us</span>
		</h1>		
	</div>
	<div class="contents">
		<div class="sub1">
		<?php 
			$strSQL = "SELECT * From AboutUs Where IsActive='Y'";
			$DB->query($strSQL);
			while ($data = $DB->fetch_array($DB->res)){
				echo "<p class=\"p_general\">".nl2br($data["AboutUs"])."</p>";
			}
		?>
		</div>
		<!--<br/>
		<div class="sub2">
			<div class="title_sub">Store Location</div>
			<div class="line1">
				<div class="subLeft">
					<p class="p_general"><u>Vermont Store</u>: </p>
					<p class="p_general">154 S. Vermont Ave.<br/>
					Los Angeles, CA 90004<br/>
					Phone 1:  1-800-464-KICK<br/>
					Phone 2:  (213) 381-3011</p>
					<p class="p_general">Located 10 minutes from downtown Los Angeles</p>
					<p class="p_general">
						<a href="http://maps.google.com/maps?f=q&hl=en&geocode=&q=154+S.+Vermont+Ave.,+Los+Angeles,+CA+90004&sll=34.071449,-118.291662&sspn=0.015179,0.01869&layer=c&ie=UTF8&z=17&iwloc=addr&cbll=34.071482,-118.291677&panoid=Rxx-Pjx03vfTVtYv77kpgQ" target="_blank">
							Directions to this store
						</a>
					</p>
				</div>
				<div class="subRight">
					<p>
						<div class="photoborder">
							<a href="../Images/Store_Vermont2.gif" rel="vermont">
								<img src="../Images/Store_Vermont2.gif" height="90" class="photo"/>
							</a>
						</div>
						<div class="photoborder">
							<a href="../Images/Store_Vermont7.gif" rel="vermont">
								<img src="../Images/Store_Vermont7.gif" height="90" class="photo"/>
							</a>
						</div>
						<div class="photoborder">
							<a href="../Images/Store_Vermont8.gif" rel="vermont">
								<img src="../Images/Store_Vermont8.gif" height="90" class="photo"/>
							</a>
						</div>
						<div class="photoborder">
							<a href="../Images/Store_Vermont9.gif" rel="vermont">
								<img src="../Images/Store_Vermont9.gif" height="90" class="photo"/>
							</a>
						</div>
					</p>
				</div>
			</div>
			<div class="line2">
				<div class="subLeft">
					<p class="p_general"><u>Figueroa Store</u>: </p>
					<p class="p_general">3974 &frac12; S. Figueroa St.<br/>
					Los Angeles, CA 90037<br/>
					Phone:  (213) 749-0015</p>
					<p class="p_general">
						<a href="http://maps.google.com/maps?f=q&hl=en&geocode=&q=3974+S.+Figueroa+St.,+Los+Angeles,+CA+90037&sll=34.011874,-118.282722&sspn=0.007595,0.009345&layer=c&ie=UTF8&z=17&iwloc=addr&cbll=34.011844,-118.282746&panoid=Rxx-Pjx03vfTVtYv77kpgQ" target="_blank">
							Directions to this store
						</a>
					</p>
				</div>
				<div class="subRight">
					<p>
						<div class="photoborder">
							<a href="../Images/Store_Figueroa2.gif" rel="figueroa">
								<img src="../Images/Store_Figueroa2.gif" height="95" class="photo"/>
							</a>
						</div>
						<div class="photoborder">
							<a href="../Images/Store_Figueroa4.gif" rel="figueroa">
								<img src="../Images/Store_Figueroa4.gif" height="95" class="photo"/>
							</a>
						</div>
						<div class="photoborder">
							<a href="../Images/Store_Figueroa5.gif" rel="figueroa">
								<img src="../Images/Store_Figueroa5.gif" height="95" class="photo"/>
							</a>
						</div>
						<div class="photoborder">
							<a href="../Images/Store_Figueroa6.gif" rel="figueroa">
								<img src="../Images/Store_Figueroa6.gif" height="95" class="photo"/>
							</a>
						</div>
					</p>
				</div>
			</div>
			<div class="line3">
				<div class="subLeft">
					<p class="p_general"><u>Van Nuys Store</u>: </p>
					<p class="p_general">7068 Van Nuys Blvd.<br/>
					Van Nuys, CA 91405<br/>
					Phone:  (818) 376-1500</p>
					<p class="p_general">
						<a href="http://maps.google.com/maps?f=q&hl=en&geocode=&q=7068+Van+Nuys+Blvd.,+Van+Nuys,+CA+91405&sll=34.071454,-118.291653&sspn=0.00759,0.009345&layer=c&ie=UTF8&ll=34.191544,-118.44871&spn=0.007579,0.009345&z=17&iwloc=addr&cbll=34.19157,-118.448738&panoid=Rxx-Pjx03vfTVtYv77kpgQ" target="_blank">
							Directions to this store
						</a>
					</p>
				</div>
				<div class="subRight">
					<p>
						<div class="photoborder">
							<a href="../Images/Store_VanNuys2.gif" rel="vannuys">
								<img src="../Images/Store_VanNuys2.gif" class="photo"/>
							</a>
						</div>
						<div class="photoborder">
							<a href="../Images/Store_VanNuys4.gif" rel="vannuys">
								<img src="../Images/Store_VanNuys4.gif" class="photo"/>
							</a>
						</div>
						<div class="photoborder">
							<a href="../Images/Store_VanNuys5.gif" rel="vannuys">
								<img src="../Images/Store_VanNuys5.gif" class="photo"/>
							</a>
						</div>
						<div class="photoborder">
							<a href="../Images/Store_VanNuys6.gif" rel="vannuys">
								<img src="../Images/Store_VanNuys6.gif" class="photo"/>
							</a>
						</div>
					</p>
					</div>
			</div>
		</div>-->
		<div class="sub3">
			<div class="title_sub">Business hours</div>			
			<div class="subcontents">
				<p class="p_general"><b>Business hours</b> of the local Lemontreeclothing stores are:</p><br/>
			<?php 
				$strSQL = "SELECT * From BusinessHours";
				$DB->query($strSQL);
				while ($data = $DB->fetch_array($DB->res)){
					echo "<ul><li class=\"bullet\">".$data["BizHours"]."</li></ul>";
				}
			?>
			</div>
		</div>
	</div>
</div>

</div>
<!-- container CLOSE -->