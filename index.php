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

// Define a default route
$f3->route('GET /', function() {

    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});
// non default that routes to home page
$f3->route('GET /home', function() {

    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

//about us
$f3->route('GET /about', function() {

    // Display a view page
    $view = new Template();
    echo $view->render('views/about.html');
});

//order page
$f3->route('GET|POST /order', function($f3) {

    if($_SERVER['REQUEST_METHOD'] == "POST"){

    }

    $f3->set('crust', getCrust());
    $f3->set('sauce', getSauce());
    $f3->set('toppings', getToppings());
    // Display a view page
    $view = new Template();
    echo $view->render('views/orderPage.html');
});

// Run Fat-Free
$f3->run();

?>