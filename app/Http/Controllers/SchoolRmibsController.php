<?php

namespace App\Http\Controllers;

use PDF;
use App\School;
use App\Parser\RmibParser;
use Illuminate\Http\Request;

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

    public function showDownloadList(Request $request, School $school)
    {
        if ($school->rmibs_count <= 0) {
            return redirect()->back()->with('error', 'Tidak ada data RMIB');
        }

        $downloadable = collect(range(1, $school->rmibs_count));
        $downloadableCount = 25;

        return view('school-rmibs.download-list', compact('school', 'downloadable', 'downloadableCount'));
    }

    public function download(Request $request, School $school)
    {
        $rmibs = $school->rmibs();
        $downloadableCount = 25;

        if ($request->has('offset')) {
            $start = $request->offset + 1;
            $end = $request->offset + $downloadableCount;
            $fileName = "Laporan RMIB {$school->name} Nomor Urut {$start} - {$end}";
            $rmibs = $rmibs->offset($request->offset)->limit($downloadableCount)->get();
        } else {
            $fileName = "Laporan RMIB {$school->name}";
            $rmibs = $rmibs->get();
        }

        $pdf = PDF::loadView('pdfs.rmib-report', compact('school', 'rmibs'));

        return $pdf->download("{$fileName}.pdf");
    }
}
