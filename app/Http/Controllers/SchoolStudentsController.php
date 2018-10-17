<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use App\Query\StudentReport;

class SchoolStudentsController extends Controller
{
    public function index(Request $request)
    {
        $take = $request->has('take') && is_numeric($request->take) ? $request->take : 12;

        $schools = School::paginate($take);

        return view('school-students.index', compact('schools'));
    }

    public function show(Request $request, School $school)
    {
        return view('school-students.show', [
            'students' => (new StudentReport($school))->get(),
            'school' => $school
        ]);
    }

    public function download(Request $request, $student)
    {
        dd($student);
    }
}
