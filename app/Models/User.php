<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['registration_number', 'rank', 'name', 'email', 'access', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Função para verificar se o usuário é um Super-Usuário
    public function isSuperUser()
    {
        return $this->access === 'Super-Usuario';
    }

    // Função para verificar se o usuário é um Administrador
    public function isAdmin()
    {
        return $this->access === 'Administrador';
    }

    // Função para verificar se o usuário é um Operador
    public function isOperator()
    {
        return $this->access === 'Operador';
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
