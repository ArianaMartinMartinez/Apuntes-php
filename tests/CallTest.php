<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use App\Models\Call;

class CallTest extends TestCase {

    public function testIfTestOk() {
        $this->assertEquals(1, 1);
    }

    public function test_ifGetCallWorkCorrectly() {
        //given - actores de la película
        $newCall = new Call(null, "112", "Comment for test 1", null);

        //when - el rodaje de la película
        $resultGetRoom = $newCall->room;

        //then - críticas de la película
        $this->assertEquals("112", $resultGetRoom);
    }

    public function test_ifGetIssueWorkCorrectly() {
        //given - actores de la película
        $newCall = new Call(null, "112", "Comment for test 2", null);

        //when - el rodaje de la película
        $resultGetIssue = $newCall->issue;

        //then - críticas de la película
        $this->assertEquals("Comment for test 2", $resultGetIssue);
    }
}