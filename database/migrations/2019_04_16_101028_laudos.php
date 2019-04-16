<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Laudos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laudos', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->dateTime('Data');
            $table->text('Descricao'); 
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('laudos');
    }
}
