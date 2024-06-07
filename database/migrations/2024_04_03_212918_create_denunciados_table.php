<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDenunciadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denunciados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_completo')->nullable();
            $table->integer('registroatencion_id')->unsigned();
            $table->foreign('registroatencion_id')->references('id')->on('registro_atencions');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('denunciados');
    }
}
