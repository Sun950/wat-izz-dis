<?php

class TestModel
{
    private $_owner_id;
    private $_name;

    public function __construct($owner_id, $name)
    {
        $this->_owner_id = $owner_id;
        $this->_name = $name;
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
}