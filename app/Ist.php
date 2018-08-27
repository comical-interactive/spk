<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IstAbilities\Iq;

class Ist extends Model
{
    use IstAbilities;

    protected $guarded = ['test_date'];

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
            if ($this->firstChoiceIsEmpty() || $this->test_taker_first_choice == 'IPA') {
                return 'MIA';
            }

            if ($this->test_taker_first_choice == 'IPS') {
                return 'IIS';
            }

            return $this->test_taker_first_choice;
        }

        return 'IIS';
    }

    public function getSecondChoiceRecommendationAttribute()
    {
        if ($this->test_taker_first_choice == 'IPS' || $this->first_choice_recommendation == 'IPS') {
            return 'IBB';
        }

        return 'IIS';
    }

    protected function firstChoiceIsEmpty()
    {
        $readErrorChar = '*';

        return ! $this->test_taker_first_choice || trim($this->test_taker_first_choice) == $readErrorChar;
    }
}
