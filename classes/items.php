<?php

class Items
{
    private $_id;
    private $_type;
    private $_name;
    private $_description;

    /**
     * @param $_id
     * @param $_type
     * @param $_name
     * @param $_description
     */
    public function __construct($_id, $_type, $_name, $_description)
    {
        $this->_id = $_id;
        $this->_type = $_type;
        $this->_name = $_name;
        $this->_description = $_description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->_type = $type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getDesciption()
    {
        return $this->_desciption;
    }

    /**
     * @param mixed $desciption
     */
    public function setDesciption($desciption): void
    {
        $this->_desciption = $desciption;
    }

}