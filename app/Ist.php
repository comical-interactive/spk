<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IstAbilities\Iq;

class Ist extends Model
{
    use IstAbilities;

    protected $guarded = [];

    public function getTestTakerAgeAttribute($value)
    {
        if ($value == 0) {
            return 15;
        }

        if ($value > 16) {
            return 16;
        }

        return $value;
    }

    public function getRawScoreAttribute()
    {
        return new RawScore($this);
    }

    public function getStandardizedScoreAttribute()
    {
        return new StandardizedScore($this);
    }

    public function getIqAttribute()
    {
        return new Iq($this->standardized_score->total);
    }

    public function getFirstChoiceRecommendationAttribute()
    {
        if ($this->iq->score() >= 80) {
            return $this->test_taker_first_choice ?: 'IPA';
        }

        return 'IPS';
    }

    public function getSecondChoiceRecommendationAttribute()
    {
        if ($this->test_taker_first_choice == 'IPS' || $this->first_choice_recommendation == 'IPS') {
            return 'IBB';
        }

        return 'IPS';
    }
}
