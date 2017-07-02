<?php

namespace BTest\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use DB;
use Session;

class registerController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function insert($firtname, $lastname, $email, $password)
    {
        try {
            DB::table('t_users')->insertGetId(['firstname'=>$firtname, 'lastname'=>$lastname, 'email'=>$email, 'password'=>$password, 'salt'=>'0123456789']);
            return true;
        }
        catch(Exception $e) {
            return false;
        }
    }

    public function subscribe(Request $req)
    {
        $firstname = $req->input('firstname');
        $lastname = $req->input('lastname');
        $email = $req->input('email');
        $password = $req->input('password');

        $result = registerController::insert($firstname, $lastname, $email, $password);
        if (!$result)
        {
            echo 'Register failed';
        }
        else echo 'Register OK';

    }
}