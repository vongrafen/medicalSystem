<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prontuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prontuarios', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->text('Descricao');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('prontuarios');
    }
}
