<?php

namespace App\Http\Controllers;

use PDF;
use App\School;
use Illuminate\Http\Request;

class SchoolEppssController extends Controller
{
    public function showDownloadList(Request $request, School $school)
    {
        if ($school->mbti_epps_lss_count <= 0) {
            return redirect()->back()->with('error', 'Tidak ada data EPPS');
        }

        $downloadable = collect(range(1, $school->mbti_epps_lss_count));
        $downloadableCount = 25;

        return view('school-epps.download-list', compact('school', 'downloadable', 'downloadableCount'));
    }

    public function download(Request $request, School $school)
    {
        $mbtiEppsLss = $school->mbtiEppsLss();
        $downloadableCount = 25;

        if ($request->has('offset')) {
            $start = $request->offset + 1;
            $end = $request->offset + $downloadableCount;
            $fileName = "Laporan EPPS {$school->name} Nomor Urut {$start} - {$end}";
            $mbtiEppsLss = $mbtiEppsLss->offset($request->offset)->limit($downloadableCount)->get();
        } else {
            $fileName = "Laporan EPPS {$school->name}";
            $mbtiEppsLss = $mbtiEppsLss->get();
        }

        $pdf = PDF::loadView('pdfs.epps-report', compact('school', 'mbtiEppsLss'));

        return $pdf->stream("{$fileName}.pdf");
    }
}
