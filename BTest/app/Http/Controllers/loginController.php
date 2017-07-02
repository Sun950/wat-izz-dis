<?php

namespace BTest\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use DB;
use Session;

class loginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function exist($email, $password)
    {
        $checklogin = DB::table('t_users')->where(['email'=>$email])->first();


        if (count($checklogin) > 0) {
            $checklogin->id;
            if (!password_verify($password, '$2y$10$' . $checklogin->password))
                return false;
            Session::put('user_id', $checklogin);
            return true;
        }
        return false;
    }

    public function login(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');


        $checklogin = loginController::exist($email, $password);
        if ($checklogin)
        {

            echo "Login Success";
            return redirect('/');
        }
        else
        {
            echo "Login failed";
            /* TODO: error code system */
            return redirect('/');
        }
    }
}