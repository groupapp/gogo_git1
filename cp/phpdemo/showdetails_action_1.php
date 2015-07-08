<?php 
	// Connect to your Database 
	
	//mysql_connect("localhost", "root", "kshlyh0409") or die(mysql_error()); 
	//mysql_select_db("eworldbaby") or die(mysql_error()); 

	$recordid=$_POST['record_id'];
	$cFistName=$_POST['cFistName'];
	$cLastName=$_POST['cLastName'];
	$cEmail=$_POST['cEmail'];
	$cCellNumb=$_POST['cCellNumb'];
	
	include('function.php');

	$DB = new myDB;
	$strSQL="UPDATE acc_user SET  cFistName='".$cFistName."',cLastName='".$cLastName."', cCellNumb='".$cCellNumb."', cUserIDNO='".$cEmail."'  where id=".$recordid;
	//print_r($strSQL);
	$DB->query($strSQL);
	
//print_r($response);
//exit;

?>

<script>
//alert('xx');
	window.onunload = refreshParent();
    function refreshParent() {
        window.opener.location.reload();
    }
	window.close();
			</script>	