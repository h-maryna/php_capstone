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
$title = 'register_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Registartion Form';


// empty errors array
// serves as flag... we
// can test at any time to see
// if we have errors
$errors = [];

$v = new Validator();
// Set flag that form has not been
// submitted successfully.  This will
// be used as a conditional to determine
// what to display in the view.
$success = false;

// If the request is POST (a form submission)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Our required fields
    $required = ['first_name', 'last_name', 'age', 'street', 'city', 'postal_code', 'province', 'country', 'phone', 'email', 'password', 'conf_passw'];

  // Make sure there is a POST value for each
  // required field
    foreach ($required as $key => $value) {
        $v->required($value);
        $v->string('first_name');
        $v->string('last_name');
        $v->string('city');
        $v->string('street');
        $v->string('country');
        $v->integer('age');
        $v->postal_code('postal_code');
        $v->password('password');

        if ('POST' == filter_input(INPUT_SERVER, 'REQUEST_METHOD')) {
            if ($_SESSION['token'] != filter_input(INPUT_POST, 'token')) {
                die('CSRF token mismatch');
            }
        }
    }
  

    $errors = $v->errors();

  
  
  // If there are no errors after processing all POST
    if (!$errors) {
        try {
      // create query
            $query = "INSERT INTO
             user
             (first_name, last_name, age, street, city, postal_code, province, country, phone, email, password, conf_passw)
             VALUES
             (:first_name, :last_name, :age, :street, :city, :postal_code, :province, :country, :phone, :email, :password, :conf_passw)";
      
      // prepare query
            $stmt = $dbh->prepare($query);

            $params = array(
            ':first_name' => $_POST['first_name'],
            ':last_name' => $_POST['last_name'],
            ':age' => $_POST['age'],
            ':street' => $_POST['street'],
            ':city' => $_POST['city'],
            ':postal_code' => $_POST['postal_code'],
            ':province' => $_POST['province'],
            ':country' => $_POST['country'],
            ':phone' => $_POST['phone'],
            ':email' => $_POST['email'],
            ':password' => $_POST['password'],
            ':conf_passw' => $_POST['conf_passw']//password_hash($_POST['password'], PASSWORD_DEFAULT)
            );

      // execute query
            $stmt->execute($params);

            $user_id = $dbh->lastInsertId();
      //header('Location: redirect_form.php');
            header('Location: redirect_form.php?user_id=' . $user_id);
      //exit;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } // end if
} // END IF POST

/**
 * include file which will be used as a template for each page as a header
 */
include __DIR__ . '/../inc/header.inc.php';
?>
<main><!--Main page -->
  <h1><?=$h1?></h1>
<?php include __DIR__ . '/../lib/errors.inc.php'; ?>



<?php if (!$success) : ?>
<form method="post" action="register_page.php" novalidate>
  <input type="hidden" name="token" value="<?=getToken()?>" />
<fieldset>
  <legend>Registration Form</legend>
  <p><label for="first_name">First Name</label><br />
    <input type="text" name="first_name" id="first_name"
    value="<?=clean('first_name')?>" />
    &nbsp;<?=(!empty($errors['first_name'])) ?
      "<span class='errors'>{$errors['first_name']}</span>" : '' ?></p>

  <p><label for="last_name">Last Name</label><br />
    <input type="text" name="last_name"
    value="<?=clean('last_name')?>" id="last_name"/>
    &nbsp;<?=(!empty($errors['last_name'])) ?
      "<span class='errors'>{$errors['last_name']}</span>" : '' ?></p>

  <p><label for="age">Age</label><br />
    <input type="text" name="age" id="age"
    value="<?=clean('age')?>" />
     &nbsp;<?=(!empty($errors['age'])) ?
      "<span class='errors'>{$errors['age']}</span>" : '' ?></p>

  <p><label for="street">Street</label><br />
    <input id="street" type="text" name="street" 
    value="<?=clean('street')?>" />
     &nbsp;<?=(!empty($errors['street'])) ?
      "<span class='errors'>{$errors['street']}</span>" : '' ?></p>

  <p><label for="city">City</label><br />
    <input type="text" name="city" 
    value="<?=clean('city')?>" id="city"/>
     &nbsp;<?=(!empty($errors['city'])) ?
      "<span class='errors'>{$errors['city']}</span>" : '' ?></p>

  <p><label for="postal_code">Postal Code</label><br />
    <input type="text" name="postal_code"
    value="<?=clean('postal_code')?>" id="postal_code"/>
    &nbsp;<?=(!empty($errors['postal_code'])) ?
      "<span class='errors'>{$errors['postal_code']}</span>" : '' ?></p>

  
   <p><!-- Field list of services -->
      <label>Province</label><br />
      <input list="province" name="province" value="<?=clean('province')?>" />
      <datalist id="province">
        <option value="Alberta"></option>
        <option value="British Columbia"></option>
        <option value="Manitoba"></option>
        <option value="New Brunswick"></option>
        <option value="Newfoundland and Labrador"></option>
        <option value="Nova Scotia"></option>
        <option value="Northwest Terrotories"></option>
        <option value="Nunavut"></option>
        <option value="Ontario"></option>
        <option value="Prince Edward Island"></option>
        <option value="Quebec"></option>
        <option value="Sascatchewan"></option>
        <option value="Yukon"></option>
      </datalist> 
      &nbsp;<?=(!empty($errors['province'])) ?
      "<span class='errors'>{$errors['province']}</span>" : '' ?></p>

  <p><label for="country">Country</label><br />
    <input type="text" name="country"
    value="<?=clean('country')?>" id="country"/>
    &nbsp;<?=(!empty($errors['country'])) ?
      "<span class='errors'>{$errors['country']}</span>" : '' ?></p>

  <p><label for="phone">Phone</label><br />
    <input type="text" name="phone"
    value="<?=clean('phone')?>" id="phone"/>
    &nbsp;<?=(!empty($errors['phone'])) ?
      "<span class='errors'>{$errors['phone']}</span>" : '' ?></p>

  <p><label for="email">Email</label><br />
    <input type="text" name="email" 
    value="<?=clean('email')?>" id="email"/>
    &nbsp;<?=(!empty($errors['email'])) ?
      "<span class='errors'>{$errors['email']}</span>" : '' ?></p>

  <p><label for="password">Password</label><br />
    <input type="password" name="password" id="password"/>
    &nbsp;<?=(!empty($errors['password'])) ?
      "<span class='errors'>{$errors['password']}</span>" : '' ?></p>

  <p><label for="conf_passw">Confirm password</label><br />
    <input type="password" name="conf_passw" id="conf_passw"/>
    &nbsp;<?=(!empty($errors['conf_passw'])) ?
      "<span class='errors'>{$errors['conf_passw']}</span>" : '' ?></p>

  <p><button>Login</button></p>
</fieldset>
</form>

<?php else : ?>
<h2>Thank you for your registration on our web site!</h2>

  <ul><!-- Loop through $_POST to output user -->
    <?php foreach ($result as $key => $value) : ?>
    <!-- Test each value to see if it's an array, and
      if it's NOT an array, we can print it out -->
        <?php if (!is_array($value)) : ?>
      <li><strong><?=e($key)?></strong>: <?=e($value)?></li>
      </li>

        <?php endif; ?>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<pre>

    <?php // print_r($_SERVER) ?>

</pre>

</main> 
<?php
/**
* include file which will be used as a template for each page as a footer
*/
include __DIR__ . '/../inc/footer.inc.php';

?>    

