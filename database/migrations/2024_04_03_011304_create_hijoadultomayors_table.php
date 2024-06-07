<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateHijoadultomayorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hijoadultomayors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('parentesco',100)->nullable();
            $table->string('nombre_completo',200)->nullable();
            $table->string('telefono',20)->nullable();
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
        Schema::drop('hijoadultomayors');
    }
}
