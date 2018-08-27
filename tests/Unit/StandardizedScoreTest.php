<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StandardizedScoreTest extends TestCase
{
    use RefreshDatabase;

    protected $score;

    public function setUp()
    {
        parent::setUp();

        $this->score = createIst()->standardized_score;
    }

    /** @test */
    public function it_counts_standardized_score_of_se_question_type_correctly()
    {
        $this->assertEquals(88, $this->score->se);
    }

    /** @test */
    public function it_counts_standardized_score_of_wa_question_type_correctly()
    {
        $this->assertEquals(97, $this->score->wa);
    }

    /** @test */
    public function it_counts_standardized_score_of_an_question_type_correctly()
    {
        $this->assertEquals(99, $this->score->an);
    }

    /** @test */
    public function it_counts_standardized_score_of_ge_question_type_correctly()
    {
        $this->assertEquals(74, $this->score->ge);
    }

    /** @test */
    public function it_counts_standardized_score_of_ra_question_type_correctly()
    {
        $this->assertEquals(74, $this->score->ra);
    }

    /** @test */
    public function it_counts_standardized_score_of_zr_question_type_correctly()
    {
        $this->assertEquals(83, $this->score->zr);
    }

    /** @test */
    public function it_counts_standardized_score_of_fa_question_type_correctly()
    {
        $this->assertEquals(109, $this->score->fa);
    }

    /** @test */
    public function it_counts_standardized_score_of_wu_question_type_correctly()
    {
        $this->assertEquals(104, $this->score->wu);
    }

    /** @test */
    public function it_counts_standardized_score_of_me_question_type_correctly()
    {
        $this->assertEquals(87, $this->score->me);
    }

    /** @test */
    public function it_counts_standardized_score_total_correctly()
    {
        $this->assertEquals(84, $this->score->total);
    }
}
