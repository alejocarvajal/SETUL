<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participante;
use App\Test;
use App\Exports\ParticipantesExport;
use App\Imports\ParticipantesImport;
use Maatwebsite\Excel\Facades\Excel;

//use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participantes = Participante::all();
        return view('participante.index', ['participantes' => $participantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tests = Test::orderBy('nombre', 'ASC')->get();
        return view('participante.create', compact('tests'));
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
            'nombres' => 'required',
            'identificacion' => 'required',
            'universidad' => 'required',
            'opc1' => 'required',
            'opc2' => 'required',
            'test_id' => 'required',
        ],
            [
                'nombres.required' => 'El campo nombre es obligatorio',
                'identificacion.required' => 'El campo identificacion es obligatorio',
                'universidad.required' => 'El campo universidad es obligatorio',
                'opc1.required' => 'La opcion 1 es obligatoria',
                'opc2.required' => 'La opcion 2 es obligatoria',
                'test_id.required' => 'El test es obligatorio'
            ]);
        $participante = Participante::create([
            'nombres' => $data['nombres'],
            'identificacion' => $data['identificacion'],
            'universidad' => $data['universidad'],
            'opc1' => $data['opc1'],
            'opc2' => $data['opc2'],
            'test_id' => $data['test_id'],
        ]);
        return redirect()->action('ParticipanteController@index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Participante $participante)
    {
        $tests = Test::orderBy('nombre', 'ASC')->get();
        return view('participante.edit', compact('participante','tests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participante $participante)
    {
        $data = request()->validate([
            'nombres' => 'required',
            'identificacion' => 'required',
            'universidad' => 'required',
            'opc1' => 'required',
            'opc2' => 'required',
            'test_id' => 'required',
        ],
            [
                'nombres.required' => 'El campo nombre es obligatorio',
                'identificacion.required' => 'El campo identificacion es obligatorio',
                'universidad.required' => 'El campo universidad es obligatorio',
                'opc1.required' => 'La opcion 1 es obligatoria',
                'opc2.required' => 'La opcion 2 es obligatoria',
                'test_id.required' => 'El test es obligatorio'
            ]);
        $campos_participante = ([
            'nombres' => $data['nombres'],
            'identificacion' => $data['identificacion'],
            'universidad' => $data['universidad'],
            'opc1' => $data['opc1'],
            'opc2' => $data['opc2'],
            'test_id' => $data['test_id'],
        ]);
        $participante->update($campos_participante);

        return redirect()->action('ParticipanteController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participante $participante)
    {
        $participante->delete();
        return redirect()->action('ParticipanteController@index');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ParticipantesExport, 'participantes.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ParticipantesImport,request()->file('file'));
           
        return redirect()->action('ParticipanteController@index');
    }
    public function importView()
    {
       return view('participante.importar');
    }
}
