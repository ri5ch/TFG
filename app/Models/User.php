<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function eventosOrganizados()
    {
        return $this->hasMany(Evento::class, 'IDUsuarioOrganizador');
    }

    /**
     * Define the relationship between User and ParticipacionEvento (participated events).
     */
    public function participaciones()
    {
        return $this->hasMany(ParticipacionEvento::class, 'IDUsuario');
    }

    /**
     * Define the relationship between User and LogroUsuario (user's achievements).
     */
    public function logros()
    {
        return $this->hasMany(LogroUsuario::class, 'IDUsuario');
    }

    public function isAdmin()
    {
        return $this->rol === 'admin';
    }
}
