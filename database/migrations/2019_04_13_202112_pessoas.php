<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pessoas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('pessoas', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->String('Nome', 45);
            $table->date('Data_nascimento');
            $table->String('Genero', 1);
            $table->String('CPF', 11)->unique();
            $table->String('RG', 10)->nullable();
            $table->String('Endereco',200)->nullable();
            $table->String('Numero', 7)->nullable();
            $table->String('Bairro', 45)->nullable();
            $table->String('Complemento', 45)->nullable();
            $table->String('Telefone', 11);
            $table->String('Telefone_Secundario', 11)->nullable();
            $table->String('Email', 80)->unique();
            $table->String('Observacao', 200);
            $table->timestamps();
            $table->softDeletes();
            /* Chave estrangeira de cidades*/
            $table->integer('id_cidade')->unsigned();
            $table->foreign('id_cidade')->references('id')->on('cidades');
            /* Chave estrangeira de usuario*/
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');

            
        });
        }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
