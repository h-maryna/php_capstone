<?php

$status="";

if(!empty($_SESSION["cart"])) {
    foreach($_SESSION["cart"] as $key => $value) {
      if($_POST["product_id"] == $key){
      unset($_SESSION["cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["cart"]))
      unset($_SESSION["cart"]);
      }		
}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<title></title>
</head>
<body>

<h1></h1>

<div class="cart">
<?php
if(isset($_SESSION["cart"])){
    $total = 0;
?>	
<table class="table">
    <fieldset>
    	<tr>
			<td></td>
			<td>ITEM NAME</td>
			<td>QUANTITY</td>
			<td>PRICE</td>
			<td>TOTAL</td>
			</tr>
    </fieldset>>
	
</table>		
  

</div>
 
<div style="clear:both;"></div>
 
</body>
</html>