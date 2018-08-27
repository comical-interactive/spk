<?php

namespace App\Parser;

class RmibParser extends TestAnswerParser
{
    protected function columns()
    {
        $columns = config('constants.rmib.columns');

        return array_combine(range('A', 'N'), $columns);
    }

    protected function columnParsingMethods()
    {
        return [
            'test_taker_index' => 'numberParse',
            'test_taker_age' => 'numberParse',
            'a_answers' => 'defaultAnswerParse',
            'b_answers' => 'defaultAnswerParse',
            'c_answers' => 'defaultAnswerParse',
            'd_answers' => 'defaultAnswerParse',
            'e_answers' => 'defaultAnswerParse',
            'f_answers' => 'defaultAnswerParse',
            'g_answers' => 'defaultAnswerParse',
            'h_answers' => 'defaultAnswerParse',
        ];
    }
}
