<?php

namespace App\Http\Response\Success;

use Illuminate\Http\Response;

class CreatedResponse extends Response
{

    public function __construct($content = '', array $headers = [])
    {
        parent::__construct($content, 201, $headers);
    }
}
