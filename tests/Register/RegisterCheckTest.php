<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterCheckTest extends TestCase
{

    public function test_control_email_good()
    {
        $email = "test@test.fr";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertTrue($controller->control_email($email));
    }

    public function test_control_email_bad01()
    {
        $email = "test";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertFalse($controller->control_email($email));
    }

    public function test_control_email_bad02()
    {
        $email = "test@test.";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertFalse($controller->control_email($email));
    }

    public function test_control_email_bad03()
    {
        $email = "@test.fr";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertFalse($controller->control_email($email));
    }

    public function test_control_password_good01()
    {
        $password = "Test1234";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertEquals(0, $controller->control_password($password));
    }

    public function test_control_password_good02()
    {
        $password = "Test1234";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertEquals(0, $controller->control_password($password));
    }

    public function test_control_password_bad_nomaj()
    {
        $password = "test1234";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertEquals(2, $controller->control_password($password));
    }

    public function test_control_password_bad_nomin()
    {
        $password = "TEST1234";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertEquals(2, $controller->control_password($password));
    }

    public function test_control_password_bad_nonum()
    {
        $password = "TestTest";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertEquals(2, $controller->control_password($password));
    }

    public function test_control_password_bad_tooshort()
    {
        $password = "Te5t";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertEquals(3, $controller->control_password($password));
    }

    public function test_control_password_bad_toolong()
    {
        $password = "Test1234Test1234Test1234";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertEquals(3, $controller->control_password($password));
    }

    public function test_check_password_ok()
    {
        $password = "Test1234";
        $password_conf = "Test1234";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertTrue($controller->check_password($password, $password_conf));
    }

    public function test_check_password_ko()
    {
        $password = "Test1234";
        $password_conf = "Test1235";
        $controller = new \BTest\Http\Controllers\registerController();
        $this->assertFalse($controller->check_password($password, $password_conf));
    }
}