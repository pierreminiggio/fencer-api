<?php

namespace App\Http\Response\ServerError;

use Illuminate\Http\Response;

class ServerErrorResponse extends Response
{

    public function __construct($content = '', array $headers = [])
    {
        parent::__construct($content, 500, $headers);
    }
}
