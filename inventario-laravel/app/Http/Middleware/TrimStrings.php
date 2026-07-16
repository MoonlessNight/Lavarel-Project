<?php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;


/**
 * Elimina los espacios inncesarios de los de textos
 */

class TrimStrings extends Middleware
{
    /**
     * Nombre de los campos que no se deben limpiar de espacios
     *
     * @var array<int, string>
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}