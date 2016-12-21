<?php ob_start(); ?>
<?php require_once( '/includes/init.php' ); ?>
<?php
// if not signed in, and you are not already on the login page
if( (FILENAME != 'login.php') ) {
    if( !$session->is_logged_in() ) {
        // make them sign in
        redirect('login');
    }
}
?>
<!DOCTYPE HTML>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Directory PHP Application</title>
    <link rel="stylesheet" href="assets/vendor/foundation/foundation.min.css" />
    <link rel="stylesheet" href="assets/vendor/datatables/datatables.min.css" />
    <link rel="stylesheet" href="assets/vendor/fontello/ico-embedded.css" />
    <link rel="stylesheet" href="assets/css/style.min.css" />
</head>
<body>
<?php if(FILENAME != 'login.php') { include('partials/menu.php'); } ?>
<div class="wrapper">