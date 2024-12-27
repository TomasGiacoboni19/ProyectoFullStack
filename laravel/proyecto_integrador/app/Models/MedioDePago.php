<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class medioDePago extends Model
{
    protected $table = 'medio_pago';
    protected $primaryKey = 'id_medio_pago';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];


}
