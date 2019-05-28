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


/**
  * assigning a new variable for title
*/
$title = 'profile_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Welcome to your profile page!';

// User should not see this page
if (empty($_SESSION['logged_in'])) {
    setFlash('error', "You must be logged in to visit this page");
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

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';

?>

<?php include __DIR__ . '/../inc/flash.inc.php'; ?>

  <main>
    <h1><?=$h1?></h1>
      <div id="profile_wrapper">
         <div id="profile">

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
</div>

</main> 

<?php
/**
* include file which will be used as a template for each page as a footer
*/
include __DIR__ . '/../inc/footer.inc.php';

?>  

