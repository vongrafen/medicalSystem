<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Medicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('CRM', 15);
            /* Chave estrangeira de pessoas*/
        $table->integer('id_pessoa')->unsigned();
        $table->foreign('id_pessoa')->references('id')->on('pessoas');
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
        Schema::drop('medicos');
    }
}
