    <div id='content'>
        <script type="text/javascript">
            $(document).ready(function () {
                var theme = 'bootstrap';

                
                // Create a jqxMenu
                $("#jqxMenu").jqxMenu({ width: '1000', height: '30px', autoOpen: true, autoCloseOnMouseLeave: true, showTopLevelArrows: true, theme: theme });
                $("#jqxMenu").css('visibility', 'visible');
                //$(".buyonline").jqxLinkButton({ width: 150, height: 25, theme: theme });
                //$(".jqx-menu-search").jqxButton({ width: 60, height: 18, theme: theme });
            });
        </script>
        <div id='jqxWidget' style='height: 300px;'>
            <div id='jqxMenu' style='visibility: hidden; margin-left: 20px;'>
                <ul>
                    <li><a href="#Home">Home</a></li>
                    <li>Basic Data
                        <ul style='width: 170px;' class='megamenu-ul'>
                            <li ignoretheme='true'><a href='?position=company'>Company</a></li>
                            <li ignoretheme='true'><a href='#'>Customer/Vendor</a></li>
                            <li ignoretheme='true'><a href='#'>Employee</a></li>
                            <li ignoretheme='true'><a href='#'>Yarn</a></li>
                            <li ignoretheme='true'><a href='#'>Fabric</a></li>
                            <li ignoretheme='true'><a href='#'>Trim</a></li>
                            <li ignoretheme='true'><a href='#'>Garment</a></li>
							<li ignoretheme='true'><a href='?position=glaccount'>Chart of Account</a></li>
                        </ul>
                    </li>
                    <li><a href="?position=code">Code</a></li>
                    
					<li>PO
                        <ul style='width: 170px;' class='megamenu-ul'>
                            <li ignoretheme='true'><a href='#'>Yarn</a></li>
                            <li ignoretheme='true'><a href='#'>Finished Fabric</a></li>
                            <li ignoretheme='true'><a href='#'>Fabric Processing</a></li>
                            <li ignoretheme='true'><a href='#'>Full Package Garment</a></li>
							<li ignoretheme='true'><a href='#'>Cutting</a></li>
                            <li ignoretheme='true'><a href='#'>Sewing</a></li>
                            <li ignoretheme='true'><a href='#'>Cut & Sew</a></li>
                            <li ignoretheme='true'><a href='#'>Embellishing</a></li>
							<li ignoretheme='true'><a href='#'>Non-Inventory</a></li>
                        </ul>
                    </li>
					<li>Purchase
                        <ul style='width: 170px;' class='megamenu-ul'>
                            <li ignoretheme='true'><a href='#'>Yarn</a></li>
                            <li ignoretheme='true'><a href='#'>Finished Fabric</a></li>
                            <li ignoretheme='true'><a href='#'>Fabric Processing</a></li>
                            <li ignoretheme='true'><a href='#'>Full Package Garment</a></li>
							<li ignoretheme='true'><a href='#'>Cutting</a></li>
                            <li ignoretheme='true'><a href='#'>Sewing</a></li>
                            <li ignoretheme='true'><a href='#'>Cut & Sew</a></li>
                            <li ignoretheme='true'><a href='#'>Embellishing</a></li>
							<li ignoretheme='true'><a href='#'>Non-Inventory</a></li>
                        </ul>
                    </li>
					<li>Quotation
                        <ul style='width: 170px;' class='megamenu-ul'>
                            <li ignoretheme='true'><a href='#'>Yarn</a></li>
                            <li ignoretheme='true'><a href='#'>Fabric</a></li>
                            <li ignoretheme='true'><a href='#'>Full Package Garment</a></li>
							<li ignoretheme='true'><a href='#'>Trim</a></li>
                            <li ignoretheme='true'><a href='#'>Garment</a></li>
                            <li ignoretheme='true'><a href='#'>Non-Inventory</a></li>
                        </ul>
                    </li>
					<li>Sales Order
                        <ul style='width: 170px;' class='megamenu-ul'>
                            <li ignoretheme='true'><a href='#'>Yarn</a></li>
                            <li ignoretheme='true'><a href='#'>Fabric</a></li>
                            <li ignoretheme='true'><a href='#'>Full Package Garment</a></li>
							<li ignoretheme='true'><a href='#'>Trim</a></li>
                            <li ignoretheme='true'><a href='#'>Garment</a></li>
                            <li ignoretheme='true'><a href='#'>Non-Inventory</a></li>
                        </ul>
                    </li>
					<li>Invoice
                        <ul style='width: 170px;' class='megamenu-ul'>
                            <li ignoretheme='true'><a href='#'>Yarn</a></li>
                            <li ignoretheme='true'><a href='#'>Fabric</a></li>
                            <li ignoretheme='true'><a href='#'>Full Package Garment</a></li>
							<li ignoretheme='true'><a href='#'>Trim</a></li>
                            <li ignoretheme='true'><a href='#'>Garment</a></li>
                            <li ignoretheme='true'><a href='#'>Non-Inventory</a></li>
                        </ul>
                    </li>
                    <li>Account
                        <ul style='width: 170px;' class='megamenu-ul'>
                            <li ignoretheme='true'><a href='#'>Cash Receipt</a></li>
                            <li ignoretheme='true'><a href='#'>Payment</a></li>
                            <li ignoretheme='true'><a href='#'>Payroll Post</a></li>
                            <li ignoretheme='true'><a href='#'>General Journal</a></li>
							<li ignoretheme='true'><a href='#'>Bank Recon.</a></li>
                            <li ignoretheme='true'><a href='#'>Factor Recon.</a></li>
                            <li ignoretheme='true'><a href='#'>Credit Card Recon.</a></li>
                            <li ignoretheme='true'><a href='#'>Inventory Post</a></li>
							
                        </ul>
                    </li>
					<li>Other Task
                        <ul style='width: 170px;' class='megamenu-ul'>
                            <li ignoretheme='true'><a href='#'>Job</a></li>
                            <li ignoretheme='true'><a href='#'>Inventory Move</a></li>
                            <li ignoretheme='true'><a href='#'>Inventory Adjust</a></li>
                           
                        </ul>
                    </li>
					<li>Utility
                        <ul style='width: 170px;' class='megamenu-ul'>
                            <li ignoretheme='true'><a href='#'>User Management</a></li>
                            <li ignoretheme='true'><a href='#'>User Log</a></li>
                            <li ignoretheme='true'><a href='#'>Reports</a></li>
                            
                        </ul>
                    </li>
					
                </ul>
            </div>
            <br />
        </div>
    </div>
</body>
</html>
