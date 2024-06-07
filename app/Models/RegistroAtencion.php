<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroAtencion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'registro_atencions';

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
    protected $fillable = ['fecha', 'tipologia', 'nro_caso', 'adultomayor_id', 'descripcion', 'peticion', 'nombres_denunciado', 'acciones'];

    public function adultomayor()
    {
        return $this->belongsTo(AdultoMayor::class, 'adultomayor_id');
    }
}
