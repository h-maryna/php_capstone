<?php 
/**
 * WDD4
 * Intermrdiate PHP
 * Assignment 2
 * Instructor Steve George
 * Maryna Haidashevska
 */

namespace classes;

use classes\Ilogger;
use classes\DatabaseLogger;
use classes\FileLogger;


require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';


/**
  * assigning a new variable for title
*/ 
$title = 'admin_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Welcome Admin!';

// Create query to select events from our log file
$query = "SELECT * 
          FROM log
          ORDER BY id DESC
          LIMIT 10";
// Prepare query
$stmt = $dbh->prepare($query);
// Execute the query
$stmt->execute();
// get the result
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
 
/**
 * include file which will be used as a template for each page as a header
 */

include __DIR__ . '/../inc/header.inc.php';

?>  
  <title><?=$title?></title>
  <main>
    <h1><?=$h1?></h1>

<div id="admin_page" style="background-color: #fc9">
<?php if($result) : ?>

<ul>
  <?php foreach ($result as $value) :?> 
     <li><strong><?php echo $value['id'] ?></strong></li>
     <li><?php echo $value['event'] ?></li>
  <?php endforeach; ?>
</ul>

<?php else : ?>
  <h2>Sorry ther is an error in your events</h2>
<?php endif; ?>
</div>
</body>
  
  <?php 
  /**
   * include file which will be used as a template for each page as a footer
   */
   include __DIR__ . '/../inc/footer.inc.php';

  ?>    
</html>