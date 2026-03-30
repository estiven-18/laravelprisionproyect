<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class VisitsReportExport implements FromCollection, WithHeadings, WithMapping, WithEvents, WithCustomStartCell, ShouldAutoSize
{
    /**
     * @param array{start_date: string|null, end_date: string|null, prisoner_id: int|null} $filters
     */
    public function __construct(
        private readonly Collection $visits,
        private readonly array $filters
    )
    {
    }

    public function startCell(): string
    {
        return 'A5';
    }

    public function collection(): Collection
    {
        return $this->visits;
    }

    public function headings(): array
    {
        return [
            'Date',
            'Start Time',
            'End Time',
            'Prisoner',
            'Visitor',
            'Guard',
        ];
    }

    public function map($visit): array
    {
        return [
            (string) $visit->date,
            (string) $visit->start_time,
            (string) $visit->end_time,
            (string) ($visit->prisoner?->name ?? '-'),
            (string) ($visit->visitor?->name ?? '-'),
            (string) ($visit->assignedGuard?->name ?? '-'),
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event): void {
                $sheet = $event->sheet->getDelegate();

                $sheet->mergeCells('A1:F1');
                $sheet->setCellValue('A1', 'Visits Report');
                $sheet->setCellValue('A2', 'From:');
                $sheet->setCellValue('B2', $this->filters['start_date'] ?? 'N/A');
                $sheet->setCellValue('A3', 'To:');
                $sheet->setCellValue('B3', $this->filters['end_date'] ?? 'N/A');

                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                $sheet->getStyle('A2:A3')->applyFromArray([
                    'font' => ['bold' => true],
                ]);

                $sheet->getStyle('A5:F5')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FFF3F4F6'],
                    ],
                ]);

                $lastRow = 5 + $this->visits->count();
                $sheet->getStyle("A5:F{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => 'FFD1D5DB'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
