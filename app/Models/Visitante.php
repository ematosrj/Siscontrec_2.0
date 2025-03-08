<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'documento', 'data_hora_entrada', 'data_hora_saida', 'usuario_id', 'opm_id', 'quem_veio_visitar',
        'veiculo_tipo', 'veiculo_marca', 'veiculo_modelo', 'veiculo_placa'
    ];

    // Relacionamentos
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function opm()
    {
        return $this->belongsTo(User::class, 'opm_id');
    }

    // Obter o nome da OPM
    public function opmNome()
    {
        return $this->opm ? $this->opm->unit : 'N/A';
    }
}
