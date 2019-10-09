<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;


class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuraciones = Configuracion::all();
        return view('config.index', ['configuraciones' => $configuraciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'valor' => 'required'
        ],
            [
                'nombre.required' => 'El campo nombre es obligatorio',
                'valor.required' => 'El valor es obligatoria'
            ]);
        Configuracion::create([
            'nombre' => $data['nombre'],
            'valor' => $data['valor']
        ]);
        return redirect()->action('ConfigController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Configuracion $configuracion
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuracion $configuracion)
    {
        return view('config.edit', ['configuracion' => $configuracion]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Configuracion $configuracion)
    {
        $data = request()->validate([
            'nombre' => 'required',
            'valor' => 'required'
        ],
            [
                'nombre.required' => 'El campo nombre es obligatorio',
                'valor.required' => 'El valor es obligatoria'
            ]);

        $configuracion->update($data);

        return redirect()->action('ConfigController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuracion $configuracion)
    {
        $configuracion->delete();
        return redirect()->action('ConfigController@index');
    }
}
