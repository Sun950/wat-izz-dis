<?php

/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 03/07/2017
 * Time: 14:05
 */
class Leaderboard
{
    private $_test_name;
    private $_user_name;
    private $_score;
    private $_question_succeed;

    public function __construct($test_name, $user_name, $score, $question_succeed)
    {
        $this->_test_name = $test_name;
        $this->_user_name = $user_name;
        $this->_score = $score;
        $this->_question_succeed = $question_succeed;
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
    public function getUserName()
    {
        return $this->_user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->_user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->_score;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->_score = $score;
    }

    /**
     * @return mixed
     */
    public function getQuestionSucceed()
    {
        return $this->_question_succeed;
    }

    /**
     * @param mixed $question_succeed
     */
    public function setQuestionSucceed($question_succeed)
    {
        $this->_question_succeed = $question_succeed;
    }


}