<?php

namespace App\Http\Response;

use Illuminate\Http\Response;

class BadContentResponse extends Response
{

    public function __construct($content = '', array $headers = [])
    {
        parent::__construct($content, 400, $headers);
    }
}
