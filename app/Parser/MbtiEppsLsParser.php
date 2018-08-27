<?php

namespace App\Parser;

class MbtiEppsLsParser extends TestAnswerParser
{
    protected function columns()
    {
        $columns = config('constants.mels.columns');

        return array_combine(range('A', 'K'), $columns);
    }

    protected function columnParsingMethods()
    {
        return [
            'test_taker_index' => 'numberParse',
            'test_taker_age' => 'numberParse',
            'mbti1_answers' => 'defaultAnswerParse',
            'mbti2_answers' => 'defaultAnswerParse',
            'epps1_answers' => 'defaultAnswerParse',
            'epps2_answers' => 'defaultAnswerParse',
            'ls_answers' => 'defaultAnswerParse',
        ];
    }
}
