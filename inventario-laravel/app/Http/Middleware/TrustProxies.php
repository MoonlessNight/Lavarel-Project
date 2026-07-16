<?php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

/**
 * Confia en los proxies para que laraavel las reconosca como seguras
 */

class TrustProxies extends Middleware
{
    /**
     * Los headers que se deben confiar
     *
     * @var list<string>
     */
    protected $proxies;
    protected $headers = Request::HEADER_X_FORWARDED_FOR |
    Request::HEADER_X_FORWARDED_PROTO |
    Request::HEADER_X_FORWARDED_AWS_ELB |
    Request::HEADER_X_FORWARDED_HOST |
    Request::HEADER_X_FORWARDED_PORT;
}