<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{

    public function direccion()
    {
        return $this->hasMany(Direccion::class);
    }


}
