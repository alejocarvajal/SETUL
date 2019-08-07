<?php

namespace App\Http\Controllers;

use App\Asignatura;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class AsignaturaController extends Controller
{
    use Notifiable, SoftDeletes;
    protected $fillable = ['nombre', 'descripcion'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::all();

        $title = 'Listado de Asignaturas';

        return view('asignatura.index', compact('title', 'asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignatura.create');
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
            'descripcion' => 'required'
        ],
            [
                'nombre.required' => 'El campo nombre es obligatorio',
                'descripcion.required' => 'La descripcion es obligatoria'
            ]);
        Asignatura::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion']
        ]);
        return redirect()->action('AsignaturaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        return view('asignatura.edit', ['asignatura' => $asignatura]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Asignatura $asignatura)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ],
            [
                'nombre.required' => 'El campo nombre es obligatorio',
                'descripcion.required' => 'La descripcion es obligatoria'
            ]);

        $asignatura->update($data);

        return redirect()->action('AsignaturaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return redirect()->action('AsignaturaController@index');
    }
}
