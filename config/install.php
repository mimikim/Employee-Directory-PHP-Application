<?php
require_once('../includes/functions.php');
require_once('../classes/setup.php');
$setup = new SetUp;

// config file exists and a login exists, redirect to homepage
if( file_exists(__DIR__ . '/config.php') ) {
    require_once('../classes/database.php');
    if( !$setup->is_db_empty() ) {
        // if database is not empty
        redirect('../index');
    }
}

// installation process will be done using switch statement to track steps
$step = isset( $_GET['step'] ) ? (int) $_GET['step'] : 1;
?>
<!DOCTYPE HTML>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Directory PHP Application</title>
    <link rel="stylesheet" href="../assets/vendor/foundation/foundation.min.css" />
    <link rel="stylesheet" href="../assets/css/style.min.css" />
</head>
<body>
<div class="row">
    <div class="columns">
    <div class="install-container">
<?php
switch( $step ) :
    case 1:
        /* on form submit, check to see if db connection can be successfully made
          * if not, throw errors! on success, write to config.php file
          */
        if( isset($_POST['submit']) ) {
            $dbname = trim($_POST['dbname']);
            $user = trim($_POST['user']);
            $pass = trim($_POST['pass']);
            $host = trim($_POST['host']);

            // if all inputs are not empty
            if( !empty($dbname) && !empty($user) && !empty($pass) && !empty($host) ) {
                // connect to database
                try {
                    $dsn = sprintf('mysql:dbname=%s;host=%s', $dbname, $host);
                    $conn = new PDO($dsn, $user, $pass);

                    // create config file (which defines db constants)
                    $setup::create_config_file($dbname, $user, $pass, $host);

                    // on success, move on to switch case 2
                    redirect( 'install.php?step=2' );

                } catch( PDOException $error ) {
                    $message = 'Your database credentials are invalid.<br>Please re-enter!';
                }
            } else {
                $message = 'Please fill out all fields.';
            }
        } else {
            $dbname = $user = $pass = $host = '';
            $message = "Your config file is empty!<br>Let's set it up.";
        }
?>
        <div class="message"><?php echo $message; ?></div>
        <form id="install-setup" class="setup-form" action="" method="post">
            <table class="unstriped">
                <tr>
                    <td align="left">Database Name</td>
                    <td>
                        <input type="text" required name="dbname" placeholder="Enter Database Name" value="<?php echo htmlentities($dbname); ?>" style="margin-bottom:0;">
                    </td>
                </tr>
                <tr>
                    <td align="left">User Name</td>
                    <td>
                        <input type="text" required name="user" placeholder="Enter Username" value="<?php echo htmlentities($user); ?>" style="margin-bottom:0;">
                    </td>
                </tr>
                <tr>
                    <td align="left">Password</td>
                    <td>
                        <input type="text" required name="pass" placeholder="Enter Password" value="<?php echo htmlentities($pass); ?>" style="margin-bottom:0;">
                    </td>
                </tr>
                <tr>
                    <td align="left">Database Host</td>
                    <td>
                        <input type="text" required name="host" placeholder="Enter Database Host" value="<?php echo htmlentities($host); ?>" style="margin-bottom:0;">
                    </td>
                </tr>
            </table>
            <div>
                <button type="submit" name="submit" class="button submit">Submit</button>
            </div>
        </form>
<?php
    break;

    case 2:
        // if constants have not been defined (if link is directly accessed)
        //if( file_exists(__DIR__ . '/config.php') ) { require_once('../classes/database.php'); }
        if( !defined('DB_HOST') || !defined('DB_NAME') || !defined('DB_USER') || !defined('DB_PASS') ) {
            // send back to step 1
            redirect('install.php?step=1');
        }

        if( isset($_POST['submit']) ) {
            if(isset($_SESSION['form_submitted'])) {
                die('You have already submitted the form.');
            }
            else {
                $error = false;
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $email = trim($_POST['email']);
                $first_name = trim($_POST['first_name']);
                $last_name = trim($_POST['last_name']);

                // if email is not valid
                if( !validate_email($email) ) {
                    $email_error = 'Please enter a valid email address';
                    $error = true;
                }
                if( !validate_alphanumeric($username) ) {
                    $username_error = 'Username can only contain letters or numbers';
                    $error = true;
                }
                if( !validate_password($password) ) {
                    $password_error = 'Password must be at least 8 characters and contain letters, numbers, or symbols.';
                    $error = true;
                }
                if( !validate_alphabetic($first_name) || !validate_alphabetic($last_name) ) {
                    $error_message = 'Must be alphabetical';
                    $error = true;
                }

                // if no errors
                if( !$error ) {
                    $message = '';
                    $setup->username = $username;
                    $setup->password = $password;
                    $setup->email = $email;
                    $setup->first_name = $first_name;
                    $setup->last_name = $last_name;

                    // create tables
                    $setup::create_tables();

                    // create first user
                    $user_creation_success = $setup->create_first_user();

                    if( $user_creation_success ) {
                        // send email
                        //$setup->send_mail();
                        // redirect to login page...
                        redirect('../login');
                    } else {
                        $message = "Failed to create user";
                    }

                } else {
                    $message = "Please fix errors below and re-submit!";
                }
                $_SESSION['form_submitted'] = TRUE;
            }
        } else {
            $username = $password = $email = $first_name = $last_name = '';
            $email_error = $username_error = $password_error = $error_message = '';
            $message = "Database Connection Successful!<br>Let's create your log-in and employee profile.";
        }
?>
        <div class="message"><?php echo $message; ?></div>
        <form id="install-setup" class="setup-form" action="" method="post">
            <table class="unstriped">
                <tr>
                    <td valign="top" align="left">Username</td>
                    <td valign="top">
                        <input type="text" required name="username" placeholder="Enter Username" value="<?php echo htmlentities($username); ?>" style="margin-bottom:0;">
                        <?php if( !empty($username_error) ) : ?>
                            <div class="callout alert"><?php echo $username_error; ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td align="left">Password</td>
                    <td>
                        <input type="text" required name="password" placeholder="Enter Password" value="<?php echo htmlentities($password); ?>" style="margin-bottom:0;">
                        <?php if( !empty($password_error) ) : ?>
                            <div class="callout alert"><?php echo $password_error; ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td align="left">Email</td>
                    <td>
                        <input type="email" required name="email" placeholder="Enter Email Address" value="<?php echo htmlentities($email); ?>" style="margin-bottom:0;">
                        <?php if( !empty($email_error) ) : ?>
                            <div class="callout alert"><?php echo $email_error; ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td align="left">First Name</td>
                    <td>
                        <input type="text" required name="first_name" placeholder="Enter Your First Name" value="<?php echo htmlentities($first_name); ?>" style="margin-bottom:0;">
                        <?php if( !empty($error_message) ) : ?>
                            <div class="callout alert"><?php echo $error_message; ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td align="left">Last Name</td>
                    <td>
                        <input type="text" required name="last_name" placeholder="Enter Your Last Name" value="<?php echo htmlentities($last_name); ?>" style="margin-bottom:0;">
                        <?php if( !empty($error_message) ) : ?>
                            <div class="callout alert"><?php echo $error_message; ?></div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        You will be sent these credentials to the email address provided above.
                    </td>
                </tr>
            </table>
            <div>
                <button type="submit" name="submit" class="button submit">Submit</button>
            </div>
        </form>
<?php endswitch; ?>
    </div></div>
</div>
<script src="../assets/vendor/jquery.js"></script>
<script src="../assets/js/installation.js"></script>
</body>
</html>