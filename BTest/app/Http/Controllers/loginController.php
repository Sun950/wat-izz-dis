<?php

namespace BTest\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class loginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');

        $checklogin = DB::table('t_users')->where(['email'=>$email, 'password'=>$password])->get();
        if (count($checklogin)>0)
        {
            echo "Login Success";
        }
        else
        {
            echo "Login failed";
        }
    }
}