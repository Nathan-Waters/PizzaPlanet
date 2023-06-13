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
require_once($_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php');
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

    /** saveUser saves a newly created user
     * @param $user user object
     * @return null
     */
    function saveUser(user $user)
    {
//    1. Define the query(test first!)
        $sql = "INSERT INTO users(powers, first_name, last_name, email, password)
                VALUES (:powers,:first_name,:last_name,:email,:password)";
//    2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);
//    3. Bind the parameters

        $statement->bindValue(':powers', $user->getPower());
        $statement->bindValue(':first_name', $user->getFirstName());
        $statement->bindValue(':last_name', $user->getLastName());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':password', $user->getPassword());

//    4. Execute
        $statement->execute();
//    5. Process the result, if there is one
//        $id = $this->_dbh->lastInsertId();
    }

    function getItems($type)
    {
        //PDO - Using Prepared Statements

//    1. Define the query(test first!)
        $sql = "SELECT * FROM `items` WHERE type = '$type'";
//    2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);
//    3. Bind the parameters
//        $statement->bindParam(param_name, value, type);
//    4. Execute
        $statement->execute();
//    5. Process the result, if there is one
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    function userLogin()
    {

  //  PDO - Using Prepared Statements

  //  1. Define the query(test first!)
        $sql = "SELECT * FROM `users`";
  //  2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);
 //   3. Bind the parameters

 //   4. Execute
        $statement->execute();
//    5. Process the result, if there is one
        return $statement->fetchAll(PDO::FETCH_ASSOC);
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
