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
            $table->String('cpf', 11)->unique();
            $table->String('rg', 10)->nullable();
            $table->String('address',200)->nullable();
            $table->String('number', 7)->nullable();
            $table->String('district', 45)->nullable();
            $table->String('complement', 45)->nullable();
            $table->String('telephone', 11)->nullable();
            $table->String('email', 80)->unique();
            $table->String('obs', 200)->nullable();
            $table->timestamps();
            $table->softDeletes();

            /* Chave estrangeira de cidades*/
            //$table->integer('city_id')->unsigned();
            //$table->foreign('city_id')->references('id')->on('cities');
            /* Chave estrangeira de usuario*/
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
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
