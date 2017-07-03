<?php

class TestModel
{
    private $_owner_id;
    private $_name;
    private $_id;

    public function __construct($owner_id, $name, $id)
    {
        $this->_owner_id = $owner_id;
        $this->_name = $name;
        $this->_id = $id;
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
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->_owner_id;
    }

    /**
     * @param mixed $owner_id
     */
    public function setOwnerId($owner_id)
    {
        $this->_owner_id = $owner_id;
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
    public function setId($id)
    {
        $this->_id = $id;
    }


}