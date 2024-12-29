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

    public static function obtenerDireccion(array $datos)
    {
        if ($datos['favoritos'] != '0') {
            return self::find($datos['favoritos']);
        } else {
            $parametros = [
                'nombre' => $datos['direccion'],
                'numero' => $datos['numero'],
                'localizacion_id' => $datos['localizacion'],
                'cliente_id' => auth()->id(),
            ];
            return self::create($parametros);
        }
    }

}
