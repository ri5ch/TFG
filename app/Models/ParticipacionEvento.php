<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipacionEvento extends Model
{
    use HasFactory;

    protected $table = 'ParticipacionEventos';

    protected $primaryKey = 'IDParticipacion';
    public $timestamps = false;

    protected $fillable = [
        'IDUsuario',
        'IDEvento',
        'Fecha',
    ];

    /**
     * Define the relationship between ParticipacionEvento and User (participant).
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'IDUsuario');
    }

    /**
     * Define the relationship between ParticipacionEvento and Evento (event participated in).
     */
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'IDEvento');
    }
}
