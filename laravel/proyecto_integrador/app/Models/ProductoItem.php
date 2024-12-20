<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductoItem extends Model
{
    protected $table = 'producto_x_pedido';
    public $timestamps = false;
    protected $primaryKey='id_producto_x_pedido';

    protected $fillable = ['pedido_id', 'producto_id', 'cantidad','total'];

    // Relaciones
    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class, 'pedido_id', 'id_pedido');
    }

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }



}
