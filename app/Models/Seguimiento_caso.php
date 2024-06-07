<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento_caso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seguimiento_casos';

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
    protected $fillable = ['fecha', 'tipologia', 'descripcion', 'nombre_completo', 'celular', 'registroatencion_id'];

    
}
