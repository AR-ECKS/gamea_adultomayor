<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'citacions';

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
    protected $fillable = ['numero_citacion', 'descripcion', 'registro_atencion_id', 'tipologia', 'citados', 'fecha'];

    /* ***************** RELACIONES **************** */
    public function registro_de_atencion(){
        return $this->belongsTo(RegistroAtencion::class, 'registro_atencion_id');
    }    
}
