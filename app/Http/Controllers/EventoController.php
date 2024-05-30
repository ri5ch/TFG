<?php

namespace App\Http\Controllers;


use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventoController extends Controller
{

    public function index(){
        $eventos=Evento::all();
        return view('eventos',compact('eventos'));
    }
    public function inicioAdmin(){
        $eventos=Evento::all();
        return view('panelAdmin',compact('eventos'));
    }
    public function create(){
        $tipoEvento=TipoEvento::all();
        return view('crearEvento',compact('tipoEvento'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'IDTipoEvento' => 'required',
            'Nombre' => 'required|string|max:255',
            'Fecha' => 'required|date',
            'Ubicacion' => 'required|string|max:255',
            'Imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Descripcion' => 'required|string',
            'HoraInicio' => 'required|date_format:H:i',
            'HoraFin' => 'required|date_format:H:i',
        ]);
    
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para crear un evento');
        }
    
        $evento = new Evento;
        $evento->IDUsuarioOrganizador = auth()->user()->id;
        $evento->IDTipoEvento = $request->IDTipoEvento;
        $evento->Nombre = $request->Nombre;
        $evento->Fecha = $request->Fecha;
        $evento->Ubicacion = $request->Ubicacion;
        $evento->Descripcion = $request->Descripcion;
        $evento->HoraInicio = $request->HoraInicio;
        $evento->HoraFin = $request->HoraFin;

        if ($request->hasFile('Imagen')) {
            $imagen = $request->file('Imagen');
            $nombre_imagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta_imagen = $imagen->storeAs('public/imagenes', $nombre_imagen);
            $evento->Imagen = $nombre_imagen;
        }
    
        $evento->save();
    
        return redirect()->route('eventos')->with('success', 'Evento creado exitosamente');
    }
    

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        $tipoEvento = TipoEvento::all();
        return view('editarEvento', compact('evento', 'tipoEvento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'IDTipoEvento' => 'required',
            'Nombre' => 'required|string|max:255',
            'Fecha' => 'required|date',
            'Ubicacion' => 'required|string|max:255',
            'Imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'Descripcion' => 'required|string',
        ]);

        $evento = Evento::findOrFail($id);
        $evento->IDTipoEvento = $request->IDTipoEvento;
        $evento->Nombre = $request->Nombre;
        $evento->Fecha = $request->Fecha;
        $evento->Ubicacion = $request->Ubicacion;
        $evento->Descripcion = $request->Descripcion;

        if ($request->hasFile('Imagen')) {
            $imagen = $request->file('Imagen');
            $nombre_imagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta_imagen = $imagen->storeAs('public/imagenes', $nombre_imagen);
            $evento->Imagen = $nombre_imagen;
        }

        $evento->save();

        return redirect()->route('panelAdmin')->with('success', 'Evento actualizado exitosamente');
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return redirect()->route('panelAdmin')->with('success', 'Evento eliminado exitosamente');
    }

}
