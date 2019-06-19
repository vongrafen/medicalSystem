<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->timestamps();
            //$table->integer('doctor_id');
            //$table->foreign('doctor_id')->references('id')->on('doctors');
            
            //fullcalendar
            $table->string('event_name');
            $table->date('start_date');
            $table->date('end_date');
            // Chave estrangeira de Pessoas - com CRM
            $table->integer('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('peoples');
            // Chave estrangeira de Pessoas - com CRM
            // Chave estrangeira de Pessoas - Pacientes
            $table->integer('patients_id')->unsigned()->nullable();
            $table->foreign('patients_id')->references('id')->on('peoples');
            // Chave estrangeira de Pessoas - Pacientes
            // Chave estrangeira de Pessoas - Equipamentos
            $table->integer('equipament_id')->unsigned()->nullable();
            $table->foreign('equipament_id')-> references('id')->on('equipaments');
            // Chave estrangeira de Pessoas - Equipamentos
            $table->integer('convenant_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
