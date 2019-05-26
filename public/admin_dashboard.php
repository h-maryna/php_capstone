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

 /**
  * assigning a new variable for title
  */
$title = 'admin_orders_list';

/**
 * assigning a new variable for h1
 */
$h1 = 'Here you can see list of all our orders';

$query = 'SELECT(SELECT SUM(total) FROM orders),
                 (SELECT SUM(gst) FROM orders),
                 (SELECT SUM(pst) FROM orders),
                 (SELECT COUNT(user_id) from user)
         ';

$params = [];

$stmt = $dbh->prepare($query);

$stmt->execute($params);
    
$total = $stmt->fetch(\PDO::FETCH_ASSOC);

foreach($total as $key => $value){

$dataPoints = array( 
	array("y" => $value, "label" => "Total"),
	array("y" => $value, "label" => "GST"),
	array("y" => $value, "label" => "PST"),
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

  <p></p>
  <ul>
      <?php foreach($total as $key => $value) : ?>

      <li><strong><?=$key?></strong> : <?=$value?></li>

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
