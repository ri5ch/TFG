<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    use HasFactory;

    protected $table = 'TipoEvento';

    protected $primaryKey = 'IDTipoEvento';

    protected $fillable = [
        'Nombre',
    ];

    /**
     * Define the relationship between TipoEvento and Evento (events of this type).
     */
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'IDTipoEvento');
    }
}
