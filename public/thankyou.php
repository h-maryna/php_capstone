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

 // Create query to select an order according its id
  $query = "SELECT * FROM orders JOIN invoice
            WHERE order_id = :order_id";
      $stmt = $dbh->prepare($query);

        $params = array(
        ':order_id' => 'order_id'
        );

        $stmt->execute($params);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
      include __DIR__ . '/../inc/header.inc.php';
?>
    <title><?=$title?></title>
    <main><!--Main page -->
      <h1><?=$h1?></h1>

<?php if ($result) : ?>
<h2><?=$result['card_name']?> , thanks for shopping with us!</h2>

  <ul><!-- Loop through $_POST to output user -->
    <?php foreach ($result as $key => $value) : ?>
    <!-- Test each value to see if it's an array, and
      if it's NOT an array, we can print it out -->
      <li><strong><?=$key?></strong>: <?=$value?></li>
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