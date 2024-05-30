<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'Eventos';

    protected $primaryKey = 'IDEvento';
    public $timestamps = false;

    protected $fillable = [
        'IDUsuarioOrganizador',
        'IDTipoEvento',
        'Nombre',
        'Fecha',
        'Ubicacion',
        'Imagen',
        'Descripcion',
        'HoraInicio',
        'HoraFin',
    ];

    /**
     * Define the relationship between Evento and User (organizer).
     */
    public function organizador()
    {
        return $this->belongsTo(User::class, 'IDUsuarioOrganizador');
    }

    /**
     * Define the relationship between Evento and TipoEvento (type of event).
     */
    public function tipoEvento()
    {
        return $this->belongsTo(TipoEvento::class, 'IDTipoEvento');
    }

    /**
     * Define the relationship between Evento and ParticipacionEvento (participants).
     */
    public function participantes()
    {
        return $this->hasMany(ParticipacionEvento::class, 'IDEvento');
    }
}
