<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MbtiTest extends TestCase
{
    use RefreshDatabase;

    protected $mbti;

    public function setUp()
    {
        parent::setUp();

        $this->mbti = createMbtiEppsLs()->mbti;
    }

    /** @test */
    public function it_returns_hasil_tes_tidak_valid_on_all_dimension_if_there_is_empty_answer()
    {
        // make mbti has empty answer
        $model = createMbtiEppsLs();
        $model->update(['mbti1_answers' => str_replace('A', ' ', $model->mbti1_answers)]);

        $this->assertEquals('hasil tes tidak valid', $model->mbti->introvert);
    }

    /** @test */
    public function it_returns_67_on_introvert_dimension()
    {
        $this->assertEquals(67, $this->mbti->introvert);
    }

    /** @test */
    public function it_returns_33_on_extrovert_dimension()
    {
        $this->assertEquals(33, $this->mbti->extrovert);
    }

    /** @test */
    public function it_returns_67_on_sensing_dimension()
    {
        $this->assertEquals(67, $this->mbti->sensing);
    }

    /** @test */
    public function it_returns_33_on_intuition_dimension()
    {
        $this->assertEquals(33, $this->mbti->intuition);
    }

    /** @test */
    public function it_returns_60_on_thinking_dimension()
    {
        $this->assertEquals(60, $this->mbti->thinking);
    }

    /** @test */
    public function it_returns_40_on_feeling_dimension()
    {
        $this->assertEquals(40, $this->mbti->feeling);
    }

    /** @test */
    public function it_returns_60_on_judging_dimension()
    {
        $this->assertEquals(60, $this->mbti->judging);
    }

    /** @test */
    public function it_returns_40_on_perceiving_dimension()
    {
        $this->assertEquals(40, $this->mbti->perceiving);
    }

    /** @test */
    public function it_returns_istj_as_type()
    {
        $this->assertEquals('istj', $this->mbti->type);
    }
}
