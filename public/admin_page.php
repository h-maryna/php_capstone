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
$title = 'admin_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Here you can see all customers events';

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

<main>
  <h1><?=$h1?></h1>
<?php include __DIR__ . '/../inc/admin.inc.php'; ?>
<div style="background-color: #fff; margin-left: 150px" >

<?php if ($result) : ?>
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

</main> 
 
<?php
/**
* include file which will be used as a template for each page as a footer
*/
include __DIR__ . '/../inc/footer.inc.php';

?>    

