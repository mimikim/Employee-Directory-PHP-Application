<?php
// autoload function searches for undeclared classes, adds class file if found
// __autoload is deprecated
function classAutoLoader($class) {
    $class = strtolower($class);
    $path = "/classes/{$class}.php";

    // if the file exists, and the class does not already exist
    if( file_exists($path) && !class_exists($class) ) {
        require_once($path);
    } else {
        die("This file name {$class}.php was not found.");
    }
}
// registers function as __autoload
spl_autoload_register('classAutoLoader');


// redirect not-logged in users
function redirect( $location ) {
    header("Location: {$location}");
    exit;
}

// checks if url has query string
function has_query_string() {
    if( $_SERVER['QUERY_STRING'] ) {
        return true;
    } else {
        return false;
    }
}

// if is admin, return true
function is_admin() {
    if( $_SESSION['access_level'] == 1 ) {
        return true;
    } else {
        return false;
    }
}

// if not admin, redirect to dashboard (restricts access to pages)
function restrict_access() {
    if( $_SESSION['access_level'] != 1 ) {
        redirect('index');
    }
}


/* Filter and Validation Functions */

function filter_special_char( $input ) {
    return filter_var( $input, FILTER_SANITIZE_ENCODED );
}

// is valid email? returns true/false
function validate_email( $email ) {
    return filter_var( $email, FILTER_VALIDATE_EMAIL );
}

// validate pattern, returns true or false
function validate_pattern( $pattern, $input ) {
    $pattern = array('options' => array('regexp' => $pattern));
    return filter_var($input, FILTER_VALIDATE_REGEXP, $pattern);
}

// is alphabetic?
function validate_alphabetic( $input ) {
    return validate_pattern("/^[a-zA-Z]+$/", $input);
}

// is alphanumeric?
function validate_alphanumeric( $input ) {
    return validate_pattern("/^[a-zA-Z0-9]+$/", $input);
}

function validate_password( $input ) {
    return validate_pattern("/^[a-zA-Z0-9!@#$%^&*]{8,}+$/", $input);
}



// send email
function send_email( $contents ) {

}


