<?php

namespace App\IstAbilities;

class Iq
{
    private $swPoint;

    protected $iqScoreRef = [
        '73' => 59, '74' => 61, '75' => 62.5, '76' => 64, '77' => 65.5, '78' => 67, '79' => 68.5, '80' => 70,
        '81' => 71.5, '82' => 73, '83' => 74.5, '84' => 76, '85' => 77.5, '86' => 79, '87' => 80.5, '88' => 82,
        '89' => 83.5, '90' => 85, '91' => 86.5, '92' => 88, '93' => 89.5, '94' => 91, '95' => 92.5, '96' => 94,
        '97' => 95.5, '98' => 97, '99' => 98.5, '100' => 100, '101' => 101.5, '102' => 103, '103' => 104.5,
        '104' => 106, '105' => 107.5, '106' => 109, '107' => 110.5, '108' => 112, '109' => 113.5, '110' => 115,
        '111' => 116.5, '112' => 118, '113' => 119.5, '114' => 121, '115' => 122.5, '116' => 124, '117' => 125.5,
        '118' => 127, '119' => 128.5, '120' => 130, '121' => 131.5, '122' => 133, '123' => 134.5, '124' => 136,
        '125' => 137.5, '126' => 139, '127' => 140.5, '128' => 142, '129' => 143.5, '130' => 145, '131' => 146.5,
        '132' => 148, '133' => 149.5, '134' => 151, '135' => 152.5, '136' => 154, '137' => 155.5, '138' => 157,
        '139' => 158.5, '140' => 160
    ];

    public function __construct($swPoint)
    {
        $this->swPoint = $swPoint;
    }

    public function swPoint()
    {
        if ($this->swPoint <= 73) {
            return 73;
        }

        if ($this->swPoint >= 140) {
            return 140;
        }

        return $this->swPoint;
    }

    public function score()
    {
        return $this->iqScoreRef[$this->swPoint()];
    }

    public function criteria()
    {
        if ($this->score() > 0 && $this->score() <= 90) {
            return 'di bawah rata-rata';
        }

        if ($this->score() > 90 && $this->score() <= 110) {
            return 'rata-rata';
        }

        if ($this->score() > 110 && $this->score() <= 120) {
            return 'di atas rata-rata';
        }

        if ($this->score() > 120 && $this->score() <= 140) {
            return 'superior';
        }

        return 'genuis';
    }

    public function grade()
    {
        $indicator = ['K', 'S', 'B', 'SB'];
        $perimeters = [90, 110, 120];
        $matchIndex = 0;

        while($this->score() > current($perimeters) && current($perimeters)) {
            $matchIndex++;
            next($perimeters);
        }

        return $indicator[$matchIndex];
    }
}