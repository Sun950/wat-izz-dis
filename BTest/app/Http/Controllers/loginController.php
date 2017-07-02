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
        $checklogin = DB::table('t_users')->where(['email'=>$email, 'password'=>$password])->first();

        if (count($checklogin) > 0)
            return $checklogin->id;
        return -1;
    }

    public function login(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');

        echo "-<".$email.">-";
        echo "-<".$password.">-";

        $checklogin = loginController::exist($email, $password);
        if ($checklogin >= 0)
        {
            Session::put('user_id', $checklogin);
            echo "Login Success";
            return view('homelog');
        }
        else
        {
            echo "Login failed";
            return view('login');
        }
    }
}