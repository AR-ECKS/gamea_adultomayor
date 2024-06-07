<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateRegistroAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_atencions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha')->nullable();
            $table->string('tipologia')->nullable();
            $table->string('nro_caso')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('peticion')->nullable();
            $table->string('nombres_denunciado')->nullable();
            $table->string('acciones')->nullable();
            $table->tinyInteger('estado')->default('1');
            $table->integer('adultomayor_id')->unsigned();
            $table->foreign('adultomayor_id')->references('id')->on('adulto_mayors');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('registro_atencions');
    }
}
