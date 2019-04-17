<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Convenios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('Nome', 45);
            $table->integer('Codigo-empresa');
            $table->float('Valor');
            $table->text('Observacoes');
            $table->integer('Desconto_aplicado');
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
        Schema::drop('convenios');
    }
}
