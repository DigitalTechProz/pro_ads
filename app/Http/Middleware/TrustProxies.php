<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string
     */
    protected $proxies = [

        '192.168.1.1',
        '192.168.1.2',
		 '192.168.1.3',
        '192.168.1.4',
		 '192.168.1.5',
        '192.168.1.6',
		 '192.168.1.7',
        '192.168.1.8',
    ];

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
