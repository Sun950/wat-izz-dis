<?php

class TestModel
{
    private $_owner_id;
    private $_name;
    private $_id;
    private $_nb_question;
    private $_nb_points;
    private $_firstname;

    public function __construct($owner_id, $name, $id, $nb_question, $nb_points, $firstname)
    {
        $this->_owner_id = $owner_id;
        $this->_name = $name;
        $this->_id = $id;
        $this->_nb_question = $nb_question;
        $this->_nb_points = $nb_points;
        $this->_firstname = $firstname;
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

    /**
     * @return mixed
     */
    public function getNbQuestion()
    {
        return $this->_nb_question;
    }

    /**
     * @param mixed $nb_question
     */
    public function setNbQuestion($nb_question)
    {
        $this->_nb_question = $nb_question;
    }

    /**
     * @return mixed
     */
    public function getNbPoints()
    {
        return $this->_nb_points;
    }

    /**
     * @param mixed $nb_points
     */
    public function setNbPoints($nb_points)
    {
        $this->_nb_points = $nb_points;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->_firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->_firstname = $firstname;
    }


}