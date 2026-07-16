<?php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

/**
 * Valida la firma de la peticion url para proteger los enlaces sencibles
 */

class VerifyCsrfToken extends Middleware
{
    /**
     * nombre de los campos que no se deben limpiar de espacios
     * 
     * @var array<int, string>
     */

    protected $except = [
        // 
    ];
}