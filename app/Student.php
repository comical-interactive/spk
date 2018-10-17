<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student
{
    public $name;

    public $testNumber;

    public $sex;

    public $age;

    public function __construct($name, $testNumber, $sex, $age)
    {
        $this->name = $name;
        $this->testNumber = $testNumber;
        $this->sex = $sex;
        $this->age = $age;
    }

    public function ist()
    {
        return $this->match(new Ist);
    }

    public function rmib()
    {
        return $this->match(new Rmib);
    }

    public function mbtiEppsLs()
    {
        return $this->match(new MbtiEppsLs);
    }

    public function match(Model $model)
    {
        // match by test number
        $matchesByTestNumber = $model::where('test_taker_number', $this->testNumber)->get();

        if ($matchesByTestNumber->count() === 1) {
            return $matchesByTestNumber->first();
        }

        // if no match by id, match by name
        $matchesByName = $model::where('test_taker_name', $this->name)->get();

        if ($matchesByName->count() === 1) {
            return $matchesByName->first();
        }

        // no match or multiple match
        return null;
    }
}
