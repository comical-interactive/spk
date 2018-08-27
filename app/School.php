<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = [];

    protected $withCount = [
        'ists',
        'rmibs',
        'mbtiEppsLss'
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($school) {
            $school->reset();
        });
    }

    public function ists()
    {
        return $this->hasMany(Ist::class);
    }

    public function rmibs()
    {
        return $this->hasMany(Rmib::class);
    }

    public function mbtiEppsLss()
    {
        return $this->hasMany(MbtiEppsLs::class);
    }

    public function importTest($test, $attributes)
    {
        if (! method_exists($this, $test)) {
            throw new \Exception("{$test} does not exists!");
        }

        $relation = call_user_func([$this, $test]);

        return $relation->createMany($attributes);
    }

    public function reset()
    {
        $this->ists()->delete();
        $this->rmibs()->delete();
        $this->mbtiEppsLss()->delete();
    }
}
