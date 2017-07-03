<?php

namespace BTest\Http\Controllers;

include (app_path().'/model/Question.php');

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use View;

class playController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_question($id_test, $question_number)
    {
        $data = DB::table('t_questions')
            ->leftJoin('t_tests', 't_tests.id', '=', 't_questions.test_id')
            ->where('test_id', $id_test)
            ->where('number', $question_number)
            ->first();

        return new \Question($data->test_id, $data->test_id, $data->youtube_url, $data->imdb_id, $data->number, $data->name, $data->points);
    }

    public function play($id)
    {
        Session::put('current_play', $id);

        $questions = DB::table('t_questions')->where('test_id', $id)->count();

        Session::put('total_questions', $questions);

        Session::put('current_question', 1);

        Session::put('correct_answer', 0);

        Session::put('score', 0);

        $question_number = Session::get('current_question');

        $question = playController::get_question($id, $question_number);

        return View::make('play')->with('question', $question);
    }

    public function answer($id)
    {
        $question_number = Session::get('current_question');
        $id_quizz = Session::get('current_play');

        $old_question = playController::get_question($id_quizz, $question_number);

        if ($old_question->getImdbId() == $id)
        {
            $score = Session::get('score') + $old_question->getPoints();
            Session::put('score', $score);

            $correct_answer = Session::get('correct_answer') + 1;
            Session::put('correct_answer', $correct_answer);
        }

        $question_number = Session::get('current_question');
        ++$question_number;
        Session::put('current_question', $question_number);
        $total = Session::get('total_questions');
        if ($question_number > $total)
        {
            return redirect('/result');
        }

        $question = playController::get_question($id_quizz, $question_number);

        return View::make('play')->with('question', $question);
    }

    public function result()
    {
        $id_quizz = Session::get('current_play');
        $correct_answer = Session::get('correct_answer');
        $score = Session::get('score');
        $user_id = Session::get('user_id');

        DB::table('t_score')->insert(
            ['test_id' => $id_quizz, 'user_id' => $user_id, 'score' => $score, 'question_succeed' => $correct_answer]
        );

        //Session::put('current_play', -1);

        echo "fini !";
    }
}