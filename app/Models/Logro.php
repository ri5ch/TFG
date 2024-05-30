<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    use HasFactory;

    protected $table = 'Logros';

    protected $primaryKey = 'IDLogro';

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Puntos',
        'Imagen',
    ];

    /**
     * Define the relationship between Logro and LogroUsuario (users who have achieved this logro).
     */
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'LogrosUsuarios', 'IDLogro', 'IDUsuario')
                    ->withPivot('Fecha')
                    ->withTimestamps();
    }
}
