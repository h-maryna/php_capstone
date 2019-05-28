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

// condition for cheching if user has admin access
if(!$_SESSION['admin']  || !$_SESSION['logged_in'])
  { 
    setFlash('error','Not authorized, please log in as an admin');
    header('Location: login_page.php'); 
    die;
  }


 /**
  * assigning a new variable for title
  */
$title = 'shop_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Coffee beans list';
/**
 * include file which will be used as a template for each page as a header
 */
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $product_id = intval($_POST['product_id']);
    $query = 'INSERT INTO product_arc SELECT * from product where product_id = :product_id';
    $params = array(
            ':product_id' =>$product_id
          );
    $stmt = $dbh->prepare($query);
    $stmt->execute($params);
    $query = 'DELETE FROM product where product_id = :product_id';
    $stmt=$dbh->prepare($query);
    $stmt->execute($params);
    setFlash('success', 'You successfully deleted one product!');
    header('Location: admin_products.php');
    die;
}
try {
    if (!empty($_GET['roast'])) {
        $roast = $_GET['roast'];
        $query = "SELECT * FROM product WHERE roast = :roasted";
        $params = array(
          ':roasted' => $roast);
    } elseif (!empty($_GET['s'])) {
        // we have a search
          $query = 'SELECT * FROM product
        WHERE
        product_name LIKE :search
        ORDER by product.product_name';

        $params = array(
          ':search' => "%{$_GET['s']}%"
        );
    } else {
      // create query
        $query = 'SELECT * FROM 
        product
        
        ORDER by product.product_name';

        $params = [];
    } // end GET s

  // create statement
    $stmt = $dbh->prepare($query);

    $stmt->execute($params);

  // fetch our results
    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

// end try
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';
?>

<!-- including flash method to show messages to the customer/admin -->
<?php include __DIR__ . '/../inc/flash.inc.php'; ?> 

      <main>
        <h1><?=$h1?></h1>
  <div id="admin_products_page">
        <?php include __DIR__ . '/../inc/admin.inc.php'; ?>
        <h2>Types of roast</h2>

        <ul>
          <li><a href="shop_page.php?roast=roasted">Roasted</a></li>
          <li><a href="shop_page.php?roast=unroasted">Unroasted</a></li>  
        </ul>

      <div id="search">
          <form action="<?=basename($_SERVER['PHP_SELF'])?>" method="get">
              <p><input type="text" name="s" placeholder="search" /></p><button>Search</button>
          </form>
      </div>

<!-- Only show this line if $_GET['s'] is set 
     That is, only show this block if there is a search -->
  <?php if (!empty($_GET['s'])) : ?>

  <h3>Your search for <span class="search"><?=e($_GET['s'])?>
                    </span> returned <?=count($results)?> result(s)</h3>

  <?php endif; ?>

  <!-- End if -->
  <p><a href="admin_add_product.php" style="width: 75px; background-color: #fc9; padding-left: 10px; padding-top: 2px;
                                                    padding-bottom: 2px; border-radius: 10px; font-size: 18px;
                                                    color: #000; text-decoration: none; padding-right: 10px;">Add</a></p>
  <table>
    <tr>
      <th>Product name</th>
      <th>Product image</th>
      <th>Country of origin</th>
      <th>Roast</th>
      <th>Grind</th>
      <th>Short description</th>
      <th>Price, $ per 100 gramm</th>
      <th></th>
    </tr>
    <?php foreach ($results as $key => $row) : ?>
    <tr>
      <td><a href="list_view.php?product_id=<?=$row['product_id']?>"><?=$row['product_name']?></a></td>
      <td><img src = "/images/orders/<?=$row['product_image']?>" 
               alt="<?=$row['product_name']?>" 
               style="width: 100px; height: 75px;"/></td>
      <td><?=$row['country_of_origin']?></td>
      <td><?=$row['roast']?></td>
      <td><?=$row['grind']?></td>
      <td><?=$row['short_description']?></td>
      <td><?=$row['price']?></td>
      <td><form action="admin_products.php" method="post">
            <input type="hidden" name="product_id" value="<?=$row['product_id']?>" />
            <button>delete</button>
          </form>
      <p><a href="admin_update_products.php?product_id=<?=$row['product_id']?>" 
            style="width: 75px; 
                   background-color: #fc9;
                   padding-left: 10px; 
                   padding-top: 2px;
                   padding-bottom: 2px; 
                   border-radius: 10px; 
                   font-size: 18px;
                   color: #000; 
                   text-decoration: none;
                   padding-right: 10px;">edit</a></p>    
         
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>


      <h2>Fresh Roasted Coffee Beans</h2><a href="#" class="go_top">Go to the top</a>  
        <p>Your arabica coffee beans are roasted within hours of placing your order and
         shipped to you immediately. It's as fresh as you can get, without roasting 
         them yourself at home. When you order, your coffee beans are roasted to a 
         medium roast, dark roast or espresso roast depending on your option, then 
         ground (or not) to how you choose on the product page. This ensures you get
         the freshest, best roasted coffee possible, and not coffee that has been 
         sitting on store shelves for weeks or even months. We bag the fresh coffee 
         beans in a valve bag that releases the CO2 while preventing air from 
         entering - guaranteeing your coffee remains fresh and at peak flavour for 
         as long as possible.</p>
      <h2>Whole Bean Coffee</h2><a href="#" class="go_top">Go to the top</a>
        <p>All of our coffee begins as whole coffee beans, and we can ship it to you
         unground, or you can tell us grind it however you want at no extra charge. 
         Buying the coffee as whole bean allows you to grind it yourself, which keeps
         it fresh until you're ready to brew. One of the most important things you 
         can do to keep your coffee tasting fresh is buy it whole bean, and then 
         grind it just before you're ready to brew. It keeps the aroma locked up, 
         and prevents the coffee from oxidizing so that you can enjoy more of the 
         true, bold taste. Because of this you won't find the cheapest coffee here, 
         but with the high quality you will find one of the best coffee values in 
         Canada. This coffee can be used to make cold brew coffee as well, or you can
         buy pre-made pour-and-serve cold brew.<p>
      <h2>Bulk Coffee Beans</h2><a href="#" class="go_top">Go to the top</a>
        <p>Coffees here are broken down into the 1-lb (16 oz, 454 g, 0.45 kg) valve-seal
        bags, making it easy to store multiple coffees without worrying about it going
        stale. If you want to order 1kg (2.2-lb) or 1.36kg (3-lb), simply order 
        multiple 1-lb bags. We also have 5-lb (2.27kg) bags available under our 
        wholesale coffee section. For restaurants and hotels, you can find coffee 
        fraction packs in a variety of sizes.<p>
     </main>
     
<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>