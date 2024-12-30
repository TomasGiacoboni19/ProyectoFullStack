<?php

namespace App\Models;

use App\Exceptions\SinStockSuficienteExcepcion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{

    protected $table = 'producto';
    protected $primaryKey = 'id_producto'; // Suele escribirse asi la Primary Key
    public $timestamps = false; // Desactivar timestamps

    protected $fillable = ["nombre_producto", "precio_producto","stock_producto",'categoria_id','vendedor_id', 'foto_producto', 'descripcion_producto', 'esActivo','estado']; // Hay q definir q podemos guardar


    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class,'categoria_id','id_categoria');
    }

    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class, 'vendedor_id', 'id_cliente');
    }


    public function productoItem()
    {
        return $this->hasMany(ProductoItem::class, 'id_producto');
    }

    public function modificarStock(int $cantidad) {
        if ($this->stock_producto + $cantidad < 0) {
            throw new SinStockSuficienteExcepcion('No hay suficiente stock disponible.');
        }
        $this->stock_producto += $cantidad;
        $this->save();
    }

    public static function getActivos(){
        return self::where('estado', 'Disponible')->get();
    }


}
