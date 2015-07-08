<?php
include_once dirname(__FILE__) . "/include/header.php";
?>
	<div style="margin:10px 0;"></div>
	<div style="padding:5px;border:1px solid #ddd">
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm1'">Basic Data</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm2'">Code</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm3'">PO</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm4'">Purchase</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm5'">Quotation</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm6'">Sales Order</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm7'">Invoice</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm8'">Accounting</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm9'">Other Task</a>
		<a href="#" class="easyui-menubutton" data-options="menu:'#mm10'">Utility</a>

	</div>
	
	<div id="mm1" style="width:70px;">
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Company','combodemo.php')">Company</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Customer','')">Customer</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Vendor','')">Vendor</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Employee','')">Employee</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Yarn','')">Yarn</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Fabric','')">Fabric</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Trim','')">Trim</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Garment','')">Garment</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Account','')">Chart of Account</a></div>
	</div>
	<div id="mm2" style="width:70px;">
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Color','color_test.php')" >Color</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Incoterms','')" >Incoterms</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Sales Tax','')">Sales Tax</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Ship Via','')">Ship Via</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Sizes','')">Sizes</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Style Category','')">Style Category</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Terms','')">Terms</a></div>
	</div>
	<div id="mm3" style="width:70px;">
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('PO-Yarn','')" >Yarn</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('PO-Finished Fabric','')" >Finished Fabric</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('PO-Fabric Processing','')">Fabric Processing</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('PO-Garment','')">Full Package Garment</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('PO-Cutting','')">Cutting</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('PO-Sewing','')">Sewing</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('PO-Cut & Sew','')">Cut & Sew</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('PO-Embellishing','')">Embellishing</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('PO-Non-Inventory','')">Non-Inventory</a></div>
	</div>
	<div id="mm4" style="width:70px;">
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Purchase-Yarn','')" >Yarn</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Purchase-Finished Fabric','')" >Finished Fabric</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Purchase-Fabric Processing','')">Fabric Processing</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Purchase-Garment','')">Full Package Garment</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Purchase-Cutting','')">Cutting</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Purchase-Sewing','')">Sewing</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Purchase-Cut & Sew','')">Cut & Sew</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Purchase-Embellishing','')">Embellishing</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Purchase-Non-Inventory','')">Non-Inventory</a></div>
	</div>
	<div id="mm5" style="width:70px;">
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Quotation-Yarn','')" >Yarn</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Quotation-Fabric','')">Fabric</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Quotation-Full Package Garment','')">Full Package Garment</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Quotation-Trim','')">Trim</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Quotation-Garment','')">Garment</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Quotation-Non-Inventory','')">Non-Inventory</a></div>
	</div>
	<div id="mm6" style="width:70px;">
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Order-Yarn','')" >Yarn</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Order-Fabric','')">Fabric</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Order-Full Package Garment','')">Full Package Garment</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Order-Trim','')">Trim</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Order-Garment','')">Garment</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Order-Non-Inventory','')">Non-Inventory</a></div>
	</div>
	<div id="mm7" style="width:70px;">
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Invoice-Yarn','')" >Yarn</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Invoice-Fabric','')">Fabric</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Invoice-Full Package Garment','')">Full Package Garment</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Invoice-Trim','')">Trim</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Invoice-Garment','')">Garment</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Invoice-Non-Inventory','')">Non-Inventory</a></div>
	</div>
	<div id="mm8" style="width:70px;">
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Cash Receipt','')" >Cash Receipt</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Payment','')">Payment</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Payroll','')">Payroll Post</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('General Journal','')">General Journal</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Bank Recon.','')">Bank Recon.</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Factor Recon','')">Factor Recon.</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Credit Card Recon','')">Credit Card Recon.</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Inventory Post','')">Inventory Post</a></div>
	</div>
	<div id="mm9" style="width:70px;">
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Job','')" >Job</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Inventory Move','')">Inventory Move</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Inventory Adjust','')">Inventory Adjust</a></div>
	</div>
	<div id="mm10" style="width:70px;">
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Management','')" >User Management</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Log','')">User Log</a></div>
		<div><a href="#" class="easyui-linkbutton" onclick="addTab('Reports','')">Reports</a></div>
	</div>
	<!--<div id="mm3" class="menu-content" style="background:#f0f0f0;padding:10px;text-align:left">
		<img src="http://www.jeasyui.com/images/logo1.png" style="width:150px;height:50px">
		<p style="font-size:14px;color:#444;">Try jQuery EasyUI to build your modem, interactive, javascript applications.</p>
	</div>-->
	<div id="tt" class="easyui-tabs" >
		<!--<div title="Home">
		</div>-->
	</div>
