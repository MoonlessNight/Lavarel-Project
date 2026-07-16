<?php

use Illuminate\Cookie\Middleware\EncryptCookies as Middelware;

class EncriptCookies extends Middleware
{
    protected $except = [
        //
    ];
}