<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rmib extends Model
{
    protected $guarded = ['test_date'];

    public function match(School $school, $attributes)
    {
        // match by test number
        $matchesByTestNumber = $school->rmibs()->where('test_taker_number', $attributes['test_taker_number'])->get();

        if ($matchesByTestNumber->count() === 1) {
            return $matchesByTestNumber->first()->fillRecommendation($attributes);
        }

        // if no match by id, match by name
        $matchesByName = $school->rmibs()->where('test_taker_name', $attributes['test_taker_name'])->get();

        if ($matchesByName->count() === 1) {
            return $matchesByName->first()->fillRecommendation($attributes);
        }

        // no match or multiple match
        return;
    }

    public function fillRecommendation($attributes)
    {
        $this->first_recommendation = $attributes['first_recommendation'];
        $this->second_recommendation = $attributes['second_recommendation'];

        $this->save();
    }

    public function getSumsAttribute()
    {
        $sums = [];
        $questions = range('A', 'H');
        $priorities = range('A', 'L');
        $answers = [
            'A' => explode(',', $this->a_answers),
            'B' => explode(',', $this->b_answers),
            'C' => explode(',', $this->c_answers),
            'D' => explode(',', $this->d_answers),
            'E' => explode(',', $this->e_answers),
            'F' => explode(',', $this->f_answers),
            'G' => explode(',', $this->g_answers),
            'H' => explode(',', $this->h_answers)
        ];

        $transformedAnswer = array_map(function ($answers) use ($priorities) {
            $converted = [];

            foreach ($answers as $answer) {
                $index = array_search($answer, $priorities);
                if ($index !== false) {
                    $converted[] = $index + 1;
                } else {
                    $converted[] = 0;
                }
            }

            return $converted;
        }, $answers);

        for ($i = 0; $i < count($priorities); $i++) {
            $point = 0;
            foreach ($questions as $question) {
                $point += array_get($transformedAnswer, "$question.$i");
            }

            $sums[] = $point;
        }

        return $sums;
    }

    public function getPercentagesAttribute()
    {
        return array_map(function ($sum) {
            return $sum / array_sum($this->sums) * 100;
        }, $this->sums);
    }

    public function getRanksAttribute()
    {
        $interests = config('constants.rmib.interests');

        // combine each interest with its point
        $interestRank = array_combine(array_keys($interests), $this->sums);

        // sort the interest from highest point to lowest point
        array_multisort($interestRank, SORT_DESC);

        return $interestRank;
    }

    public function setSexAttribute($value)
    {
        $this->attributes['sex'] = strtolower($value);
    }
}
