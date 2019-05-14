<?php
/**
 * WDD4
 * Object oriented PHP
 * Assignment 2
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
$title = 'list_view';

/**
 * assigning a new variable for h1
 */
$h1 = 'Coffee we offer';
/**
 * include file which will be used as a template for each page as a header
 */
if(empty($_GET['product_id'])) die('Please pick a product');

$product_id = intval($_GET['product_id']);


// create query (remeber it will have a parameter)

$query = 'SELECT
			product.product_id,
		    product.name,
		    product.short_description,
		    product.product_image,
		    product.long_description,
		    product.availability,
		    product.country_of_origin,
		    product.weight,
		    product.price,
		    product.delivery_cost,
		    product.roast,
		    product.grind
		    FROM product
			WHERE
			product_id = :product_id';

// create your param array
$params = [
	':product_id' => $product_id
];

// prepare query
$stmt = $dbh->prepare($query);

// execute query with params
$stmt->execute($params);

// fetch your result
$result = $stmt->fetch(\PDO::FETCH_ASSOC);

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<title>Product Detail</title>
</head>
<body>

	<p><a href="shop_page.php">Back to product list</a></p>



<h2><?=$result['product_name']?></h2>

<ul>
<?php foreach($result as $key => $value) : ?>

	<?php if($key == 'availability') : ?>
		<li><strong><?=$key?></strong>: <?=($value) ? 'yes' : 'no' ?></li>
	<?php else : ?>
		<li><strong><?=$key?></strong>: <?=$value?></li>
	<?php endif; ?>

<?php endforeach; ?>
</ul>



</body>
</html>