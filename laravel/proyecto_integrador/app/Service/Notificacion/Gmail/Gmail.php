<?php

namespace App\Service\Notificacion\Gmail;
use App\Service\Notificacion\MedioNotificacion;
use Illuminate\Support\Facades\Mail;

class Gmail implements MedioNotificacion
{

    public static function enviar(array $parametros): void
    {
        $destinatario = $parametros['destinatario'];
        $contenido = $parametros['contenido'];
        $plantilla =$parametros['plantilla'];

        Mail::to($destinatario)->send(new GmailAdaptado($plantilla, $contenido));

    }
}
