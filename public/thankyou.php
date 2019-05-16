<?php

require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/../classes/Validator.php';

 /**
  * assigning a new variable for title
  */
$title = 'thankyou';

/**
 * assigning a new variable for h1
 */
$h1 = 'Thank you for shopping with us!';

include __DIR__ . '/../inc/header.inc.php';
?>

<img src="/images/thankyou.png" alt="Thank You for your order" width="960" height="550" align="centre" />
<?php
/**
 * include file which will be used as a template for each page as a  footer
 */
    include __DIR__ . '/../inc/footer.inc.php';

?>