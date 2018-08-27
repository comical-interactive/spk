<?php

namespace App;

class Ls
{
    protected $model;

    protected $answers = [
        ['K', 'V', 'A'], ['V', 'K', 'A'], ['V', 'K', 'A'], ['V', 'A', 'K'], ['V', 'A', 'K'],
        ['V', 'K', 'A'], ['A', 'V', 'K'], ['K', 'A', 'V'], ['K', 'V', 'A'], ['K', 'A', 'V'],
        ['K', 'A', 'V'], ['A', 'V', 'K'], ['V', 'A', 'K'], ['K', 'A', 'V'], ['V', 'K', 'A'],
        ['V', 'A', 'K'], ['A', 'V', 'K'], ['K', 'V', 'A'], ['V', 'A', 'K'], ['K', 'V', 'A'],
    ];

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function determine()
    {
        $learningStyles = ['V', 'A', 'K'];
        $counter = array_fill_keys($learningStyles, 0);
        $providedAnswers = explode(',', $this->model->ls_answers);

        foreach ($providedAnswers as $index => $answer) {
            $currentAnswer = $this->answers[$index];

            // there is three possible answers A, B or C
            if ($answer == 'A') {
                $counter[$currentAnswer[0]]++;
            } elseif ($answer == 'B') {
                $counter[$currentAnswer[1]]++;
            } else {
                $counter[$currentAnswer[2]]++;
            }
        }

        // sort learning styles by count
        arsort($counter);

        // sorted learning styles by highest count
        $sortedLearningStyle = array_keys($counter);

        // return first sorted learning style
        return reset($sortedLearningStyle);
    }
}
