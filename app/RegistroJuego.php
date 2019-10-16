<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class RegistroJuego extends Model
{
    use SoftDeletes;
    protected $table = 'registro_juego';
    protected $dates = ['delete_at'];
    protected $fillable = [
        'participante_id', 'pregunta_id', 'orden'
    ];

    public static function contadorRespuestas($participante_id)
    {
        //$resultado=consultar_datos_db($conexion,"correcta","respuestas b, registro_juego a","a.estado=1 and a.respuesta_id=b.id and a.participante_id=".$_REQUEST['id']);
        $correctas = 0;

        $respuestas = DB::table('registro_juego')
            ->join('respuestas', 'respuestas.id', '=', 'registro_juego.respuesta_id')
            ->select('respuestas.correcta')
            ->where([
                ['registro_juego.estado','=',1],
                ['registro_juego.participante_id','=',$participante_id]
                ])
            ->get();
        foreach($respuestas as $respuesta){
            if($respuesta->correcta == 1){
                $correctas++;
            }
        }

        return $correctas;
    }
}
