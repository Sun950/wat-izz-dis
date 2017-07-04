<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterSecurityTest extends TestCase
{
    public function test_extract()
    {
        $password = 'Test1234';
        $password = password_hash($password, PASSWORD_BCRYPT);
        $controller = new \BTest\Http\Controllers\registerController();
        $finalpassword = $controller->prepare_password($password);

        $test = substr($finalpassword, 0, 6);

        $this->assertNotEquals("$2y$10$", $test);
    }
}