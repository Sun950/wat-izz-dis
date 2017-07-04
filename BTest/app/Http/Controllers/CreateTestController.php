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

    private function SaveTest($test_name)
    {
        $id = DB::table('t_tests')
            ->insertGetId(
                ['owner_id' => Session::get('user_id'), 'name' => $test_name]
            );

        return $id;
    }

    private function SaveQuestion($test_id, $url, $imdb_id, $number, $points)
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

    private function ValidQuestion($answer, $url, $score)
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

    private function CheckValidEntry(Request $req)
    {
        if (empty($req->input('test_name')))
        {
            return false;
        }

        $answer1 = $req->input('imdb_1');
        $url1 = $req->input('url_1');
        $point1 = $req->input('points_1');
        if (!$this->ValidQuestion($answer1, $url1, $point1))
        {
            return false;
        }

        return true;
    }

    private function getYoutubeUrlValue($url)
    {
        $separator = '?v=';
        $pos = strpos($url, $separator);

        $result = substr($url, $pos + 3);
        return $result;
    }

    public function CreateTest(Request $req)
    {
        $Valid = $this->CheckValidEntry($req);
        if (!$Valid)
        {
            echo("Invalid quizz name or at least one question is required");
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
                    if ($this->ValidQuestion($anwser, $url ,$point))
                    {
                        $this->SaveQuestion($test_id, $url, $anwser, $count, $point);
                    }
                    else
                    {
                        echo("One question was invalid");
                        break;
                    }
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
        return View::make('create-quizz');
    }
}