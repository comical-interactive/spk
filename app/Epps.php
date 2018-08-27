<?php

namespace App;

class Epps
{
    protected $model;

    public function __construct(MbtiEppsLs $model)
    {
        $this->model = $model;
    }

    public function __get($name)
    {
        $propNameArray = explode('_', $name);

        if (! $this->isValidPropertyName($name)) {
            throw new \Exception("Property {$name} does not exists.");
        }

        if ($propNameArray[1] == 'score') {
            return $this->scores()[$propNameArray[0]];
        }

        return $this->grades()[$propNameArray[0]];
    }

    protected function scores()
    {
        return collect($this->evaluate());
    }

    protected function grades()
    {
        return $this->scores()->map(function ($score) {
            $indicators = ['SK', 'K', 'S', 'B', 'SB'];
            $perimeters = [2, 4, 6, 8];

            return getGrade($score, $indicators, $perimeters);
        });
    }

    protected function evaluate()
    {
        $answers = config('constants.epps.answers');
        $aspects = config('constants.epps.aspects');

        $pointCounters = array_fill_keys($aspects, 0);
        $providedAnswers = explode(',', $this->providedAnswers());

        foreach ($providedAnswers as $index => $answer) {
            $currentAnswer = $answers[$index];

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

    protected function isValidPropertyName($name)
    {
        $propNameArray = explode('_', $name);

        return count($propNameArray) == 2
            && $this->isValidAspect($propNameArray[0])
            && $this->isValidAccessor($propNameArray[1]);
    }

    protected function isValidAspect($aspect)
    {
        return in_array($aspect, config('constants.epps.aspects'));
    }

    public function isValidAccessor($accessor)
    {
        $validAccessors = ['score', 'grade'];

        return in_array($accessor, $validAccessors);
    }
}
