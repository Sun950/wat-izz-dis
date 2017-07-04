<?php

class Result
{
    private $name;
    private $nb_questions;
    private $correct_answer;
    private $result_details;

    /**
     * Result constructor.
     * @param $name
     * @param $nb_questions
     */
    public function __construct($name, $nb_questions)
    {
        $this->name = $name;
        $this->nb_questions = $nb_questions;
        $this->result_details = array();
    }

    public function addResultDetail($details)
    {
        array_push($this->result_details, $details);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNbQuestions()
    {
        return $this->nb_questions;
    }

    /**
     * @param mixed $nb_questions
     */
    public function setNbQuestions($nb_questions)
    {
        $this->nb_questions = $nb_questions;
    }

    /**
     * @return mixed
     */
    public function getCorrectAnswer()
    {
        return $this->correct_answer;
    }

    /**
     * @param mixed $correct_answer
     */
    public function setCorrectAnswer($correct_answer)
    {
        $this->correct_answer = $correct_answer;
    }

    /**
     * @return array
     */
    public function getResultDetails()
    {
        return $this->result_details;
    }

    /**
     * @param array $result_details
     */
    public function setResultDetails($result_details)
    {
        $this->result_details = $result_details;
    }

}

class ResultDetails
{
    private $is_correct;
    private $correction;
    private $answer;
    private $number;

    /**
     * ResultDetails constructor.
     * @param $is_correct
     * @param $correction
     * @param $answer
     */
    public function __construct($is_correct, $correction, $answer, $number)
    {
        $this->is_correct = $is_correct;
        $this->correction = $correction;
        $this->answer = $answer;
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function IsCorrect()
    {
        return $this->is_correct;
    }

    /**
     * @param mixed $is_correct
     */
    public function setIsCorrect($is_correct)
    {
        $this->is_correct = $is_correct;
    }

    /**
     * @return mixed
     */
    public function getCorrection()
    {
        return $this->correction;
    }

    /**
     * @param mixed $correction
     */
    public function setCorrection($correction)
    {
        $this->correction = $correction;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

}