<?php
/**
 * WDD4
 * PHP CAPSTONE PROJECT
 * Instructor Steve George
 * Maryna Haidashevska
 */

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

include __DIR__ . '/../inc/header.inc.php';

?> <title><?=$title?></title>
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
      <main>
        <h1><?=$h1?></h1>
        <h2>Items in your cart: </h2>
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
            </tr>
            <?php endforeach; ?>
            </div>
        </table>
<p><a href="shop_page.php">Back to shopping cart</a></p>


<form method="post" action="">
  <input type="hidden" name="" value="" />
            <p><label for="cname">Name on card</label></p>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe"><br />
            <p><label for="address">Billing address</label></p>
            <input type="text" id="address" name="address" placeholder="Billing Address"><br />
            <p><label for="ccnum">Credit card number</label></p>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"><br />
            <p><label for="expmonth">Expiration date</label></p>
            <input type="date" id="expmonth" name="expmonth" placeholder="mm/yyyy"><br />
            <p><label for="cvv">CVV</label></p>
            <input type="text" id="cvv" name="cvv" placeholder="352" maxlength="3" minlength="3"><br />
</form>

<form method='post' action='thankyou.php'>
<input type='hidden' name='action' value="thankyou" />
<button type='submit' class='thankyou' style="width: 100px;">Copmlete Purchase</button>
</form>

<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>
</body>
</html>
