<?php

namespace App\Http\Controllers;

use PDF;
use App\School;
use App\Parser\IstParser;
use App\Exports\IstRecap;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SchoolIstsController extends Controller
{
    public function index(Request $request)
    {
        $take = $request->has('take') && is_numeric($request->take) ? $request->take : 12;

        $schools = School::paginate($take);

        return view('school-ists.index', compact('schools'));
    }

    public function show(Request $request, School $school)
    {
        $take = $request->has('take') && is_numeric($request->take) ? $request->take : 12;

        $ists = $school->ists()->paginate($take);

        return view('school-ists.show', compact('school', 'ists'));
    }

    public function import(Request $request, School $school)
    {
        $request->validate(['file' => 'required|file']);

        if ($school->ists_count > 0) {
            $school->ists()->delete();
        }

        $attributes = (new IstParser($request->file))->parse()->toArray();

        if ($school->importTest('ists', $attributes)) {
            return redirect()->back()->with('flash', 'Data Berhasil diimport');
        }

        return redirect()->back()->with('error', 'Gagal mengimport data');
    }

    public function export(Request $request, School $school)
    {
        return Excel::download(new IstRecap($school), "Rekap IST {$school->name}.xls");
    }

    public function download(Request $request, School $school)
    {
        $pdf = PDF::loadView('pdfs.ist-report', compact('school'));

        return $pdf->download("Laporan IST {$school->name}.pdf");
    }
}
