<?php

namespace App;

class RawScore
{
    private $ist;

    private $answers = [
        'se' => ['E', 'C', 'D', 'D', 'D', 'B', 'C', 'A', 'E', 'B', 'C', 'D', 'D', 'E', 'C', 'A', 'B', 'B', 'C', 'B'],
        'wa' => ['B', 'B', 'D', 'C', 'C', 'C', 'C', 'D', 'D', 'A', 'E', 'A', 'A', 'B', 'C', 'A', 'D', 'E', 'B', 'C'],
        'an' => ['C', 'E', 'D', 'D', 'D', 'A', 'D', 'B', 'E', 'D', 'C', 'C', 'C', 'C', 'D', 'C', 'C', 'D', 'E', 'E'],
        'ra' => ['35', '280', '250', '26', '30', '70', '45', '50', '48', '78', '19', '6', '57', '90', '120', '17', '21', '5', '48', '3'],
        'zr' => ['27', '25', '27', '15', '46', '10', '24', '7', '5', '14', '8', '14', '45', '36', '12', '80', '14', '12', '36', '10'],
        'fa' => ['A', 'C', 'B', 'A', 'D', 'B', 'C', 'E', 'E', 'D', 'E', 'B', 'D', 'C', 'B', 'A', 'B', 'D', 'C', 'A'],
        'wu' => ['A', 'C', 'D', 'E', 'A', 'C', 'D', 'C', 'E', 'A', 'B', 'D', 'E', 'B', 'D', 'B', 'A', 'E', 'B', 'C'],
        'me' => ['D', 'E', 'B', 'A', 'C', 'A', 'D', 'E', 'C', 'B', 'B', 'A', 'E', 'C', 'D', 'B', 'E', 'A', 'C', 'D']
    ];

    private $geRawScore = [1, 1, 2, 3, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9, 10, 10, 11, 11, 12, 12, 13, 13, 14, 14, 15, 15, 16, 17, 18, 19, 20, 20];

    public function __construct(IST $ist)
    {
        $this->ist = $ist;
    }

    protected function questionTypes()
    {
        return ['se', 'wa', 'an', 'ge', 'ra', 'zr', 'fa', 'wu', 'me'];
    }

    protected function total()
    {
        $total = 0;

        foreach (['se', 'wa', 'an', 'ra', 'zr', 'fa', 'wu', 'me'] as $questionType) {
            $total += $this->scorePerType($questionType);
        }

        return $total + $this->evaluateGe();
    }

    protected function scorePerType($type)
    {
        if (! in_array($type, $this->questionTypes())) {
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

        return $this->geRawScore[$geSum];
    }

    public function __get($name)
    {
        return call_user_func([$this, $name]);
    }

    public function __call($name, $arguments)
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
