<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Parser\MbtiEppsLsParser;
use Illuminate\Http\UploadedFile;

class MbtiEppsLsParserTest extends TestCase
{
    protected $parser;

    public function setUp()
    {
        parent::setUp();

        $this->parser = new MbtiEppsLsParser(UploadedFile::fake()->create('ist.xlsx', '100'));
    }

    /** @test */
    public function it_parses_the_line_correctly()
    {
        $stringToParse = collect(makeMbtiEppsLs());
        $result = $this->parser->parseLine($stringToParse);

        $this->assertEquals([
            "test_taker_index" => 1,
            "test_taker_number" => "040403001",
            "test_taker_name" => "ISHAM",
            "test_date" => "100118",
            "test_taker_age" => 15,
            "test_taker_sex" => "LAKI-LAKI",
            "mbti1_answers" => "A,B,B,A,B,A,A,A,B,B, ,B,A,B, ,A,B,B, , ,B,B,B,A,A,A,B,B,A,B",
            "mbti2_answers" => "A,B,A,B,A,B,A,B,A,B,A, ,A,B,A,A,A, ,B,A,B,B,A,A,B,B,A,A,B,B",
            "epps1_answers" => "B,B,A,B,A,A,B,A,B,A,B,B,B, , , , ,B, , ,A,B,B,B,B",
            "epps2_answers" => "A, , ,B, , , ,A, , , ,B, , , ,A, , , ,B, , ,A, ,B",
            "ls_answers" => "B, , , , ,B,A, , , , , , , ,A, , , , ,B",
        ], $result);
    }
}
