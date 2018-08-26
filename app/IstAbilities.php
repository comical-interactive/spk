<?php

namespace App;

trait IstAbilities
{
    public function verbalAbility()
    {
        return new \App\IstAbilities\Verbal(
            $this->raw_score->wa,
            $this->raw_score->an,
            $this->raw_score->ge
        );
    }

    public function arithmeticAbility()
    {
        return new \App\IstAbilities\Arithmetic(
            $this->raw_score->ra,
            $this->raw_score->zr
        );
    }

    public function analyticSyntheticAbility()
    {
        return new \App\IstAbilities\AnalyticSynthetic(
            $this->raw_score->fa
        );
    }

    public function spatialAbility()
    {
        return new \App\IstAbilities\Spatial(
            $this->raw_score->wu
        );
    }

    public function logicAbility()
    {
        return new \App\IstAbilities\Logic(
            $this->raw_score->an,
            $this->raw_score->zr
        );
    }

    public function concentrationAbility()
    {
        return new \App\IstAbilities\Concentration(
            $this->raw_score->me
        );
    }

    public function memoryAbility()
    {
        return new \App\IstAbilities\Memory(
            $this->raw_score->me
        );
    }

    public function problemSolvingAbility()
    {
        return new \App\IstAbilities\ProblemSolving(
            $this->raw_score->an
        );
    }
}
