<?php

namespace App\Http\Controllers;

use App\Participante;
use App\Configuracion;
use App\Test;
use App\Pregunta;
use App\RegistroJuego;
use Illuminate\Http\Request;

class juegoController extends Controller
{
    public function index()
    {
        $participantes = Participante::with('test')->paginate(10);
        return view('juego.index', ['participantes' => $participantes]);
    }
    public function reglas(Participante $participante)
    {
        $fondo_juego = Configuracion::where("nombre","=","fondo_juego")->first();
        return view('juego.reglas', compact('participante','fondo_juego'));
    }
    public function start(Participante $participante)
    {
        $fondo_juego = Configuracion::where("nombre","=","fondo_modo_juego")->first();
        $test = Test::find($participante->test_id);

        $asignaturas_id = $test->asignaturas->pluck('id');

        $preguntas_baja = Pregunta::obtenerCantidadPreguntasDificultad($asignaturas_id,1,$test->preguntas_baja);
        $preguntas_media = Pregunta::obtenerCantidadPreguntasDificultad($asignaturas_id,2,$test->preguntas_media);
        $preguntas_alta = Pregunta::obtenerCantidadPreguntasDificultad($asignaturas_id,3,$test->preguntas_alta);

        $merge = $preguntas_baja->merge($preguntas_media);
        $preguntas = $merge->merge($preguntas_alta);
        $i = 1;
        foreach ($preguntas as $pregunta) {
            $registro_juego = RegistroJuego::create([
                'participante_id' => $participante->id,
                'pregunta_id' => $pregunta->id,
                'orden' => $i
            ]);
            $i++;
        }

        return view('juego.start', compact('participante','fondo_juego','preguntas'));
    }
    public function preguntasJuego(Participante $participante){
        $fondo_juego = Configuracion::where("nombre","=","fondo_modo_juego")->first();
        $registro_juego = RegistroJuego::where('participante_id','=',$participante->id)
                        ->whereNull("respuesta_id")
                        ->where("estado","=","1")
                        ->orderBy('orden','asc')->get();
        $pregunta = Pregunta::find($registro_juego[0]->pregunta_id);
        
        $respuestas = Pregunta::find($registro_juego[0]->pregunta_id)->respuestas()->get();
        
        return view('juego.preguntas', compact('fondo_juego','registro_juego','pregunta','respuestas'));
    }
    public function reiniciarJuego(Participante $participante){
        
        $campos_registro_juego = ([
            'estado' => 0
        ]);
        RegistroJuego::where('participante_id',$participante->id)->update($campos_registro_juego);
        return response()->json(['success'=>'Reinicio']);
    }
}
