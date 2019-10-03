<?php

namespace App\Imports;

use App\Participante;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Participante([
            'nombres' => $row['nombres'],
            'identificacion' => $row['identificacion'],
            'universidad' => $row['universidad'],
            'opc1' => $row['opcion1'],
            'opc2' => $row['opcion2'],
            'test_id' => $row['test_id'],
        ]);
    }
    
}
