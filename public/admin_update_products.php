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
$title = 'update_product';

/**
 * assigning a new variable for h1
 */
$h1 = 'Update a product';

// errors flag
$errors = [];

$success = false;

// if this is a GET request,
if ('GET' == $_SERVER['REQUEST_METHOD']) {
    // only load page if $_GET['product_id'] is set
    if (empty($_GET['product_id'])) {
        die('Please choose a product to edit');
    } // end empty product_id
    
    try {
        $product_id = intval($_GET['product_id']);

        $query = 'SELECT * FROM product WHERE product_id = :product_id';

        $params = array(
            ':product_id' => $product_id
        );

        $stmt = $dbh->prepare($query);

        $stmt->execute($params);

        $_POST = $stmt->fetch(\PDO::FETCH_ASSOC);

        // var_dump($result);
        // $_POST = $result;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} // end GET

if ('POST' == $_SERVER['REQUEST_METHOD']) {
    if (!$errors) {
        $query = 'UPDATE product
					SET
					product_name = :product_name,
					short_description = :short_description,
					product_image = :product_image,
					long_description = :long_description,
					availability = :availability,
					country_of_origin = :country_of_origin,
					weight = :weight,
					price = :price,
					delivery_cost = :delivery_cost,
					roast = : roast;
					grind = : grind
					WHERE
					product_id = :product_id';

        $params = array(
                    ':product_name' => $_POST['product_name'],
                    ':short_description' => $_POST['short_description'],
                    ':product_image' => $_POST['product_image'],
                    ':long_description' => $_POST['long_description'],
                    ':availability' => $_POST['availability'],
                    ':country_of_origin' => $_POST['country_of_origin'],
                    ':weight' => $_POST['weight'],
                    ':price' => $_POST['price'],
                    ':delivery_cost' => $_POST['delivery_cost'],
                    ':roast' => $_POST['roast'],
                    ':grind' => $_POST['grind'],
                    ':product_id' => $_POST['product_id']
            );

        try {
            $stmt = $dbh->prepare($query);

            if ($stmt->execute($params)) {
                header('Location:admin_products.php?product_id=' . $_POST['product_id']);
                die;
            } else {
                $errors['UPDATE'] = 'There was a problem updating that product!';
            } // if execute
        } catch (Exception $e) {
            echo $e->getMessage();
        } // end try
    } // no errors
} // end POST

/**
 * include file which will be used as a template for each page as a header
 */

include __DIR__ . '/../inc/header.inc.php';

?>
<?php include __DIR__ . '/../inc/flash.inc.php'; ?>

      <title><?=$title?></title>
      <main>
        <h1><?=$h1?></h1>
<?php include __DIR__ . '/../inc/admin.inc.php'; ?>
<?php include __DIR__ . '/../lib/errors.inc.php'; ?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <fieldset>
        <legend>Edit Product</legend>

        <input type="hidden" name="product_id" 
        value="<?=clean('product_id')?>" />

        <p><label for="product_name">Product name</label><br />
            <input type="text" name="product_name" 
            value="<?=clean('product_name')?>" /></p>

        <p><label for="short_description">Short description</label><br />
            <input type="text" name="short_description" 
            value="<?=clean('short_description')?>" /></p>

        <p><label for="product_image">Product image</label><br />
            <input type="text" name="product_image" 
            value="<?=clean('product_image')?>" /></p>

        <p><label for="long_description">Long description</label><br />
            <input type="text" name="long_description" 
            value="<?=clean('long_description')?>" /></p>

        <p><label for="availability">Availability</label><br />
            <input type="text" name="availability" 
            value="<?=clean('availability')?>" /></p>

        <p><label for="country_of_origin">Country of origin</label><br />
            <input type="text" name="country_of_origin" 
            value="<?=clean('country_of_origin')?>" /></p>

        <p><label for="weight">Weight</label><br />
            <input type="text" name="weight" 
            value="<?=clean('weight')?>" /></p>

        <p><label for="price">Price</label><br />
            <input type="text" name="price" 
            value="<?=clean('price')?>" /></p>

        <p><label for="delivery_cost">Delivery cost</label><br />
            <input type="text" name="delivery_cost" 
            value="<?=clean('delivery_cost')?>" /></p>

        <p><label for="roast">Roast</label><br />
            <input type="text" name="roast" 
            value="<?=clean('roast')?>" /></p>

        <p><label for="grind">Grind</label><br />
            <input type="text" name="grind" 
            value="<?=clean('grind')?>" /></p>

        <p><button style="width: 110px">Update Product</button></p>

    </fieldset>
</form>


</body>
</html>
