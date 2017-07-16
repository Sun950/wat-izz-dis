<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 03/07/2017
 * Time: 17:43
 */

namespace BTest\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

include(app_path() . '/Model/LeaderboardSelect.php');

use View;
use DB;
use Session;

class LeaderboardSelectController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Selector()
    {
        if (Session::has('user_id')) {

            $list_tests = array();
            $query = DB::table('t_tests')->orderBy('name', 'asc')->get();

            foreach ($query as $data)
            {
                array_push($list_tests, new \LeaderboardSelect($data->name, $data->id));
            }

            return View::make('leaderboardSelect')->with('list_tests', $list_tests);
        }
        return redirect('/');
    }
}