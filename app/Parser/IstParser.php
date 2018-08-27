<?php
namespace App\Parser;

class IstParser extends TestAnswerParser
{
    protected function columns()
    {
        $columns = config('constants.ist.columns');

        return array_combine(range('A', 'P'), $columns);
    }

    protected function columnParsingMethods()
    {
        return [
            'test_taker_index' => 'numberParse',
            'test_taker_age' => 'numberParse',
            'se_answers' => 'defaultAnswerParse',
            'wa_answers' => 'defaultAnswerParse',
            'an_answers' => 'defaultAnswerParse',
            'ge_answers' => 'defaultAnswerParse',
            'ra_answers' => 'numberAnswerParse',
            'zr_answers' => 'numberAnswerParse',
            'fa_answers' => 'defaultAnswerParse',
            'wu_answers' => 'defaultAnswerParse',
            'me_answers' => 'defaultAnswerParse',
        ];
    }
}
