<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_citacion')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('tipologia')->nullable();
            $table->string('citados')->nullable();
            $table->date('fecha')->nullable();
            $table->integer('registro_atencion_id')->unsigned();
            $table->foreign('registro_atencion_id')->references('id')->on('registro_atencions');
            $table->tinyInteger('estado')->default('1');
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
        Schema::drop('citacions');
    }
}
