<?php 

setcookie("userID", "", time()-3600, "/", 'lemontreeclothing.com');
setcookie("username", "", time()-3600, "/", 'lemontreeclothing.com');

echo "<script>location.replace('index.php');</script>";


?>	