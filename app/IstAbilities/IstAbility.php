<?php

namespace App\IstAbilities;

abstract class IstAbility
{
    protected $indicators = ['K', 'S', 'B', 'SB'];

    protected $score;

    public function __construct()
    {
        $this->score = array_sum(func_get_args()) / count(func_get_args());
    }

    public function score()
    {
        return $this->score;
    }

    public function grade()
    {
        $matchIndex = 0;
        $perimeters = $this->getGradePerimeters();

        while ($this->score() > current($perimeters) && current($perimeters)) {
            $matchIndex++;
            next($perimeters);
        }

        return $this->indicators[$matchIndex];
    }

    abstract protected function getGradePerimeters();
}
