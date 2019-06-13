<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->String('name', 45);
            $table->String('birthdate')->nullable();
            $table->String('genre', 1)->nullable();
            $table->String('cpf', 15)->unique();
            $table->String('rg', 10)->nullable();
            $table->String('address',200)->nullable();
            $table->String('number', 10)->nullable();
            $table->String('district', 45)->nullable();
            $table->String('complement', 45)->nullable();
            $table->String('cep', 15)->nullable();
            $table->String('telephone', 15)->nullable();
            $table->String('email', 80)->unique();
            $table->String('obs', 200)->nullable();
            /* Chave estrangeira de Especialidade*/
            $table->integer('profile')->unsigned()->nullable();
            $table->foreign('profile')->references('id')->on('profiles');
            $table->string('crm', 10)->nullable();
            $table->string('office', 200)->nullable();
            $table->string('sector', 200)->nullable();
            $table->string('city', 200)->nullable();

            //$table->string('specialty')->nullable();
            /* Chave estrangeira de Especialidade*/
            $table->integer('specialty_id')->unsigned()->nullable();
            $table->foreign('specialty_id')->references('id')->on('specialties');
    
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
        Schema::dropIfExists('peoples');
    }
}
