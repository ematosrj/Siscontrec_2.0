<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    protected $table = 'visitantes';

    protected $fillable = [
        'nome',
        'documento',
        'data_hora_entrada',
        'data_hora_saida',
        'usuario_registrou_id',
        'opm_visitada_id',
        'quem_visitar',
        'veiculo_marca',
        'veiculo_modelo',
        'veiculo_tipo',
        'placa',
    ];

    // Relacionamento com o usuário que registrou a visita
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_registrou_id');
    }

    // Relacionamento com a OPM visitada (supondo que haja um Model Opm)
    public function opmVisitada()
    {
        return $this->belongsTo(Opm::class, 'opm_visitada_id');
    }
}
