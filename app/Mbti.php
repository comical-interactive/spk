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
        $this->dimensions =  config('constants.mbti.dimensions');
        $this->answers = "{$this->model->mbti1_answers},{$this->model->mbti2_answers}";
        $this->dimensionPercentages = $this->countDimensionPercentages();
    }

    public function isValid()
    {
        return ! $this->hasEmptyOrErrorAnswer();
    }

    protected function countDimensionPercentages()
    {
        $dimensionRef = config('constants.mbti.dimension_ref');
        $counter = array_fill_keys($this->dimensions, 0);
        $answerArray = explode(',', $this->answers);

        foreach ($dimensionRef as $key => $value) {
            $answerAsIndex = $answerArray[$key] === 'A' ? 0 : 1;
            $dimensionToIncrement = strtolower($value[$answerAsIndex]);
            $counter[$dimensionToIncrement]++;
        }

        return collect($counter)->map(function ($dimensionCount) {
            return (int) round($dimensionCount / 15 * 100);
        });
    }

    public function __get($name)
    {
        if ($this->hasEmptyOrErrorAnswer()) {
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

    protected function hasEmptyOrErrorAnswer()
    {
        // * is error character
        return !! preg_match("/(\s|\*)/", $this->answers);
    }

    protected function getDimensionPercentage($dimension)
    {
        return $this->dimensionPercentages[$dimension];
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
