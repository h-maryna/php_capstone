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


// errors flag
$errors = [];

$success = false;
	
	
// create query
$query = "INSERT INTO
		   product(
		   product_name, 
		   short_description, 
		   product_image, 
		   long_description, 
		   availability,
		   country_of_origin,
		   weight,
		   price,
		   delivery_cost,
		   roast,
		   grind
		   )
		   VALUES
		   (
		   :product_name, 
		   :short_description, 
		   :product_image, 
		   :long_description, 
		   :availability,
		   :country_of_origin,
		   :weight,
		   :price,
		   :delivery_cost,
		   :roast,
		   :grind)";

// prepare query
$stmt = $dbh->prepare($query);

$params = array(
	':name' => $_POST['name'],
	':country' => $_POST['country']
);

// execute query
$stmt->execute($params);

$product_id = $dbh->lastInsertId();

header('Location: admin_detail_added.php?product_id=' . $product_id);
exit;

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<title>Add Country</title>
	<style>
		.errors {
			color: #990000;
		}
	</style>
</head>
<body>

<h1>Add product</h1>

 <?php include 'errors.inc.php'; ?>

<form action="<?=$_SERVER['PHP_SELF'] ?>" method="post" novalidate>

	<fieldset>
		<legend>Add New Author</legend>

		<p>
		<label for="author">Author</label><br />
		<input type="text" name="name" id="author" 
		value="<?=clean('name')?>" />
		</p>

		<p>
		<label for="country">Country</label><br />
		<input type="text" name="country" id="country" value="<?=clean('country')?>" />
		</p>

		<p>
		<button>Submit</button>
		</p>

	</fieldset>

</form>


</body>
</html>