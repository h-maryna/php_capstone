<?php

define('PST', 0.6);
define('GST', 0.5);

/**
 * Escape string for general use in HTML
 * @param  String $string data to be sanitized
 * @return String
 */
function e($string) {
	return htmlentities($string, null, 'UTF-8');
}

/**
 * Escape string for use in attribute (quotes entitized)
 * @param  String $string data to be sanitized
 * @return String 
 */
function e_attr($string) {
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function clean($field) {
	if(!empty($_POST[$field])) {
		return htmlentities($_POST[$field], ENT_QUOTES, "UTF-8");
	} else {
		return '';
	}
}

function getToken()
{
	return $_SESSION['token'];
} 

/**
 * [dd description]
 * @param  [type] $var [description]
 * @return [type]      [description]
 */
function dd($var)
{
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}

function setFlash($type, $message)
{
	$_SESSION['message'] = [$type, $message];
}

function getCart(){
	if(empty($_SESSION['cart'])){
		return 'Your cart is empty';
	}else{
		$count = count($_SESSION['cart']);
		return "$count items in a cart";
	}
}
/**
 * Single item Shopping Cart
 * @param  Array $product_id
 */
function getOneProduct($product_id)
{   
   global $dbh;
   $query = "SELECT * from product where product_id = :product_id ";
   $params = array(
           ':product_id' => $product_id
       );
   $stmt = $dbh->prepare($query);
   $stmt->execute($params);
   return $stmt->fetch();

	
}

/**
 * Multiple items in shopping cart 
 * @param Array with multiple items
 */
function addToCart($post)
{   
	$qty = $post['qty'];
	$product_id = $post['product_id'];
	$product = getOneProduct($product_id);
	$item = array(
        'product_name' =>$product['product_name'],
        'price' => $product['price'],
        'qty' => $qty,
        'total' => $product['price'] * $qty
	    );
    $_SESSION['cart'][$product_id] = $item;
}
/*
function removeFromCart($product_id)
{
    if(!empty($_SESSION['cart'])){
	    foreach($_SESSION['cart'] as $key => $row){
           if($key == 'product_id'){
           	unset($_SESSION["cart"][$key]); ?>
           }	
	    }
		
} */

/**
 * Function to get sub total from the cart by adding all items
 * @return $sub
 */
function getCartSubTotal()
{
	$sub = 0;
	foreach ($_SESSION['cart'] as $key => $item) {
		$sub += $item['total'];
	}
	return $sub;
}

/**
 * Function for gettin PST
 * @return PST
 */
function getPst()
{
	return getCartSubTotal() * PST;
}

/**
 * Function for getting GST
 * @return GST
 */
function getGst()
{
	return getCartSubTotal() * GST;
}

/**
 * Function for getting total by adding subtotal, gst and pst
 * @return total
 */
function getTotal()
{
	$sub = getCartSubTotal();
	$pst = getPst();
	$gst = getGst();
	return $sub + $pst + $gst;
}