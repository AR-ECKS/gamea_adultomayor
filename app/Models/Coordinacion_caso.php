<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coordinacion_caso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coordinacion_casos';

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
    protected $fillable = ['fecha', 'requerimiento','intervencion' ,'area_origen', 'area_destino', 'registroatencion_id'];

    
}
