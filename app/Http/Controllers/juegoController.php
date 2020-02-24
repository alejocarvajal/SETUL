<?php

namespace App\Http\Controllers;

use App\Participante;
use App\Configuracion;
use App\Test;
use App\Pregunta;
use App\Respuesta;
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
                        ->where("estado","=","0")
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
    public function verificarRespuesta(Request $request){
        $esCorrecta = Pregunta::respuestaCorrecta($request->idpregunta,$request->tipo);
        $response["correcta"] = $esCorrecta;
        $response["jugador"]=$request->id;

        //Registra la respuesta
        $campos_registro_juego = ([
            'respuesta_id' => $request->tipo,
            'estado' => 1,
        ]);
        RegistroJuego::where('participante_id',$request->id)
                    ->where('pregunta_id','=',$request->idpregunta)
                    ->update($campos_registro_juego);

        //Valida si la respuesta es correcta
        if($esCorrecta){
            $response["correcta"] = $esCorrecta;
            $response["puntaje"]='<img width="25px" height="25px" src="imagenes/check.png">';
            $response["consecutivo"]=$request->consecutivo +1;
	        $response["etiqueta_consecutivo"]="puntaje_".$request->consecutivo;
            $registro_juego = RegistroJuego::where('participante_id','=',$request->id)
                        ->whereNull("respuesta_id")
                        ->where("estado","=","0")
                        ->orderBy('orden','asc')->get();
            if($registro_juego->isEmpty()){
                $response["pregunta"]='';
                $response["idpregunta"]='';
                $response["r1"]='';
                $response["r2"]='';
                $response["r3"]='';
                $response["r4"]='';
                $response["jugador"]=$request->id;
                $response["continuar"]=true;
                $response["fin"]=true;
            }else{
                $pregunta = Pregunta::find($registro_juego[0]->pregunta_id);
                $respuestas = Pregunta::find($registro_juego[0]->pregunta_id)->respuestas()->get();

                $response["pregunta"]=$pregunta->pregunta;
                $response["idpregunta"]=$pregunta->id;
                $response["r1"]="A) ".$respuestas[0]->respuesta;
                $response["r2"]="B) ".$respuestas[1]->respuesta;
                $response["r3"]="C) ".$respuestas[2]->respuesta;
                $response["r4"]="D) ".$respuestas[3]->respuesta;
                $response["idr1"]=$respuestas[0]->id;
                $response["idr2"]=$respuestas[1]->id;
                $response["idr3"]=$respuestas[2]->id;
                $response["idr4"]=$respuestas[3]->id;
                $response["fin"]=false;

                $response["continuar"]=true;
                $response["porcentaje_barra"]=round((($response["consecutivo"] -1)/$request->cantidad)*100);
            }
        }else{
            $response["puntaje"]='<img width="25px" height="25px" src="imagenes/error.png">';
            $response["pregunta"]='';
            $response["idpregunta"]='';
            $response["r1"]='';
            $response["r2"]='';
            $response["r3"]='';
            $response["r4"]='';
            $response["porcentaje_barra"]=0;
        }
        return response()->json($response);
    }
    public function ayudarRespuesta(Request $request){
        $respuestas = Respuesta::where('pregunta_id',$request->idpregunta)
        ->where("correcta","=",0)
        ->inRandomOrder()
        ->limit(2)
        ->get();
        $response["r1"]=$respuestas[0]->id;
        $response["r2"]=$respuestas[1]->id;
        return response()->json($response);
    }
    public function resumen(Participante $participante){

        $fondo_juego = Configuracion::where("nombre","=","fondo_modo_juego")->first();
        $test = $participante->test()->get();
        $respuestas = RegistroJuego::contadorRespuestas($participante->id);

        $datos_jugador['nombres'] = ucwords(strtolower($participante->nombres));
        $datos_jugador['preguntas_total'] = $test[0]->preguntas_total;
        $datos_jugador['correctas'] = $respuestas;

       $registro=RegistroJuego::where('participante_id','=',$participante->id);

       $registro->update((['estado' => 0]));
       $registro->delete();

       $participante->update((['estado' => 0]));
       $participante->delete();

        return view('juego.resumen', compact('fondo_juego','datos_jugador'));
    }
}
