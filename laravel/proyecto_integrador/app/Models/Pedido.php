<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido
{
    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';
    public $timestamps = false;

    protected $fillable = [
        'cliente_id', 'fecha_generado'
    ];

    const ESTADO_ABIERTO = 0;
    const ESTADO_CERRADO = 1;


    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class);
    }

    public function productos(): HasMany {
    return $this->hasMany(ProductoItem::class);
    }


    public function obtenerPedido(int $clienteId): Pedido
    {
        $pedido = self::where('cliente_id', $clienteId)
            ->where('estado', self::ESTADO_ABIERTO)
            ->first();

        if (!$pedido) {
            $pedido = self::create([
                'cliente_id' => $clienteId,
                'fecha_generado' => now(),
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


}
