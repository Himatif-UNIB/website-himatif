<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportFormAnswers implements FromView, ShouldAutoSize, WithEvents
{
    private $fields;
    private $answers;

    public function __construct($fields, $answers)
    {
        $this->fields = $fields;
        $this->answers = $answers;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }

    public function view(): View
    {
        return view('private.forms.export', [
            'fields' => $this->fields,
            'answers' => $this->answers
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:K1')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFFFFF00');

                $event->sheet->getStyle('A1:K1')->getFont()->setBold(true);
            }
        ];
    }
}
