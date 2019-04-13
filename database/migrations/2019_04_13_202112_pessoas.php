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
            $table->increments('id');
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
			$table->String('Observacao');
			
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
        Schema::dropIfExists('pessoas');
    }
}
