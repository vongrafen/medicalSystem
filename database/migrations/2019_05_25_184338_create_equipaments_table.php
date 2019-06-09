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
            $table->string('name', 45);
            $table->string('model', 45);
            $table->string('serialnumber', 50)->unique();
            $table->boolean('active')->default(true);
            $table->text('description'); 
            //$table->string('examtype', 45)->nullable(); 
            $table->timestamps();
            $table->softDeletes();


            $table->integer('examtype_id')->unsigned();
            $table->foreign('examtype_id')->references('id')->on('examtypes');
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
