<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IqTest extends TestCase
{
    use RefreshDatabase;

    protected $ist;

    public function setUp()
    {
        parent::setUp();

        $this->ist = createIst();
    }

    /** @test */
    public function it_determines_test_taker_iq_score()
    {
        $this->assertEquals(76, $this->ist->iq->score());
    }

    /** @test */
    public function it_determines_test_taker_iq_grade_in_word()
    {
        $this->assertEquals('di bawah rata-rata', $this->ist->iq->gradeInWord());
    }

    /** @test */
    public function it_determines_test_taker_iq_grade()
    {
        $this->assertEquals('K', $this->ist->iq->grade());
    }
}
