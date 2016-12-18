<?php
// autoload function searches for undeclared classes, adds class file if found
// __autoload is deprecated
function classAutoLoader($class) {
    $class = strtolower($class);
    $path = "/class/{$class}.php";

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

function check_query_string() {
    if( $_SERVER['QUERY_STRING'] ) {
        return true;
    } else {
        return false;
    }
}

