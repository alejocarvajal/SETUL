<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Pregunta;
use App\Respuesta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('pregunta.index', ['preguntas' => $preguntas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignatura::orderBy('nombre', 'ASC')->get();
        return view('pregunta.create', compact('asignaturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $data = request()->validate([
            'pregunta' => 'required',
            'docente' => 'nullable',
            'asignatura_id' => 'required',
            'respuesta_correcta' => 'required',
            'dificultad' => 'required',
            'respuesta_correcta' => 'required',
            'respuesta_1' => 'required',
            'respuesta_2' => 'required',
            'respuesta_3' => 'required',
        ],
            [
                'pregunta.required' => 'El campo pregunta es obligatorio',
                'asignatura_id.required' => 'La asignatura es obligatoria',
                'respuesta_correcta.required' => 'La respuesta correcta es obligatoria',
                'dificultad.required' => 'La dificultad es obligatoria',
                'respuesta_1.required' => 'La respuesta es requerida',
                'respuesta_2.required' => 'La respuesta es requerida',
                'respuesta_3.required' => 'La respuesta es requerida',
            ]);
        Pregunta::createPregunta($data);
        return redirect()->action('PreguntaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Pregunta $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Pregunta $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        $asignaturas = Asignatura::orderBy('nombre', 'ASC')->get();
        $respuestas = $pregunta->respuestas()->get();

        return view('pregunta.edit', compact('pregunta', 'asignaturas', 'respuestas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Pregunta $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        $data = request()->validate([
            'pregunta' => 'required',
            'docente' => 'nullable',
            'asignatura_id' => 'required',
            'respuesta_correcta' => 'required',
            'dificultad' => 'required',
            'respuesta_correcta' => 'required',
            'respuesta_1' => 'required',
            'respuesta_2' => 'required',
            'respuesta_3' => 'required',
        ],
            [
                'pregunta.required' => 'El campo pregunta es obligatorio',
                'asignatura_id.required' => 'La asignatura es obligatoria',
                'respuesta_correcta.required' => 'La respuesta correcta es obligatoria',
                'dificultad.required' => 'La dificultad es obligatoria',
                'respuesta_1.required' => 'La respuesta es requerida',
                'respuesta_2.required' => 'La respuesta es requerida',
                'respuesta_3.required' => 'La respuesta es requerida',
            ]);
        $campos_pregunta = ([
            'pregunta' => $data['pregunta'],
            'docente' => $data['docente'],
            'asignatura_id' => $data['asignatura_id'],
            'dificultad' => $data['dificultad']
        ]);
        $pregunta->update($campos_pregunta);
        $respuestas = $pregunta->respuestas()->get();

        $respuesta_correcta = $respuestas[0];
        $respuesta_correcta->respuesta = $data['respuesta_correcta'];
        $respuesta_correcta->save();

        $respuesta_1 = $respuestas[1];
        $respuesta_1->respuesta = $data['respuesta_1'];
        $respuesta_1->save();
        $respuesta_2 = $respuestas[2];
        $respuesta_2->respuesta = $data['respuesta_2'];
        $respuesta_2->save();
        $respuesta_3 = $respuestas[3];
        $respuesta_3->respuesta = $data['respuesta_3'];
        $respuesta_3->save();

        return redirect()->action('PreguntaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Pregunta $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        //
    }
}
