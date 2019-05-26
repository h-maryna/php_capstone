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


/**
  * assigning a new variable for title
*/
$title = 'admin_update_customers';

/**
 * assigning a new variable for h1
 */
$h1 = 'Page is under construction!';

 
/**
 * include file which will be used as a template for each page as a header
 */

include __DIR__ . '/../inc/header.inc.php';

?>  
  <title><?=$title?></title>
  <main>

<div id="admin_update_customers">
<?php include __DIR__ . '/../inc/admin.inc.php'; ?>

<img src="/images/construction.jpg" width="800px" height="550px" style="margin-left: 10px; margin-top: 25px">
  
    <?php
  /**
   * include file which will be used as a template for each page as a footer
   */
    include __DIR__ . '/../inc/footer.inc.php';

    ?>    
</html>
