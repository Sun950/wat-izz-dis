<?php

namespace BTest\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

include (app_path().'/model/TestModel.php');

use View;
use DB;
use Session;

class homeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function convertToModelList()
    {
        $query = DB::table('t_tests')->get();

        $result = array();

        foreach ($query as $data)
        {
            array_push($result, new \TestModel($data->owner_id, $data->name, $data->id));
        }

        return $result;

    }

    public function home(Request $req)
    {
        if (Session::has('user_id')) {
            $ltest = $this->convertToModelList();
            return View::make('homelog')->with('ltest', $ltest);
        }
        return view('welcome');
    }
}