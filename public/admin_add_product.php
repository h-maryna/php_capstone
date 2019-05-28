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
$title = 'admin_add_product';

/**
 * assigning a new variable for h1
 */
$h1 = 'Add a new product';

// errors flag
$errors = [];

$success = false;

// if REQUEST METHOD is POST
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    // Make sure all required fields are filled
    //
    
    if (empty($_POST['product_name'])) {
        $errors['product_name'] = 'Name is a required field';
    } elseif (strlen($_POST['product_name']) < 4) {
        $errors['product_name'] = 'Name must have at least 4 characters';
    }
    
    // if no errors
    if (!$errors) {
        try {
            // create query
            $query = "INSERT INTO
					   product
					   (product_name, short_description, long_description, country_of_origin, weight, price, roast)
					   VALUES
					   (:product_name, :short_description, :long_description, :country_of_origin, :weight, :price, :roast)";
            
            // prepare query
            $stmt = $dbh->prepare($query);

            $params = array(
                ':product_name' => $_POST['product_name'],
                ':short_description' => $_POST['short_description'],
                ':long_description' => $_POST['long_description'],
                ':country_of_origin' => $_POST['country_of_origin'],
                ':weight' => $_POST['weight'],
                ':price' => $_POST['price'],
                ':roast' => $_POST['roast'],
                
            );

            // execute query
            $stmt->execute($params);

            $author_id = $dbh->lastInsertId();

            header('Location: admin_products.php');
            exit;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } // end if
}// end IF POST

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';

?>
<?php include __DIR__ . '/../inc/flash.inc.php'; ?>
<main>
  <h1><?=$h1?></h1>



    <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post" novalidate>

        <fieldset>
            <legend>Add New Product</legend>

            <p>
            <label for="product_name">Product name</label><br />
            <input type="text" name="product_name" id="product_name" 
            value="<?=clean('product_name')?>" />
            </p>

            <p>
            <label for="short_description">Short description</label><br />
            <input type="text" name="short_description" id="short_description" 
            value="<?=clean('short_description')?>" />
            </p>

            <p>
            <label for="long_description">Long description</label><br />
            <input type="text" name="long_description" id="long_description" 
                   value="<?=clean('long_description')?>" />
            </p>

            <p>
            <label for="country_of_origin">Country</label><br />
            <input type="text" name="country_of_origin" id="country_of_origin" 
                   value="<?=clean('country_of_origin')?>" />
            </p>

            <p>
            <label for="weight">Weight</label><br />
            <input type="text" name="weight" id="weight" 
            value="<?=clean('weight')?>" />
            </p>

            
            <p>
            <label for="price">Price</label><br />
            <input type="text" name="price" id="price" 
            value="<?=clean('price')?>" />
            </p>

            <p>
            <label for="roast">Roast</label><br />
            <input type="text" name="roast" id="roast" 
            value="<?=clean('roast')?>" />
            </p>

            <p>
            <button>Add</button>
            </p>

        </fieldset>

    </form>

<p><a href="admin_products.php">Go back to check products</a></p>

</main>
<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>
