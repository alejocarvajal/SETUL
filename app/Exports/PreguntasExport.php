<?php

namespace App\Exports;

use App\Preguntas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PreguntasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Preguntas::all();
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
