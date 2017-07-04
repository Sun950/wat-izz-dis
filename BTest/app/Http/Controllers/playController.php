<?php

namespace BTest\Http\Controllers;

include (app_path().'/model/Question.php');
include (app_path().'/model/SessionPlay.php');
include (app_path().'/model/Result.php');
include (app_path().'/model/IMDb.php');

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

        return new \Question($data->id, $data->test_id, $data->youtube_url, $data->imdb_id, $data->number, $data->name, $data->points);
    }

    public function get_all_questions($id_test)
    {
        $data = DB::table('t_questions')
            ->leftJoin('t_tests', 't_tests.id', '=', 't_questions.test_id')
            ->where('test_id', $id_test)
            ->get();

        $questions = array();

        foreach ($data as $question) {
            array_push($questions, new \Question($question->id, $question->test_id, $question->youtube_url, $question->imdb_id, $question->number, $question->name, $question->points));
        }

        return $questions;
    }

    public function secuCheck($id)
    {

        if (!Session::has('user_id'))
            return false;

        /* check if the test is not the owner of the test*/
        $query_ta = DB::table('t_tests')
            ->where('owner_id', Session::get('user_id'))
            ->where('id', $id)
            ->count();

        if ($query_ta != 0)
            return false;

        $query_su = DB::table('t_score')
            ->where('test_id', $id)
            ->where('user_id', Session::get('user_id'))
            ->count();

        if ($query_su != 0)
            return false;

        return true;
    }

    public function play($id) // PATH : start/{id}
    {
        if (!$this->secuCheck($id))
            return redirect('/');

        $nb_questions = DB::table('t_questions')->where('test_id', $id)->count();

        $question = playController::get_question($id, 1);

        $question->setTotal($nb_questions);

        $sessionPlay = new \SessionPlay($id, $question->getName(), $nb_questions, 1);

        Session::put('sessionPlay', $sessionPlay);

        return View::make('play')->with('question', $question);
    }

    public function answer($answer) // PATH : play/{answer}
    {
        if (Session::get('sessionPlay') == null)
            return redirect("/");

        $sessionPlay = Session::get('sessionPlay');

        $sessionPlay->addAnswer($answer);

        $sessionPlay->nextQuestion();

        Session::put('sessionPlay', $sessionPlay);

        if ($sessionPlay->isFinished())
        {
            return redirect('/result');
        }

        $question = playController::get_question($sessionPlay->getIdQuiz(), $sessionPlay->getCurrentQuestion());

        $question->setTotal($sessionPlay->getNbQuestions());

        return View::make('play')->with('question', $question);
    }

    public function result()
    {
        $imdb = new \IMDb(true, true, 0);

        if (Session::get('sessionPlay') == null)
            return redirect("/");

        $sessionPlay = Session::get('sessionPlay');

        $questions = playController::get_all_questions($sessionPlay->getIdQuiz());

        $result = new \Result($sessionPlay->getName(), $sessionPlay->getNbQuestions());

        $total_points = 0;
        $total_correct_answer = 0;

        for ($i = 0; $i < count($questions); ++$i)
        {
            $question = $questions[$i];
            $answer = $sessionPlay->getAnswer($i);

            $resultDetails = new \ResultDetails($question->getImdbId() == $answer, $imdb->find_by_id($question->getImdbId()), $imdb->find_by_id($answer), $i + 1);
            $result->addResultDetail($resultDetails);

            if ($question->getImdbId() == $answer)
            {
                ++$total_correct_answer;
                $total_points += $question->getPoints();
            }
        }

        $result->setCorrectAnswer($total_correct_answer);

        DB::table('t_score')->insert(
            ['test_id' => $sessionPlay->getIdQuiz(), 'user_id' => Session::get('user_id'), 'score' => $total_points, 'question_succeed' => $total_correct_answer]
        );

        Session::forget('sessionPlay');

        //Session::put('current_play', -1);

        return View::make('result')->with('result', $result);
    }
}