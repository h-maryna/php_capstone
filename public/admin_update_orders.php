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
$title = 'admin_update_orders';

/**
 * assigning a new variable for h1
 */
$h1 = 'Page is under construction!';

 
/**
 * include file which will be used as a template for each page as a header
 */

include __DIR__ . '/../inc/header.inc.php';

?>  
  
  <main>
    <h1><?=$h1?></h1>

      <div id="admin_updating_orders">

        <?php include __DIR__ . '/../inc/admin.inc.php'; ?>

           <img src="/images/construction.jpg" width="800" height="550" 
                                               style="margin-left: 10px; 
                                               margin-top: 25px"
                                               alt="Page is under construction">
 

   </div>
</main> 
<?php
/**
* include file which will be used as a template for each page as a footer
*/
include __DIR__ . '/../inc/footer.inc.php';

?>    

