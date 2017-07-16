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

class homeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function convertToModelList()
    {
        $query = DB::table('t_tests')
            ->leftJoin('t_questions', 't_tests.id', '=', 't_questions.test_id')
            ->leftJoin('t_users', 't_users.id', '=', 't_tests.owner_id')
            ->select(DB::raw('owner_id, name, t_tests.id as id, count(*) as nb_question, sum(points) as nb_points, firstname'))
            ->groupBy('t_tests.id')
            ->where('owner_id', '!=', Session::get('user_id'))
            ->get();

        $result = array();

        foreach ($query as $data)
        {
            array_push($result, new \TestModel($data->owner_id, $data->name, $data->id, $data->nb_question, $data->nb_points, $data->firstname));
        }

        $result = $this->checkIfNotAlreadyDone($result);

        return $result;
    }

    public function checkIfNotAlreadyDone($datarray)
    {
        $query = DB::table('t_score')
            ->select(DB::raw('test_id'))
            ->where('user_id', Session::get('user_id'))
            ->get();

        $totest = array();

        foreach ($query as $data)
        {
            array_push($totest, $data->test_id);
        }

        $d = 0;
        foreach ($datarray as $data)
        {
            if (in_array($data->getId(), $totest))
                unset($datarray[$d]);
            $d += 1;
        }

        return $datarray;
    }

    public function getUserName()
    {
        $query = DB::table('t_users')
            ->where("t_users.id", Session::get('user_id'))
            ->first();

        return $query;
    }

    public function home(Request $req)
    {
        if (Session::has('user_id')) {
            $ltest = $this->convertToModelList();
            $user_infos = $this->getUserName();
            return View::make('homelog')->with('ltest', $ltest)->with('user', $user_infos);
        }
        return view('welcome');
    }
}