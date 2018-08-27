<?php

namespace App;

class StandardizedScore
{
    private $ist;

    protected $standardRef;

    public function __construct(Ist $ist)
    {
        $this->ist = $ist;
        $this->standardRef = config('constants.ist.standard_ref');
    }

    public function total()
    {
        $path = "{$this->ist->test_taker_age}.total";
        $totalRef = array_get($this->standardRef, $path);

        // substract total raw score to make tens (10, 20, ..) not included
        $steps = floor(($this->ist->raw_score->total - .1) / $totalRef['range']);

        return $totalRef['start'] + ($totalRef['step'] * $steps);
    }

    public function scorePerType($questionType)
    {
        $rawScoreOnType = $this->ist->raw_score->$questionType;
        $path = "{$this->ist->test_taker_age}.{$questionType}.{$rawScoreOnType}";

        return array_get($this->standardRef, $path);
    }

    public function __get($name)
    {
        if (preg_match('/^(se|wa|an|ge|ra|zr|fa|wu|me)/', $name)) {
            return $this->scorePerType($name);
        }

        if (method_exists($this, $name)) {
            return call_user_func([$this, $name]);
        }

        throw new \Exception("Property {$name} does not exists.");
    }
}
