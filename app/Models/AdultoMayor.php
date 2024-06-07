<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdultoMayor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adulto_mayors';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres', 'apellido_paterno','situacion', 'apellido_materno', 'genero', 'ci','complemento', 'extension', 'fecha_nacimiento', 'nro_referencia', 'estado_civil', 'estado', 'grado_instruccion', 'ocupacion', 'domicilio', 'distrito', 'zona', 'calle', 'nro', 'otro_municipio', 'area'];


}
