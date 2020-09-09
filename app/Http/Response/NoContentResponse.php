<?php

namespace App\Http\Response;

class NoContentResponse extends BadContentResponse
{

    public function __construct(array $headers = [])
    {
        parent::__construct([
            'error' => 'empty request body'
        ], $headers);
    }
}
