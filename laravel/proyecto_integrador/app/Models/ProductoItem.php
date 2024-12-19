<?php

namespace App\Models;

class ProductoItem
{

    protected $table = 'producto_x_pedido';
    protected $primaryKey = null;
    public $timestamps = false;

    protected $fillable = ["pedido_id", "producto_id", "cantidad"];


    public function pedido(): BelongsTo {
        return $this->belongsTo(Pedido::class);
    }

    public function producto(): BelongsTo {
        return $this->belongsTo(Producto::class);
    }

    public function getKeyName()
    {
        return ['id_producto', 'id_pedido'];
    }

    protected function getKeyForSaveQuery()
    {
        $keys = $this->getKeyName();
        $query = [];

        foreach ($keys as $key) {
            $query[$key] = $this->getAttribute($key);
        }

        return $query;
    }
}
