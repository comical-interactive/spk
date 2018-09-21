<?php

namespace App;

use Illuminate\Support\Collection;
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
        return $this->hasMany(Ist::class)->orderBy('test_taker_index', 'asc');
    }

    public function rmibs()
    {
        return $this->hasMany(Rmib::class)->orderBy('test_taker_index', 'asc');
    }

    public function mbtiEppsLss()
    {
        return $this->hasMany(MbtiEppsLs::class)->orderBy('test_taker_index', 'asc');
    }

    public function importTest($test, $attributes)
    {
        if (!method_exists($this, $test)) {
            throw new \Exception("{$test} does not exists!");
        }

        $relation = call_user_func([$this, $test]);

        return $relation->createMany($attributes);
    }

    public function importIstRecap(Collection $recap)
    {
        $recap->each(function ($item) {
            app(Rmib::class)->match($this, $item);
        });
    }

    public function reset()
    {
        $this->ists()->delete();
        $this->rmibs()->delete();
        $this->mbtiEppsLss()->delete();
    }
}
