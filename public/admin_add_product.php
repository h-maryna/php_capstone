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
$title = 'shop_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Coffee beans list';

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
					   (product_name, short_description, country_of_origin)
					   VALUES
					   (:product_name, :short_description, :country_of_origin)";
            
            // prepare query
            $stmt = $dbh->prepare($query);

            $params = array(
                ':product_name' => $_POST['product_name'],
                ':short_description' => $_POST['short_description'],
                ':country_of_origin' => $_POST['country_of_origin']
            );

            // execute query
            $stmt->execute($params);

            $author_id = $dbh->lastInsertId();

            //header('Location: 05_author_detail.php?author_id=' . $author_id);
            //exit;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } // end if
}// end IF POST

include __DIR__ . '/../inc/header.inc.php';

?>
<?php include __DIR__ . '/../inc/flash.inc.php'; ?>
    <title>Add Product</title>
    <style>
        .errors {
            color: #990000;
        }
    </style>
</head>
<body>

<h1>Add a new product</h1>



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
        <label for="country_of_origin">Country</label><br />
        <input type="text" name="country_of_origin" id="country_of_origin" value="<?=clean('country_of_origin')?>" />
        </p>

        <p>
        <button>Add</button>
        </p>

    </fieldset>

</form>

<p><a href="admin_products.php">Go back to check products</a></p>
<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>
    </div>
  </body>

</html>
