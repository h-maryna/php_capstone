<?php
/**
 * WDD4
 * PHP CAPSTONE PROJECT
 * Instructor Steve George
 * Maryna Haidashevska
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
$h1 = 'WELCOME, ADMIN!';

$query = 'SELECT(SELECT SUM(total) FROM orders),
                 (SELECT SUM(gst) FROM orders),
                 (SELECT SUM(pst) FROM orders),
                 (SELECT COUNT(user_id) FROM user),
                 (SELECT MIN(age) FROM user),
                 (SELECT AVG(total) FROM orders),
                 (SELECT MAX(total) FROM orders)         
         ';

$params = [];

$stmt = $dbh->prepare($query);

$stmt->execute($params);
    
$total = $stmt->fetch(\PDO::FETCH_ASSOC);
foreach ($total as $key => $value) {
// array to show data in a diagram
    $dataPoints = array(
    array("y" => $total['(SELECT SUM(total) FROM orders)'], "label" => "Total"),
    array("y" => $total['(SELECT SUM(gst) FROM orders)'], "label" => "GST"),
    array("y" => $total['(SELECT SUM(pst) FROM orders)'], "label" => "PST"),
    array("y" => $total['(SELECT AVG(total) FROM orders)'], "label" => "AVG order"),
    array("y" => $total['(SELECT MAX(total) FROM orders)'], "label" => "MAX order"),
  
    );
}
/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';
?>
      <title><?=$title?></title>
      <main>
        <h1><?=$h1?></h1>
        <div id="admin_dashboard_page">
        <?php include __DIR__ . '/../inc/admin.inc.php'; ?>
    <div id="chartContainer" style="height: 370px; width: 75%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>

  <h2>Some statistics about our orders</h2>
  <ul>
    <?php foreach ($total as $key => $value) : ?>
        <?php if ($key == '(SELECT SUM(total) FROM orders)') : ?>
        <li><strong>Total sum from orders</strong> : <?=number_format($value, 2)?> CAD</li>
        <?php elseif ($key == '(SELECT SUM(gst) FROM orders)') :?>
            <li><strong>Total gst from orders</strong> : <?=$value?> CAD</li>
        <?php elseif ($key == '(SELECT SUM(pst) FROM orders)') :?>
            <li><strong>Total pst from orders</strong> : <?=$value?> CAD</li>
        <?php elseif ($key == '(SELECT COUNT(user_id) FROM user)') :?>
            <li><strong>Total amount of customers</strong> : <?=$value?></li>
        <?php elseif ($key == '(SELECT MIN(age) FROM user)') :?>
            <li><strong>Minimum age of customers</strong> : <?=$value?></li>
        <?php elseif ($key == '(SELECT AVG(total) FROM orders)') :?>
            <li><strong>Average order per user</strong> : <?=number_format($value, 2)?> CAD</li>
        <?php elseif ($key == '(SELECT MAX(total) FROM orders)') :?>
        <li><strong>Maximum purchase from user</strong> : <?=number_format($value, 2)?> CAD</li>
      
        <?php else : ?>
            <li><strong><?=$key?></strong>: <?=$value?></li>
        <?php endif; ?>

    <?php endforeach; ?>
  </ul>
     

<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>
    </div>
  </body>

</html>
