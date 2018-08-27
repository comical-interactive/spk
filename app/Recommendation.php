<?php

namespace App;

class Recommendation
{
    protected $iqScore;

    protected $firstChoice;

    protected $secondChoice;

    public function __construct($iqScore, $firstChoice = null, $secondChoice = null)
    {
        $this->iqScore = $iqScore;
        $this->firstChoice = $firstChoice;
        $this->secondChoice = $secondChoice;
    }

    public function first()
    {
        if ($this->iqScore >= 80) {
            if ($this->firstChoiceIsEmpty() || $this->firstChoice == 'IPA') {
                return 'MIA';
            }

            if ($this->firstChoice == 'IPS') {
                return 'IIS';
            }

            return $this->firstChoice;
        }

        return 'IIS';
    }

    public function second()
    {
        if ($this->firstChoice == 'IPS' || $this->first() == 'IIS') {
            return 'IBB';
        }

        return 'IIS';
    }

    protected function firstChoiceIsEmpty()
    {
        $readErrorChar = '*';

        return ! $this->firstChoice || trim($this->firstChoice) == $readErrorChar;
    }
}
