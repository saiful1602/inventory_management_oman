<?php
session_start();
$hostName="localhost";
$userName="root";
$password="";
$dbName="test_ali";

/********* Create Connecton *************/

$con = mysqli_connect($hostName,$userName,$password,$dbName) or die("Connectio failed");
date_default_timezone_set("Asia/Muscat");

?>

