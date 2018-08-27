<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use App\Parser\MbtiEppsLsParser;

class SchoolMbtiEppsLssController extends Controller
{
    public function index(Request $request)
    {
        $take = $request->has('take') && is_numeric($request->take) ? $request->take : 12;

        $schools = School::paginate($take);

        return view('school-mels.index', compact('schools'));
    }

    public function show(Request $request, School $school)
    {
        $take = $request->has('take') && is_numeric($request->take) ? $request->take : 12;

        $mbtiEppsLss = $school->mbtiEppsLss()->paginate($take);

        return view('school-mels.show', compact('school', 'mbtiEppsLss'));
    }

    public function import(Request $request, School $school)
    {
        $request->validate(['file' => 'required|file']);

        if ($school->mbti_epps_lss_count > 0) {
            $school->mbtiEppsLss()->delete();
        }

        $attributes = (new MbtiEppsLsParser($request->file))->parse()->toArray();

        if ($school->importTest('mbtiEppsLss', $attributes)) {
            return redirect()->back()->with('flash', 'Data Berhasil diimport');
        }

        return redirect()->back()->with('error', 'Gagal mengimport data');
    }
}
