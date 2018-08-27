<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Recommendation;

class RecommendationTest extends TestCase
{
    /** @test */
    public function it_returns_mia_as_first_recommendation_if_test_taker_does_not_provide_first_choice_and_their_iq_is_greater_than_80()
    {
        $recommendation = new Recommendation(81);

        $this->assertEquals('MIA', $recommendation->first());
    }

    /** @test */
    public function it_returns_iis_as_first_recommendation_if_test_taker_does_not_provide_first_choice_and_their_iq_is_less_than_80()
    {
        $recommendation = new Recommendation(79);

        $this->assertEquals('IIS', $recommendation->first());
    }

    /** @test */
    public function it_returns_mia_as_first_recommendation_if_test_taker_first_choice_is_ipa_and_their_iq_is_greater_than_80()
    {
        $recommendation = new Recommendation(81, 'IPA');

        $this->assertEquals('MIA', $recommendation->first());
    }

    /** @test */
    public function it_returns_iis_as_first_recommendation_if_test_taker_first_choice_is_ipa_and_their_iq_is_less_than_80()
    {
        $recommendation = new Recommendation(79, 'IPA');

        $this->assertEquals('IIS', $recommendation->first());
    }

    /** @test */
    public function it_returns_mia_as_first_recommendation_if_test_taker_first_choice_is_error_char_and_their_iq_is_greater_than_80()
    {
        $recommendation = new Recommendation(81, '*');

        $this->assertEquals('MIA', $recommendation->first());
    }

    /** @test */
    public function it_returns_iis_as_first_recommendation_if_test_taker_first_choice_is_error_char_and_their_iq_is_less_than_80()
    {
        $recommendation = new Recommendation(79, '*');

        $this->assertEquals('IIS', $recommendation->first());
    }

    /** @test */
    public function it_returns_iis_as_first_recommendation_if_test_taker_first_choice_is_ips_and_their_iq_is_greater_than_80()
    {
        $recommendation = new Recommendation(81, 'IPS');

        $this->assertEquals('IIS', $recommendation->first());
    }

    /** @test */
    public function it_returns_iis_as_first_recommendation_if_test_taker_first_choice_is_ips_and_their_iq_is_less_than_80()
    {
        $recommendation = new Recommendation(79, 'IPS');

        $this->assertEquals('IIS', $recommendation->first());
    }

    /** @test */
    public function it_returns_ibb_as_first_recommendation_if_test_taker_first_choice_is_ibb_and_their_iq_is_greater_than_80()
    {
        $recommendation = new Recommendation(81, 'IBB');

        $this->assertEquals('IBB', $recommendation->first());
    }
    /** @test */
    public function it_returns_iis_as_first_recommendation_if_test_taker_first_choice_is_ibb_and_their_iq_is_less_than_80()
    {
        $recommendation = new Recommendation(79, 'IBB');

        $this->assertEquals('IIS', $recommendation->first());
    }

    /** @test */
    public function it_returns_iis_as_second_recommendation_if_first_recommendation_is_mia()
    {
        $recommendation = new Recommendation(81);

        $this->assertEquals('IIS', $recommendation->second());
    }

    /** @test */
    public function it_returns_ibb_as_second_recommendation_if_first_recommendation_is_iis()
    {
        $recommendation = new Recommendation(70);

        $this->assertEquals('IBB', $recommendation->second());
    }
}
