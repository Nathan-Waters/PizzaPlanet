<?php

/*  328/PizzaPlanet/model/data-layer.php
    Returns data for the PizzaPlanet app
    This is part of the MODEL
    Eventually, this will read/write the DB
*/

/*
    PDO - Using Prepared Statements

    1. Define the query(test first!)
        $sql = "...";
    2. Prepare the statement
        $statement = $dbh->prepare($sql);
    3. Bind the parameters
        $statement->bindParam(param_name, value, type);
    4. Execute
        $statement->execute();
    5. Process the result, if there is one
    */

require_once('pdo-config.php');
class DataLayer
{
    /**
     * @var PDO the database connection object
     */
    private $_dbh;

    /**
     * DataLayer constructor
     */
    function __construct()
    {
        try {
            //Instantiate a database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
//            echo 'Connected to database!!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    static function getCrust(){
        $crust = array("Traditional Hand Tossed", "Thin Crust", "Stuffed Crust");
        return $crust;
    }

    static function getSauce(){
        $sauce = array("Classic Marinara", "Alfredo", "Buffalo", "Barbecue");
        return $sauce;
    }

    static function getToppings(){
        $toppings = array("Pepperoni", "Mushrooms", "Bell Peppers", "Onions", "Sausage", "Olives", "Fresh Basil",
            "Tomatoes", "Peppers", "Prosciutto", "Fresh Mozzarella", "Basil Pesto");
        return $toppings;
    }

    static function getSize(){
        $size = array("9 Inch", "12 Inch", "14 Inch");
        return $size;
    }

}
