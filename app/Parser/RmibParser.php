<?php

namespace App\Parser;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;

class RmibParser
{
    protected $file;

    protected $columns = [
        'test_taker_index',
        'test_taker_number',
        'test_taker_name',
        'test_date',
        'test_taker_sex',
        'test_taker_age',
        'a_answers',
        'b_answers',
        'c_answers',
        'd_answers',
        'e_answers',
        'f_answers',
        'g_answers',
        'h_answers',
    ];

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function parse($dataRowStart = 2)
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
            $columns = $this->columns();
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            foreach ($cellIterator as $index => $cell) {
                if (! isset($columns[$index])) {
                    continue;
                }

                $columnName = $columns[$index];
                if ($this->isAnswerColumn($index)) {
                    $rowData[$columnName] = $this->formatAnswer($cell->getValue());
                } else {
                    $rowData[$columnName] = $this->formatNonAnswer($cell->getValue(), $columnName);
                }
            }

            array_push($result, $rowData);
        }

        return collect($result);
    }

    protected function columns()
    {
        return array_combine(range('A', 'N'), $this->columns);
    }

    public function isAnswerColumn($index)
    {
        $answerColumns = range('G', 'N');

        return in_array($index, $answerColumns);
    }

    protected function formatAnswer($answerString, $blankChar = '-')
    {
        $answers = str_split($answerString);
        $formatted = array_map(function ($answer) use ($blankChar) {
            if (empty(trim($answer))) {
                return $blankChar;
            }

            return $answer;
        }, $answers);

        return implode(',', $formatted);
    }

    protected function formatNonAnswer($cell, $columnName)
    {
        $formatted = trim($cell);

        if ($this->shouldConvertToNumber($columnName)) {
            return intval(preg_replace("/\D/", "", $formatted));
        }

        if ($columnName == 'test_date') {
            return $this->formatDate($formatted);
        }

        return $formatted;
    }

    protected function shouldConvertToNumber($columnName)
    {
        $shouldConvertToNumberColumns = [
            'test_taker_index', 'test_taker_age'
        ];

        return in_array($columnName, $shouldConvertToNumberColumns);
    }

    protected function formatDate($string)
    {
        $day = substr($string, 0, 2);
        $month = substr($string, 2, 2);
        $year = substr($string, 4, 2);

        return Carbon::create($year, $month, $year);
    }
}
