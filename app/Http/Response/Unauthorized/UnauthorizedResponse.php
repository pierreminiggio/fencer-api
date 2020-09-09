<?php

namespace App\Http\Response\Unauthorized;

use Illuminate\Http\Response;

class UnauthorizedResponse extends Response
{

    public function __construct($content = '', array $headers = [])
    {
        parent::__construct($content, 401, $headers);
    }
}
