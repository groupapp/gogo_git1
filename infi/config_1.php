<?php
// PDO connect *********
function connect() {
	$host = 'localhost';
	$db_name = 'egcjc584_sshop1';
	$db_user = 'seung';
	$db_password = '44044404';
    return new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
?>