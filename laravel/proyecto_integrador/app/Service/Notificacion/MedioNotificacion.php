<?php

namespace App\Service\Notificacion;

use App\Service\Notificacion\Mensaje\Mensaje;

interface MedioNotificacion
{
    public static function enviar(array $parametros): void;

}
