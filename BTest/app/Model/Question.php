<?php

class Question
{
    private $id;
    private $test_id;
    private $youtube_url;
    private $imdb_id;
    private $number;
    private $name;
    private $points;
    private $total;

    /**
     * Question constructor.
     * @param $id
     * @param $test_id
     * @param $youtube_url
     * @param $imdb_id
     * @param $number
     * @param $name
     */
    public function __construct($id, $test_id, $youtube_url, $imdb_id, $number, $name, $points)
    {
        $this->id = $id;
        $this->test_id = $test_id;
        $this->youtube_url = $youtube_url;
        $this->imdb_id = $imdb_id;
        $this->number = $number;
        $this->name = $name;
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTestId()
    {
        return $this->test_id;
    }

    /**
     * @param mixed $test_id
     */
    public function setTestId($test_id)
    {
        $this->test_id = $test_id;
    }

    /**
     * @return mixed
     */
    public function getYoutubeUrl()
    {
        return $this->youtube_url;
    }

    /**
     * @param mixed $youtube_url
     */
    public function setYoutubeUrl($youtube_url)
    {
        $this->youtube_url = $youtube_url;
    }

    /**
     * @return mixed
     */
    public function getImdbId()
    {
        return $this->imdb_id;
    }

    /**
     * @param mixed $imdb_id
     */
    public function setImdbId($imdb_id)
    {
        $this->imdb_id = $imdb_id;
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
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }



}