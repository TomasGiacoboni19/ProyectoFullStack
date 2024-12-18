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


    // HAY QUE REVISAR UNA VEZ QUE LE DEMOS NOMBRE EN LA TABLA CUALES VAN A SER LAS FOREIGN KEY LAS PRIMARY KEY
    // PREFERIBLEMENTE RESPETAR EL FORMATO DE LARAVEL -> MÁS FÁCIL


    public function categoria(): BelongsTo { //Estoy diciendo que pertenece, en este caso a una categoría
        return $this->belongsTo(Categoria::class);
    }

    public function cliente(): BelongsTo { //En este caso a un cliente
        return $this->belongsTo(Cliente::class);
    }

    public function fotos(): HasMany { //Estoy diciendo que tiene muchas imágenes
        return $this->hasMany(Imagen::class);
        // Eloquent asume que la Foreign Key de Producto en la tabla Imagenes es producto_id
    }

    // NO SE COMO SERIA LA DE PEDIDO X PRODUCTO
}
