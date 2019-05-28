<?php
/**
 * WDD4
 * PHP CAPSTONE PROJECT
 * Instructor Steve George
 * Author: Maryna Haidashevska
 * Date: May 28, 2019
 */
namespace classes;

use classes\Ilogger;
use classes\DatabaseLogger;
use classes\FileLogger;

require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/../classes/Validator.php';


$title = 'payment';

/**
 * assigning a new variable for h1
 */
$h1 = 'You can start your payment here:';

$product_id = intval($_SESSION['cart']);

if (empty($_SESSION['logged_in'])) {
    setFlash('error', "You must be logged in to make a payment");
    header('Location: login_page.php');
    die;
}

// empty errors array
// serves as flag... we
// can test at any time to see
// if we have errors
$errors = [];

$v = new Validator();
// Set flag that form has not been
// submitted successfully.  This will
// be used as a conditional to determine
// what to display in the view.
$success = false;


// If the request is POST (a form submission)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Our required fields
    $required = ['card_name', 'billing_address', 'credit_card', 'expmonth', 'cvv'];

  // Make sure there is a POST value for each
  // required field
    foreach ($required as $key => $value) {
        $v->required($value);

       


    // Our required fields
        if ('POST' == filter_input(INPUT_SERVER, 'REQUEST_METHOD')) {
            if ($_SESSION['token'] != filter_input(INPUT_POST, 'token')) {
                die('CSRF token mismatch');
            }
        } // if filter input
   // end foreach
    }
     $v->string('card_name');
        $v->string('billing_address');
        $v->credit_card('credit_card');
        $v->cvv('cvv');

  

  
  // If there are no errors after processing all POST
    if (!$v->errors()) {
        try {
      // create query
            $query = "INSERT INTO
             orders
             (customer_id, sub_total, gst, pst, total, cc_num, auth_code)
             VALUES
             (:customer_id, :sub_total, :gst, :pst, :total, :cc_num, :auth_code)";
      
      // prepare query
            $stmt = $dbh->prepare($query);
            $params = array(
            ':customer_id' => $_SESSION['user_id'],
            ':sub_total' => getCartSubtotal(),
            ':gst' => getGst(),
            ':pst' => getPst(),
            ':total' => getTotal(),
            ':cc_num' => intval(substr($_POST['credit_card'], -4)),
            ':auth_code' => rand(1111, 9999)
            );
      // execute query
            $stmt->execute($params);

            $order_id = $dbh->lastInsertId();
      
      //prepare query
            $query = "INSERT INTO order_product (
                                       order_id, product_id, product_name, price, quantity
                                          )
                                          VALUES (:order_id, :product_id, :product_name, :price, :quantity)";

            foreach ($_SESSION['cart'] as $key => $item) {
                $params = array(
                      ':order_id' => $order_id,
                      ':product_id' => $key,
                      ':product_name' =>$item['product_name'],
                      ':price' => $item['price'],
                      ':quantity' => $item['qty']);
                $stmt = $dbh->prepare($query);
                $stmt->execute($params);
            }
      
            $_SESSION['order_id'] =$order_id;
           //header('Location: redirect_form.php');
            header('Location: thankyou.php');
            die;
      //exit;
        } catch (Exception $e) {
            die($e->getMessage());
        } // end catch
    } // end if errors
} // END IF POST

// variable for detecting adn showing errors
$errors = $v->errors();

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';

?> 
<!-- including flash methods and errors to show messages and errors to the customers -->
<?php include __DIR__ . '/../inc/flash.inc.php'; ?>
<?php include __DIR__ . '/../lib/errors.inc.php'; ?>

<main>
  <h1><?=$h1?></h1>
  <h2>Items in your cart: </h2>
    <table>
      <tr>
        <th>Product name</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Pst</th>
        <th>Gst</th>
      </tr>
     
      <?php foreach ($_SESSION['cart'] as $key => $row) : ?>
      <tr>
        <td><?=$row['product_name']?></td>
        <td><?=$row['qty']?></td>
        <td><?=getCartSubtotal()?></td>
        <td><?=getPst()?></td>
        <td><?=getGst()?></td>
      </tr>
      <?php endforeach; ?>
      <tr>
          <td><strong>Total</strong></td>
          <td colspan="4" style="text-align: right;">
              <strong><?=number_format(getTotal(), 1) . ' CAD'?>
              </strong>
          </td>
      </tr>
   
    </table>
  <p><a href="shop_page.php">Back to shopping cart</a></p>


  <form method="post" action="<?=filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING)?>">
   <input type="hidden" name="token" value="<?=getToken()?>" />
   <fieldset>
        <legend>Payment Form</legend>
          <p><label for="card_name">Name on card</label>
          <input type="text" id="card_name" name="card_name" value="<?=clean('card_name')?>" placeholder="John More Doe">
          &nbsp;<?=(!empty($errors['card_name'])) ?
            "<span class='errors'>{$errors['card_name']}</span>" : '' ?></p>

          <p><label for="billing_address">Billing address</label>
          <input type="text" id="billing_address" name="billing_address" value="<?=clean('billing_address')?>" placeholder="Billing Address">
          &nbsp;<?=(!empty($errors['billing_address'])) ?
            "<span class='errors'>{$errors['billing_address']}</span>" : '' ?></p>

          <p><label for="credit_card">Credit card number</label>
          <input type="text" id="credit_card" name="credit_card" value="<?=clean('credit_card')?>" placeholder="1111-2222-3333-4444" minlength="16" maxlength="19">
          &nbsp;<?=(!empty($errors['credit_card'])) ?
            "<span class='errors'>{$errors['credit_card']}</span>" : '' ?></p>

          <p><label for="expmonth">Expiration date</label>
          <input type="month" id="expmonth" name="expmonth">
          &nbsp;<?=(!empty($errors['expmonth'])) ?
            "<span class='errors'>{$errors['expmonth']}</span>" : '' ?></p>

          <p><label for="cvv">CVV</label>
          <input type="text" id="cvv" name="cvv" placeholder="352" maxlength="3" minlength="3">
          &nbsp;<?=(!empty($errors['cvv'])) ?
            "<span class='errors'>{$errors['cvv']}</span>" : '' ?></p>
    </fieldset>
            <p><button style="width: 120px">Complete Purchase</button></p>

  </form>


</main>

<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>
