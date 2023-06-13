<?php

class User
{
    private $_power;
    private $_first_name;
    private $_last_name;
    private $_email;
    private $_password;

    function __construct($power = "guest", $first_name = "", $last_name = "", $email = "", $password = "")
    {
        $this->_power = $power;
        $this->_first_name = $first_name;
        $this->_last_name = $last_name;
        $this->_email = $email;
        $this->_password = $password;
    }

//*************** POWER GET AND SET METHODS *****************
    /**
     * Set power for user
     * @param string $power
     */
    public function setPower (string $power)
    {
        $this->_power = $power;
    }

    /**
     * Get power for user
     * @return string
     */
    public function getPower()
    {
        return $this->_power;
    }
//*************** FIRST NAME GET AND SET METHODS *****************
    /**
     * Set first name for user
     * @param string $firstName
     */
    public function setFirstName (string $firstName)
    {
        $this->_first_name = $firstName;
    }

    /**
     * Get first name for user
     * @return string
     */
    public function getFirstName()
    {
        return $this->_first_name;
    }

    //*************** LAST NAME GET AND SET METHODS *****************
    /**
     * Set last name for user
     * @param string $lastName
     */
    public function setLastName (string $lastName)
    {
        $this->_last_name = $lastName;
    }

    /**
     * Get last name for user
     * @return string
     */
    public function getLastName()
    {
        return $this->_last_name;
    }

    //*************** EMAIL GET AND SET METHODS *****************
    /**
     * Set email for user
     * @param string $email
     */
    public function setEmail (string $email)
    {
        $this->_email = $email;
    }

    /**
     * Get email for user
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    //*************** LAST NAME GET AND SET METHODS *****************
    /**
     * Set password for user
     * @param string $password
     */
    public function setPassword (string $password)
    {
        $this->_password = $password;
    }

    /**
     * Get password for user
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }
}