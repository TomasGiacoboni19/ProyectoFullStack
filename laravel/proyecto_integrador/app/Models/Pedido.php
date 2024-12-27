<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';
    public $timestamps = false;

    protected $fillable = [
        'cliente_id', 'fecha_pedido','precio_total','carritoDisponible','medio_pago_id','entregado', 'direccion_entrega_id'
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }



    public function item()
    {
        return $this->hasMany(ProductoItem::class, 'pedido_id');
    }
    //                                                                  CLAVE FK PEDIDO,       CLAVE PK MEDIO_PAGO
    public function medioDePago()
    {
        return $this->belongsTo(medioDePago::class, 'medio_pago_id', 'id_medio_pago');
    }



    public static function obtenerPedido(int $clienteId): Pedido
    {
        $pedido = Pedido::where([
            ['cliente_id', '=', $clienteId],
            ['carritoDisponible', '=', 1],
        ])->first();

        if (!$pedido) {
            $pedido = self::create([
                'cliente_id' => $clienteId,
                'fecha_pedido' => now()->toDateString(),
                'precio_total' => 0,
                'carritoDisponible' => 1,
            ]);
        }

        return $pedido;
    }


    public function cerrarPedido()
    {
        $this->update(['carritoDisponible' => 0]);
    }

    public function modificarPrecio(Float $precio){
        $this->precio_total += $precio;
        $this->save();
    }



    public function actualizarPedido(array $parametros)
    {
        $productoItem = ProductoItem::where([
            ['producto_id', '=', $parametros['producto_id']],
            ['pedido_id', '=', $parametros['pedido_id']],
        ])->first();

        if ($productoItem != null) {
            $productoItem->cantidad += $parametros['cantidad'];
            $productoItem->total +=  $parametros['total'];
            $productoItem->save();
        } else {
            ProductoItem::create($parametros);
        }

        $this->modificarPrecio($parametros['cantidad'] * $parametros['producto']->precio_producto);
    }





}
