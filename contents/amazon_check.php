<?php 
		$transid=$_GET['transactionId'];
		if(($_GET['payment_status']=="COMPLETED") || ($_GET['payment_status']=="SUCCESS"))
		{
		
			echo '<script type="text/javascript">
			alert("Your Paypal Chckout has been approved.");
			window.opener.review_save("PS","'.$transid.'");
			self.close();
			</script>';
		}
	    else if ($_GET['payment_status']=="PENDING")
		{
			echo '<script type="text/javascript">
			alert("You processing pending.");
			window.opener.review_save("PI","'.$transid.'");
			self.close();
			</script>';

		}
		 else if ($_GET['payment_status']=="REFUNDED")
		{
			echo '<script type="text/javascript">
			alert("You processing pending.");
			window.opener.review_save("RE","'.$transid.'");
			self.close();
			</script>';

		}
		
		else
		{
			echo '<script type="text/javascript">
			alert("Your payment with Paypal Checkout has failed.\n You will shortly receive detailed email from Paypal.");
			self.close();
			</script>';

		}
?>		
