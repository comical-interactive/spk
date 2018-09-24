<?php

namespace App;

class Mbti
{
    protected $model;

    protected $answers;

    protected $dimensions;

    protected $dimensionPercentages;

    public function __construct(MbtiEppsLs $model)
    {
        $this->model = $model;
        $this->dimensions = config('constants.mbti.dimensions');
        $this->answers = "{$this->model->mbti1_answers},{$this->model->mbti2_answers}";
        $this->dimensionPercentages = $this->countDimensionPercentages();
    }

    public function isValid()
    {
        return $this->isEmptyOrErrorTolerable();
    }

    protected function countDimensionPercentages()
    {
        $dimensionRef = config('constants.mbti.dimension_ref');
        $counter = array_fill_keys($this->dimensions, 0);
        $answerArray = explode(',', $this->answers);

        foreach ($dimensionRef as $key => $value) {
            // there are 4 possible answers: A, B, empty, and error
            // if the answer is empty or error we will do nothing
            // but if the answer is valid then we will increment
            // the counter of the given dimension by comparing
            // the value of current dimension reference (the
            // dimension reference's is an array containing
            // 2 dimensions that considered as dimension
            // pair)
            if (!in_array($answerArray[$key], ['A', 'B'])) {
                continue;
            }

            $answerAsIndex = $answerArray[$key] === 'A' ? 0 : 1;

            $dimensionToIncrement = strtolower($value[$answerAsIndex]);
            $counter[$dimensionToIncrement]++;
        }

        return collect($counter)->map(function ($dimensionCount, $key) use ($counter) {
            // find the pair
            $pair = $this->dimensionPairs()->filter(function ($pair) use ($key) {
                return in_array($key, $pair);
            })->first();

            // get the count of answered questions of the pair
            $answeredCountOfAPair = $counter[$pair[0]] + $counter[$pair[1]];

            return (int) round($dimensionCount / $answeredCountOfAPair * 100);
        });
    }

    public function __get($name)
    {
        if (!$this->isValid()) {
            return 'hasil tes tidak valid';
        }

        if (in_array($name, $this->dimensions)) {
            return $this->getDimensionPercentage($name);
        }

        if (method_exists($this, $name)) {
            return call_user_func([$this, $name]);
        }

        throw new \Exception("Property {$name} not found!");
    }

    protected function isEmptyOrErrorTolerable()
    {
        $tolerableCount = 5;

        // * treated as an error character
        $emptyOrErrorCount = preg_match_all("/(\s|\*)/", $this->answers);

        // return empty or error count
        return $emptyOrErrorCount <= $tolerableCount;
    }

    protected function getDimensionPercentage($dimension)
    {
        return $this->dimensionPercentages[$dimension];
    }

    protected function dimensionPairs()
    {
        return collect([
            ['introvert', 'extrovert'],
            ['sensing', 'intuition'],
            ['thinking', 'feeling'],
            ['judging', 'perceiving'],
        ]);
    }

    public function type()
    {
        $dimensionCodes = ['i', 'e', 's', 'n', 't', 'f', 'j', 'p'];
        $chunks = collect(array_combine($dimensionCodes, $this->dimensions))->chunk(2);

        return $chunks->map(function ($item) {
            return $this->dimensionPercentages[$item->first()] > $this->dimensionPercentages[$item->last()]
                ? $item->keys()->first()
                : $item->keys()->last();
        })->implode('');
    }
}
