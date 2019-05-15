<?php


require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';

  if(!empty($_SESSION['cart'])) {
    // we have a search
      global $dbh;
      $query = 'SELECT * FROM product
        WHERE
        product_name LIKE :cart
        ORDER by product.product_name';

        $params = array(
          ':cart' => "%{$_SESSION['cart']}%"
        );
         // fetch our results
       $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

include __DIR__ . '/../inc/header.inc.php';

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<title>View Cart</title>
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
<?php foreach ($_SESSION["cart"] as $product_name) : ?>
<tr>
<td><?=$product["product_name"]; ?><br />
<td><?=$product["price"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
<?php endforeach; ?>
  </table>


<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>
</body>
</html>