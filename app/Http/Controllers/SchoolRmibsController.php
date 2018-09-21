<?php

namespace App\Http\Controllers;

use PDF;
use App\School;
use App\Parser\RmibParser;
use Illuminate\Http\Request;
use App\Parser\IstRecapParser;

class SchoolRmibsController extends Controller
{
    public function index(Request $request)
    {
        $take = $request->has('take') && is_numeric($request->take) ? $request->take : 12;

        $schools = School::paginate($take);

        return view('school-rmibs.index', compact('schools'));
    }

    public function show(Request $request, School $school)
    {
        $take = $request->has('take') && is_numeric($request->take) ? $request->take : 12;

        $rmibs = $school->rmibs()->paginate($take);

        return view('school-rmibs.show', compact('school', 'rmibs'));
    }

    public function import(Request $request, School $school)
    {
        $request->validate(['file' => 'required|file']);

        if ($school->rmibs_count > 0) {
            $school->rmibs()->delete();
        }

        $attributes = (new RmibParser($request->file))->parse()->toArray();

        if ($school->importTest('rmibs', $attributes)) {
            return redirect()->back()->with('flash', 'Data Berhasil diimport');
        }

        return redirect()->back()->with('error', 'Gagal mengimport data');
    }

    public function importIstRecap(Request $request, School $school)
    {
        $request->validate(['file' => 'required|file']);

        if ($school->rmibs_count <= 0) {
            return redirect()->back()->with('error', 'Tidak ada data rmib');
        }

        $school->importIstRecap((new IstRecapParser($request->file, $dataRowStart = 11))->parse());

        return redirect()->back()->with('flash', 'Data Berhasil diimport');
    }

    public function download(Request $request, School $school)
    {
        $pdf = PDF::loadView('pdfs.rmib-report', compact('school'));

        return $pdf->download("Laporan RMIB {$school->name}.pdf");
    }
}
