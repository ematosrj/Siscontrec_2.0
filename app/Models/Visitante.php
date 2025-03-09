<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'documento', 
        'data_hora_entrada', 
        'data_hora_saida', 
        'usuario_id', 
        'opm_id', 
        'quem_veio_visitar',
        'veiculo_tipo', 
        'veiculo_marca', 
        'veiculo_modelo', 
        'veiculo_placa'
    ];

    // Relacionamento com o usuário (quem registrou a visita)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relacionamento com a unidade (opm_id)
    public function opm()
    {
        return $this->belongsTo(User::class, 'opm_id');
    }

    // Obter o nome da unidade (se associada ao usuário)
    public function opmname()
    {
        return $this->opm ? $this->opm->unit : 'N/A';
    }
}
