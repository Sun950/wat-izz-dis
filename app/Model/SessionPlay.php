<?php

class SessionPlay
{
    private $id_quiz;
    private $name;
    private $nb_questions;
    private $current_question;
    private $answers;

    /**
     * Question constructor.
     * @param $id_quiz
     * @param $name
     * @param $nb_questions
     * @param $current_question
     */
    public function __construct($id_quiz, $name, $nb_questions, $current_question)
    {
        $this->id_quiz = $id_quiz;
        $this->name = $name;
        $this->nb_questions = $nb_questions;
        $this->current_question = $current_question;
        $this->answers = array();
    }

    public function addAnswer($answer)
    {
        array_push($this->answers, $answer);
    }

    public function nextQuestion()
    {
        ++$this->current_question;
    }

    public function isFinished()
    {
        return $this->current_question > $this->nb_questions;
    }

    public function getAnswer($pos)
    {
        if (count($this->answers) <= $pos)
            return "";
        return $this->answers[$pos];
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
    public function getIdQuiz()
    {
        return $this->id_quiz;
    }

    /**
     * @param mixed $id_quiz
     */
    public function setIdQuiz($id_quiz)
    {
        $this->id_quiz = $id_quiz;
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
    public function getCurrentQuestion()
    {
        return $this->current_question;
    }

    /**
     * @param mixed $current_question
     */
    public function setCurrentQuestion($current_question)
    {
        $this->current_question = $current_question;
    }

    /**
     * @return array
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @param array $answers
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }



}