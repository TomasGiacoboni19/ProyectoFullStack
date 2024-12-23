<?php

namespace App\Exceptions;

use Exception;

class UsuarioExisteExcepcion extends Exception
{

    public function __construct($message = "El usuario ya existe.", $code = 400)
    {
        parent::__construct($message, $code);
    }

    public function render($request)
    {
        // Redirige a la página anterior con un mensaje de error y los datos del formulario
        return redirect()->back()
            ->withErrors(['usuario' => $this->getMessage()])
            ->withInput();
    }
}
