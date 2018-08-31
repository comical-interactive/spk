<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MbtiEppsLs extends Model
{
    protected $guarded = ['test_date'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'mbti', 'epps', 'ls'
    ];

    public function getMbtiAttribute()
    {
        return new Mbti($this);
    }

    public function getEppsAttribute()
    {
        return new Epps($this);
    }

    public function getLsAttribute()
    {
        $learningStyle = (new Ls($this))->determine();

        return strtolower($learningStyle);
    }
}
