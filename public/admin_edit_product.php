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

// errors flag
$errors = [];

$success = false;
try {

	if(!empty($_GET['s'])) {
		// we have a search
			$query = 'SELECT
				book.book_id,
				book.title,
				author.name as author,
				book.year_published,
				book.num_pages,
				genre.name as genre,
				book.price
				FROM
				book
				JOIN author USING(author_id)
				JOIN genre USING(genre_id)
				WHERE
				title LIKE :search
				ORDER by book.title';

				$params = array(
					':search' => "%{$_GET['s']}%"
				);
	} else {
		// create query
				$query = 'SELECT
				book.book_id,
				book.title,
				author.name as author,
				book.year_published,
				book.num_pages,
				genre.name as genre,
				book.price
				FROM
				book
				JOIN author USING(author_id)
				JOIN genre USING(genre_id)
				ORDER by book.title';

				$params = [];

	} // end GET s

	// create statement
	$stmt = $dbh->prepare($query);

	$stmt->execute($params);

	// fetch our results
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// end try
} catch (Exception $e) {
	echo $e->getMessage();
	die;
}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<title>Books List</title>
	<style>
		table {
			border-collapse: collapse;
		}
		td, th {
			border: 1px solid #cfcfcf;
			padding: 6px 10px;
			text-align: left;
		}

		.search {
			color: DodgerBlue;
		}
	</style>
</head>
<body>

	<h1>Book List</h1>

	<form action="<?=basename($_SERVER['PHP_SELF'])?>" method="get">
		<p><input type="text" name="s" /><button>search</button></p>
	</form>

	<!-- Only show this line if $_GET['s'] is set 
		-- That is, only show this block if there is a search -->
	<?php if(!empty($_GET['s'])) : ?>

	<h3>Your search for <span class="search"><?=e($_GET['s'])?></span> returned <?=count($results)?> result(s)</h3>

	<?php endif; ?>

	<!-- End if -->

	<table>
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th>Year Published</th>
			<th>Num Pages</th>
			<th>Genre</th>
			<th>Price</th>
		</tr>
		<?php foreach($results as $key => $row) : ?>
		<tr>
			<td><a href="06_edit_view.php?book_id=<?=$row['book_id']?>"><?=$row['title']?></a></td>
			<td><?=$row['author']?></td>
			<td><?=$row['year_published']?></td>
			<td><?=$row['num_pages']?></td>
			<td><?=$row['genre']?></td>
			<td><?=$row['price']?></td>
		</tr>
		<?php endforeach; ?>

	</table>
</body>
</html>