<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Parser\IstParser;
use Illuminate\Http\UploadedFile;

class IstParserTest extends TestCase
{
    protected $parser;

    public function setUp()
    {
        parent::setUp();

        $this->parser = new IstParser(UploadedFile::fake()->create('ist.xlsx', '100'), 3);
    }

    /** @test */
    public function it_parses_the_line_correctly()
    {
        $stringToParse = collect(istInput());
        $result = $this->parser->parseLine($stringToParse);

        $this->assertEquals([
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
        ], $result);
    }
}
