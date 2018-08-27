<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IstAbilities\Iq;

class Ist extends Model
{
    use IstAbilities;

    protected $guarded = ['test_date'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'raw_score', 'standardized_score', 'iq', 'recommendation'
    ];

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

    public function getRecommendationAttribute()
    {
        return new Recommendation($this->iq->score(), $this->first_choice, $this->second_choice);
    }
}
