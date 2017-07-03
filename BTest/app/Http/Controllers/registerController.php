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
            DB::table('t_users')->insertGetId(['firstname'=>$firtname, 'lastname'=>$lastname, 'email'=>$email, 'password'=>$password]);
            return true;
        }
        catch(\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    public function control_email($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            return true;
        }
        return false;
    }

    public function control_password($password)
    {
        $result = 0;
        if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $password)) {
            $result = 2;
        }

        if (strlen($password) < 8 || strlen($password) > 20) {
            $result = 3;
        }
        return $result;
    }

    public function prepare_password($password)
    {
        return substr($password, 7);
    }

    public function subscribe(Request $req)
    {
        $firstname = $req->input('firstname');
        $lastname = $req->input('lastname');
        $email = $req->input('email');
        $password = $req->input('password');

        if (!$this->control_email($email))
        {
            return view('register')->with('error_code', 1);
        }

        $test_password = $this->control_password($password);
        if ($test_password !== 0)
        {
            return view('register')->with('error_code', $test_password);
        }

        $pass_step1 = password_hash($password, PASSWORD_BCRYPT);
        $pass_step2 = $this->prepare_password($pass_step1);

        $result = registerController::insert($firstname, $lastname, $email, $pass_step2);
        if (!$result)
        {
            return view('register')->with('error_code', 4);
        }
        return redirect('/');

    }
}