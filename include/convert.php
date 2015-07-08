<style>
	.converttable{
		padding: 10px;
		width: 722px;
		color: Black; 
		border: solid 1px #e8e8e8;
		font: normal 12px/1.4 Arial, Helvetica, Sans-serif;
	}
	
	.converttable td{
		vertical-align: middle;
		text-align: right;
		padding: 0 10px 10px 10px;
	}
	
	.converttable td h1{
		text-align: left;
		padding: 10px 0 0 10px;
	}
	
	.converttable td hr{
		margin: 10px 0;
		color:white; 
		height:1px;
	}
	
	.converttable td select{
		border: solid 2px #e8e8e8;
	}
</style>
<script type="text/javascript">
	function convertAdult(val) {
		var names = new Array("EuropeMen", "UKMen", "USMen", "AusMen", "MexicoMen", "JapanMen", "KoreaMen", "MondoMen", "InchesMen", "CentimeterMen");
		for(i = 0; i<names.length; i++)
		{
			if (names[i].toString() != val) {
				if (names[i].toString() != "MexicoMen") {
					document.getElementById(names[i].toString()).selectedIndex = document.getElementById(val).selectedIndex;
					document.getElementById(names[i].toString()).style.borderWidth = "2px";
					document.getElementById(names[i].toString()).style.borderColor = "Orange";
					document.getElementById(names[i].toString()).style.borderStyle = "Solid";
				}
				else {
					if (document.getElementById(val).selectedIndex < 4) {
						document.getElementById("MexicoMen").selectedIndex = 0;
						document.getElementById(names[i].toString()).style.borderWidth = "2px";
						document.getElementById(names[i].toString()).style.borderColor = "Orange";
						document.getElementById(names[i].toString()).style.borderStyle = "Solid";
					}
					else {
						document.getElementById("MexicoMen").selectedIndex = document.getElementById(val).selectedIndex - 4;
						document.getElementById(names[i].toString()).style.borderWidth = "2px";
						document.getElementById(names[i].toString()).style.borderColor = "Orange";
						document.getElementById(names[i].toString()).style.borderStyle = "Solid";
					}
				}
			}
		}
		document.getElementById(val).style.borderWidth = "2px";
		document.getElementById(val).style.borderColor = "#005eb6";
		document.getElementById(val).style.borderStyle = "Solid";
	}

	function convertAdult2(val) {
		var names = new Array("EuropeWomen", "UKWomen", "USWomen", "AusWomen", "MexicoWomen", "JapanWomen", "KoreaWomen", "MondoWomen", "InchesWomen", "CentimeterWomen");
		for (i = 0; i < names.length; i++) {
			if (names[i].toString() != val) {
				if (names[i].toString() != "MexicoWomen") {
					document.getElementById(names[i].toString()).selectedIndex = document.getElementById(val).selectedIndex;
					document.getElementById(names[i].toString()).style.borderWidth = "2px";
					document.getElementById(names[i].toString()).style.borderColor = "Orange";
					document.getElementById(names[i].toString()).style.borderStyle = "Solid";
				}
				else {
					if (document.getElementById(val).selectedIndex < 4) {
						document.getElementById("MexicoWomen").selectedIndex = 0;
						document.getElementById(names[i].toString()).style.borderWidth = "2px";
						document.getElementById(names[i].toString()).style.borderColor = "Orange";
						document.getElementById(names[i].toString()).style.borderStyle = "Solid";
					}
					else {
						document.getElementById("MexicoWomen").selectedIndex = document.getElementById(val).selectedIndex - 4;
						document.getElementById(names[i].toString()).style.borderWidth = "2px";
						document.getElementById(names[i].toString()).style.borderColor = "Orange";
						document.getElementById(names[i].toString()).style.borderStyle = "Solid";
					}
				}
			}
		}
		document.getElementById(val).style.borderWidth = "2px";
		document.getElementById(val).style.borderColor = "#005eb6";
		document.getElementById(names[i].toString()).style.borderStyle = "Solid";
	}

	function convertBoy(val) {
		var names = new Array("EuropeBoy", "UKBoy", "USBoy", "JapanBoy");
		for(i = 0; i<names.length; i++)
		{
			if (names[i].toString() != val) {
					document.getElementById(names[i].toString()).selectedIndex = document.getElementById(val).selectedIndex;
					document.getElementById(names[i].toString()).style.borderWidth = "2px";
					document.getElementById(names[i].toString()).style.borderColor = "Orange";
					document.getElementById(names[i].toString()).style.borderStyle = "Solid";
			}
		}
		document.getElementById(val).style.borderWidth = "2px";
		document.getElementById(val).style.borderColor = "#005eb6";
		document.getElementById(val).style.borderStyle = "Solid";
	}

	function convertGirl(val) {
		var names = new Array("EuropeGirl", "UKGirl", "USGirl", "JapanGirl");
		for (i = 0; i < names.length; i++) {
			if (names[i].toString() != val) {
				document.getElementById(names[i].toString()).selectedIndex = document.getElementById(val).selectedIndex;
				document.getElementById(names[i].toString()).style.borderWidth = "2px";
				document.getElementById(names[i].toString()).style.borderColor = "Orange";
				document.getElementById(names[i].toString()).style.borderStyle = "Solid";
			}
		}
		document.getElementById(val).style.borderWidth = "2px";
		document.getElementById(val).style.borderColor = "#005eb6";
		document.getElementById(val).style.borderStyle = "Solid";
	}

	function convertToddler(val) {
		var names = new Array("USToddler", "EuropeToddler", "UKToddler", "AsiaToddler");
		for (i = 0; i < names.length; i++) {
			if (names[i].toString() != val) {
				document.getElementById(names[i].toString()).selectedIndex = document.getElementById(val).selectedIndex;
				document.getElementById(names[i].toString()).style.borderWidth = "2px";
				document.getElementById(names[i].toString()).style.borderColor = "Orange";
				document.getElementById(names[i].toString()).style.borderStyle = "Solid";
			}
		}
		document.getElementById(val).style.borderWidth = "2px";
		document.getElementById(val).style.borderColor = "#005eb6";
		document.getElementById(val).style.borderStyle = "Solid";
	}
