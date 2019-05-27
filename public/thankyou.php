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
      <h2 style="color: #fa9;">Your order has been processed and this is your official invoice:</h2>
      <div id="invoice" style="text-align: left; text-decoration: underline; font-size: 26px; font-style: italic; background-color: #fc9; padding: 15px; width: 120px;" >INVOICE</div>
     <ul>
        <?php foreach($order as $key => $value) : ?>
          <?php if($key == 'created_at') : ?>
            <li><strong>Invoive Date/Time</strong> : <?=$value?></li>
          <?php elseif ($key == 'order_id') :?>
            <li><strong>Invoice Number</strong> : <?=$value?></li>
          <?php elseif ($key == 'total') :?>
            <li><strong>Paid Amount</strong> : <?=number_format($value, 1)?> CAD</li>
          <?php endif; ?>
    
         <?php endforeach; ?>

      <?php foreach($customer as $key => $value) : ?>
       <?php if ($key == 'first_name') :?>
        <li><strong>Customer First Name</strong> : <?=$value?></li>
      <?php elseif ($key == 'last_name') :?>
        <li><strong>Customer Last Name</strong> : <?=$value?></li>
      <?php elseif ($key == 'email') :?>
        <li><strong>Customer Email</strong> : <?=$value?></li>
      
      <?php endif; ?>

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
    <tr> 
      <td><?php foreach($order as $key => $value) : ?>
          <?php if ($key == 'total') :?>
            <strong>Paid Amount</strong></td>
            <td colspan="3" style="text-align: right;"><strong> <?=number_format($value, 1)?> CAD</strong>
          <?php endif; ?>
    
         <?php endforeach; ?></td>
    </tr>
</table>


  <img src="/images/thankyou.png" width="auto">

    <p><a href="shop_page.php">Continue to shopping</a></p>


</body>
  
    <?php
  /**
   * include file which will be used as a template for each page as a footer
   */
    include __DIR__ . '/../inc/footer.inc.php';

    ?>    
</html>