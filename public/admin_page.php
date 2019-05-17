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
include __DIR__ . '/../inc/admin.inc.php';
?>  
  <title><?=$title?></title>
  
  <style>
   div#admin nav{
        width: 150px;
        height: 500px;
        float: left;
        background-color: #000;
        text-align: left;
        margin-top: 25px;
        color: #fff;
      }
      /* CSS for unordered list in Navigation menu*/
    div#admin nav ul{
        margin: 0px;
        padding-top: 90px;
        padding-left: 10px;
        left: 5px;
      }
      /* CSS for styling and displaying navigation menu */
    div#admin nav ul li{
        display: inline-block;
        list-style-type: none;
      }
      /* Styling a hyperlink, which is used to link from one page to another using CSS*/
    div#admin nav ul li a{
        padding: 15px 35px 25px 35px;
        display: block;
        text-decoration: none;
        color: #fff;
        font-size: 20px;
      }
    div#admin nav ul li a:hover{
        color: #fff;
        background-color: #99c;
      }
   
  </style>
  <main>

<div id="admin_page" style="background-color: #fff">
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
</body>
  
    <?php
  /**
   * include file which will be used as a template for each page as a footer
   */
    include __DIR__ . '/../inc/footer.inc.php';

    ?>    
</html>
