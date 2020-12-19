<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class MembersExport implements FromCollection, ShouldAutoSize, WithEvents, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'NPM',
            'Angkatan'
        ];
    }

    public function map($reports): array
    {
        return [
            $reports->id,
            $reports->name,
            $reports->npm,
            $reports->force->name .' '. $reports->force->year
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:D1')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFFFFF00');

                $event->sheet->getStyle('A1:D1')->getFont()->setBold(true);
            }
        ];
    }
}
