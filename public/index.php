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
$title = 'index_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Our Atmosphere';

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';

?> 
  <main>

<div id="main_coffee_cup">
  <div id="letters">
    <div class="1">Come for</div>
    <div class="2">the coffee</div>
    <div class="3">stay for</div>
    <div class="4">the cookies</div>
  </div>  
    
  <img src="images/home_coffee_cup.jpg" alt="coffee cup with smeling coffee" width="100%" style="border-radius: 15px" />
</div>
  
    <div id="home_page">
    <h1><?=$h1?></h1>
      <p>In our coffee shop everybody is treated like a family member. 
      Here you can find a dark corner to stay alone with your thoughts
      or, on the contrary, meet new friends, and of course 
      you will always be offered a cup of freshly roasted coffee with our 
      delishious baked goods.</p>
   
    <h2>Location</h2>
      
    <p>Coffee Time is located on the east side of Portage Avenue at:</p>
    <p>123 Portage Avenue E</p>
    <p>Winnipeg, MB Canada R3M 2K7</p>
    <p>Phone 204-123-4567<p>
    <p>Email info@coffeetime.com</p>
    <a href="#" class="go_top">Go to the top</a>  

    <h2>Store Hours</h2>
      <p class="content">We are open</p>
      <p class="content">Monday - Friday 7am–7pm</p>
      <p class="content">Saturday - Sunday 10am–6pm</p>
      <p class="content">Open most holidays</p>
    </div>
    <div class="row">
      <div class="column">
        <img src="images/owner.jpg" alt="Women Owner" style="width:100%">
      </div>
      <div class="column">
        <img src="images/owner_man.jpg" alt="Man Owner" style="width:100%">
      </div>
      <div class="column">
        <img src="images/two_owners.jpg" alt="Two Owners" style="width:100%">
      </div>
    </div>
  </main>
  
  <?php

/**
* include file which will be used as a template for each page as a footer
*/
  include __DIR__ . '/../inc/footer.inc.php';

  ?>
 