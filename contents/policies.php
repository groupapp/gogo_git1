<?php
	$info	= $arrGet[0][1];
	$DB 	= new myDB;
?>
<div class="main-col1 col-md-9">
	<div class="page-title">
		<h1>
			<span>
			<?php
				if($info=="shippingpolicy"){
					echo "Free Shipping Policy";
				}elseif($info=="privacypolicy"){
					echo "Privacy Policy";
				}elseif($info=="returnpolicy"){
					echo "Return Policy";
				}
			?>
			</span>
		</h1>	
	</div>
	<div class="contents">
	<?php
		if($info=="shippingpolicy"){?>
            <!--<img src="/images/free_shipping3_100px.jpg" />
			<p class="p_jy"><u><b>How It Works:</b></u></p>-->
			<div class="subcontents">
				<ul class="free-shipping">
					<li class="bullet">Offer only applies to ground shipping.</li>
					<!--<li class="bullet">For Free Ground Shipping order must total $99.00 worth of Merchandise.</li>-->
					<li class="bullet">Offer is only valid on orders shipped to one address within the continental U.S. excludes Hawaii and Alaska.</li>
					<li class="bullet">Offer cannot be combined with any other promotional offer.</li>
					<li class="bullet">Excludes all Team Sales, such as Team Uniforms, shorts and socks.</li>
					<li class="bullet">Free Shipping does not include Heavy Items such as goals, Training Equipments and Field Training Equipments.</li>
					<li class="bullet">This promotional offer may be modified or terminated at any time without notice. Other exclusions may also apply.</li>
				</ul>
			</div>
			<br/>
			<p class="p_jy"><u><b></b></u></p>			
<?php	}elseif($info=="privacypolicy"){
			echo "<div class=\"subcontents\">";
			$strSQL = "SELECT * From PrivacyPolicy Where IsActive='Y'";
			$DB->query($strSQL);
			while ($data = $DB->fetch_array($DB->res)){
				echo "<p class=\"p_general\">".nl2br($data["PrivacyPolicy"])."</p>";
			}
			echo "</div>";
		}elseif($info=="returnpolicy"){
			
			$strSQL = "SELECT * From ReturnPolicy ORDER BY PriorityNo";
			$DB->query($strSQL);
			while ($data = $DB->fetch_array($DB->res)){
				echo "<div class=\"subcontents\">";
				echo "<p class=\"p_general\">".nl2br($data["ReturnPolicy"])."</p>";
				echo "</div>";
			}
			
		}
	?>
	</div>
</div>

</div>
<!-- container CLOSE -->