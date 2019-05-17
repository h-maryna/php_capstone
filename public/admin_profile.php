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
$title = 'profile_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Welcome, Admin, your page!';

// User should not see this page
if (empty($_SESSION['admin'])) {
    setFlash('error', "You must be admin in to visit this page");
    header('Location: login_page.php');
    die;
}

$id = intval($_SESSION['user_id']);

    // Create query to select a user according its id
    $query = "SELECT first_name, last_name, age, street, city, postal_code, province, country, phone, email FROM user 
            WHERE user_id = :user_id";

      // prepare the query
      $stmt = $dbh->prepare($query);

      // Prepare params array
      $params = array(
        ':user_id' => $id
      );

    // execute the query
      $stmt->execute($params);

    // get the result
      $result = $stmt->fetch(\PDO::FETCH_ASSOC);

include __DIR__ . '/../inc/header.inc.php';

include __DIR__ . '/../inc/admin.inc.php';
?>
<?php include __DIR__ . '/../inc/flash.inc.php'; ?>

  <title><?=$title?></title>
  <style>
  div#admin_profile nav{
        width: 150px;
        height: 500px;
        float: left;
        background-color: #000;
        text-align: left;
        margin-top: 25px;
        color: #fff;
      }
      /* CSS for unordered list in Navigation menu*/
    div#admin_profile nav ul{
        margin: 0px;
        padding-top: 90px;
        padding-left: 10px;
        left: 5px;
      }
      /* CSS for styling and displaying navigation menu */
    div#admin_profile nav ul li{
        display: inline-block;
        list-style-type: none;
      }
      /* Styling a hyperlink, which is used to link from one page to another using CSS*/
    div#admin_profile nav ul li a{
        padding: 15px 35px 25px 35px;
        display: block;
        text-decoration: none;
        color: #fff;
        font-size: 20px;
      }
    div#admin_profile nav ul li a:hover{
        color: #fff;
        background-color: #99c;
      }
   
  </style>
  </style>
  <main>
    <h1><?=$h1?></h1>
<div id="profile_wrapper"  style="background-color: #fc9">
<div id="admin_profile"></div>

<?php if ($result) : ?>
  <ul><!-- Loop through $_POST to output user -->
    <?php foreach ($result as $key => $value) : ?>
    <!-- Test each value to see if it's an array, and
      if it's NOT an array, we can print it out -->
        <?php if (!is_array($value)) : ?>
      <li><strong><?=e($key)?></strong>: <?=e($value)?></li>

        <?php endif; ?>
    <?php endforeach; ?>
    </ul>

    <p><a href="register_page.php">Add another user</a></p>
<?php else : ?>
    <h2>There were some problem adding a new user</h2>
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
