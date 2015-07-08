<?php

$db = mysql_connect("localhost","lemontree","%db4Lemontree");

mysql_select_db("egcjc584_sshop1",$db);

echo $_GET['email'];

mysql_query("UPDATE mail SET read_chk = 'Y' WHERE id = ".$_GET['email']);

mysql_close($db);
?>