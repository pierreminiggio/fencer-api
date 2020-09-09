<?php

namespace App\Http\Response\ServerError;

class TechnicalErrorResponse extends ServerErrorResponse
{

    public function __construct(array $headers = [])
    {
        parent::__construct([
            'error' => 'internal server error'
        ], $headers);
    }
}
