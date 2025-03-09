<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('documento');
            $table->datetime('data_hora_entrada');
            $table->datetime('data_hora_saida')->nullable();
            $table->foreignId('usuario_registrou_id')->constrained('users'); // Supondo que seja um relacionamento com a tabela users
            $table->foreignId('opm_visitada_id')->constrained('opms'); // Assumindo que você tenha uma tabela opms
            $table->string('quem_visitar');
            $table->string('veiculo_marca')->nullable();
            $table->string('veiculo_modelo')->nullable();
            $table->string('veiculo_tipo')->nullable();
            $table->string('placa')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitantes');
    }
};
