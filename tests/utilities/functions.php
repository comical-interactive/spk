<?php

function makeIst()
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

function makeRmib()
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

function makeMbtiEppsLs()
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
