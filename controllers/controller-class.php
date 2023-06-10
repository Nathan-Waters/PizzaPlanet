<?php
/**
 *
 * 6/9/2023
 * 328/PizzaPlanet/controllers/controller-class.php
 *
 */

class Controller
{
    //F3 object
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function aboutUs()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/about.html');
    }

    function login()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function order()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){

        }

        $this->_f3->set('crust', getCrust());
        $this->_f3->set('sauce', getSauce());
        $this->_f3->set('toppings', getToppings());
        $this->_f3->set('size', getSize());
        // Display a view page
        $view = new Template();
        echo $view->render('views/orderPage.html');
    }
}