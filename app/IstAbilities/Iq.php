<?php

namespace App\IstAbilities;

class Iq
{
    private $swPoint;

    public function __construct($swPoint)
    {
        $this->swPoint = $swPoint;
    }

    public function score()
    {
        $iqScoreRef = config('constants.ist.iq_score_ref');

        return $iqScoreRef[$this->swPoint()];
    }

    public function grade()
    {
        $indicators = ['K', 'S', 'B', 'SB'];
        $perimeters = [90, 110, 120];

        return getGrade($this->score(), $indicators, $perimeters);
    }

    public function gradeInWord()
    {
        $indicators = ['di bawah rata-rata', 'rata-rata', 'di atas rata-rata', 'superior', 'genius'];
        $perimeters = [90, 110, 120, 140];

        return getGrade($this->score(), $indicators, $perimeters);
    }

    protected function swPoint()
    {
        if ($this->swPoint <= 73) {
            return 73;
        }

        if ($this->swPoint >= 140) {
            return 140;
        }

        return $this->swPoint;
    }
}
