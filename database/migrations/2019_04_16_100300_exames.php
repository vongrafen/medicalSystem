<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Exames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exames', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->dateTime('Data_agendada');
            $table->dateTime('Data_realizada');
            $table->text('Descricao'); 
            $table->timestamps();
            $table->softDeletes();
            /* Chave estrangeira de funcionarios*/
            $table->integer('id_funcionario')->unsigned();
            $table->foreign('id_funcionario')->references('id')->on('funcionarios');
            /* Chave estrangeira de pacientes*/
            $table->integer('id_paciente')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes'); 
          /* Chave estrangeira de medico*/
            $table->integer('id_medico')->unsigned();
            $table->foreign('id_medico')->references('id')->on('medicos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exames');
    }
}
