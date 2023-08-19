<?php

$db_host ="localhost";
$db_user ="root";
$db_password ="";
$db_name ="vmsproject";
$db_port ="3307";

$con =new mysqli($db_host,$db_user,$db_password,$db_name);
if ($con->connect_error) {
	die("connection failed");

}

// else
// {
// 	echo "connect";
// }



?> 