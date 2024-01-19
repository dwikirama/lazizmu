<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_lazizmu";

$conn = new mysqli($hostname,$username,$password,$database);

if ($conn -> error) {
	die("database error ges".$conn -> error);
}

?>