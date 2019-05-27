<?php
/**
 * WDD4
 * PHP CAPSTONE PROJECT
 * Instructor Steve George
 * Maryna Haidashevska
 */
namespace classes;

require __DIR__ . '/../lib/functions.php';
require __DIR__ . '/../config/config.php';
require __DIR__ . '/../classes/Validator.php';

/**
  * assigning a new variable for title
*/
$title = 'login_page';

/**
 * assigning a new variable for h1
 */
$h1 = 'Please log in into your account';


// conditions for logout session
if (filter_input(INPUT_GET, 'logout')) {
    session_destroy();
  
  //start new session after logged in
    session_start();
  
  // Message for success logged out
    setFlash('success', 'You have successfully logged out');
  // redirect to the same page
    header('Location: login_page.php');

    die;
}

$v = new Validator();

if ('POST' == filter_input(INPUT_SERVER, 'REQUEST_METHOD')) {
  // normally we had pull our hashed password from the DB 
    $v->required('email');
    $v->required('password');

    if (!$v->errors()) {
        $query = "SELECT * FROM user WHERE email = :email";
        $stmt = $dbh->prepare($query);

        $params = array(
        ':email' => filter_input(INPUT_POST, 'email')
        );

        $stmt->execute($params);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
    // only test password if we find a user with the provided email
  
  

        if ($user) {
          // compare form password to stored password
          //  if they match
            $form_password = filter_input(INPUT_POST, 'password');
            $stored_password = password_hash($user['password'], PASSWORD_DEFAULT);
      
            if (password_verify($form_password, $stored_password))  
            {
              // Set session logged_in to 1
              //session_regenerate_id();
                if ($user['is_admin'] == "admin")  
                {    
                  $_SESSION['logged_in'] = 1; // first we check if user logged in 
                  $_SESSION['admin'] = 1; // if user has admin access
                  $_SESSION['user_id'] = $user['user_id'];
                  setFlash('success', 'Welcome back, ' . $user['first_name'] . ' ! You have successfully logged in.');
                // redirect user to profile page
                  header('Location: admin_dashboard.php');
                // die
                  die; 
                } 
                else 
                {   
                  $_SESSION['logged_in'] = 1; // check if user logged in
                  $_SESSION['user_id'] = $user['user_id'];
                  setFlash('success', 'Welcome back, ' . $user['first_name'] . ' ! You have successfully logged in.');
                // redirect user to profile page
                  header('Location: profile_page.php');
                // die
                  die;
                }
              } 

        }// else / end if
        setFlash('error', 'There were a problem with your credentials');
    } // end if no errors
}// end of post

$errors = $v->errors();



/**
 * include file which will be used as a template for each page as a header
 */

include __DIR__ . '/../inc/header.inc.php';

?>
<?php include __DIR__ . '/../inc/flash.inc.php'; ?>
  <title><?=$title?></title>
  <main>
    <h1><?=$h1?></h1>

<?php include __DIR__ . '/../lib/errors.inc.php'; ?>

<form method="post" action="<?=filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING)?>">
  <input type="hidden" name="token" value="<?=getToken()?>" />
  <p><label for="email">Email</label><br />
    <input type="text" name="email" 
    value="<?=clean('email')?>" placeholder="Please enter your email"/></p>
  <p><label for="password">Password</label><br />
     <input type="password" name="password" placeholder="Your password" /><br />
  <p><button>Login</button></p>
</form>



</body>
  
    <?php
  /**
   * include file which will be used as a template for each page as a footer
   */
    include __DIR__ . '/../inc/footer.inc.php';

    ?>    
</html>
