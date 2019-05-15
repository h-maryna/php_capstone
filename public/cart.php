<?php 

require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/../classes/Validator.php';



addToCart($_POST);
$_SESSION['message'] = 'Item added to cart';
header('Location: shop_page.php'); // sent us, redirect back to the page that sent us 
die;

deleteFromCart($item);
$_SESSION['message'] = 'Item removed from the cart';
header('Location: ' . $_SERVER['HTTP_REFERER']); // sent us, redirect back to the page that sent us 
die; 

