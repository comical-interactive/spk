<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EppsTest extends TestCase
{
    use RefreshDatabase;

    protected $epps;

    public function setUp()
    {
        parent::setUp();

        $this->epps = createMbtiEppsLs()->epps;
    }

    /** @test */
    public function it_grades_ach_aspect_correctly()
    {
        $this->assertEquals('B', $this->epps->ach_grade);
    }
}