</script>
<?php if($data["ForMenOrWomen"]=="Men" || $data["ForMenOrWomen"]=="All" || $data["ForMenOrWomen"]=="Adults" || $data["ForMenOrWomen"]=="Youth and Adults"){?>
<table class="converttable" id="tbMen">
	<tr>
		<td colspan="5" valign="middle">
			<h1>Shoe Size Converter for <?php echo $data["ForMenOrWomen"];?></h1>
			<hr/>
		</td>
	</tr>
	<tr>
		<td>
			US & Canada: 
			<select name="USMen" id="USMen" onchange="convertAdult('USMen')">
				<option label="3½" value="3.5" title="3&frac12;" id="USMen_35" >3&frac12;</option>
				<option label="4" value="4" title="4" id="USMen_4">4</option>
				<option label="4½" value="4.5" title="4&frac12;" id="USMen_45">4&frac12;</option>
				<option label="5" value="5" title="5" id="USMen_5">5</option>
				<option label="5½" value="5.5" title="5&frac12;" id="USMen_55">5&frac12;</option>
				<option label="6" value="6" title="6" id="USMen_6">6</option>
				<option label="6½" value="6.5" title="6&frac12;" id="USMen_65">6&frac12;</option>
				<option label="7" value="7" title="7" id="USMen_7">7</option>
				<option label="7½" value="7.5" title="7&frac12;" id="USMen_75">7&frac12;</option>
				<option label="8" value="8" title="8" id="USMen_8">8</option>
				<option label="8½" value="8.5" title="8&frac12;" id="USMen_85">8&frac12;</option>
				<option label="9" value="9" title="9" id="USMen_9">9</option>
				<option label="9&frac12;" value="9&frac12;" title="9&frac12;" id="USMen_95;">9&frac12;</option>
				<option label="10" value="10" title="10" id="USMen_10">10</option>
				<option label="10½" value="10.5" title="10&frac12;" id="USMen_105">10&frac12;</option>
				<option label="11" value="11" title="11" id="USMen_11">11</option>
				<option label="11½" value="11.5" title="11&frac12;" id="USMen_115">11&frac12;</option>
				<option label="12" value="12" title="12" id="USMen_12">12</option>
				<option label="12½" value="12.5" title="12&frac12;" id="USMen_125">12&frac12;</option>
				<option label="13" value="13" title="13" id="USMen_13">13</option>
				<option label="13½" value="13.5" title="13&frac12;" id="USMen_135">13&frac12;</option>
				<option label="14" value="14" title="14" id="USMen_14">14</option>
			</select>
		</td>
		<td>
			Europe:
			<select name="EuropeMen" id="EuropeMen" onchange="convertAdult('EuropeMen')">
				<option label="35" value="35" title="35" id="EuropeMen_35" >35</option>
				<option label="35½" value="35.5" title="35&frac12;" id="EuropeMen_355">35&frac12;</option>
				<option label="36" value="36" title="36" id="EuropeMen_36">36</option>
				<option label="37" value="37" title="37" id="EuropeMen_37">37</option>
				<option label="37½" value="37.5" title="37&frac12;" id="EuropeMen_375">37&frac12;</option>
				<option label="38" value="38" title="38" id="EuropeMen_38">38</option>
				<option label="38½" value="38.5" title="38&frac12;" id="EuropeMen_385">38&frac12;</option>
				<option label="39" value="39" title="39" id="EuropeMen_39">39</option>
				<option label="40" value="40" title="40" id="EuropeMen_40">40</option>
				<option label="41" value="41" title="41" id="EuropeMen_41">41</option>
				<option label="42" value="42" title="42" id="EuropeMen_42">42</option>
				<option label="43" value="43" title="43" id="EuropeMen_43">43</option>
				<option label="43&frac12;" value="43&frac12;" title="43&frac12;" id="EuropeMen_43&frac12;">43&frac12;</option>
				<option label="44" value="44" title="44" id="EuropeMen_44">44</option>
				<option label="44&frac12;" value="44&frac12;" title="44&frac12;" id="EuropeMen_44&frac12;">44&frac12;</option>
				<option label="45" value="45" title="45" id="EuropeMen_45">45</option>
				<option label="45½" value="45.5" title="45&frac12;" id="EuropeMen_455">45&frac12;</option>
				<option label="46" value="46" title="46" id="EuropeMen_46">46</option>
				<option label="46½" value="46.5" title="46&frac12;" id="EuropeMen_465">46&frac12;</option>
				<option label="47" value="47" title="47" id="EuropeMen_47">47</option>
				<option label="47½" value="47.5" title="47&frac12;" id="EuropeMen_475">47&frac12;</option>
				<option label="48½" value="48.5" title="48&frac12;" id="EuropeMen_485">48&frac12;</option>
			</select>
		</td>
		<td>
			UK: 
			<select name="UKMen" id="UKMen" onchange="convertAdult('UKMen')">															
				<option label="3" value="3" title="3" id="UKMen_3" >3</option>
				<option label="3½" value="3.5" title="3&frac12;" id="UKMen_35">3&frac12;</option>
				<option label="4" value="4" title="4" id="UKMen_4">4</option>
				<option label="4½" value="4.5" title="4&frac12;" id="UKMen_45">4&frac12;</option>
				<option label="5" value="5" title="5" id="UKMen_5">5</option>
				<option label="5½" value="5.5" title="5&frac12;" id="UKMen_55">5&frac12;</option>
				<option label="6" value="6" title="6" id="UKMen_6">6</option>
				<option label="6½" value="6.5" title="6&frac12;" id="UKMen_65">6&frac12;</option>
				<option label="7" value="7" title="7" id="UKMen_7">7</option>
				<option label="7½" value="7.5" title="7&frac12;" id="UKMen_75">7&frac12;</option>
				<option label="8" value="8" title="8" id="UKMen_8">8</option>
				<option label="8½" value="8.5" title="8&frac12;" id="UKMen_85">8&frac12;</option>
				<option label="9" value="9" title="9" id="UKMen_9">9</option>
				<option label="9½" value="9.5" title="9&frac12;" id="UKMen_95">9&frac12;</option>
				<option label="10" value="10" title="10" id="UKMen_10">10</option>
				<option label="10½" value="10.5" title="10&frac12;" id="UKMen_105">10&frac12;</option>
				<option label="11" value="11" title="11" id="UKMen_11">11</option>
				<option label="11½" value="11.5" title="11&frac12;" id="UKMen_115">11&frac12;</option>
				<option label="12" value="12" title="12" id="UKMen_12">12</option>
				<option label="12½" value="12.5" title="12&frac12;" id="UKMen_125">12&frac12;</option>
				<option label="13" value="13" title="13" id="UKMen_13">13</option>
				<option label="13½" value="13.5" title="13&frac12;" id="UKMen_135">13&frac12;</option>
			</select>
		</td>
		<td>
			Australia: 
			<select name="AusMen" id="AusMen" onchange="convertAdult('AusMen')">
				<option label="3" value="3" title="3" id="AusMen_3" >3</option>
				<option label="3½" value="3.5" title="3&frac12;" id="AusMen_35">3&frac12;</option>
				<option label="4" value="4" title="4" id="AusMen_4">4</option>
				<option label="4½" value="4.5" title="4&frac12;" id="AusMen_45">4&frac12;</option>
				<option label="5" value="5" title="5" id="AusMen_5">5</option>
				<option label="5½" value="5.5" title="5&frac12;" id="AusMen_55">5&frac12;</option>
				<option label="6" value="6" title="6" id="AusMen_6">6</option>
				<option label="6½" value="6.5" title="6&frac12;" id="AusMen_65">6&frac12;</option>
				<option label="7" value="7" title="7" id="AusMen_7">7</option>
				<option label="7½" value="7.5" title="7&frac12;" id="AusMen_75">7&frac12;</option>
				<option label="8" value="8" title="8" id="AusMen_8">8</option>
				<option label="8½" value="8.5" title="8&frac12;" id="AusMen_85">8&frac12;</option>
				<option label="9" value="9" title="9" id="AusMen_9">9</option>
				<option label="9½" value="9.5" title="9&frac12;" id="AusMen_95">9&frac12;</option>
				<option label="10" value="10" title="10" id="AusMen_10">10</option>
				<option label="10½" value="10.5" title="10&frac12;" id="AusMen_105">10&frac12;</option>
				<option label="11" value="11" title="11" id="AusMen_11">11</option>
				<option label="11½" value="11.5" title="11&frac12;" id="AusMen_115">11&frac12;</option>
				<option label="12" value="12" title="12" id="AusMen_12">12</option>
				<option label="12½" value="12.5" title="12&frac12;" id="AusMen_125">12&frac12;</option>
				<option label="13" value="13" title="13" id="AusMen_13">13</option>
				<option label="13½" value="13.5" title="13&frac12;" id="AusMen_135">13&frac12;</option>
			</select>
		</td>
		<td>
			Mexico: 
			<select name="MexicoMen" id="MexicoMen" onchange="convertAdult('MexicoMen')">
				<option label="NA" value="NA" title="NA" id="MexicoMen_NA" >NA</option>
				<option label="4.5" value="4.5" title="4.5" id="MexicoMen_45">4.5</option>
				<option label="5" value="5" title="5" id="MexicoMen_5">5</option>
				<option label="5.5" value="5.5" title="5.5" id="MexicoMen_55">5.5</option>
				<option label="6" value="6" title="6" id="MexicoMen_6">6</option>
				<option label="6.5" value="6.5" title="6.5" id="MexicoMen_65">6.5</option>
				<option label="7" value="7" title="7" id="MexicoMen_7">7</option>
				<option label="7.5" value="7.5" title="7.5" id="MexicoMen_75">7.5</option>
				<option label="8" value="8" title="8" id="MexicoMen_8">8</option>
				<option label="8.5" value="8.5" title="8.5" id="MexicoMen_85">8.5</option>
				<option label="9" value="9" title="9" id="MexicoMen_9">9</option>
				<option label="9.5" value="9.5" title="9.5" id="MexicoMen_95">9.5</option>
				<option label="10" value="10" title="10" id="MexicoMen_10">10</option>
				<option label="10.5" value="10.5" title="10.5" id="MexicoMen_105">10.5</option>
				<option label="11" value="11" title="11" id="MexicoMen_11">11</option>
				<option label="11.5" value="11.5" title="11.5" id="MexicoMen_115">11.5</option>
				<option label="12" value="12" title="12" id="MexicoMen_12">12</option>
				<option label="12.5" value="12.5" title="12.5" id="MexicoMen_12.5">12.5</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Japan: 
			<select name="JapanMen" id="JapanMen" onchange="convertAdult('JapanMen')">
				<option label="21.5" value="21.5" title="21.5" id="JapanMen_215" >21.5</option>
				<option label="22" value="22" title="22" id="JapanMen_22">22</option>
				<option label="22.5" value="22.5" title="22.5" id="JapanMen_225">22.5</option>
				<option label="23" value="23" title="23" id="JapanMen_23">23</option>
				<option label="23.5" value="23.5" title="23.5" id="JapanMen_235">23.5</option>
				<option label="24" value="24" title="24" id="JapanMen_24">24</option>
				<option label="24.5" value="24.5" title="24.5" id="JapanMen_245">24.5</option>
				<option label="25" value="25" title="25" id="JapanMen_25">25</option>
				<option label="25.5" value="25.5" title="25.5" id="JapanMen_255">25.5</option>
				<option label="26" value="26" title="26" id="JapanMen_26">26</option>
				<option label="26.5" value="26.5" title="26.5" id="JapanMen_265">26.5</option>
				<option label="27" value="27" title="27" id="JapanMen_27">27</option>
				<option label="27.5" value="27.5" title="27.5" id="JapanMen_275">27.5</option>
				<option label="28" value="28" title="28" id="JapanMen_28">28</option>
				<option label="28.5" value="28.5" title="28.5" id="JapanMen_285">28.5</option>
				<option label="29" value="29" title="29" id="JapanMen_29">29</option>
				<option label="29.5" value="29.5" title="29.5" id="JapanMen_295">29.5</option>
				<option label="30" value="30" title="30" id="JapanMen_30">30</option>
				<option label="30.5" value="30.5" title="30.5" id="JapanMen_305">30.5</option>
				<option label="31" value="31" title="31" id="JapanMen_31">31</option>
				<option label="31.5" value="31.5" title="31.5" id="JapanMen_315">31.5</option>
				<option label="32" value="32" title="32" id="JapanMen_32">32</option>
			</select>
		</td>
		<td>
			Korea: 
			<select name="KoreaMen" id="KoreaMen" onchange="convertAdult('KoreaMen')">
				<option label="228" value="228" title="228" id="KoreaMen_228" >228</option>
				<option label="231" value="231" title="231" id="KoreaMen_231">231</option>
				<option label="235" value="235" title="235" id="KoreaMen_235">235</option>
				<option label="238" value="238" title="238" id="KoreaMen_238">238</option>
				<option label="241" value="241" title="241" id="KoreaMen_241">241</option>
				<option label="245" value="245" title="245" id="KoreaMen_245">245</option>
				<option label="248" value="248" title="248" id="KoreaMen_248">248</option>
				<option label="251" value="251" title="251" id="KoreaMen_251">251</option>
				<option label="254" value="254" title="254" id="KoreaMen_254">254</option>
				<option label="257" value="257" title="257" id="KoreaMen_257">257</option>
				<option label="260" value="260" title="260" id="KoreaMen_260">260</option>
				<option label="264" value="264" title="264" id="KoreaMen_260">264</option>
				<option label="267" value="267" title="267" id="KoreaMen_267">267</option>
				<option label="270" value="270" title="270" id="KoreaMen_270">270</option>
				<option label="273" value="273" title="273" id="KoreaMen_273">273</option>
				<option label="276" value="276" title="276" id="KoreaMen_276">276</option>
				<option label="279" value="279" title="279" id="KoreaMen_279">279</option>
				<option label="283" value="283" title="283" id="KoreaMen_283">283</option>
				<option label="286" value="286" title="286" id="KoreaMen_286">286</option>
				<option label="289" value="289" title="289" id="KoreaMen_289">289</option>
				<option label="292" value="292" title="292" id="KoreaMen_292">292</option>
				<option label="295" value="295" title="295" id="KoreaMen_295">295</option>
			</select>
		</td>
		<td>
			Mondopoint: 
			<select name="MondoMen" id="MondoMen" onchange="convertAdult('MondoMen')">
				<option label="228" value="228" title="228" id="MondoMen_228">228</option>
				<option label="231" value="231" title="231" id="MondoMen_231">231</option>
				<option label="235" value="235" title="235" id="MondoMen_235">235</option>
				<option label="238" value="238" title="238" id="MondoMen_238">238</option>
				<option label="241" value="241" title="241" id="MondoMen_241">241</option>
				<option label="245" value="245" title="245" id="MondoMen_245">245</option>
				<option label="248" value="248" title="248" id="MondoMen_248">248</option>
				<option label="251" value="251" title="251" id="MondoMen_251">251</option>
				<option label="254" value="254" title="254" id="MondoMen_254">254</option>
				<option label="257" value="257" title="257" id="MondoMen_257">257</option>
				<option label="260" value="260" title="260" id="MondoMen_260">260</option>
				<option label="263" value="263" title="263" id="MondoMen_263">263</option>
				<option label="267" value="267" title="267" id="MondoMen_267">267</option>
				<option label="270" value="270" title="270" id="MondoMen_270">270</option>
				<option label="273" value="273" title="273" id="MondoMen_273">273</option>
				<option label="276" value="276" title="276" id="MondoMen_276">276</option>
				<option label="279" value="279" title="279" id="MondoMen_279">279</option>
				<option label="283" value="283" title="283" id="MondoMen_283">283</option>
				<option label="286" value="286" title="286" id="MondoMen_286">286</option>
				<option label="289" value="289" title="289" id="MondoMen_289">289</option>
				<option label="292" value="292" title="292" id="MondoMen_292">292</option>
				<option label="295" value="295" title="295" id="MondoMen_295">295</option>
			</select>
		</td>
		<td>
			Inches: 
			<select name="InchesMen" id="InchesMen" onchange="convertAdult('InchesMen')">
				<option label="9" value="9" title="9" id="InchesMen_9">9</option>
				<option label="9.125" value="9.125" title="9.125" id="InchesMen_9125">9.125</option>
				<option label="9.25" value="9.25" title="9.25" id="InchesMen_925">9.25</option>
				<option label="9.375" value="9.375" title="9.375" id="InchesMen_9375">9.375</option>
				<option label="9.5" value="9.5" title="9.5" id="InchesMen_95">9.5</option>
				<option label="9.625" value="9.625" title="9.625" id="InchesMen_9625">9.625</option>
				<option label="9.75" value="9.75" title="9.75" id="InchesMen_975">9.75</option>
				<option label="9.875" value="9.875" title="9.875" id="InchesMen_9875">9.875</option>
				<option label="10" value="10" title="10" id="InchesMen_10">10</option>
				<option label="10.125" value="10.125" title="10.125" id="InchesMen_10125">10.125</option>
				<option label="10.25" value="10.25" title="10.25" id="InchesMen_1025">10.25</option>
				<option label="10.375" value="10.375" title="10.375" id="InchesMen_10375">10.375</option>
				<option label="10.5" value="10.5" title="10.5" id="InchesMen_105">10.5</option>
				<option label="10.625" value="10.625" title="10.625" id="InchesMen_10625">10.625</option>
				<option label="10.75" value="10.75" title="10.75" id="InchesMen_1075">10.75</option>
				<option label="10.875" value="10.875" title="10.875" id="InchesMen_10875">10.875</option>
				<option label="11" value="11" title="11" id="InchesMen_11">11</option>
				<option label="11.125" value="11.125" title="11.125" id="InchesMen_11125">11.125</option>
				<option label="11.25" value="11.25" title="11.25" id="InchesMen_1125">11.25</option>
				<option label="11.375" value="11.375" title="11.375" id="InchesMen_11375">11.375</option>
				<option label="11.5" value="11.5" title="11.5" id="InchesMen_115">11.5</option>
				<option label="11.625" value="11.625" title="11.625" id="InchesMen_11625">11.625</option>
			</select>
		</td>
		<td>
			Centimeter: 
			<select name="CentimeterMen" id="CentimeterMen" onchange="convertAdult('CentimeterMen')">
				<option label="22.8" value="22.8" title="22.8" id="CentimeterMen_228">22.8</option>
				<option label="23.1" value="23.1" title="23.1" id="CentimeterMen_231">23.1</option>
				<option label="23.5" value="23.5" title="23.5" id="CentimeterMen_235">23.5</option>
				<option label="23.8" value="23.8" title="23.8" id="CentimeterMen_238">23.8</option>
				<option label="24.1" value="24.1" title="24.1" id="CentimeterMen_241">24.1</option>
				<option label="24.5" value="24.5" title="24.5" id="CentimeterMen_245">24.5</option>
				<option label="24.8" value="24.8" title="24.8" id="CentimeterMen_248">24.8</option>
				<option label="25.1" value="25.1" title="25.1" id="CentimeterMen_251">25.1</option>
				<option label="25.4" value="25.4" title="25.4" id="CentimeterMen_254">25.4</option>
				<option label="25.7" value="25.7" title="25.7" id="CentimeterMen_257">25.7</option>
				<option label="26.0" value="26.0" title="26.0" id="CentimeterMen_260">26.0</option>
				<option label="26.4" value="26.4" title="26.4" id="CentimeterMen_264">26.4</option>
				<option label="26.7" value="26.7" title="26.7" id="CentimeterMen_267">26.7</option>
				<option label="26.99" value="26.99" title="26.99" id="CentimeterMen_2699">26.99</option>
				<option label="27.3" value="27.3" title="27.3" id="CentimeterMen_273">27.3</option>
				<option label="27.62" value="27.62" title="27.62" id="CentimeterMen_2762">27.62</option>
				<option label="27.9" value="27.9" title="27.9" id="CentimeterMen_279">27.9</option>
				<option label="28.26" value="28.26" title="28.26" id="CentimeterMen_2826">28.26</option>
				<option label="28.6" value="28.6" title="28.6" id="CentimeterMen_286">28.6</option>
				<option label="28.89" value="28.89" title="28.89" id="CentimeterMen_2889">28.89</option>
				<option label="29.2" value="29.2" title="29.2" id="CentimeterMen_292">29.2</option>
				<option label="29.53" value="29.53" title="29.53" id="CentimeterMen_2953">29.53</option>
			</select>
		</td>
	</tr>
</table>
<?php }elseif($data["ForMenOrWomen"]=="Women" || $data["ForMenOrWomen"]=="Girls and Women"){?>
<table class="converttable" id="tbWomen">
	<tr>
		<td colspan="5">
			<h1>Shoe Size Converter for <?php echo $data["ForMenOrWomen"];?></h1>
			<hr>
		</td>
	</tr>
	<tr>
		<td>
			US & Canada: 
			<select name="USWomen" id="USWomen" onchange="convertAdult2('USWomen')">                
				<option label="5" value="5" title="5" id="USWomen_5">5</option>
				<option label="5½" value="5.5" title="5&frac12;" id="USWomen_55">5&frac12;</option>
				<option label="6" value="6" title="6" id="USWomen_6">6</option>
				<option label="6½" value="6.5" title="6&frac12;" id="USWomen_65">6&frac12;</option>
				<option label="7" value="7" title="7" id="USWomen_7">7</option>
				<option label="7½" value="7.5" title="7&frac12;" id="USWomen_75">7&frac12;</option>
				<option label="8" value="8" title="8" id="USWomen_8">8</option>
				<option label="8½" value="8.5" title="8&frac12;" id="USWomen_85">8&frac12;</option>
				<option label="9" value="9" title="9" id="USWomen_9">9</option>
				<option label="9.5" value="9.5" title="9.5" id="USWomen_95">9.5</option>
				<option label="10" value="10" title="10" id="USWomen_10">10</option>
				<option label="10½" value="10.5" title="10&frac12;" id="USWomen_105">10&frac12;</option>
				<option label="12" value="12" title="12" id="USWomen_12">12</option>
				<option label="13" value="13" title="13" id="USWomen_13">13</option>
				<option label="14" value="14" title="14" id="USWomen_14">14</option>
				<option label="15½" value="15.5" title="15&frac12;" id="USWomen_155">15&frac12;</option>
			</select>
		</td>
		<td>
			Europe: 
			<select name="EuropeWomen" id="EuropeWomen" onchange="convertAdult2('EuropeWomen')">
				<option label="35" value="35" title="35" id="EuropeWomen_35" >35</option>
				<option label="35½" value="35.5" title="35&frac12;" id="EuropeWomen_355">35&frac12;</option>
				<option label="36" value="36" title="36" id="EuropeWomen_36">36</option>
				<option label="37" value="37" title="37" id="EuropeWomen_37">37</option>
				<option label="37½" value="37.5" title="37&frac12;" id="EuropeWomen_375">37&frac12;</option>
				<option label="38" value="38" title="38" id="EuropeWomen_38">38</option>
				<option label="38½" value="38.5" title="38&frac12;" id="EuropeWomen_385">38&frac12;</option>
				<option label="39" value="39" title="39" id="EuropeWomen_39">39</option>
				<option label="40" value="40" title="40" id="EuropeWomen_40">40</option>
				<option label="41" value="41" title="41" id="EuropeWomen_41">41</option>
				<option label="42" value="42" title="42" id="EuropeWomen_42">42</option>
				<option label="43" value="43" title="43" id="EuropeWomen_43">43</option>
				<option label="44" value="44" title="44" id="EuropeWomen_44">44</option>
				<option label="45" value="45" title="45" id="EuropeWomen_45">45</option>
				<option label="46½" value="46.5" title="46&frac12;" id="EuropeWomen_465">46&frac12;</option>
				<option label="48½" value="48.5" title="48&frac12;" id="EuropeWomen_485">48&frac12;</option>
			</select>
		</td>
		<td>
			UK: 
			<select name="UKWomen" id="UKWomen" onchange="convertAdult2('UKWomen')">															
				<option label="2.5" value="2.5" title="2.5" id="UKWomen_25" >2.5</option>
				<option label="3" value="3" title="3" id="UKWomen_3" >3</option>
				<option label="3½" value="3.5" title="3&frac12;" id="UKWomen_35">3&frac12;</option>
				<option label="4" value="4" title="4" id="UKWomen_4">4</option>
				<option label="4½" value="4.5" title="4&frac12;" id="UKWomen_45">4&frac12;</option>
				<option label="5" value="5" title="5" id="UKWomen_5">5</option>
				<option label="5½" value="5.5" title="5&frac12;" id="UKWomen_55">5&frac12;</option>
				<option label="6" value="6" title="6" id="UKWomen_6">6</option>
				<option label="6½" value="6.5" title="6&frac12;" id="UKWomen_65">6&frac12;</option>
				<option label="7" value="7" title="7" id="UKWomen_7">7</option>
				<option label="7½" value="7.5" title="7&frac12;" id="UKWomen_75">7&frac12;</option>
				<option label="8" value="8" title="8" id="UKWomen_8">8</option>
				<option label="9.5" value="9.5" title="9.5" id="UKWomen_95">9.5</option>
				<option label="10.5" value="10.5" title="10.5" id="UKWomen_105">10.5</option>
				<option label="11.5" value="11.5" title="11.5" id="UKWomen_115">11.5</option>
				<option label="13" value="13" title="13" id="UKWomen_13">13</option>
			</select>
		</td>
		<td>
			Australia: 
			<select name="AusWomen" id="AusWomen" onchange="convertAdult2('AusWomen')">                
				<option label="3½" value="3.5" title="3&frac12;" id="AusWomen_35">3&frac12;</option>
				<option label="4" value="4" title="4" id="AusWomen_4">4</option>
				<option label="4½" value="4.5" title="4&frac12;" id="AusWomen_45">4&frac12;</option>
				<option label="5" value="5" title="5" id="AusWomen_5">5</option>
				<option label="5½" value="5.5" title="5&frac12;" id="AusWomen_55">5&frac12;</option>
				<option label="6" value="6" title="6" id="AusWomen_6">6</option>
				<option label="6½" value="6.5" title="6&frac12;" id="AusWomen_65">6&frac12;</option>
				<option label="7" value="7" title="7" id="AusWomen_7">7</option>
				<option label="7½" value="7.5" title="7&frac12;" id="AusWomen_75">7&frac12;</option>
				<option label="8" value="8" title="8" id="AusWomen_8">8</option>
				<option label="8½" value="8.5" title="8&frac12;" id="AusWomen_85">8&frac12;</option>
				<option label="9" value="9" title="9" id="AusWomen_9">9</option>
				<option label="10.5" value="10.5" title="10.5" id="AusWomen_105">10.5</option>
				<option label="11.5" value="11.5" title="11.5" id="AusWomen_115">11.5</option>
				<option label="12.5" value="12.5" title="12.5" id="AusWomen_125">12.5</option>
				<option label="14" value="14" title="14" id="AusWomen_14">14</option>
			</select>
		</td>
		<td>
			Mexico: 
			<select name="MexicoWomen" id="MexicoWomen" onchange="convertAdult2('MexicoWomen')">
				<option label="NA" value="NA" title="NA" id="MexicoWomen_NA" >NA</option>
				<option label="4.5" value="4.5" title="4.5" id="MexicoWomen_45">4.5</option>
				<option label="5" value="5" title="5" id="MexicoWomen_5">5</option>
				<option label="5.5" value="5.5" title="5.5" id="MexicoWomen_55">5.5</option>
				<option label="6" value="6" title="6" id="MexicoWomen_6">6</option>
				<option label="6.5" value="6.5" title="6.5" id="MexicoWomen_65">6.5</option>
				<option label="7" value="7" title="7" id="MexicoWomen_7">7</option>
				<option label="7.5" value="7.5" title="7.5" id="MexicoWomen_75">7.5</option>
				<option label="9" value="9" title="9" id="MexicoWomen_9">9</option>
				<option label="10" value="10" title="10" id="MexicoWomen_10">10</option>
				<option label="11" value="11" title="11" id="MexicoWomen_11">11</option>
				<option label="12.5" value="12.5" title="12.5" id="MexicoWomen_12.5">12.5</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Japan: 
			<select name="JapanWomen" id="JapanWomen" onchange="convertAdult2('JapanWomen')">
				<option label="21" value="21" title="21" id="JapanWomen_21" >21</option>
				<option label="21.5" value="21.5" title="21.5" id="JapanWomen_215" >21.5</option>
				<option label="22" value="22" title="22" id="JapanWomen_22">22</option>
				<option label="22.5" value="22.5" title="22.5" id="JapanWomen_225">22.5</option>
				<option label="23" value="23" title="23" id="JapanWomen_23">23</option>
				<option label="23.5" value="23.5" title="23.5" id="JapanWomen_235">23.5</option>
				<option label="24" value="24" title="24" id="JapanWomen_24">24</option>
				<option label="24.5" value="24.5" title="24.5" id="JapanWomen_245">24.5</option>
				<option label="25" value="25" title="25" id="JapanWomen_25">25</option>
				<option label="25.5" value="25.5" title="25.5" id="JapanWomen_255">25.5</option>
				<option label="26" value="26" title="26" id="JapanWomen_26">26</option>
				<option label="27" value="27" title="27" id="JapanWomen_27">27</option>                
				<option label="28" value="28" title="28" id="JapanWomen_28">28</option>
				<option label="29" value="29" title="29" id="JapanWomen_29">29</option>
				<option label="30" value="30" title="30" id="JapanWomen_30">30</option>
				<option label="31" value="31" title="31" id="JapanWomen_31">31</option>
			</select>
		</td>
		<td>
			Korea: 
			<select name="KoreaWomen" id="KoreaWomen" onchange="convertAdult2('KoreaWomen')">
				<option label="228" value="228" title="228" id="KoreaWomen_228" >228</option>
				<option label="231" value="231" title="231" id="KoreaWomen_231">231</option>
				<option label="235" value="235" title="235" id="KoreaWomen_235">235</option>
				<option label="238" value="238" title="238" id="KoreaWomen_238">238</option>
				<option label="241" value="241" title="241" id="KoreaWomen_241">241</option>
				<option label="245" value="245" title="245" id="KoreaWomen_245">245</option>
				<option label="248" value="248" title="248" id="KoreaWomen_248">248</option>
				<option label="251" value="251" title="251" id="KoreaWomen_251">251</option>
				<option label="254" value="254" title="254" id="KoreaWomen_254">254</option>
				<option label="257" value="257" title="257" id="KoreaWomen_257">257</option>
				<option label="260" value="260" title="260" id="KoreaWomen_260">260</option>
				<option label="267" value="267" title="267" id="KoreaWomen_267">267</option>
				<option label="273" value="273" title="273" id="KoreaWomen_273">273</option>
				<option label="279" value="279" title="279" id="KoreaWomen_279">279</option>
				<option label="286" value="286" title="286" id="KoreaWomen_286">286</option>
				<option label="292" value="292" title="292" id="KoreaWomen_292">292</option>
			</select>
		</td>
		<td>
			Mondopoint: 
			<select name="MondoWomen" id="MondoWomen" onchange="convertAdult2('MondoWomen')">
				<option label="228" value="228" title="228" id="MondoWomen_228" >228</option>
				<option label="231" value="231" title="231" id="MondoWomen_231">231</option>
				<option label="235" value="235" title="235" id="MondoWomen_235">235</option>
				<option label="238" value="238" title="238" id="MondoWomen_238">238</option>
				<option label="241" value="241" title="241" id="MondoWomen_241">241</option>
				<option label="245" value="245" title="245" id="MondoWomen_245">245</option>
				<option label="248" value="248" title="248" id="MondoWomen_248">248</option>
				<option label="251" value="251" title="251" id="MondoWomen_251">251</option>
				<option label="254" value="254" title="254" id="MondoWomen_254">254</option>
				<option label="257" value="257" title="257" id="MondoWomen_257">257</option>
				<option label="260" value="260" title="260" id="MondoWomen_260">260</option>
				<option label="263" value="263" title="263" id="MondoWomen_263">263</option>
				<option label="267" value="267" title="267" id="MondoWomen_267">267</option>
				<option label="270" value="270" title="270" id="MondoWomen_270">270</option>
				<option label="273" value="273" title="273" id="MondoWomen_273">273</option>
				<option label="276" value="276" title="276" id="MondoWomen_276">276</option>
				<option label="279" value="279" title="279" id="MondoWomen_279">279</option>
				<option label="283" value="283" title="283" id="MondoWomen_283">283</option>
				<option label="286" value="286" title="286" id="MondoWomen_286">286</option>
				<option label="289" value="289" title="289" id="MondoWomen_289">289</option>
				<option label="292" value="292" title="292" id="MondoWomen_292">292</option>
			</select>
		</td>
		<td>
			Inches: 
			<select name="InchesWomen" id="InchesWomen" onchange="convertAdult2('InchesWomen')">
				<option label="9" value="9" title="9" id="InchesWomen_9">9</option>
				<option label="9.125" value="9.125" title="9.125" id="InchesWomen_9125" >9.125</option>
				<option label="9.25" value="9.25" title="9.25" id="InchesWomen_925">9.25</option>
				<option label="9.375" value="9.375" title="9.375" id="InchesWomen_9375">9.375</option>
				<option label="9.5" value="9.5" title="9.5" id="InchesWomen_95">9.5</option>
				<option label="9.625" value="9.625" title="9.625" id="InchesWomen_9625">9.625</option>
				<option label="9.75" value="9.75" title="9.75" id="InchesWomen_975">9.75</option>
				<option label="9.875" value="9.875" title="9.875" id="InchesWomen_9875">9.875</option>
				<option label="10" value="10" title="10" id="InchesWomen_10">10</option>
				<option label="10.125" value="10.125" title="10.125" id="InchesWomen_10125">10.125</option>
				<option label="10.25" value="10.25" title="10.25" id="InchesWomen_1025">10.25</option>
				<option label="10.5" value="10.5" title="10.5" id="InchesWomen_105">10.5</option>
				<option label="10.75" value="10.75" title="10.75" id="InchesWomen_1075">10.75</option>
				<option label="11" value="11" title="11" id="InchesWomen_11">11</option>
				<option label="11.25" value="11.25" title="11.25" id="InchesWomen_1125">11.25</option>
				<option label="11.5" value="11.5" title="11.5" id="InchesWomen_115">11.5</option>
			</select>
		</td>
		<td>
			Centimeter: 
			<select name="CentimeterWomen" id="CentimeterWomen" onchange="convertAdult2('CentimeterWomen')">
				<option label="22.8" value="22.8" title="22.8" id="CentimeterWomen_228" >22.8</option>
				<option label="23.1" value="23.1" title="23.1" id="CentimeterWomen_231">23.1</option>
				<option label="23.5" value="23.5" title="23.5" id="CentimeterWomen_235">23.5</option>
				<option label="23.8" value="23.8" title="23.8" id="CentimeterWomen_238">23.8</option>
				<option label="24.1" value="24.1" title="24.1" id="CentimeterWomen_241">24.1</option>
				<option label="24.5" value="24.5" title="24.5" id="CentimeterWomen_245">24.5</option>
				<option label="24.8" value="24.8" title="24.8" id="CentimeterWomen_248">24.8</option>
				<option label="25.1" value="25.1" title="25.1" id="CentimeterWomen_251">25.1</option>
				<option label="25.4" value="25.4" title="25.4" id="CentimeterWomen_254">25.4</option>
				<option label="25.7" value="25.7" title="25.7" id="CentimeterWomen_257">25.7</option>
				<option label="26.0" value="26.0" title="26.0" id="CentimeterWomen_260">26.0</option>
				<option label="26.7" value="26.7" title="26.7" id="CentimeterWomen_267">26.7</option>
				<option label="27.3" value="27.3" title="27.3" id="CentimeterWomen_273">27.3</option>
				<option label="27.9" value="27.9" title="27.9" id="CentimeterWomen_279">27.9</option>
				<option label="28.6" value="28.6" title="28.6" id="CentimeterWomen_286">28.6</option>
				<option label="29.2" value="29.2" title="29.2" id="CentimeterWomen_292">29.2</option>
			</select>
		</td>
	</tr>
</table>
<?php }elseif($data["ForMenOrWomen"]=="Intermediate" || $data["ForMenOrWomen"]=="Kids and Youth" || $data["ForMenOrWomen"]=="Youth" || $data["ForMenOrWomen"]=="Youth Boys" || $data["ForMenOrWomen"]=="Kids" || $data["ForMenOrWomen"]=="Kids Boys"){?>
<table class="converttable" id="tbBoy">
	<tr>
		<td colspan="5">
			<h1>Shoe Size Converter for <?php echo $data["ForMenOrWomen"];?></h1>
			<hr/>
		</td>
	</tr>
	<tr>
		<td>
			US & Canada: 
			<select name="USBoy" id="USBoy" onchange="convertBoy('USBoy')">
				<option label="11.5" value="11.5" title="11.5" id="USBoy_115" >11.5</option>
				<option label="12" value="12" title="12" id="USBoy_12">12</option>
				<option label="12.5" value="12.5" title="12.5" id="USBoy_125">12.5</option>
				<option label="13" value="13" title="13" id="USBoy_13">13</option>
				<option label="13.5" value="13.5" title="13.5" id="USBoy_135">13.5</option>
				<option label="1" value="1" title="1" id="USBoy_1">1</option>
				<option label="1.5" value="1.5" title="1.5" id="USBoy_15">1.5</option>
				<option label="2" value="2" title="2" id="USBoy_2">2</option>
				<option label="2.5" value="2.5" title="2.5" id="USBoy_25">2.5</option>
				<option label="3" value="3" title="3" id="USBoy_3">3</option>
				<option label="3.5" value="3.5" title="3.5" id="USBoy_35">3.5</option>
				<option label="4" value="4" title="4" id="USBoy_4">4</option>
				<option label="4.5" value="4.5" title="4.5" id="USBoy_45">4.5</option>
				<option label="5" value="5" title="5" id="USBoy_5">5</option>
			</select>
		</td>
		<td>
			Europe: 
			<select name="EuropeBoy" id="EuropeBoy" onchange="convertBoy('EuropeBoy')">
				<option label="29" value="29" title="29" id="EuropeBoy_29" >29</option>
				<option label="29.7" value="29.7" title="29.7" id="EuropeBoy_297">29.7</option>
				<option label="30.5" value="30.5" title="30.5" id="EuropeBoy_305">30.5</option>
				<option label="31" value="31" title="31" id="EuropeBoy_31">31</option>
				<option label="31.5" value="31.5" title="31.5" id="EuropeBoy_315">31.5</option>
				<option label="33" value="33" title="33" id="EuropeBoy_33">33</option>
				<option label="33.5" value="33.5" title="33.5" id="EuropeBoy_335">33.5</option>
				<option label="34" value="34" title="34" id="EuropeBoy_34">34</option>
				<option label="34.7" value="34.7" title="34.7" id="EuropeBoy_347">34.7</option>
				<option label="35" value="35" title="35" id="EuropeBoy_35">35</option>
				<option label="35.5" value="35.5" title="35.5" id="EuropeBoy_355">35.5</option>
				<option label="36" value="36" title="36" id="EuropeBoy_36">36</option>
				<option label="37" value="37" title="37" id="EuropeBoy_37">37</option>
				<option label="37.5" value="37.5" title="37.5" id="EuropeBoy_375">37.5</option>
			</select>
		</td>
		<td>
			UK: 
			<select name="UKBoy" id="UKBoy" onchange="convertBoy('UKBoy')">															
				<option label="11" value="11" title="11" id="UKBoy_11" >11</option>
				<option label="11.5" value="11.5" title="11.5" id="UKBoy_115">11.5</option>
				<option label="12" value="12" title="12" id="UKBoy_12">12</option>
				<option label="12.5" value="12.5" title="12.5" id="UKBoy_12.5">12.5</option>
				<option label="13" value="13" title="13" id="UKBoy_13">13</option>
				<option label="13.5" value="13.5" title="13.5" id="UKBoy_135">13.5</option>
				<option label="1" value="1" title="1" id="UKBoy_1">1</option>
				<option label="1.5" value="1.5" title="1.5" id="UKBoy_15">1.5</option>
				<option label="2" value="2" title="2" id="UKBoy_2">2</option>
				<option label="2.5" value="2.5" title="2.5" id="UKBoy_25">2.5</option>
				<option label="3" value="3" title="3" id="UKBoy_3">3</option>
				<option label="3.5" value="3.5" title="3.5" id="UKBoy_35">3.5</option>
				<option label="4" value="4" title="4" id="UKBoy_4">4</option>
				<option label="4.5" value="4.5" title="4.5" id="UKBoy_4.5">4.5</option>
			</select>
		</td>
		<td>
			Japan: 
			<select style="border: solid 2px #e8e8e8;" name="JapanBoy" id="JapanBoy" onchange="convertBoy('JapanBoy')">
				<option label="16.5" value="16.5" title="16.5" id="JapanBoy_165" >16.5</option>
				<option label="17" value="17" title="17" id="JapanBoy_17">17</option>
				<option label="17.5" value="17.5" title="17.5" id="JapanBoy_175">17.5</option>
				<option label="18" value="18" title="18" id="JapanBoy_18">18</option>
				<option label="18.5" value="18.5" title="18.5" id="JapanBoy_185">18.5</option>
				<option label="19" value="19" title="19" id="JapanBoy_19">19</option>
				<option label="19.5" value="19.5" title="19.5" id="JapanBoy_195">19.5</option>
				<option label="20" value="20" title="20" id="JapanBoy_20">20</option>
				<option label="20.5" value="20.5" title="20.5" id="JapanBoy_205">20.5</option>
				<option label="21" value="21" title="21" id="JapanBoy_21">21</option>
				<option label="21.5" value="21.5" title="21.5" id="JapanBoy_215">21.5</option>
				<option label="22" value="22" title="22" id="JapanBoy_22">22</option>
				<option label="22.5" value="22.5" title="22.5" id="JapanBoy_225">22.5</option>
				<option label="23" value="23" title="23" id="JapanBoy_23">23</option>
			</select>
		</td>
	</tr>
</table>
<?php }elseif($data["ForMenOrWomen"]=="Youth Girls" || $data["ForMenOrWomen"]=="Kids Girls" || $data["ForMenOrWomen"]=="Intermediate"){?>
<table class="converttable" id="Table1">
	<tr>
		<td colspan="5">
			<h1>Shoe Size Converter for Girls</h1>
			<hr/>
		</td>
	</tr>
	<tr>
		<td>
			US & Canada: 
			<select name="USGirl" id="USGirl" onchange="convertGirl('USGirl')">
				<option label="9.5" value="9.5" title="9.5" id="USGirl_95" >9.5</option>
				<option label="10" value="10" title="10" id="USGirl_10">10</option>
				<option label="10.5" value="10.5" title="10.5" id="USGirl_105">10.5</option>
				<option label="11" value="11" title="11" id="USGirl_11">11</option>
				<option label="11.5" value="11.5" title="11.5" id="USGirl_115">11.5</option>
				<option label="12" value="12" title="12" id="USGirl_12">12</option>
				<option label="12.5" value="12.5" title="12.5" id="USGirl_125">12.5</option>
				<option label="13" value="13" title="13" id="USGirl_13">13</option>
				<option label="13.5" value="13.5" title="13.5" id="USGirl_13.5">13.5</option>
				<option label="1" value="1" title="1" id="USGirl_1">1</option>
				<option label="1.5" value="1.5" title="1.5" id="USGirl_15">1.5</option>
				<option label="2" value="2" title="2" id="USGirl_2">2</option>
				<option label="2.5" value="2.5" title="2.5" id="USGirl_25">2.5</option>
				<option label="3" value="3" title="3" id="USGirl_3">3</option>
				<option label="3.5" value="3.5" title="3.5" id="USGirl_35">3.5</option>
				<option label="4" value="4" title="4" id="USGirl_4">4</option>
			</select>
		</td>
		<td>
			Europe: 
			<select name="EuropeGirl" id="EuropeGirl" onchange="convertGirl('EuropeGirl')">
				<option label="26" value="26" title="26" id="EuropeGirl_26" >26</option>
				<option label="26.5" value="26.5" title="26.5" id="EuropeGirl_265">26.5</option>
				<option label="27" value="27" title="27" id="EuropeGirl_27">27</option>
				<option label="27.5" value="27.5" title="27.5" id="EuropeGirl_27.5">27.5</option>
				<option label="28" value="28" title="28" id="EuropeGirl_28">28</option>
				<option label="28.5" value="28.5" title="28.5" id="EuropeGirl_285">28.5</option>
				<option label="29" value="29" title="29" id="EuropeGirl_29">29</option>
				<option label="30" value="30" title="30" id="EuropeGirl_30">30</option>
				<option label="30.5" value="30.5" title="30.5" id="EuropeGirl_30.5">30.5</option>
				<option label="31" value="31" title="31" id="EuropeGirl_31">31</option>
				<option label="31.5" value="31.5" title="31.5" id="EuropeGirl_315">31.5</option>                
				<option label="32.5" value="32.5" title="32.5" id="EuropeGirl_32.5">32.5</option>
				<option label="33" value="33" title="33" id="EuropeGirl_33">33</option>
				<option label="33.5" value="33.5" title="33.5" id="EuropeGirl_33.5">33.5</option>
				<option label="34" value="34" title="34" id="EuropeGirl_34">34</option>
				<option label="35" value="35" title="35" id="EuropeGirl_35">35</option>
			</select>
		</td>
		<td>
			UK: 
			<select name="UKGirl" id="UKGirl" onchange="convertGirl('UKGirl')">															
				<option label="8" value="8" title="8" id="UKGirl_8" >8</option>
				<option label="8.5" value="8.5" title="8.5" id="UKGirl_85">8.5</option>
				<option label="9" value="9" title="9" id="UKGirl_9">9</option>
				<option label="9.5" value="9.5" title="9.5" id="UKGirl_95">9.5</option>
				<option label="10" value="10" title="10" id="UKGirl_10">10</option>
				<option label="10.5" value="10.5" title="10.5" id="UKGirl_105">10.5</option>
				<option label="11" value="11" title="11" id="UKGirl_11">11</option>
				<option label="11.5" value="11.5" title="11.5" id="UKGirl_115">11.5</option>
				<option label="12" value="12" title="12" id="UKGirl_12">12</option>
				<option label="12.5" value="12.5" title="12.5" id="UKGirl_125">12.5</option>
				<option label="13" value="13" title="13" id="UKGirl_13">13</option>
				<option label="13.5" value="13.5" title="13.5" id="UKGirl_135">13.5</option>
				<option label="1" value="1" title="1" id="UKGirl_1">1</option>
				<option label="1.5" value="1.5" title="1.5" id="UKGirl_15">1.5</option>
				<option label="2" value="2" title="2" id="UKGirl_2">2</option>
				<option label="2.5" value="2.5" title="2.5" id="UKGirl_25">2.5</option>                
			</select>
		</td>
		<td>
			Japan: 
			<select name="JapanGirl" id="JapanGirl" onchange="convertGirl('JapanGirl')">
				<option label="14.5" value="14.5" title="14.5" id="JapanGirl_145">14.5</option>
				<option label="15" value="15" title="15" id="JapanGirl_15">15</option>
				<option label="15.5" value="15.5" title="15.5" id="JapanGirl_155">15.5</option>
				<option label="16" value="16" title="16" id="JapanGirl_16">16</option>
				<option label="16.5" value="16.5" title="16.5" id="JapanGirl_165">16.5</option>
				<option label="17" value="17" title="17" id="JapanGirl_17">17</option>
				<option label="17.5" value="17.5" title="17.5" id="JapanGirl_175">17.5</option>
				<option label="18" value="18" title="18" id="JapanGirl_18">18</option>
				<option label="18.5" value="18.5" title="18.5" id="JapanGirl_185">18.5</option>
				<option label="19" value="19" title="19" id="JapanGirl_19">19</option>
				<option label="19.5" value="19.5" title="19.5" id="JapanGirl_195">19.5</option>
				<option label="20" value="20" title="20" id="JapanGirl_20">20/option>
				<option label="20.5" value="20.5" title="20.5" id="JapanGirl_205">20.5</option>
				<option label="21" value="21" title="21" id="JapanGirl_21">21</option>
				<option label="21.5" value="21.5" title="21.5" id="JapanGirl_21.5">21.5</option>
				<option label="22" value="22" title="22" id="JapanGirl_22">22</option>
			</select>
		</td>
	</tr>
</table>
<?php }elseif($data["ForMenOrWomen"]=="Toddlers"){?>
<table class="converttable" id="Table1">
	<tr>
		<td colspan="5">
			<h1>Shoe Size Converter for Toddler</h1>
			<hr/>
		</td>
	</tr>
	<tr>
		<td>
			US & Canada: 
			<select name="USToddler" id="USToddler" onchange="convertToddler('USToddler')">
				<option label="1" value="1" title="1" id="USToddler_1">1</option>
				<option label="2" value="2" title="2" id="USToddler_2">2</option>
				<option label="3" value="3" title="3" id="USToddler_3">3</option>
				<option label="4" value="4" title="4" id="USToddler_4">4</option>
				<option label="5" value="5" title="5" id="USToddler_5">5</option>
				<option label="6" value="6" title="6" id="USToddler_6">6</option>
				<option label="7" value="7" title="7" id="USToddler_7">7</option>
				<option label="8" value="8" title="8" id="USToddler_8">8</option>
				<option label="9" value="9" title="9" id="USToddler_9">9</option>
				<option label="10" value="10" title="10" id="USToddler_10">10</option>
				<option label="11" value="11" title="11" id="USToddler_11">11</option>
				<option label="12" value="12" title="12" id="USToddler_12">12</option>
			</select>
		</td>
		<td>
			Europe: 
			<select name="EuropeToddler" id="EuropeToddler" onchange="convertToddler('EuropeToddler')">
				<option label="16" value="16" title="16" id="EuropeToddler_16" >16</option>
				<option label="17" value="17" title="17" id="EuropeToddler_17">17</option>
				<option label="18" value="18" title="18" id="EuropeToddler_18">18</option>
				<option label="19" value="19" title="19" id="EuropeToddler_19">19</option>
				<option label="20" value="20" title="20" id="EuropeToddler_20">20</option>
				<option label="22" value="22" title="22" id="EuropeToddler_22">22</option>
				<option label="23" value="23" title="23" id="EuropeToddler_23">23</option>
				<option label="24" value="24" title="24" id="EuropeToddler_24">24</option>
				<option label="25" value="25" title="25" id="EuropeToddler_25">25</option>
				<option label="27" value="27" title="27" id="EuropeToddler_27">27</option>
				<option label="28" value="28" title="28" id="EuropeToddler_28">28</option>                
				<option label="30" value="30" title="30" id="EuropeToddler_30">30</option>
			</select>
		</td>
		<td>
			UK: 
			<select name="UKToddler" id="UKToddler" onchange="convertToddler('UKToddler')">															
				<option label="0.5" value="0.5" title="0.5" id="UKToddler_0.5" >0.5</option>
				<option label="1" value="1" title="1" id="UKToddler_1">1</option>
				<option label="2" value="2" title="2" id="UKToddler_2">2</option>
				<option label="3" value="3" title="3" id="UKToddler_3">3</option>
				<option label="4" value="4" title="4" id="UKToddler_4">4</option>
				<option label="5" value="5" title="5" id="UKToddler_5">5</option>
				<option label="6" value="6" title="6" id="UKToddler_6">6</option>
				<option label="7" value="7" title="7" id="UKToddler_7">7</option>
				<option label="8" value="8" title="8" id="UKToddler_8">8</option>
				<option label="9" value="9" title="9" id="UKToddler_9">9</option>
				<option label="10" value="10" title="10" id="UKToddler_10">10</option>
				<option label="11" value="11" title="11" id="UKToddler_11">11</option>       
			</select>
		</td>
		<td>
			Asia(cm): 
			<select name="AsiaToddler" id="AsiaToddler" onchange="convertToddler('AsiaToddler')">
				<option label="8.9" value="8.9" title="8.9" id="AsiaToddler_8.9">8.9</option>
				<option label="9.5" value="9.5" title="9.5" id="AsiaToddler_9.5">9.5</option>
				<option label="10.5" value="10.5" title="10.5" id="AsiaToddler_10.5">10.5</option>
				<option label="11.4" value="11.4" title="11.4" id="AsiaToddler_11.4">11.4</option>
				<option label="12.1" value="12.1" title="12.1" id="AsiaToddler_12.1">12.1</option>
				<option label="13" value="13" title="13" id="AsiaToddler_13">13</option>
				<option label="14" value="14" title="14" id="AsiaToddler_14">14</option>
				<option label="14.6" value="14.6" title="14.6" id="AsiaToddler_14.6">14.6</option>
				<option label="15.6" value="15.6" title="15.6" id="AsiaToddler_15.6">15.6</option>
				<option label="16.5" value="16.5" title="16.5" id="AsiaToddler_16.5">16.5</option>
				<option label="17.1" value="17.1" title="17.1" id="AsiaToddler_17.1">17.1</option>
				<option label="18.1" value="18.1" title="18.1" id="AsiaToddler_18.1">18.1</option>
			</select>
		</td>
	</tr>
</table>
<?php }?>