<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_casos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha')->nullable();
            $table->string('tipologia')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('nombre_completo')->nullable();
            $table->string('celular')->nullable();
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
        Schema::drop('seguimiento_casos');
    }
}
