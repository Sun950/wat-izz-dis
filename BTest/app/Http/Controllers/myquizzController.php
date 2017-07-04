<?php

namespace BTest\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

include (app_path().'/Model/TestModel.php');

use View;
use DB;
use Session;

class myquizzController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getMyOwnTest()
    {
        $query = DB::table('t_tests')
            ->leftJoin('t_questions', 't_tests.id', '=', 't_questions.test_id')
            ->leftJoin('t_users', 't_users.id', '=', 't_tests.owner_id')
            ->select(DB::raw('owner_id, name, t_tests.id as id, count(*) as nb_question, sum(points) as nb_points, firstname'))
            ->groupBy('t_tests.id')
            ->where('owner_id', Session::get('user_id'))
            ->get();

        $result = array();

        foreach ($query as $data)
        {
            array_push($result, new \TestModel($data->owner_id, $data->name, $data->id, $data->nb_question, $data->nb_points, $data->firstname));
        }

        return $result;
    }

    public function myquizz(Request $req)
    {
        if (Session::has('user_id')) {
            $ltest = $this->getMyOwnTest();
            return View::make('myquizz')->with('ltest', $ltest);
        }
        return view('welcome');
    }
}