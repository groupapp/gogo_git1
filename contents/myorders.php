<?php
$userID=$_COOKIE["userID"];
if ($userID=='')
{
echo "<script>
window.location='../index.php?page=customer&account=login';
</script>";
}
?>

<div class="container" style="margin-top: 40px;">


                                        <div class="right-col1 col-md-3">
                                            <div class="list-group">
                                                <a href="/?page=customer&account=myaccount" class="list-group-item default">
                                                    <h5 class="list-group-item-heading">My Account</h5>
                                                    <p class="list-group-item-text">Review you account information</p>                                                    
                                                </a>
                                                
                                                <a href="/?page=customer&account=mypersonalinfo" class="list-group-item default">
                                                    <h5 class="list-group-item-heading">My personal Information (Edit)</h5>
                                                    <p class="list-group-item-text">Edit your personal information</p>    
                                                </a>
                                                
                                                <a href="/?page=customer&account=myorderhistory" class="list-group-item default">
                                                    <h5 class="list-group-item-heading">My order History</h5>
                                                    <p class="list-group-item-text">See all your order history</p>    
                                                </a>
                                                
                                                <a href="/?info=mywishlist" class="list-group-item default">
                                                    <h5 class="list-group-item-heading">My Wishlist</h5>
                                                    <p class="list-group-item-text">See all your Wishlist</p>    
                                                </a>
                                            </div>
					</div>

	<div class="main-col1 col-md-9">
            <div class="page-title">
                <h1><span>My Order History</span></h1>
            </div>
            
            <div>
            <table class="table_jy">
    		<tbody>
    			<tr class="thin_border_bottom">
    				<td class="subject1_2 subject_img">Order No</td>
					<td class="subject1_2 subject_img" style="width: 85px;">Order Date</td>
					<td class="subject1_2 subject_img">Amount</td>
					<td class="subject1_2 subject_img">Pay Method</td>
					<td class="subject1_2 subject_img">Shiiping Method</td>
					<td class="subject1_2 subject_img">Progress</td>
				</tr>
<?php 
	include "../include/function.php";
	$userID=$_COOKIE["userID"];
	$strSQL = "SELECT ox.OrderID,ox.OrderDateTime,ox.TotalProductQuantity,ox.TotalProductAmount,
	ox.CreditCardName,ox.ShippingMethod,ox.ShippingTrackingNo,ox.OrderDateTime,ox.OrderConfirmed,ox.ShippingConfirmedDateTime,ox.ShippingConfirmed,ox.OrderCancelledDateTime,ox.OrderCancelled,ox.IsThisBackOrder 
	FROM Customers cu,Orders ox 
	WHERE 
	cu.CustomerID= ox.CustomerID
	and cu.LoginID = '" . $userID."' order by ox.OrderID DESC";
	
//print_r($strSQL);	
	$DB = new myDB;
	$DB->query($strSQL);
	while ($data = $DB->fetch_array($DB->res)){
		$OrderDateTime=substr($data["OrderDateTime"],0,10);
		
		if($data["OrderConfirmed"]=='N' && $data["OrderDateTime"]!=="0000-00-00 00:00:00")
			$progress="Order Unconfirm";
		if($data["OrderConfirmed"]=='Y')
			$progress="Order Confirm";
		if($data["ShippingConfirmed"]=='Y')
			$progress="Shipping Confirm";
		if($data["OrderCancelled"]=='Y')
			$progress="Order Cancel";	
		if($data["IsThisBackOrder"]=='Y')
			$progress="Back Order";	
		if($data["ShippingTrackingNo"]!='')
			$track="TR#:".$data["ShippingTrackingNo"];
		//print($data["OrderCancelled"]);
		//exit;		
									echo "<tr class=\"thin_border_bottom\">";		
									echo "<td class=\"general\"><a href=\"#\" onclick=\"Popup=window.open('./contents/order_printview.php?orderid=" .$data["OrderID"]."','Popup','scrollbars=yes,resizable=yes,width=995px,height=880px'); return false;\">" . $data["OrderID"] . "</a>&nbsp;<a href=\"javascript:void(0);\" onclick=\"showdetail(".$data["OrderID"].")\">+</a><a href=\"javascript:void(0);\" onclick=\"hidedetail(".$data["OrderID"].")\">&nbsp;-</a></td>";
									echo "<td class=\"general\">" . $OrderDateTime. "</td>";
									echo "<td class=\"general\" style=\"text-align:right\">" . $data["TotalProductAmount"] . "</td>";
									echo "<td class=\"general\">" . $data["CreditCardName"] . "</td>";
									echo "<td class=\"general\">" . $data["ShippingMethod"] . !empty($track) ."</td>";
									echo "<td class=\"general\">" . $progress . "</td>";
									echo "</tr>";
									
									$DB2 = new myDB;
									$strSMSQL = "SELECT ProductName,ListOfSizeNames,ListOfColorNames,TotalQuantity,UnitPrice,TotalAmount FROM OrderItems 
									 WHERE OrderID = ".$data["OrderID"];
									$strSMOrd = "ORDER BY ProductID";
									$DB2->query($strSMSQL);
										
										echo "<tr><td colspan=\"6\"><table id=\"detail_".$data["OrderID"]."\" style=\"display:none;\" class=\"sub-table\"  border='1'>
											<tr class='subject_border_top'>
											<td class='subject1_3'>Name</td>
											<td class='subject1_3'>Size</td>
											<td class='subject1_3'>Color</td>
											<td class='subject1_3'>QTY</td>
											<td class='subject1_3'>UnitPrice</td>
											<td class='subject1_3'>Amount</td>
											</tr>";		
										
										while($dataProd = $DB2->fetch_array($DB2->res))
										{				
											
											echo"<tr><td style=\"width:60%\">" . $dataProd["ProductName"] . "</td>";
											echo "<td style=\"width:15%; text-align:center;\" >" . $dataProd["ListOfSizeNames"] . "</td>";
											echo "<td style=\"width:15%; text-align:center;\">". $dataProd["ListOfColorNames"] . "</td>";
											echo "<td style=\"width:6%; text-align:center;\">". $dataProd["TotalQuantity"] . "</td>";
											echo "<td style=\"width:15%; text-align:center;\">". $dataProd["UnitPrice"] . "</td>";
											echo "<td style=\"width:25%; text-align:center;\">". $dataProd["TotalAmount"] . "</td>";
										}
										echo"</tr></table></td></tr>";
								
								}
					echo"</tbody></table>";		?>
						
					
				
			</div>	
	</div>
</div>


	<script type="text/javascript">
	function showdetail(id)
	{
	//alert(id);
	document.getElementById('detail_'+id).style.display='block';
	}
	function hidedetail(id)
	{
	//alert(id);
	//alert('z');
	document.getElementById('detail_'+id).style.display='none';
	}
	</script>
	<!-- TESTING... -->
