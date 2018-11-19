<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "eplanet_emp";

$db_connect = mysqli_connect($mysql_hostname, $mysql_user,$mysql_password, $mysql_database) or ("Could not connect database");

?>