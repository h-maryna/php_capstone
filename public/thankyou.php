<?php
/**
 * WDD4
 * PHP CAPSTONE PROJECT
 * Instructor Steve George
 * Maryna Haidashevska
 */

namespace classes;

require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/../classes/Validator.php';

 /**
  * assigning a new variable for title
  */
$title = 'thankyou';

/**
 * assigning a new variable for h1
 */
$h1 = 'Thank you for shopping with us!';

// empty errors array
// serves as flag... we
// can test at any time to see
// if we have errors
// conditions for cheking if used looged in
if (empty($_SESSION['logged_in'])) {
    setFlash('error', "You must be logged in to visit this page");
    header('Location: login_page.php');
    die;
}

$user_id = intval($_SESSION['user_id']);
$order_id =intval($_SESSION['order_id']);

$query1 = "SELECT * FROM orders WHERE order_id = :order_id";
$query2 = "SELECT * FROM order_product 
              WHERE order_id = :order_id";
$query3 = "SELECT * FROM user WHERE user_id = :customer_id";


 // Create query to select an order according its id
  

    // Prepare params array
    $params = array(
      ':order_id' => $order_id
  );

        // prepare the query
    $stmt = $dbh->prepare($query1);


    // execute the query
    $stmt->execute($params);

    // get the result
    $order = $stmt->fetch(\PDO::FETCH_ASSOC);

    $stmt = $dbh->prepare($query2);
    $stmt->execute($params);
    $line_items = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
    $stmt = $dbh->prepare($query3);
    $params = array(
            ':customer_id' => $order['customer_id']
        );
    $stmt->execute($params);
    $customer =$stmt->fetch(\PDO::FETCH_ASSOC);

include __DIR__ . '/../inc/header.inc.php';
?>
    <title><?=$title?></title>
    <main><!--Main page -->
      <h1><?=$h1?></h1>
   <table>
    <tr>
      <th>Product name</th>
      <th>Quantity</th>
      <th>Subtotal</th>
      <th>PST</th>
      <th>GST</th>
      <th>PST</th>
      <th>GST</th>
    </tr>
    <div class="cart">

<?php foreach ($line_items as $key => $row) : ?>
    <tr>
      <td><?=$row['order_id']?></td>
      <td><?=$row['product_id']?></td>
      <td><?=$row['product_name']?></td>
      <td><?=$row['price']?></td>
      <td><?=$row['quantity']?></td>
<?php endforeach; ?>

<?php foreach ($order as $key => $row) : ?>
      <td><?=$row['order_id']?></td>

<?php endforeach; ?>
      </tr>
    </div>
</table>

    <p><a href="shop_page.php">Continue to shopping</a></p>

    <h2>There were some problem adding a new user</h2>



</body>
  
    <?php
  /**
   * include file which will be used as a template for each page as a footer
   */
    include __DIR__ . '/../inc/footer.inc.php';

    ?>    
</html>