<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hijoadultomayor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hijoadultomayors';

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
    protected $fillable = ['nombre_completo','parentesco','telefono'];

    public function adultomayor()
    {
        return $this->belongsTo(AdultoMayor::class, 'adultomayor_id');
    }

}
