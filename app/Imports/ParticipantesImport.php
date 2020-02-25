<?php

namespace App\Imports;

use App\Participante;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantesImport implements OnEachRow, WithHeadingRow
{
    /*public function model(array $row)
    {
        return new Participante([
            'nombres' => $row['nombres'],
            'identificacion' => $row['identificacion'],
            'universidad' => $row['universidad'],
            'opc1' => $row['opcion1'],
            'opc2' => $row['opcion2'],
            'test_id' => $row['test_id'],
        ]);
    }*/

    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();
        if($rowIndex!=1){
            Participante::createParticipanteImport($row);
        }
    }

}
