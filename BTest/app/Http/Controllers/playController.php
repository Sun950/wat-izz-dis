<?php

namespace BTest\Http\Controllers;

include (app_path().'/model/Question.php');

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use DB;
use Session;
use View;

class playController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function play($id)
    {
        if (Session::get('current_play') != $id)
        {
            Session::put('current_play', $id);

            $questions = DB::table('t_questions')->where('test_id', $id)->count();

            Session::put('total_questions', $questions);

            Session::put('current_question', 0);
        }

        $question_number = Session::get('current_question');

        $data = DB::table('t_questions')
            ->leftJoin('t_tests', 't_tests.id', '=', 't_questions.test_id')
            ->where('test_id', $id)
            ->where('number', $question_number)
            ->first();

        $question = new \Question($data->test_id, $data->test_id, $data->youtube_url, $data->imdb_id, $data->number, $data->name);

        return View::make('play')->with('question', $question);
    }
}