<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEvento;

class TipoEventoController extends Controller
{
    public function index()
    {
        $tiposEventos = TipoEvento::all();
        return view('tiposeventos', ['tiposEventos' => $tiposEventos]);
    }
}
