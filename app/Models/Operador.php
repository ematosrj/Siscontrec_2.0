<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    use HasFactory;

    // A tabela que o modelo irá utilizar é 'users'
    protected $table = 'users';

    // Campos que podem ser atribuídos em massa
    protected $fillable = [
        'rank',
        'name',
        'email',
        'access',
        'password',
        

    ];

    // Desabilitar a manutenção dos timestamps automáticos, se necessário
    public $timestamps = true;
}
