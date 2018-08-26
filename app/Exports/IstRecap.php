<?php

namespace App\Exports;

use App\School;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IstRecap implements FromView, WithDrawings, ShouldAutoSize, WithEvents
{
    protected $school;

    public function __construct(School $school)
    {
        $this->school = $school;
    }

    public function view() : View
    {
        $school = $this->school;

        return view('excels.ist-recap', compact('school'));
    }

    public function drawings()
    {
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setCoordinates('A1');
        $drawing->setPath(public_path('/img/educare.png'));
        $drawing->setHeight(87);
        $drawing->setWidth(217);

        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $spreadsheet = $event->sheet->getDelegate();

                $headerSectionRowCount = 10;
                $dataAndSignatureIntervalRowCount = 8;
                $signatureSectionRowCount = 6;

                $lastDataRow = $this->school->ists_count + $headerSectionRowCount;
                $firstSignatureRow = $lastDataRow + $dataAndSignatureIntervalRowCount;
                $lastSignatureRow = $firstSignatureRow + $signatureSectionRowCount;

                $spreadsheet->getDefaultRowDimension()->setRowHeight(18);

                $titleStyle = [
                    'font' => [
                        'size' => 14,
                        'bold' => true
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
                ];

                $columnHeaderStyle = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FFFF0000'],
                    ],
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFFFF']
                    ]
                ];

                $cellStyle = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                ];

                $signatureStyle = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
                ];

                $spreadsheet->getStyle("A7:A8")->applyFromArray($titleStyle);
                $spreadsheet->getStyle("A10:F10")->applyFromArray($columnHeaderStyle);
                $spreadsheet->getStyle("A11:F{$lastDataRow}")->applyFromArray($cellStyle);
                $spreadsheet->getStyle("A{$firstSignatureRow}:F{$lastSignatureRow}")->applyFromArray($signatureStyle);

                $spreadsheet->getStyle("A10:A{$lastDataRow}")
                            ->getAlignment()
                            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $spreadsheet->getStyle("D10:F{$lastDataRow}")
                            ->getAlignment()
                            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}
