<?php

/*
 * Nathan Waters
 * 5/10/2023
 * 328/application2/index.php
 * Controller for application2 project
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once('model/validation.php');

// Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();
$con = new Controller($f3);

// Define a default route
$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

// non default that routes to home page
$f3->route('GET /home', function() {
    $GLOBALS['con']->home();
});

//about us
$f3->route('GET /about', function() {
    $GLOBALS['con']->aboutUs();
});

//order page
$f3->route('GET|POST /order', function($f3) {
    $GLOBALS['con']->order();
});

$f3->route('GET /login', function() {
    $GLOBALS['con']->login();
});

// Run Fat-Free
$f3->run();

?>