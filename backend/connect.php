<?php

$servername="localhost";
$username="root";
$password="";
$databasename="navi";

//create a connection
$Navi= new mysqli($servername,$username,$password,$databasename);
if ($Navi->connect_error) {
	die("Not connected: " .$Navi->connect_error);
}





?>