<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Parser\IstParser;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;

class IstParserTest extends TestCase
{
    protected $file;

    public function setUp()
    {
        parent::setUp();

        $this->file = new UploadedFile(new File(__DIR__ . '/../Files/ist.xlsx'));
    }

    /** @test */
    public function it_parses_the_file_correctly()
    {
        $parser = new IstParser($this->file);

        dd($parser->parse());
    }
}
