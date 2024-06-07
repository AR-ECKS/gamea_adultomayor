<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateAdultoMayorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adulto_mayors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombres')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('genero')->nullable();
            $table->integer('ci')->nullable();
            $table->string('complemento')->nullable();
            $table->string('extension',10)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('nro_referencia', 8)->nullable();
            $table->enum('estado_civil', ['Soltero', 'Casado', 'Viudo', 'Divorciado', 'Unión Libre', 'Separado']);
            $table->enum('grado_instruccion', ['Ninguno', 'Primaria Completa', 'Secundaria Completa', 'Bachiller', 'Técnico Superior', 'Licenciatura', 'Maestría', 'Doctorado', 'Post-Doctorado'])->nullable();
            $table->string('ocupacion')->nullable();
            $table->enum('domicilio', ['Propio', 'Alquilado', 'Anticredito', 'Cedido', 'Familiar', 'Arrendado', 'Compartido', 'Prestado', 'Otros'])->nullable();
            $table->string('distrito')->nullable();
            $table->string('zona')->nullable();
            $table->string('calle')->nullable();
            $table->integer('nro')->nullable();
            $table->string('otro_municipio')->nullable();
            $table->enum('area', ['Rural', 'Urbana'])->nullable();
            $table->string('situacion',1000)->nullable();
            $table->enum('cantidad_hijos', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'])->nullable();
            $table->tinyInteger('estado')->default('1');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('adulto_mayors');
    }
}
