<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgendaExames extends Migration
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
            /* Chave estrangeira de equipamentos*/
            $table->integer('id_equipamento')->unsigned();
            $table->foreign('id_equipamento')->references('id')->on('equipamentos');
            /* Chave estrangeira de Tipo_exames*/
            $table->integer('id_Tipo_exame')->unsigned();
            $table->foreign('id_Tipo_exame')->references('id')->on('Tipo_exames');
            /* Chave estrangeira de convenios*/
            $table->integer('id_convenio')->unsigned();
            $table->foreign('id_convenio')->references('id')->on('convenios');
            /* Chave estrangeira de agenda_exames*/
            $table->integer('id_agenda_exame')->unsigned();
            $table->foreign('id_agenda_exame')->references('id')->on('agenda_exames');

        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agenda_exames');
    }
}
