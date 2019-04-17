<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cidades', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nome', 255);
            $table->string('uf', 2);
            $table->string('CEP', 10)->nullable();
            $table->string('pais', 255)->default('Brasil');
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
        Schema::drop('cidades');
    }
}
