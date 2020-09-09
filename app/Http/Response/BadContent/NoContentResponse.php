<?php

namespace App\Http\Response\BadContent;

class NoContentResponse extends BadContentResponse
{

    public function __construct(array $headers = [])
    {
        parent::__construct([
            'error' => 'empty request body'
        ], $headers);
    }
}
