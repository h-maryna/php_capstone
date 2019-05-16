<?php
/**
 * WDD4
 * PHP CAPSTONE PROJECT
 * Instructor Steve George
 * Maryna Haidashevska
 */

require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';


$title = 'view_cart';

/**
 * assigning a new variable for h1
 */
$h1 = 'View Your Items';

$status="";

$product_id = intval($_SESSION['cart']);


include __DIR__ . '/../inc/header.inc.php';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <title>View Cart</title>
    <style>
    table{  /*CSS style for table */
      border-spacing: 0px;
      /*border: 1px solid #fc9;*/
      border-collapse: collapse;
      color: #000;
      width: 100%;
      height: auto;
      border-radius: 15px;
      display: inline-block;
      margin: 15px 2px 5px 2px;
    }
    caption{  /*CSS style for caption in tables */
      color: #000;
      text-align: left;
      font-weight: 700;
      font-size: 20px;
      padding: 5px;
      margin-bottom: 5px;
    }
    td,th{
      border: 1px solid #fb6; 
    }
    th{ 
      color: #000;
      background-color: #fc9;
      text-align: center;
    }
    th img{
      background-color: #fff;
    }
    td{
      text-align: left;
      padding: 5px;
    }
    h2 p{
      padding: 5px;
    }
    
</style>
</head>
<body>

<h1>View Cart</h1>

<table>
    <tr>
      <th>Product name</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Total</th>
    </tr>
    <div class="cart">
<?php foreach ($_SESSION['cart'] as $key => $row) : ?>
    <tr>
      <td><?=$row['product_name']?></td>
      <td><?=$row['qty']?></td>
      <td><?=$row['price']?></td>
      <td><?=$row['total']?></td>
      <td><form method='post' action=''>
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>remove Item</button>
</form></td>
     </tr>
<?php endforeach; ?>
</div>
</table>



<p><a href="shop_page.php">Back to shopping</a> | <a href="payment.php">Make a payment</a></p>



<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>
</body>
</html>
