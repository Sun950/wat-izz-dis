<?php

namespace Tests\Unit;

use BTest\Http\Controllers\Controller;
use BTest\Http\Controllers\CreateTestController;
use Tests\TestCase;
use DB;


class CreateTestTest extends TestCase
{

    /************************getYoutubeUrlValue***************************/

    public function test_getYoutubeUrlValue_good01()
    {
       $controller = new CreateTestController();
       $url = 'https://www.youtube.com/watch?v=Vnoz5uBEWOA';

       $result = $controller->getYoutubeUrlValue($url);
       $this->assertEquals($result, 'Vnoz5uBEWOA');
    }

    public function test_getYoutubeUrlValue_good02()
    {
        $controller = new CreateTestController();
        $url = 'https://www.youtube.com/watch?v=9ttYOnvekGw';

        $result = $controller->getYoutubeUrlValue($url);
        $this->assertEquals($result, '9ttYOnvekGw');
    }

    public function test_getYoutubeUrlValue_good03()
    {
        $controller = new CreateTestController();
        $url = 'https://www.youtube.com/watch?v=9ttYOnvekGw&t=18';

        $result = $controller->getYoutubeUrlValue($url);
        $this->assertEquals($result, '9ttYOnvekGw');
    }

    public function test_getYoutubeUrlValue_bad01()
    {
        $controller = new CreateTestController();
        $url = 'toto vas à la plage';

        $result = $controller->getYoutubeUrlValue($url);
        $this->assertEquals($result, '');
    }

    /************************ValidQuestion***************************/

    public function test_ValidQuestion_good01()
    {
        $controller = new CreateTestController();
        $url = 'url';
        $answer = 'answer';
        $score = '4245';

        $result = $controller->ValidQuestion($answer, $url, $score);
        $this->assertTrue($result);
    }

    public function test_ValidQuestion_good02()
    {
        $controller = new CreateTestController();
        $url = '42';
        $answer = '42';
        $score = '42';

        $result = $controller->ValidQuestion($answer, $url, $score);
        $this->assertTrue($result);
    }

    public function test_ValidQuestion_bad01()
    {
        $controller = new CreateTestController();
        $url = 'retrd';
        $answer = 'dssdcv';
        $score = 'toto';

        $result = $controller->ValidQuestion($answer, $url, $score);
        $this->assertFalse($result);
    }

    public function test_ValidQuestion_bad02()
    {
        $controller = new CreateTestController();
        $url = '';
        $answer = 'answer';
        $score = '42';

        $result = $controller->ValidQuestion($answer, $url, $score);
        $this->assertFalse($result);
    }

    public function test_ValidQuestion_bad03()
    {
        $controller = new CreateTestController();
        $url = 'yes';
        $answer = 'answer';
        $score = '';

        $result = $controller->ValidQuestion($answer, $url, $score);
        $this->assertFalse($result);
    }

    /************************CheckValidEntry***************************/

    public function test_CheckValidEntry_good01()
    {
        $controller = new CreateTestController();

        $test_name = 'name';
        $answer1 = 'answer';
        $url1 = 'url1';
        $point1 = '78';

        $result = $controller->CheckValidEntry($test_name, $answer1, $url1, $point1);
        $this->assertTrue($result);
    }

    public function test_CheckValidEntry_bad01()
    {
        $controller = new CreateTestController();

        $test_name = '';
        $answer1 = 'answer';
        $url1 = 'url1';
        $point1 = '78';

        $result = $controller->CheckValidEntry($test_name, $answer1, $url1, $point1);
        $this->assertFalse($result);
    }

    public function test_CheckValidEntry_bad02()
    {
        $controller = new CreateTestController();

        $test_name = 'name';
        $answer1 = '';
        $url1 = 'url1';
        $point1 = '78';

        $result = $controller->CheckValidEntry($test_name, $answer1, $url1, $point1);
        $this->assertFalse($result);
    }

    public function test_CheckValidEntry_bad03()
    {
        $controller = new CreateTestController();

        $test_name = 'name';
        $answer1 = 'answer';
        $url1 = 'url1';
        $point1 = 'oto';

        $result = $controller->CheckValidEntry($test_name, $answer1, $url1, $point1);
        $this->assertFalse($result);
    }

    /************************ValidPointTest***************************/

    public function test_ValidPoint_good01()
    {
        $controller = new CreateTestController();

        $point = 42;

        $result = $controller->ValidPoint($point);
        $this->assertTrue($result);
    }

    public function test_ValidPoint_bad01()
    {
        $controller = new CreateTestController();

        $point = -1;

        $result = $controller->ValidPoint($point);
        $this->assertFalse($result);
    }

    public function test_ValidPoint_bad02()
    {
        $controller = new CreateTestController();

        $point = 100000;

        $result = $controller->ValidPoint($point);
        $this->assertFalse($result);
    }
}