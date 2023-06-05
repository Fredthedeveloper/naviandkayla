<?php

require_once 'config.php';



//Display total price

function get_price(){
	global $conn;
	$query="SELECT SUM(CAST(REPLACE(order_total, ',','.') as decimal(29, 10))) FROM `total`";
	return $price_result=mysqli_query($conn,$query);
}


?>