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
$title = 'admin_orders_list';

/**
 * assigning a new variable for h1
 */
$h1 = 'Here you can see list of all our orders';
/**
 * include file which will be used as a template for each page as a header
 */
try {
    if (!empty($_GET['order_id'])) {
        $roast = $_GET['order_id'];
        $query = "SELECT * FROM orders WHERE order_id = :order_id";
        $params = array(
          ':order_id' => $order_id);
    } elseif (!empty($_GET['s'])) {
        // we have a search
          $query = 'SELECT * FROM orders
        WHERE
        first_name LIKE :search
        ORDER by orders.sub_total';

        $params = array(
          ':search' => "%{$_GET['s']}%"
        );
    } else {
      // create query
        $query = 'SELECT * FROM 
        orders
        
        ORDER by orders.sub_total';

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
<main>
      
  <h1><?=$h1?></h1> 

  <div id="admin_orders_page">

    <!-- including file which will be used as a template for admin pages -->
  <?php include __DIR__ . '/../inc/admin.inc.php'; ?>  

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

  <p><a href="admin_add_order.php" style="width: 75px; 
                                          background-color: #fc9; 
                                          padding-left: 10px; 
                                          padding-top: 2px;
                                          padding-bottom: 2px; 
                                          border-radius: 10px; 
                                          font-size: 18px;
                                          color: #000;
                                          text-decoration: none;
                                          padding-right: 10px;">Add</a></p>
  <table>
    <tr>
      <th>Sub total</th>
      <th>GST</th>
      <th>PST</th>
      <th>Total</th>
      <th>Customer Id</th>
      <th>CC num</th>
      <th>Auth code</th>
      <th></th>
    </tr>
    <?php foreach ($results as $key => $row) : ?>
    <tr>
      <td><?=$row['sub_total']?></td>
      <td><?=$row['gst']?></td>
      <td><?=$row['pst']?></td>
      <td><?=$row['total']?></td>
      <td><?=$row['customer_id']?></td>
      <td><?=$row['cc_num']?></td>
      <td><?=$row['auth_code']?></td>
      <td><button>delete</button>
          <p><a href="admin_update_orders.php" style="width: 75px; 
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
</main>    
<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>