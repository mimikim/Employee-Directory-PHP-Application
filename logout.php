<?php
require_once('includes/functions.php');
require_once('classes/session.php');

// logout of session
$session->logout();

// redirect to login
redirect('login.php');