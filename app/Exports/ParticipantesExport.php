<?php

namespace App\Exports;

use App\Participante;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParticipantesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Participante::findExport();
    }
    public function headings(): array
    {
        return [
            'nombres',
            'identificacion',
            'universidad',
            'opcion1',
            'opcion2',
            'test_id',
        ];
    }
}
