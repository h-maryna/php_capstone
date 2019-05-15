<?php

require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/../classes/Validator.php';

$title = 'payment';

/**
 * assigning a new variable for h1
 */
$h1 = 'You can start your payment here:';

include __DIR__ . '/../inc/header.inc.php';

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<title></title>
</head>
<body>

<h1></h1>


<form method="post" action="">
  <input type="hidden" name="" value="" />
            <p><label for="cname">Name on Card</label></p>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe"><br />
            <p><label for="ccnum">Credit card number</label></p>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"><br />
            <p><label for="expmonth">Exp Month</label></p>
            <input type="date" id="expmonth" name="expmonth" placeholder="September"><br />
            <p><label for="cvv">CVV</label></p>
            <input type="text" id="cvv" name="cvv" placeholder="352"><br />
</form>


</body>
</html>