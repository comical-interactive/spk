<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RawScoreTest extends TestCase
{
    use RefreshDatabase;

    protected $score;

    public function setUp()
    {
        parent::setUp();

        $this->score = createIst()->raw_score;
    }

    /** @test */
    public function it_counts_raw_score_of_se_question_type_correctly()
    {
        $this->assertEquals(5, $this->score->se);
    }

    /** @test */
    public function it_counts_raw_score_of_wa_question_type_correctly()
    {
        $this->assertEquals(8, $this->score->wa);
    }

    /** @test */
    public function it_counts_raw_score_of_an_question_type_correctly()
    {
        $this->assertEquals(7, $this->score->an);
    }

    /** @test */
    public function it_counts_raw_score_of_ge_question_type_correctly()
    {
        $this->assertEquals(1, $this->score->ge);
    }

    /** @test */
    public function it_counts_raw_score_of_ra_question_type_correctly()
    {
        $this->assertEquals(0, $this->score->ra);
    }

    /** @test */
    public function it_counts_raw_score_of_zr_question_type_correctly()
    {
        $this->assertEquals(2, $this->score->zr);
    }

    /** @test */
    public function it_counts_raw_score_of_fa_question_type_correctly()
    {
        $this->assertEquals(12, $this->score->fa);
    }

    /** @test */
    public function it_counts_raw_score_of_wu_question_type_correctly()
    {
        $this->assertEquals(10, $this->score->wu);
    }

    /** @test */
    public function it_counts_raw_score_of_me_question_type_correctly()
    {
        $this->assertEquals(4, $this->score->me);
    }

    /** @test */
    public function it_counts_raw_score_total_correctly()
    {
        $this->assertEquals(49, $this->score->total);
    }
}
