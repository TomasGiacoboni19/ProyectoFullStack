<?php

namespace App\Models;

use App\Exceptions\UsuarioExisteExcepcion;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;

    protected $fillable = ["nombre","apellido","usuario","mail","password"];

    public static function ExisteUsuario(String $usuario)
    {
        $usuarioExistente = Cliente::where('usuario', $usuario)->exists();

        if ($usuarioExistente) {
            throw new UsuarioExisteExcepcion();
        }
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class,'cliente_id','id_cliente');
    }



}
