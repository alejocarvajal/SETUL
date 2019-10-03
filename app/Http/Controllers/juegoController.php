<?php

namespace App\Http\Controllers;

use App\Participante;
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
        return view('juego.reglas', ['participante' => $participante]);
    }
    public function start(Participante $participante)
    {
        return view('juego.start', ['participante' => $participante]);
    }
}
