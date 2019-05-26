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
$query3 = "SELECT first_name, last_name, email, street, city, postal_code, province, country FROM user WHERE user_id = :customer_id";


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
    
    // prepare the query
    $stmt = $dbh->prepare($query2);

    // execute the query
    $stmt->execute($params);

    // get the result
    $line_items = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
    // prepare the query
    $stmt = $dbh->prepare($query3);

    // Prepare params array
    $params = array(
              ':customer_id' => $order['customer_id']
            );

    // execute the query
    $stmt->execute($params);

    // get the result
    $customer =$stmt->fetch(\PDO::FETCH_ASSOC);

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';

?>

    <title><?=$title?></title>
    <main><!--Main page -->
      <h1><?=$h1?></h1>
    <!-- List to show some customer's info -->
      <ul>
          <?php foreach($customer as $key => $value) : ?>

          <li><strong><?=$key?></strong>: <?=$value?></li>
    
         <?php endforeach; ?>
     </ul>
  <!-- table to show some info about customer's order -->
   <table>
    <tr>
      <th>Order ID</th>
      <th>Product name</th>
      <th>Price</th>
      <th>Quantity</th>
    </tr>
<?php foreach ($line_items as $key => $row) : ?>
    <tr>
      <td><?=$row['order_id']?></td>
      <td><?=$row['product_name']?></td>
      <td><?=$row['price']?></td>
      <td><?=$row['quantity']?></td>
<?php endforeach; ?>
    </tr>
</table>


    <ul>
          <?php foreach($order as $key => $value) : ?>

          <li><strong><?=$key?></strong>: <?=$value?></li>
    
         <?php endforeach; ?>
     </ul>

  <img src="/images/thankyou.png" width="auto">

    <p><a href="shop_page.php" style="text-decoration: none; color: #f00">Continue to shopping</a></p>

    <h2>There were some problem adding a new user</h2>



</body>
  
    <?php
  /**
   * include file which will be used as a template for each page as a footer
   */
    include __DIR__ . '/../inc/footer.inc.php';

    ?>    
</html>