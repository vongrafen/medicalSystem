<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Equipamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('Nome', 45);
            $table->string('Modelo', 45);
            $table->string('Serialnumber', 50);
            $table->string('Status', 2);
            $table->text('Descricao'); 
            $table->string('Tipo_servicos', 45); 
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
        Schema::drop('equipamentos');
    }
}
