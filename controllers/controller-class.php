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
    function pizza()
    {
        // Display a view page

        $items = $GLOBALS['dataLayer']->getItems("pizza");
        $this->_f3->set('SESSION.items', $items);
        $view = new Template();
        echo $view->render('views/pizza.html');
    }

    function aboutUs()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/about.html');
    }

    function signUp()
    {

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $newUser = new User();

            $newUser->setPower("guest");

            if(isset($_POST['firstName'])){
                $firstName = $_POST['firstName'];
                $newUser->setFirstName($firstName);
            }
            if(isset($_POST['lastName'])){
                $lastName = $_POST['lastName'];
                $newUser->setLastName($lastName);
            }
            if(isset($_POST['newEmail'])){
                $email = $_POST['newEmail'];
                $newUser->setEmail($email);
            }
            if(isset($_POST['newPassword'])){
                $newPassword = $_POST['newPassword'];
                $newUser->setPassword($newPassword);
            }

            $userID = $GLOBALS['dataLayer']->saveUser($newUser);
            echo ("new user: $userID");
            var_dump($newUser);
            $this->_f3->reroute('login');
        }
        // Display a view page
        $view = new Template();
        echo $view->render('views/signUp.html');
    }

    function login()
    {

        $login = $this->_f3->get('SESSION.login');

        //Checks to see if an account is logged in already
        if(isset($login)){
            if($login->getPower()=='admin'){
                $this->_f3->reroute('admin');
            }
            if($login->getPower()=='guest'){
                $this->_f3->reroute('guest');
            }
        }

        //verifies user has an account
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //call all users
            $user = $GLOBALS['dataLayer']->userLogin();

            for ($i = 0; $i < sizeof($user) ; $i++){
                if($_POST['userEmail']==$user[$i]['email'] && $_POST['userPass'] == $user[$i]['password'] ){
                    $login = new User($user[$i]['powers'], $user[$i]['first_name'], $user[$i]['last_name'], $user[$i]['email'], $user[$i]['password']);
                    $this->_f3->set('SESSION.login', $login);
                    echo ('<br>');
                    if($user[$i]['powers']=="admin"){
                        $this->_f3->reroute('admin');
                    } else {
                        $this->_f3->reroute('guest');
                    }

                }
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

            $this->_f3->set('crust', DataLayer::getCrust());
            $this->_f3->set('sauce', DataLayer::getSauce());
            $this->_f3->set('toppings', DataLayer::getToppings());
            $this->_f3->set('size', DataLayer::getSize());

        if($_SERVER['REQUEST_METHOD'] == "POST") {

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
            else{
                $toppings = null;
            }

            if (isset($_POST['size']))
            {
                $size = $_POST['size'];
            }
            else{
                $size = "";
            }

            $newPizza = new customPizza();

            //Check the crust
            if (validSelectedCrust($crust)){
                $newPizza->setCrust($crust);
            }
            else {
                $this->_f3->set('errors["$crust"]', 'Please Select Crust');
            }


            //Check the sauce
            if (validSelectedSauce($sauce)){
                $newPizza->setSauce($sauce);
            }
            else {
                $this->_f3->set('errors["$sauce"]', 'Please Select Sauce');
            }

            //Check the toppings
            if (validSelectedToppings($toppings)){
                $newPizza->setToppings($toppings);
            }
            else {
                $this->_f3->set('errors["$toppings"]', 'Please Select a Topping');
            }

            //Check the size
            if (validSelectedSize($size)){
                $newPizza->setSize($size);
            }
            else {
                $this->_f3->set('errors["$size"]', 'Please Select a Pizza Size');
            }


            if (empty( $this->_f3->get('errors'))) {
                echo "passed";
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/orderPage.html');
    }


}