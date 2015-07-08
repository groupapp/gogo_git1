<?php
	$Action			= $_POST["Action"];
	$EmailFrom		= $_POST["EmailFrom"];
	$EmailSubject	= $_POST["EmailSubject"];
	$EmailTo1		= $_POST["EmailTo1"];
	$EmailTo2		= $_POST["EmailTo2"];
	$CatalogueID	= $_POST["CatalogueID"];
	$TextOrHtml		= $_POST["TextOrHtml"];
	$EmilContent	= $_POST["EmilContent"];
	
	//DEBUG
	echo $Action;
	echo "<br/>";
	echo $EmailFrom;
	echo "<br/>";
	echo $EmailSubject;
	echo "<br/>";
	echo $EmailTo1;
	echo "<br/>";
	echo $EmailTo2;
	echo "<br/>";
	echo $CatalogueID;
	echo "<br/>";
	echo $TextOrHtml;
	echo "<br/>";
	echo $EmilContent;
	//END DEBUG
?>