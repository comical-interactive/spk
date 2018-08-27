<?php

namespace App\Parser;

use PhpOffice\PhpSpreadsheet\IOFactory;

abstract class TestAnswerParser
{
    protected $file;

    protected $dataRowStart;

    public function __construct($file, $dataRowStart = 2)
    {
        $this->file = $file;
        $this->dataRowStart = $dataRowStart;
    }

    public function parse()
    {
        $data = $this->read();

        return $data->slice($this->dataRowStart - 1)->map(function ($item, $key) {
            return $this->parseLine(collect($item));
        });
    }

    public function parseLine($line)
    {
        return $line->map(function ($item, $key) {
            $parsingMethods = $this->columnParsingMethods();

            return isset($parsingMethods[$key])
                ? call_user_func_array([$this, $parsingMethods[$key]], [$item])
                : trim($item);
        })->toArray();
    }

    protected function read()
    {
        $result = [];
        $readerType = ucfirst($this->file->clientExtension());
        $reader = IOFactory::createReader($readerType);
        $reader->setReadDataOnly(true);

        $spreadsheet = $reader->load($this->file);
        $worksheet = $spreadsheet->getActiveSheet();

        foreach ($worksheet->getRowIterator() as $index => $row) {
            $rowData = [];
            $columns = $this->columns();

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);


            foreach ($cellIterator as $index => $cell) {
                if (! isset($columns[$index])) {
                    continue;
                }

                $rowData[$columns[$index]] = $cell->getValue();
            }

            array_push($result, $rowData);
        }

        return collect($result);
    }

    abstract protected function columns();

    abstract protected function columnParsingMethods();

    protected function numberParse($value)
    {
        return intval(preg_replace("/\D/", "", $value));
    }

    protected function defaultAnswerParse($answerString)
    {
        return implode(',', str_split($answerString));
    }

    protected function numberAnswerParse($answerString)
    {
        preg_match_all("/\s|\(\d{2,}\)|\d{1}/", $answerString, $matches);

        $answerArray = array_map(function ($value) {
            return preg_replace("/\D/", "", $value);
        }, $matches[0]);

        return implode(',', $answerArray);
    }
}
