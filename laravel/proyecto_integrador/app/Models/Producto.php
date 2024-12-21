<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{

    protected $table = 'producto';
    protected $primaryKey = 'id_producto'; // Suele escribirse asi la Primary Key
    public $timestamps = false; // Desactivar timestamps

    protected $fillable = ["nombre_producto", "precio_producto","stock_producto"]; // Hay q definir q podemos guardar

    public static function productoSeleccionado($nombre)
    {
        return Producto::where('nombre_producto', $nombre)->first();
    }


    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class);
    }

    public function fotos(): HasMany {
        return $this->hasMany(Imagen::class);
    }

    public function productoItem()
    {
        return $this->hasMany(ProductoItem::class, 'id_producto');
    }

    public function modificarStock(int $cantidad){
        if ($this->stock_producto >= $cantidad) {
            $this->stock_producto -= $cantidad;
            $this->save();
        } else {
            throw new Exception('No hay suficiente stock disponible.');
        }
    }





}
