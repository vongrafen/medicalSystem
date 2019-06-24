<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipaments', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name', 45)->nullable(); 
            $table->string('model', 45)->nullable(); 
            $table->string('serialnumber', 50)->unique();
            $table->boolean('active');
            $table->text('description')->nullable(); 
            // Chave estrangeira de Exames
            $table->integer('examtype_id')->unsigned()->nullable();
            $table->foreign('examtype_id')->references('id')->on('examtypes');
            // Chave estrangeira de Exames
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
        Schema::dropIfExists('equipaments');
    }
}
