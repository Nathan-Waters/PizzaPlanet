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
//            //var_dump($_POST);
//
//


            $this->_f3->set('crust', DataLayer::getCrust());
            $this->_f3->set('sauce', DataLayer::getSauce());
            $this->_f3->set('toppings', DataLayer::getToppings());
            $this->_f3->set('size', DataLayer::getSize());


            if (isset($_POST['crust']))
            {
                $crust = $_POST['crust'];
            }

            if (isset($_POST['sauce']))
            {
                $sauce = $_POST['sauce'];
            }

            if (isset($_POST['toppings']))
            {
                $toppings = $_POST['toppings'];
            }

            if (isset($_POST['size']))
            {
                $size = $_POST['size'];
            }

/*
            //Check the crust
            if (validSelectedCrust($crust)){
                //assign to the custom pizza object
            }
            else {
                $this->_f3->set('errors["$crust"]', 'Please Select Crust');
            }

            //Check the sauce
            if (validSelectedSauce($sauce)){
                //assign to the custom pizza object
            }
            else {
                $this->_f3->set('errors["$sauce"]', 'Please Select Sauce');
            }

            //Check the toppings
            if (validSelectedToppings($toppings)){
                //assign to the custom pizza object
            }
            else {
                $this->_f3->set('errors["$toppings"]', 'Please Select a Topping');
            }

            //Check the size
            if (validSelectedSize($size)){
                //Assign to the custom pizza object
            }
            else {
                $this->_f3->set('errors["$size"]', 'Please Select a Pizza Size');
            }
*/

            if (empty( $this->_f3->get('errors'))) {
                //Might want to add "pizza order placed" if not errors
            }
//        }


        // Display a view page
        $view = new Template();
        echo $view->render('views/orderPage.html');
    }


}