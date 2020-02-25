<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Participante extends Model
{
    use SoftDeletes;
    protected $table ='participantes';
    protected  $dates = ['delete_at'];
    protected $fillable = [
        'nombres', 'identificacion', 'universidad', 'opc1', 'opc2', 'estado', 'test_id'
    ];

    public function test(){
        return $this->BelongsTo(Test::class);
    }
    public static function findExport(){
        $participantes = DB::table('participantes')
                ->select('nombres','identificacion','universidad','opc1 as opcion1','opc2 as opcion2','test_id',)
                ->get();
        return $participantes;
    }
    public static function createParticipanteImport($data)
    {
        $test = DB::table('tests')->where('nombre', $data['test'] )->first();

        if($test){
            $data['test_id']=$test->id;
            DB::transaction(function () use ($data) {
                $participante = Participante::create([
                    'nombres' => $data['nombres'],
                    'identificacion' => $data['identificacion'],
                    'universidad' => $data['universidad'],
                    'opc1' => $data['opcion1'],
                    'opc2' => $data['opcion2'],
                    'test_id' => $data['test_id'],
                ]);
            });
        }
    }
}
