<?php

namespace App\Http\Controllers;

use App\Models\LogroUsuario;
use App\Models\ParticipacionEvento;
use App\Models\Logro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipacionEventoController extends Controller
{
    public function participar(Request $request, $idEvento)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para participar en un evento');
        }

        $usuarioId = Auth::id();

        $participacionExistente = ParticipacionEvento::where('IDUsuario', $usuarioId)
            ->where('IDEvento', $idEvento)
            ->exists();

        if ($participacionExistente) {
            return redirect()->back()->with('error', 'Ya estás participando en este evento.');
        }

        $participacion = new ParticipacionEvento();
        $participacion->IDUsuario = $usuarioId;
        $participacion->IDEvento = $idEvento;
        $participacion->Fecha = now();
        $participacion->save();

        $participacionesTotales = ParticipacionEvento::where('IDUsuario', $usuarioId)->count();
        $this->otorgarLogros($usuarioId, $participacionesTotales);

        return redirect()->back()->with('success', 'Te has unido al evento correctamente.');
    }

    private function otorgarLogros($usuarioId, $participacionesTotales)
    {
        if ($participacionesTotales >= 1) {
            $this->otorgarLogro($usuarioId, 1); // Bronce Inicial
        }
        if ($participacionesTotales >= 5) {
            $this->otorgarLogro($usuarioId, 2); // Plata Frecuente
        }
        if ($participacionesTotales >= 10) {
            $this->otorgarLogro($usuarioId, 3); // Oro Asiduo
        }
        if ($participacionesTotales >= 20) {
            $this->otorgarLogro($usuarioId, 4); // Platino Devoto
        }
        if ($participacionesTotales >= 50) {
            $this->otorgarLogro($usuarioId, 5); // Diamante Incansable
        }
        if ($participacionesTotales >= 100) {
            $this->otorgarLogro($usuarioId, 6); // Maestro de Eventos
        }
        if ($participacionesTotales >= 200) {
            $this->otorgarLogro($usuarioId, 7); // Leyenda de la Participación
        }
        if ($participacionesTotales >= 500) {
            $this->otorgarLogro($usuarioId, 8); // Ícono de la Asistencia
        }
    }

    private function otorgarLogro($usuarioId, $logroId)
    {
        $logroUsuarioExistente = LogroUsuario::where('IDUsuario', $usuarioId)
            ->where('IDLogro', $logroId)
            ->exists();
    
        if (!$logroUsuarioExistente) {
            $logroUsuario = new LogroUsuario();
            $logroUsuario->IDUsuario = $usuarioId;
            $logroUsuario->IDLogro = $logroId;
            $logroUsuario->Fecha = now();
            $logroUsuario->save();
    
            $logro = Logro::find($logroId);
    
            // Construir la URL de la imagen del logro
            $imagenUrl = asset('storage/logros/' . $logro->Imagen);
    
            // Almacenar mensaje de logro en la sesión
            session()->flash('logro', [
                'nombre' => $logro->Nombre,
                'descripcion' => $logro->Descripcion,
                'puntos' => $logro->Puntos,
                'imagen' => $imagenUrl,
                'confeti' => true,
            ]);
        }
    }
    
}
