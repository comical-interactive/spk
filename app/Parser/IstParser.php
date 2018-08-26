<?php
namespace App\Parser;

use PhpOffice\PhpSpreadsheet\IOFactory;

class IstParser
{
    protected $file;

    protected $columns = [
        'A' => [
            'name' => 'test_taker_index',
            'shouldParse' => true,
            'parsingMethod' => 'numberParse'
        ],
        'B' => [
            'name' => 'test_taker_number',
            'shouldParse' => false,
        ],
        'C' => [
            'name' => 'test_taker_name',
            'shouldParse' => false,
        ],
        'D' => [
            'name' => 'test_taker_first_choice',
            'shouldParse' => false,
        ],
        'E' => [
            'name' => 'test_taker_second_choice',
            'shouldParse' => false,
        ],
        'F' => [
            'name' => 'test_taker_age',
            'shouldParse' => true,
            'parsingMethod' => 'numberParse'
        ],
        'G' => [
            'name' => 'test_taker_sex',
            'shouldParse' => false,
        ],
        'H' => [
            'name' => 'se_answers',
            'shouldParse' => true,
            'parsingMethod' => 'defaultAnswerParse'
        ],
        'I' => [
            'name' => 'wa_answers',
            'shouldParse' => true,
            'parsingMethod' => 'defaultAnswerParse'
        ],
        'J' => [
            'name' => 'an_answers',
            'shouldParse' => true,
            'parsingMethod' => 'defaultAnswerParse'
        ],
        'K' => [
            'name' => 'ge_answers',
            'shouldParse' => true,
            'parsingMethod' => 'defaultAnswerParse'
        ],
        'L' => [
            'name' => 'ra_answers',
            'shouldParse' => true,
            'parsingMethod' => 'numberAnswerParse'
        ],
        'M' => [
            'name' => 'zr_answers',
            'shouldParse' => true,
            'parsingMethod' => 'numberAnswerParse'
        ],
        'N' => [
            'name' => 'fa_answers',
            'shouldParse' => true,
            'parsingMethod' => 'defaultAnswerParse'
        ],
        'O' => [
            'name' => 'wu_answers',
            'shouldParse' => true,
            'parsingMethod' => 'defaultAnswerParse'
        ],
        'P' => [
            'name' => 'me_answers',
            'shouldParse' => true,
            'parsingMethod' => 'defaultAnswerParse'
        ],
    ];

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function parse($dataRowStart = 3)
    {
        $result = [];
        $readerType = ucfirst($this->file->clientExtension());
        $reader = IOFactory::createReader($readerType);
        $reader->setReadDataOnly(true);

        $spreadsheet = $reader->load($this->file);
        $worksheet = $spreadsheet->getActiveSheet();

        foreach ($worksheet->getRowIterator() as $index => $row) {
            if ($index < $dataRowStart) {
                continue;
            }

            $rowData = [];
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            foreach ($cellIterator as $index => $cell) {
                if (! isset($this->columns[$index])) {
                    continue;
                }

                $currentColumn = $this->columns[$index];
                if ($currentColumn['shouldParse']) {
                    $parsingMethod = $this->columns[$index]['parsingMethod'];
                    $parseResult = call_user_func_array([$this, $parsingMethod], [$cell->getValue()]);

                    $rowData[$currentColumn['name']] = is_array($parseResult)
                        ? implode(',', $parseResult)
                        : $parseResult;
                } else {
                    $rowData[$currentColumn['name']] = $cell->getFormattedValue();
                }
            }

            array_push($result, $rowData);
        }

        return collect($result);
    }

    protected function numberParse($value)
    {
        return intval(preg_replace("/\D/", "", $value));
    }

    protected function defaultAnswerParse($answerString)
    {
        return str_split($answerString);
    }

    protected function numberAnswerParse($answerString)
    {
        preg_match_all("/\s|\(\d{2,}\)|\d{1}/", $answerString, $matches);

        return array_map(function ($value) {
            return preg_replace("/\D/", "", $value);
        }, $matches[0]);
    }
}
