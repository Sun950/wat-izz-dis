<?php

namespace BTest\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use PHPUnit\Framework\Constraint\IsEmpty;
use View;
use DB;
use Session;


class CreateTestController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function SaveTest($test_name)
    {
        $id = DB::table('t_tests')
            ->insertGetId(
                ['owner_id' => Session::get('user_id'), 'name' => $test_name]
            );

        return $id;
    }

    public function SaveQuestion($test_id, $url, $imdb_id, $number, $points)
    {
        $query = DB::table('t_questions')
            ->insert(
                ['test_id' => $test_id,
                    'youtube_url' => $url,
                    'imdb_id' => $imdb_id,
                    'number' => $number,
                    'points' => $points]
            );
    }

    public function ValidQuestion($answer, $url, $score)
    {
        $valid = true;

        if (empty($answer))
        {
            return false;
        }

        if (empty($url))
        {
            return false;
        }

        if (empty($answer) || !is_numeric($score))
        {
            return false;
        }
        return true;
    }

    public function CheckValidEntry($test_name, $answer1, $url1, $point1)
    {
        if (empty($test_name))
        {
            return false;
        }

        if (!$this->ValidQuestion($answer1, $url1, $point1))
        {
            return false;
        }

        return true;
    }

    public function getYoutubeUrlValue($url)
    {
        $separator = '?v=';
        $pos = strpos($url, $separator);

        if ($pos == false)
            return '';

        $result = substr($url, $pos + 3);
        return $result;
    }

    public function ValidPoint($value)
    {
        return $value < 100000 && $value >= 0;
    }

    public function checkForm(Request $req)
    {
        $Valid = $this->CheckValidEntry($req->input('test_name'),
            $req->input('imdb_1'),
            $req->input('url_1'),
            $req->input('points_1'));

        if (!$Valid)
        {
            return "Invalid quizz name or at least one question is required";
        }
        else
        {
            $count = 1;
            foreach($req->all() as $name)
            {

                $url_brut = $req->input('url_' . $count);
                $url = $this->getYoutubeUrlValue($url_brut);
                $anwser = $req->input('imdb_' . $count);
                $point = $req->input('points_' . $count);

                $point_test = intval($point);

                if (!is_null($url) && !is_null($anwser) && !is_null($point))
                {
                    if (!$this->ValidQuestion($anwser, $url ,$point) || $this->ValidPoint($point_test))
                    {
                        if (empty($url) && !empty($url_brut))
                        {
                            return "Error, make sure the url is a youtube video";
                        }
                        if ($this->ValidPoint($point_test))
                        {
                            return "Error, Point have to be greater than 0 and lower than 100000";
                        }

                        return "One question is invalid, verify that all field are filled and that points fields are a valid number";
                    }
                }
                else //stop case, no more questions
                {
                    break;
                }

                $count++;
            }
        }
        return "";
    }

    public function CreateTest(Request $req)
    {

        $error = $this->checkForm($req);
        if ($error != "")
        {
            echo($error);
        }
        else
        {
            $test_name_value = $req->input('test_name');
            $test_id = $this->SaveTest($test_name_value);
            if (is_null($test_id)) {
                echo("Failed to create test");
            }

            $count = 1;
            foreach($req->all() as $name)
            {

                $url = $req->input('url_' . $count);
                $url = $this->getYoutubeUrlValue($url);
                $anwser = $req->input('imdb_' . $count);
                $point = $req->input('points_' . $count);


                if (!is_null($url) && !is_null($anwser) && !is_null($point))
                {
                    $this->SaveQuestion($test_id, $url, $anwser, $count, $point);
                }
                else //stop case, no more questions
                {
                    break;
                }

                $count++;
            }
        }
    }

    public function ShowForm(Request $req)
    {
        if (Session::has('user_id'))
        {
            return View::make('create-quizz');
        }
        else
        {
            return redirect('/');
        }

    }
}