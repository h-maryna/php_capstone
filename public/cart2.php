<?php

require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/../classes/Validator.php';

if('POST' !== $_SERVER['REQUEST_METHOD']){
	die('Direct access not allowed');
}
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM product WHERE product_id=$product_id"
);
$row = mysqli_fetch_assoc($result);
$name = $row['product_name'];
$code = $row['product_id'];
$price = $row['price'];
$image = $row['product_image'];
 
$cartArray = array(
	$code=>array(
	'product_name'=>$name,
	'product_id'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'product_image'=>$image)
);
 
if(empty($_SESSION["cart"])) {
    $_SESSION["cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["cart"] = array_merge(
    $_SESSION["cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}
 
	}
}
?>