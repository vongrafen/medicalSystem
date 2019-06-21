<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            
            $table->increments('id')->unique();
            $table->dateTime('data_agendada');
            $table->dateTime('data_realizada');
            $table->text('description'); 
            // Chave estrangeira de funcionarios
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('peoples');
            // Chave estrangeira de funcionarios
            //Chave extrangeira pessoas - pacientes
            $table->integer('patients_id')->unsigned()->nullable();
            $table->foreign('patients_id')->references('id')->on('peoples');
            //Chave extrangeira pessoas - pacientes
            //Chave extrangeira pessoas - doutor executante
            $table->integer('doctor_performer_id')->unsigned();
            $table->foreign('doctor_performer_id')->references('id')->on('peoples');
            //Chave extrangeira pessoas - doutor executante
            // Chave estrangeira de agenda_exames
            $table->integer('id_schedules_exam')->unsigned();
            $table->foreign('id_schedules_exam')->references('id')->on('schedules');    
            // Chave estrangeira de agenda_exames
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
