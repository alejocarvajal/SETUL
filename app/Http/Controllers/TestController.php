<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Test;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class TestController extends Controller
{
    use Notifiable, SoftDeletes;
    protected $fillable = ['nombre', 'descripcion', 'preguntas_total', 'preguntas_baja', 'preguntas_media', 'preguntas_alta'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();

        $title = 'Listado de Tests';

        return view('test.index', compact('title', 'tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignatura::orderBy('nombre', 'ASC')->get();
        return view('test.create', compact('asignaturas'));
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'preguntas_total' => 'required',
            'preguntas_baja' => 'required',
            'preguntas_media' => 'required',
            'preguntas_alta' => 'required',
            'asignaturas' => 'required'
        ],
            [
                'nombre.required' => 'El campo nombre es obligatorio',
                'descripcion.required' => 'La descripcion es obligatoria',
                'preguntas_total.required' => 'Las preguntas totales son obligatorias',
                'preguntas_baja.required' => 'Las preguntas bajas son obligatorias',
                'preguntas_media.required' => 'Las preguntas medias son obligatorias',
                'preguntas_alta.required' => 'Las preguntas altas son obligatorias',
                'asignaturas.required' => 'Las asignaturas son obligatorias'
            ]);
        $data['fecha'] = now();
        $test=Test::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'fecha' => now(),
            'preguntas_total' => $data['preguntas_total'],
            'preguntas_baja' => $data['preguntas_baja'],
            'preguntas_media' => $data['preguntas_media'],
            'preguntas_alta' => $data['preguntas_alta'],
        ]);
        $test->asignaturas()->attach($data['asignaturas']);
        return redirect()->action('TestController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $asignaturas = Asignatura::orderBy('nombre', 'ASC')->get();
        //$asignaturas_check=$test->asignaturas()->get();
        return view('test.edit', compact('test','asignaturas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function update(Test $test)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'preguntas_total' => 'required',
            'preguntas_baja' => 'required',
            'preguntas_media' => 'required',
            'preguntas_alta' => 'required',
            'asignaturas' => 'required'
        ],
            [
                'nombre.required' => 'El campo nombre es obligatorio',
                'descripcion.required' => 'La descripcion es obligatoria',
                'preguntas_total.required' => 'Las preguntas totales son obligatorias',
                'preguntas_baja.required' => 'Las preguntas bajas son obligatorias',
                'preguntas_media.required' => 'Las preguntas medias son obligatorias',
                'preguntas_alta.required' => 'Las preguntas altas son obligatorias',
                'asignaturas.required' => 'Las asignaturas son obligatorias'
            ]);

        $test->update($data);
        $test->asignaturas()->sync($data['asignaturas']);

        return redirect()->action('TestController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
