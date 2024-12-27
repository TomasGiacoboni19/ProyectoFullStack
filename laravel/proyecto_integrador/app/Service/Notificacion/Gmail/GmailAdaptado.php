<?php

namespace App\Service\Notificacion\Gmail;

use Illuminate\Mail\Mailable;

class GmailAdaptado extends Mailable
{

    public string $plantilla;
    public array $contenido;

    public function __construct(string $plantilla, array $contenido)
    {
        $this->plantilla = $plantilla;
        $this->contenido = $contenido;
    }

    public function build()
    {
        return $this->view($this->plantilla)
            ->subject("Decco Libre")
            ->with($this->contenido);
    }
}
