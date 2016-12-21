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


/* Filter Functions */

function filter_special_char( $input ) {
    return filter_var( $input, FILTER_SANITIZE_ENCODED );
}

// validate input functions
function validate_email( $email ) {
    if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) === false ) {
        return true;
    } else {
        return false;
    }
}
