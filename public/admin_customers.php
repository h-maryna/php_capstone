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
$title = 'admin_customers_list';

/**
 * assigning a new variable for h1
 */
$h1 = 'Here you can see list of all our customers';
/**
 * include file which will be used as a template for each page as a header
 */
try {
    if (!empty($_GET['roast'])) {
        $roast = $_GET['roast'];
        $query = "SELECT * FROM user WHERE user_ = :roasted";
        $params = array(
          ':roasted' => $roast);
    } elseif (!empty($_GET['s'])) {
        // we have a search
          $query = 'SELECT * FROM user
        WHERE
        first_name LIKE :search
        ORDER by user.first_name';

        $params = array(
          ':search' => "%{$_GET['s']}%"
        );
    } else {
      // create query
        $query = 'SELECT * FROM 
        user
        
        ORDER by user.first_name';

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

include __DIR__ . '/../inc/header.inc.php';
?>
      <title><?=$title?></title>
      <style>
      table{  /*CSS style for table */
      border-spacing: 0px;
      /*border: 1px solid #fc9;*/
      border-collapse: collapse;
      color: #000;
      width: 70%;
      height: auto;
      border-radius: 15px;
      display: inline-block;
      margin: 15px 2px 5px 2px;
    }
    caption{  /*CSS style for caption in tables */
      color: #000;
      text-align: left;
      font-weight: 700;
      font-size: 20px;
      padding: 5px;
      margin-bottom: 5px;
    }
    td,th{
      border: 1px solid #fb6; 
    }
    th{ 
      color: #000;
      background-color: #fc9;
      text-align: center;
    }
    th img{
      background-color: #fff;
    }
    td{
      text-align: left;
      padding: 5px;
    }
    h2 p{
      padding: 5px;
    }   
</style>
      <main>
        <h1><?=$h1?></h1>
        <div id="admin_customers_page">
        <?php include __DIR__ . '/../inc/admin.inc.php'; ?>
      <div id="search">
          <form action="<?=basename($_SERVER['PHP_SELF'])?>" method="get">
              <p><input type="text" name="s" placeholder="search" /></p><button>Search</button>
          </form>
      </div>

  <!-- Only show this line if $_GET['s'] is set 
    -- That is, only show this block if there is a search -->
    <?php if (!empty($_GET['s'])) : ?>
  <h3>Your search for <span class="search"><?=e($_GET['s'])?></span> returned <?=count($results)?> result(s)</h3>

    <?php endif; ?>

  <!-- End if -->

  <p><a href="admin_add_customer.php" style="width: 75px; background-color: #fc9; padding-left: 10px; padding-top: 2px;
                                                    padding-bottom: 2px; border-radius: 10px; font-size: 18px;
                                                    color: #000; text-decoration: none; padding-right: 10px;">Add</a></p>
  <table>
    <tr>
      <th>First name</th>
      <th>Last name</th>
      <th>City</th>
      <th>Postal code</th>
      <th>Province</th>
      <th>Country</th>
      <th>Email</th>
      <th></th>
    </tr>
    <?php foreach ($results as $key => $row) : ?>
    <tr>
      <td><?=$row['first_name']?></td>
      <td><?=$row['last_name']?></td>
      <td><?=$row['city']?></td>
      <td><?=$row['postal_code']?></td>
      <td><?=$row['province']?></td>
      <td><?=$row['country']?></td>
      <td><?=$row['email']?></td>
      <td><form action="" method="post">
            <input type="hidden" name="edit" value="edit" />
            <button>delete</button>
          </form>
          <p><a href="admin_update_customers.php" style="width: 75px; background-color: #fc9; padding-left: 10px; padding-top: 2px;
                                                    padding-bottom: 2px; border-radius: 10px; font-size: 18px;
                                                    color: #000; text-decoration: none; padding-right: 10px;">edit</a></p>    
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

  </div>   
<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>
    </div>
  </body>

</html>
