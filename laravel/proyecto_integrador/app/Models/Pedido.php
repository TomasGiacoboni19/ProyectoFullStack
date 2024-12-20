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
        'cliente_id', 'fecha_generado','precio_total'
    ];

    const ESTADO_ABIERTO = 0;
    const ESTADO_CERRADO = 1;


    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class);
    }

    public function item()
    {
        return $this->hasMany(ProductoItem::class, 'pedido_id');
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
                'fecha_generado' => now()->toDateString(),
                'precio_total' => 0,
                'carritoDisponible' => 1,
            ]);
        }

        return $pedido;
    }


    public function cerrarPedido()
    {
        $this->update(['estado' => self::ESTADO_CERRADO]);

        $pedido = self::create([
            'cliente_id' => $this->cliente_id,
            'fecha_generado' => now(),
            'estado' => self::ESTADO_ABIERTO,
        ]);

        $pedido->save();
    }

    public function aumentarPrecio(Float $precio){
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
            $productoItem->total = $parametros['producto']->precio_producto * $productoItem->cantidad;
            $productoItem->save();
        } else {
            ProductoItem::create($parametros);
        }

        $this->aumentarPrecio($parametros['cantidad'] * $parametros['producto']->precio_producto);
    }


}
