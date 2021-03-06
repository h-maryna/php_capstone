<!doctype html>

<html lang="en">

  <head>
    <meta charset="utf-8" />
    <title><?=$title?></title>
    <meta name="description" content="Coffee Time is a coffee shop with variety of coffee drinks and baked goods, located in heart of city Winnipeg, in Downtown, address 123Portage Avenue" />
    <meta name="keyword" content="coffee shop, coffee cafe, cafe downtown winnipeg, coffee and baked goods, winnipeg, places to relax" />    
    
    <link rel="icon" href="images/favicon.png" type="image/gif" />
    <link rel="apple-touch-icon" href="images/favicon_iphone_57x57.png" type="image/gif" sizes="57x57" />
    <link rel="apple-touch-icon" href="images/favicon_iphone_72X72.png" type="image/gif" sizes="72x72" />
    <link rel="apple-touch-icon" href="images/favicon_iphone_114X114.png" type="image/gif" sizes="114x114" />
    <link rel="apple-touch-icon" href="images/favicon_iphone_144x144.png" type="image/gif" sizes="144x144" />

    <meta property="og:url" content="http://salsa.uwde.ca/~h.maryna" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Coffee Time" />
    <meta property="og:description" content="Coffee Time is a coffee shop with variety of coffee drinks and baked goods, located in heart of city Winnipeg, in Downtown, address 123 Portage Avenue" />
    <meta property="og:site_name" content="Coffee Time" />
    <meta property="og:image" content="http://salsa.uwde.ca/~h.maryna/cafe_facebook.html"/>
    <meta property="og:image:width" content="960" />
    
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700%7cPT+Sans:700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Eczar:800" rel="stylesheet" />
    
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" 
          href="styles/capstone_project_screen.css"
          type="text/css"
          media="screen and (min-width: 751px)"
    />
    <link rel="stylesheet"
          href="styles/capstone_mobile.css"
          type="text/css"
          media="screen and (max-width: 750px)"
    />
    <link rel="stylesheet"
          href="styles/capstone_print.css"
          type="text/css"
          media="print"
    />
    
    <!-- Conditional comments for IE browsers -->
    
    <!--[if LTE IE 8]>
      <link rel="stylesheet" href="capstone_old_ie.css" type="text/css" />
    <![endif]-->

<!-- Assigning a new style to shop_page, admin_customers changing a style -->

<?php if ($title == 'shop_page' ||  $title == 'admin_customers_page'){
     include __DIR__ . '/../inc/embedded.css';
}
?>
    
<style>
  /*To make our desktop to be responsible */
  @media screen and (min-width: 769px){ /*for desktop */
    #wrapper{
      width: 960px; 
      background-color: #fff;
      position: relative;
    }
  }
  table{  /*CSS style for table */
    border-spacing: 0px;
    /*border: 1px solid #fc9;*/
    border-collapse: collapse;
    color: #000;
    width: 100%;
    height: auto;
    border-radius: 15px;
    display: inline-block;
    margin: 15px 2px 5px 2px;
  }
  caption{  /*CSS style for caption in tables */
    color: #000;
    text-align: left;
    font-weight: 700;
    font-size: 20px;
    padding: 5px;
    margin-bottom: 5px;
  }
  td,th{
    border: 1px solid #fb6; 
  }
  th{ 
    color: #000;
    background-color: #fc9;
    text-align: center;
  }
  th img{
    background-color: #fff;
  }
  td{
    text-align: left;
    padding: 5px;
  }
  h2 p{
    padding: 5px;
  }   

  /*@media screen and (max-width: 768px){ /*for mobile */
   /* #wrapper{
      width: 100%;
      background-color: #f96;
      margin: 0 auto; 
      position: relative;
    }
  }
  
  @media screen (min-width: 769px) and (max-width: 959px){ /*for devices more than 769px and less 959px */
   /* #wrapper{
      width: 100%;
      background-color: #fff;
      position: relative;
    }
  } */
</style>
    <script src="old_ie.js"></script>
  </head> 
    
    <body id="<?=$title?>">
    <div id="wrapper">
      <header><!-- Main logo and services tagline -->
        <div id="header">
          <div id="main_logo"></div>
          <div id="login"></div>
          <div id="facebook"></div>
          <div id="instagram"></div>
        </div>
        <nav> 
        <!-- Hamburger Menu-->
          <a href="#" id="menubutton">
            <span id="topbar"></span>
            <span id="middlebar"></span>
            <span id="bottombar"></span>
          </a>
          <ul id="navlist">
            <li><a href="index.php" class="page1">Home</a></li>
            <li><a href="about_page.php" class="page2">About</a></li>
            <li><a href="menu_page.php" class="page3">Menu</a></li>
            <li><a href="shop_page.php" class="page4">Shop</a></li>
            <?php if (empty($_SESSION['logged_in'])) : ?>
            <li><a href="login_page.php" class="page5">LogIn</a></li>
            <li><a href="register_page.php" class="page6">Register</a></li>
            <li><a href="calendar.php" class="page20">Projects</a></li>
            <?php else : ?>
                <?php if (!empty($_SESSION['admin'])) :?>
              <li><a href="admin_dashboard.php" class="page10" style="background-color: #000">Admin Profile</a></li>
              <li><a href="login_page.php?logout=1">Logout</a></li>
                <?php else :?>
              <li><a href="profile_page.php" class="page7">Profile</a></li>
              <li><a href="payment.php" class="page8">Payment</a></li>
              <li><a href="login_page.php?logout=1">LogOut</a></li>        
                <?php endif ?>
            <?php endif ?>
          </ul>
        </nav>
      </header>
