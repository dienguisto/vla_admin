<?php

$host = "46.105.105.22";
$user = "root";
$password = "iszkVcxLz6tE";
$dbname = "recrutement_rpc"; 

$con = mysqli_connect($host, $user, $password,$dbname);
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($con,"SET NAMES 'utf8'");


/*$host1 = "192.168.5.40";
$user1 = "fouad";
$password1 = "InUpFd20";
$dbname1 = "asterisk"; 

$con1 = mysqli_connect($host1, $user1, $password1,$dbname1);
if (!$con1) {
 die("Connection failed: " . mysqli_connect_error());
}*/