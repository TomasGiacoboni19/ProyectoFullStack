<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direccion';
    protected $primaryKey = 'id_direccion';
    public $timestamps = false;

    protected $fillable = ["nombre", "numero", "localizacion_id", "cliente_id"];

    public function localizacion()
    {
        return $this->belongsTo(Localizacion::class, 'localizacion_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
