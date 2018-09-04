<?php

namespace App\Parser;

class IstRecapParser extends TestAnswerParser
{
    protected function columns()
    {
        $columns = [
            'test_taker_index',
            'test_taker_name',
            'test_taker_number',
            'iq',
            'first_recommendation',
            'second_recommendation',
        ];

        return array_combine(range('A', 'F'), $columns);
    }

    protected function columnParsingMethods()
    {
        return [
            'test_taker_index' => 'numberParse',
            'iq' => 'numberParse',
        ];
    }
}
