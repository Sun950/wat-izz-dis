<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 03/07/2017
 * Time: 13:28
 */

namespace BTest\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

include (app_path().'/model/Leaderboard.php');

use View;
use DB;
use Session;


class LeaderboardController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private function getLeaderboardRows($test_id)
    {
        $list = array();

        $query = DB::table('t_score')
            ->where('test_id', '=', $test_id)
            ->join('t_users', 't_score.user_id', '=', 't_users.id')
            ->join('t_tests', 't_score.test_id', '=', 't_tests.id')
            ->select('t_tests.name as test_name',
                't_users.firstname as firstname',
                't_users.lastname as lastname',
                't_score.score as score',
                't_score.question_succeed as question_succeed')
            ->get();

        foreach ($query as $data)
        {
            array_push($list, new \Leaderboard($data->test_name,
                $data->firstname . ' ' . $data->lastname,
                $data->score,
                $data->question_succeed));
        }

        return $list;
    }

    public function Leaderboard($test_id)
    {
        if (Session::has('user_id')) {

            $list_row = $this->getLeaderboardRows($test_id);

            return View::make('leaderboard')->with('list_row', $list_row);
        }
        return redirect('/');
    }
}