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
$title = 'shop_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Coffee beans list';

if(empty($_GET['product_id'])) {
	die('Author id required');
}

// a little bit of sanitization
$id = intval($_GET['product_id']);


// Create query to select an author based on id
$query = "SELECT * FROM product
			WHERE product_id = :aproduct_id";

// prepare the query
$stmt = $dbh->prepare($query);

// Prepare params array
$params = array(
	':product_id' => $product_id
);

// execute the query
$stmt->execute($params);

// get the result
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<title>Author Detail</title>
</head>
<body>

<?php if($result) : ?>

<h1><?=$result['name']?></h1>

<ul>
	<?php foreach($result as $key => $value) : ?>
		<li><strong><?=$key?></strong>: <?=$value?></l>
	<?php endforeach; ?>
</ul>

<p><a href="04_first_insert.php">Add another author</a></p>

<?php else : ?>

	<h2>Sorry there was a problem adding your author</h2>

<?php endif; ?>


</body>
</html>