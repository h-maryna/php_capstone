<?php
/**
 * WDD4
 * PHP CAPSTONE PROJECT
 * Instructor Steve George
 * Author: Maryna Haidashevska
 * Date: May 28, 2019
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


/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';

?>

<main>
  <h1><?=$h1?></h1>

  <table>
      <tr>
        <th>Product name</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>PST</th>
        <th>GST</th>
        <th></th>
      </tr>
      <div class="cart">
  <?php foreach ($_SESSION['cart'] as $key => $row) : ?>
      <tr>
        <td><?=$row['product_name']?></td>
        <td><?=$row['qty']?></td>
        <td><?=getCartSubtotal()?></td>
        <td><?=getPst()?></td>
        <td><?=getGst()?></td>
        <td><form method='post' action=''>
            <input type='hidden' name='action' value="remove" />
            <button type='submit' class='remove'>remove item</button>
            </form>
        </td>
       </tr>
       <tr>
  <?php endforeach; ?>
          <td colspan="1"><strong>Total</strong></td>
          <td colspan="4" style="text-align: right;"><strong><?=number_format(getTotal(), 1)?> CAD</strong></td>
          <td><p><a href="payment.php" style="width: 85px; background-color: #fc9; padding-left: 10px; padding-top: 2px;
                                              padding-bottom: 2px; border-radius: 10px; font-size: 18px;
                                              color: #000; text-decoration: none; padding-right: 10px;">Make<br />a payment</a></p></td>
        </tr>

  </div>
  </table>



<p><a href="shop_page.php">Back to shopping</a></p>


</main>
<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>