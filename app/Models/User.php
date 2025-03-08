<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'documento', 'rank', 'name', 'unit', 'email', 'nivel_usuario', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 // Funções para checar cargos
 public function isAdmin()
 {
     return $this->role === 'Administrador';
 }

 public function isSuperUser()
 {
     return $this->role === 'Super-Usuario';
 }

 public function isOperator()
 {
     return $this->role === 'Operador';
 }
    /**
     * Relacionamento com visitantes registrados.
     */
    public function visitantes()
    {
        return $this->hasMany(Visitante::class, 'usuario_id');
    }

    /**
     * Relacionamento com a OPM visitada (auto-relacionamento para a tabela users).
     */
    public function opmVisitada()
    {
        return $this->hasMany(Visitante::class, 'opm_id');
    }
}
