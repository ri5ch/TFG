<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogroUsuario extends Model
{
    use HasFactory;

    protected $table = 'LogrosUsuarios';

    protected $primaryKey = 'IDLogroUsuario';
    public $timestamps = false;

    protected $fillable = [
        'IDUsuario',
        'IDLogro',
        'Fecha',
    ];

    /**
     * Define the relationship between LogroUsuario and User (user who achieved the logro).
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'IDUsuario');
    }

    /**
     * Define the relationship between LogroUsuario and Logro (achieved logro).
     */
    public function logro()
    {
        return $this->belongsTo(Logro::class, 'IDLogro');
    }
}
