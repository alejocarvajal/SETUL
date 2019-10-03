<?php

namespace App\Imports;

use App\Pregunta;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PreguntasImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();
        if($rowIndex!=1){
            Pregunta::createPreguntaImport($row);
        }
    }
}
