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

    private function ValidQuestion($answer, $score)
    {
        $valid = true;

        if (empty($answer))
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

        return true;
    }

    public function CreateTest(Request $req)
    {
        $Valid = $this->CheckValidEntry($req);
        if (!$Valid)
        {
            echo("Invalid quizz name");
            return;
        }
        $count = 0;
        $test_id = null;
        foreach($req->all() as $name => $value)
        {
            if ($name == 'test_name')
            {
                $test_id = $this->SaveTest($value);
                if (is_null($test_id))
                {
                    echo("Failed to create test");
                    return;
                }
            }
            if (substr($name, 0, 5) == 'imdb_')
            {
                $count += 1;
                //echo($name . ' : ' . $value . ' with is the q number ' . $count);
                //echo('<br/>');

                foreach($req->all() as $point_name => $point_value)
                {
                    if ($point_name == 'points_' . $count)
                    {
                        //echo($point_name . ' : ' . $point_value);
                        //echo('<br/>');
                        if ($this->ValidQuestion($value, $point_value))
                        {
                            $this->SaveQuestion($test_id, 'url/fixme', $value, $count, $point_value);
                        }
                        else
                        {
                            echo("Failed to create question");
                            return;
                        }
                        break;
                    }
                }
            }
        }
    }

    public function ShowForm(Request $req)
    {
        return View::make('create-quizz');
    }
}