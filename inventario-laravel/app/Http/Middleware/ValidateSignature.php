<?php
namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ValidateSignature as Middleware;

/**
 * Valida la firma de la peticion url para proteger los enlaces sencibles
 */

class ValidateSignature extends Middleware
{
    /**
     * Nombre de los campos que nose deben limpiar de espacios
     * 
     * @var array<int, string>
     */
    protected $except = [
        // 'fbcclid',
        // 'utm_campaign',
        // 'utm_content',
        // 'utm_medium',
        // 'utm_source',
        // 'utm_term',
    ];
}