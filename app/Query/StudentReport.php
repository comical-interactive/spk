<?php

namespace App\Query;

use App\School;
use App\Student;

class StudentReport
{
    protected $school;

    public function __construct(School $school)
    {
        $this->school = $school;
    }

    public function get()
    {
        return $this->students()->map(function ($student) {
            return new Student(
                $student->test_taker_name,
                $student->test_taker_number,
                $student->test_taker_sex,
                $student->test_taker_age
            );
        });
    }

    protected function students()
    {
        return $this->school->ists;
    }
}
