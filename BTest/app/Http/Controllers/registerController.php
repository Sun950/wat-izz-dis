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
        catch(Exception $e) {
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
            $result = 1;
        }

        if (strlen($password) < 8 && strlen($password) > 20) {
            $result = 2;
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
            /* TODO: Error code system */
            echo "Code 01";
            return redirect('/register');
        }

        if ($this->control_password($password) !== 0)
        {
            /* TODO: Error code system */
            echo "Code 02";
            return redirect('/register');
        }

        $pass_step1 = password_hash($password, PASSWORD_BCRYPT);
        $pass_step2 = $this->prepare_password($pass_step1);

        $result = registerController::insert($firstname, $lastname, $email, $pass_step2);
        if (!$result)
        {
            /* TODO: Error code system */
            echo "code 04";
            return redirect('/register');
        }
        return redirect('/');

    }
}