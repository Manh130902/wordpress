<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = [
        Request::HEADER_FORWARDED => 'FORWARDED',
        Request::HEADER_X_FORWARDED_FOR => 'X_FORWARDED_FOR',
        Request::HEADER_X_FORWARDED_HOST => 'X_FORWARDED_HOST',
        Request::HEADER_X_FORWARDED_PORT => 'X_FORWARDED_PORT',
        Request::HEADER_X_FORWARDED_PROTO => 'X_FORWARDED_PROTO',
        Request::HEADER_X_FORWARDED_AWS_ELB => 'ELB-PROTO',
        Request::HEADER_X_FORWARDED_AWS_ELB => 'ELB-PORT',
        Request::HEADER_X_FORWARDED_AWS_ELB => 'ELB-FORWARDED-FOR',
        Request::HEADER_X_FORWARDED_AWS_ELB => 'ELB-SSL',
    ];
    
}
