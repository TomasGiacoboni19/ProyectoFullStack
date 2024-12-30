<?php

namespace App\Exceptions;

use Exception;

class SinStockSuficienteExcepcion extends Exception
{

    public function __construct($message = "El stock es insuficiente", $code = 400)
    {
        parent::__construct($message, $code);
    }

    public function render($request)
    {
        return redirect()->back()
            ->withErrors(['usuario' => $this->getMessage()])
            ->withInput();
    }

}
