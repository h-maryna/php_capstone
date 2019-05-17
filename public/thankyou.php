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

$id = intval($_SESSION['user_id']);
if(!empty($_SESSION['cart'])){

 // Create query to select an order according its id
 /* $query = "SELECT * FROM order_product
            WHERE order_id = :order_id";
        $params = array(
        ':order_id' => 'order_id'
        );
        $stmt = $dbh->prepare($query);
        $stmt->execute($params);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC); */

     // Prepare query
    $query = "SELECT first_name, last_name, postal_code, province, country, phone, email FROM user 
            WHERE user_id = :user_id";
    // prepare the query
    $stmt = $dbh->prepare($query);

    // Prepare params array
    $params = array(
      ':user_id' => $id
  );

    // execute the query
    $stmt->execute($params);

    // get the result
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

}

include __DIR__ . '/../inc/header.inc.php';
?>
    <title><?=$title?></title>
    <main><!--Main page -->
      <h1><?=$h1?></h1>
   <table>
<?php foreach ($result as $key => $row) : ?>
    <tr>
      <td><?=$row['order_id']?></td>
      <td><?=$row['product_id']?></td>
      <td><?=$row['product_name']?></td>
      <td><?=$row['price']?></td>
      <td><?=$row['quantity']?></td>
    <?php endforeach; ?>
  </table>

  <?php if ($result) : ?>
  <ul><!-- Loop through $_POST to output user -->
    <?php foreach ($result as $key => $value) : ?>
    <!-- Test each value to see if it's an array, and
      if it's NOT an array, we can print it out -->
        <?php if (!is_array($value)) : ?>
      <li><strong><?=e($key)?></strong>: <?=e($value)?></li>

        <?php endif; ?>
    <?php endforeach; ?>
    </ul>


    <p><a href="shop_page.php">Continue to shopping</a></p>

    <?php else : ?>
    <h2>There were some problem adding a new user</h2>
<?php endif; ?>


</body>
  
    <?php
  /**
   * include file which will be used as a template for each page as a footer
   */
    include __DIR__ . '/../inc/footer.inc.php';

    ?>    
</html>