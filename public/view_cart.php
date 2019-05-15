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
    <?php foreach($results as $key => $row) : ?>
    <tr>
      <td><?=$row['product_name']?></td>
      <td><?=$row['quantity']?></td>
      <td><?=$row['price']?></td>
      <td><form action="cart.php" method="post">
            <input type="hidden" name="product_id" value="<?=$row['product_id']?>" />
            <button>remove</button>
          </form>
      </td>
    </tr>
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