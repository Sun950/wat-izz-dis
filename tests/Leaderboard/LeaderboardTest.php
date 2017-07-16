<?php

namespace Tests\Unit;

use BTest\Http\Controllers\LeaderboardController;
use Tests\TestCase;
use DB;
use Webmozart\Assert\Assert;

class LeaderboardTest extends TestCase
{
    public function test_getLeaderboardRow()
    {
        $test_id = DB::table('t_tests')->first()->id;
        if (!is_null($test_id))
        {
            $leaderboard = new LeaderboardController();

            $query = $leaderboard->LeaderboardQuery($test_id);
            $result = $leaderboard->getLeaderboardRows($test_id);

            $count = 0;
            foreach ($query as $data)
            {
                $this->assertEquals($data->test_name, $result[$count]->getTestName());
                $this->assertEquals($data->firstname . ' ' . $data->lastname, $result[$count]->getUserName());
                $this->assertEquals($data->score, $result[$count]->getScore());
                $this->assertEquals($data->question_succeed, $result[$count]->getQuestionSucceed());

                $count++;
            }
        }
        else
        {
            $this->assertTrue(true); //nothing to test
        }
    }
}