<?php

namespace App\Http\Controllers;

use PDF;
use App\School;
use App\Exports\IstRecap;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Parser\IstParser;

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

    public function showDownloadList(Request $request, School $school)
    {
        if ($school->ists_count <= 0) {
            return redirect()->back()->with('error', 'Tidak ada data IST');
        }

        $downloadable = collect(range(1, $school->ists_count));
        $downloadableCount = 25;

        return view('school-ists.download-list', compact('school', 'downloadable', 'downloadableCount'));
    }

    public function download(Request $request, School $school)
    {
        $ists = $school->ists();
        $downloadableCount = 25;

        if ($request->has('offset')) {
            $start = $request->offset + 1;
            $end = $request->offset + $downloadableCount;
            $fileName = "Laporan IST {$school->name} Nomor Urut {$start} - {$end}";
            $ists = $ists->offset($request->offset)->limit($downloadableCount)->get();
        } else {
            $fileName = "Laporan IST {$school->name}";
            $ists = $ists->get();
        }

        $pdf = PDF::loadView('pdfs.ist-report', compact('school', 'ists'));

        return $pdf->download("{$fileName}.pdf");
    }
}
