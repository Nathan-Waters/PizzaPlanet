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

    function menu()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/menu.html');
    }

    function aboutUs()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/about.html');
    }

    function login()
    {
        //if someone is logged in it will grab the them
        $login = $this->_f3->get('SESSION.login');

        //TODO: get from sql and evaluate account power
        if(isset($login)){
            if($_SESSION['login']=='admin'){
                $this->_f3->reroute('admin');
            }
            if($_SESSION['login']=='guest'){

                $this->_f3->reroute('guest');
            }
        }

        //after login typed, send them to the correct page
        //TODO: get from sql and evaluate account power
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $login = $_POST['login'];
            $this->_f3->set('SESSION.login', $login);
            if($_SESSION['login']=='admin'){

                $this->_f3->reroute('admin');
            }
            if($_SESSION['login']=='guest'){

                $this->_f3->reroute('guest');
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function admin()
    {
//        checking user based off global variable
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->_f3->set('SESSION.login', null);
            $this->_f3->reroute('login');
        }
        // Display a view page
        $view = new Template();
        echo $view->render('views/admin.html');
    }

    //        checking user based off global variable
    function guest()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->_f3->set('SESSION.login', null);
            $this->_f3->reroute('login');
        }
        // Display a view page
        $view = new Template();
        echo $view->render('views/guest.html');
    }

    function order()
    {
//        if($_SERVER['REQUEST_METHOD'] == "POST"){
//
//        }

        $this->_f3->set('crust', getCrust());
        $this->_f3->set('sauce', getSauce());
        $this->_f3->set('toppings', getToppings());
        $this->_f3->set('size', getSize());
        // Display a view page
        $view = new Template();
        echo $view->render('views/orderPage.html');
    }
}