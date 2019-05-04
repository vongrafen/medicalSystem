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
                $table->dateTime('date_schedule');
                $table->dateTime('date_held');
                $table->text('description'); 
                $table->timestamps();
                $table->softDeletes();
                /* Chave estrangeira de funcionarios*/
                $table->integer('id_funcionario')->unsigned();
                $table->foreign('id_funcionario')->references('id')->on('funcionarios');
                /* Chave estrangeira de pacientes*/
                $table->integer('id_patient')->unsigned();
                $table->foreign('id_patient')->references('id')->on('patients'); 
              /* Chave estrangeira de medico*/
                $table->integer('id_doctor')->unsigned();
                $table->foreign('id_doctor')->references('id')->on('doctors');
    





            $table->bigIncrements('id');
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
        Schema::dropIfExists('exams');
    }
}
