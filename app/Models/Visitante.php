<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $fillable = [
        'nome', 'documento', 'data_hora_entrada', 'data_hora_saida', 
        'usuario_registrou_id', 'opm_visitada_id', 'quem_visitar', 
        'veiculo_tipo', 'veiculo_marca', 'veiculo_modelo', 'placa'
    ];

    // Relacionamento com o usuário que registrou o visitante
    public function usuarioRegistrou()
    {
        return $this->belongsTo(User::class, 'usuario_registrou_id', 'id');
    }
}

