<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Parser\RmibParser;
use Illuminate\Http\UploadedFile;

class RmibParserTest extends TestCase
{
    protected $parser;

    public function setUp()
    {
        parent::setUp();

        $this->parser = new RmibParser(UploadedFile::fake()->create('ist.xlsx', '100'));
    }

    /** @test */
    public function it_parses_the_line_correctly()
    {
        $stringToParse = collect(rmibInput());
        $result = $this->parser->parseLine($stringToParse);

        $this->assertEquals([
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
        ], $result);
    }
}
