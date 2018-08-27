<?php

namespace App;

class RawScore
{
    protected $ist;

    protected $answers;

    protected $geScoreRef;

    protected $questionTypes;

    public function __construct(IST $ist)
    {
        $this->ist = $ist;
        $this->questionTypes = config('constants.ist.question_types');
        $this->answers = config('constants.ist.answers');
        $this->geScoreRef = config('constants.ist.ge_score_ref');
    }

    protected function total()
    {
        return collect($this->questionTypes)->map(function ($item) {
            return $this->scorePerType($item);
        })->sum();
    }

    protected function scorePerType($type)
    {
        if (! in_array($type, $this->questionTypes)) {
            return;
        }

        if ($type === 'ge') {
            return $this->evaluateGe();
        }

        $propName = "{$type}_answers";

        return $this->evaluate(explode(',', $this->ist->{$propName}), $this->answers[$type]);
    }

    protected function evaluate($providedAnswers, $correctAnswers)
    {
        $correctCount = 0;

        for ($i = 0; $i < count($correctAnswers); $i++) {
            if ($providedAnswers[$i] == $correctAnswers[$i]) {
                $correctCount++;
            }
        }

        return $correctCount;
    }

    protected function evaluateGe()
    {
        $geSum = array_sum(explode(',', $this->ist->ge_answers));

        return $this->geScoreRef[$geSum];
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
