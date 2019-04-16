<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('usuarios', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->String('Login', '80');
            $table->String('Senha', '80');
            $table->String('Tipo_usuario','15');
            $table->Boolean('Status')->default(1);
            $table->String('permissao')->default('app.paciente');
            $table->String('avatar','45');
            $table->RememberToken();
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
        Schema::drop('usuarios');
    }
}
