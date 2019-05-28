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
$title = 'list_view';

/**
 * assigning a new variable for h1
 */
$h1 = 'Coffee we offer';
/**
 * include file which will be used as a template for each page as a header
 */
if (empty($_GET['product_id'])) {
    die('Please pick a product');
}

$product_id = intval($_GET['product_id']);


// create query (remeber it will have a parameter)

$query = 'SELECT
			*
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


/**
 * include file which will be used as a template for each page as a header
 */

include __DIR__ . '/../inc/header.inc.php';

?>
<main>
    <h1><?=$h1?></h1>
<p><a href="shop_page.php">Back to product list</a></p>



<h2 style="background-color: #fc9;"><?=$result['product_name']?></h2>

<ul>
<?php foreach ($result as $key => $value) : ?>
    <?php if ($key == 'availability') : ?>
        <li><strong><?=$key?></strong>: <?=($value) ? 'yes' : 'no' ?></li>

    <?php elseif ($key == 'product_image') :?>
        <img src = '<?="/images/orders/{$value}" ?>' 
             width="400" 
             height="300" 
             align="right" 
             alt="<?=$result['product_name']?>"/>

    <?php elseif ($key == 'product_id') : ?>
    <?php else : ?>
        <li><strong><?=$key?></strong>: <?=$value?></li>
    <?php endif; ?>

<?php endforeach; ?>
</ul>

</main>
<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>