<?php

use App\Ist;

function istInput()
{
    $input = [
        '1',
        '040403001',
        'ISHAM',
        'IPA',
        'IPS',
        '15',
        'LAKI-LAKI',
        'D CDDCBAACCDEABECDAC',
        'CBDECCCDAEDDEBDBCDAC',
        'CABBEEBDEDBBACD BDEA',
        '0000000000000000',
        '321430(15)(45)2(10)494(36)8     ',
        '2(25)71(45)(28)(34)(16)22(12)(14)        ',
        'ACBBDBAEBBEADABEBBCA',
        'ACDEAADBECBBDDDBDBDD',
        'BCADCECAECDAEDCEDAEB',
    ];

    return array_combine(config('constants.ist.columns'), $input);
}

function rmibInput()
{
    $input = [
        '1',
        '040403001',
        'ISHAM',
        '100118',
        'LAKI-LAKI',
        '15',
        '  JK***E    ',
        'LKJIHGFEDCBA',
        '  ABL*EFG   ',
        '  ABCHGF    ',
        'LKJIHGFEDCBA',
        'ABCDEFGHI KL',
        '  ALKE      ',
        '   ABILE    ',
    ];

    return array_combine(config('constants.rmib.columns'), $input);
}

function mbtiEppsLsInput()
{
    $input = [
        '1',
        '040403001',
        'ISHAM',
        '100118',
        '15',
        'LAKI-LAKI',
        'ABBABAAABB BAB ABB  BBBAAABBAB',
        'ABABABABABA ABAAA BABBAABBAABB',
        'BBABAABABABBB    B  ABBBB',
        'A  B   A   B   A   B  A B',
        'B    BA       A    B',
    ];

    return array_combine(config('constants.mels.columns'), $input);
}

function makeIst()
{
    return [
        "test_taker_index" => 1,
        "test_taker_number" => "040403001",
        "test_taker_name" => "ISHAM",
        "test_taker_first_choice" => "IPA",
        "test_taker_second_choice" => "IPS",
        "test_taker_age" => 15,
        "test_taker_sex" => "LAKI-LAKI",
        "se_answers" => "D, ,C,D,D,C,B,A,A,C,C,D,E,A,B,E,C,D,A,C",
        "wa_answers" => "C,B,D,E,C,C,C,D,A,E,D,D,E,B,D,B,C,D,A,C",
        "an_answers" => "C,A,B,B,E,E,B,D,E,D,B,B,A,C,D, ,B,D,E,A",
        "ge_answers" => "0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0",
        "ra_answers" => "3,2,1,4,3,0,15,45,2,10,4,9,4,36,8,,,,,",
        "zr_answers" => "2,25,7,1,45,28,34,16,2,2,12,14,,,,,,,,",
        "fa_answers" => "A,C,B,B,D,B,A,E,B,B,E,A,D,A,B,E,B,B,C,A",
        "wu_answers" => "A,C,D,E,A,A,D,B,E,C,B,B,D,D,D,B,D,B,D,D",
        "me_answers" => "B,C,A,D,C,E,C,A,E,C,D,A,E,D,C,E,D,A,E,B",
    ];
}

function makeRmib()
{
    return [
        "test_taker_index" => 1,
        "test_taker_number" => "040403001",
        "test_taker_name" => "ISHAM",
        "test_date" => "100118",
        "test_taker_sex" => "LAKI-LAKI",
        "test_taker_age" => 15,
        "a_answers" => " , ,J,K,*,*,*,E, , , , ",
        "b_answers" => "L,K,J,I,H,G,F,E,D,C,B,A",
        "c_answers" => " , ,A,B,L,*,E,F,G, , , ",
        "d_answers" => " , ,A,B,C,H,G,F, , , , ",
        "e_answers" => "L,K,J,I,H,G,F,E,D,C,B,A",
        "f_answers" => "A,B,C,D,E,F,G,H,I, ,K,L",
        "g_answers" => " , ,A,L,K,E, , , , , , ",
        "h_answers" => " , , ,A,B,I,L,E, , , , ",
    ];
}

function makeMbtiEppsLs()
{
    return [
        "test_taker_index" => 1,
        "test_taker_number" => "040403001",
        "test_taker_name" => "ISHAM",
        "test_date" => "100118",
        "test_taker_age" => 15,
        "test_taker_sex" => "LAKI-LAKI",
        "mbti1_answers" => "A,B,B,A,B,A,A,A,B,B,A,B,A,B,A,A,B,B,A,A,B,B,B,A,A,A,B,B,A,B",
        "mbti2_answers" => "A,B,A,B,A,B,A,B,A,B,A,A,A,B,A,A,A,A,B,A,B,B,A,A,B,B,A,A,B,B",
        "epps1_answers" => "B,B,A,B,A,A,B,A,B,A,B,B,B, , , , ,B, , ,A,B,B,B,B",
        "epps2_answers" => "A, , ,B, , , ,A, , , ,B, , , ,A, , , ,B, , ,A, ,B",
        "ls_answers" => "B, , , , ,B,A, , , , , , , ,A, , , , ,B",
    ];
}

function createIst()
{
    $data = makeIst();

    return App\Ist::create(['school_id' => factory('App\School')->create()->id] + $data);
}

function createRmib()
{
    $data = makeRmib();

    return App\Rmib::create(['school_id' => factory('App\School')->create()->id] + $data);
}

function createMbtiEppsLs()
{
    $data = makeMbtiEppsLs();

    return App\MbtiEppsLs::create(['school_id' => factory('App\School')->create()->id] + $data);
}
