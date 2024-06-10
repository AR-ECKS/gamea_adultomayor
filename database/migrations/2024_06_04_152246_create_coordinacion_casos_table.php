<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCoordinacionCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinacion_casos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha')->nullable();
            $table->string('intervencion')->nullable();
            $table->string('requerimiento')->nullable();
            $table->string('area_origen')->nullable();
            $table->string('area_destino')->nullable();
            $table->tinyInteger('estado')->default('1');
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
        Schema::drop('coordinacion_casos');
    }
}
