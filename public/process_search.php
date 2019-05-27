<?php

require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/../classes/Validator.php';

// basic output
$product_name = htmlentities($_GET['product_name']);

// what is encoding of website?  We need to specify.
// The third parameter is the character set.  You should
// always define it
$product_name = htmlentities($_GET['product_name'], ENT_QUOTES, 'UTF-8');
