<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasoExtravio extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'caso_extravios';

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
    protected $fillable = ['descripcion', 'fecha', 'otros', 'ruta_imagen', 'adultomayor_id'];

    /* ***************** RELACIONES **************** */
    public function adulto_mayor(){
        return $this->belongsTo(AdultoMayor::class, 'adultomayor_id');
    }
}
