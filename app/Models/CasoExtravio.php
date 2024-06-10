<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    /* attribute
     * url_imagen */
    public function getUrlImagenAttribute(): string {
        $vacio = !is_null($this->ruta_imagen) && trim($this->ruta_imagen) && Storage::disk('extravios')->exists($this->ruta_imagen);
        if($vacio){
            return Storage::disk('extravios')->url($this->ruta_imagen);
        } else {
            return "";
        }
    }
}
