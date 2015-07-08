<?php
print_r($_SERVER['REMOTE_ADDR']);
$_SERVER='107.194.68.188';
/*
$record = geoip_record_by_name($_SERVER['REMOTE_ADDR']);
if ($record) {
print_r($record);
}*/
$user_ip ='107.194.68.188';
$geo=unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));

//echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER)));

$city=$geo["geoplugin_city"];
$area=$geo["geoplugin_areaCode"];
$latitude=$geo["geoplugin_latitude"];
$longitude=$geo["geoplugin_longitude"];
echo "city:".$city."<br>";
echo "area:".$area."<br>";
echo "latitude:".$latitude."<br>";
echo "longitude:".$longitude."<br>";

?>