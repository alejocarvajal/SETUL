<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Pregunta extends Model
{
    use SoftDeletes;
    protected $table = 'preguntas';
    protected $dates = ['delete_at'];
    protected $fillable = ['pregunta', 'docente', 'asignatura_id', 'dificultad'];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class)->orderBy('correcta', 'desc');
    }

    public function asignatura()
    {
        return $this->hasOne(Asignatura::class);
    }

    public static function createPregunta($data)
    {
        DB::transaction(function () use ($data) {
            $pregunta = Pregunta::create([
                'pregunta' => $data['pregunta'],
                'docente' => $data['docente'],
                'asignatura_id' => $data['asignatura_id'],
                'dificultad' => $data['dificultad']
            ]);

            $pregunta->respuestas()->create([
                'respuesta' => $data['respuesta_correcta'],
                'correcta' => 1,
            ]);
            $pregunta->respuestas()->create([
                'respuesta' => $data['respuesta_1'],
                'correcta' => 0,
            ]);
            $pregunta->respuestas()->create([
                'respuesta' => $data['respuesta_2'],
                'correcta' => 0,
            ]);
            $pregunta->respuestas()->create([
                'respuesta' => $data['respuesta_3'],
                'correcta' => 0,
            ]);
        });
    }
    public static function createPreguntaImport($data)
    {

        $asignatura = DB::table('asignaturas')->where('nombre', $data['materia'] )->first();
        if($asignatura){
            $data['asignatura_id']=$asignatura->id;
            DB::transaction(function () use ($data) {
                $complejidad="";
                switch($data['complejidad']){
                    case 'Alta':
                        $complejidad=3;
                        break;
                    case 'Media':
                        $complejidad=2;
                        break;
                    case 'Baja':
                        $complejidad=1;
                        break;
                    default:
                        $complejidad=1;
                }
                $pregunta = Pregunta::create([
                    'pregunta' => $data['pregunta'],
                    'docente' => $data['docente'],
                    'asignatura_id' => $data['asignatura_id'],
                    'dificultad' => $complejidad
                ]);

                $pregunta->respuestas()->create([
                    'respuesta' => $data['respuesta_correcta'],
                    'correcta' => 1,
                ]);
                $pregunta->respuestas()->create([
                    'respuesta' => $data['respuesta_incorrecta1'],
                    'correcta' => 0,
                ]);
                $pregunta->respuestas()->create([
                    'respuesta' => $data['respuesta_incorrecta2'],
                    'correcta' => 0,
                ]);
                $pregunta->respuestas()->create([
                    'respuesta' => $data['respuesta_incorrecta3'],
                    'correcta' => 0,
                ]);
            });
        }
    }
}
