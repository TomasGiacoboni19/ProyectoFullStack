<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direccion';
    protected $primaryKey = 'cliente_id';
    public $timestamps = false;

    protected $fillable = ["calle", "numero", "localizacion"];

    public function localizacion(): BelongsTo {
        return $this->belongsTo(Localizacion::class);
    }


}
