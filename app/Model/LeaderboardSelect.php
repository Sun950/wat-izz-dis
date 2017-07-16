<?php

/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 03/07/2017
 * Time: 17:43
 */
class LeaderboardSelect
{
    private $_test_name;
    private $_test_id;

    public function __construct($test_name, $test_id)
    {
        $this->_test_name = $test_name;
        $this->_test_id = $test_id;
    }

    /**
     * @return mixed
     */
    public function getTestName()
    {
        return $this->_test_name;
    }

    /**
     * @param mixed $test_name
     */
    public function setTestName($test_name)
    {
        $this->_test_name = $test_name;
    }

    /**
     * @return mixed
     */
    public function getTestId()
    {
        return $this->_test_id;
    }

    /**
     * @param mixed $test_id
     */
    public function setTestId($test_id)
    {
        $this->_test_id = $test_id;
    }



}