<?php

namespace App;

class Epps
{
    protected $model;

    protected $indicators = ['SK', 'K', 'S', 'B', 'SB'];

    protected $aspects = [
        'ach', 'def', 'ord', 'exh', 'aut', 'aff', 'int', 'suc', 'dom', 'aba', 'nur', 'chg', 'end', 'het', 'agg'
    ];

    protected $answers = [
        ['agg', 'ach'], ['end', 'ach'], ['aut', 'ach'], ['exh', 'ach'], ['aff', 'ach'], ['nur', 'agg'], ['ach', 'agg'],
        ['end', 'agg'], ['aut', 'agg'], ['exh', 'agg'], ['aff', 'end'], ['nur', 'end'], ['ach', 'end'], ['agg', 'end'],
        ['aut', 'end'], ['exh', 'aut'], ['aff', 'aut'], ['nur', 'aut'], ['ach', 'aut'], ['agg', 'aut'], ['end', 'exh'],
        ['aut', 'exh'], ['aff', 'exh'], ['nur', 'exh'], ['ach', 'exh'], ['agg', 'aff'], ['end', 'aff'], ['aut', 'aff'],
        ['exh', 'aff'], ['nur', 'aff'], ['ach', 'nur'], ['agg', 'nur'], ['end', 'nur'], ['aut', 'nur'], ['exh', 'nur'],
        ['aff', 'ach'], ['nur', 'ach'], ['agg', 'ach'], ['end', 'aut'], ['exh', 'ach'], ['aff', 'agg'], ['nur', 'agg'],
        ['ach', 'agg'], ['end', 'agg'], ['aut', 'agg'], ['exh', 'end'], ['aff', 'end'], ['nur', 'end'], ['ach', 'end'],
        ['agg', 'end'],
    ];

    public function __construct(MbtiEppsLs $model)
    {
        $this->model = $model;
    }

    public function scores()
    {
        return collect($this->evaluate());
    }

    public function grades()
    {
        return $this->scores()->map(function ($score) {
            return $this->getGrade($score);
        });
    }

    protected function getGrade($score)
    {
        $matchIndex = 0;
        $perimeters = [2, 4, 6, 8];

        while ($score > current($perimeters) && current($perimeters)) {
            $matchIndex++;
            next($perimeters);
        }

        return $this->indicators[$matchIndex];
    }

    protected function evaluate()
    {
        $pointCounters = array_fill_keys($this->aspects, 0);
        $providedAnswers = explode(',', $this->providedAnswers());

        foreach ($providedAnswers as $index => $answer) {
            $currentAnswer = $this->answers[$index];

            // there is only two possible answers A or B
            if ($answer == 'A') {
                $pointCounters[$currentAnswer[0]]++;
            } else {
                $pointCounters[$currentAnswer[1]]++;
            }
        }

        return $pointCounters;
    }

    protected function providedAnswers()
    {
        return $this->model->epps1_answers . ',' . $this->model->epps2_answers;
    }
}
