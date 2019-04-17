<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoExames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_exames', function(Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('Nome', 45);
            $table->text('Descricao');
            $table->float('Valor');
            $table->string('Classe', 45);
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
            Schema::drop('tipo_exames');
        }
    

}
