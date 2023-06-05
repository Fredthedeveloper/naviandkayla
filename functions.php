<?php

require_once 'config.php';




//Display Products

function get_products(){
	global $conn;
	$query="SELECT * FROM products ";
	return $result=mysqli_query($conn,$query);
}

function get_productslide(){
	global $conn;
	$query="SELECT * FROM productslideshow ";
	return $norms=mysqli_query($conn,$query);
}

function get_ceramics(){
	global $conn;
	$query="SELECT * FROM ceramproducts";
	return $cera=mysqli_query($conn,$query);
}

function get_wooden(){
	global $conn;
	$query="SELECT * FROM woodenproducts";
	return $wood=mysqli_query($conn,$query);
}

function get_other(){
	global $conn;
	$query="SELECT * FROM otherproducts";
	return $other=mysqli_query($conn,$query);
}
function get_today(){
	global $conn;
	$query="SELECT * FROM todayproducts";
	return $today=mysqli_query($conn,$query);
}
/*function get_latest(){
	global $conn;
	$query="SELECT * FROM latestproducts";
	return $latest=mysqli_query($conn,$query);
}*/

function get_top(){
	global $conn;
	$query="SELECT * FROM topsellingproducts";
	return $top=mysqli_query($conn,$query);
}

function get_banner(){
	global $conn;
	$query="SELECT * FROM banner";
	return $ban=mysqli_query($conn,$query);
}

?>