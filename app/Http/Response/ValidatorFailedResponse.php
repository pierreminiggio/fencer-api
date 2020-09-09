<?php

namespace App\Http\Response;

use Illuminate\Support\MessageBag;

class ValidatorFailedResponse extends BadContentResponse
{

    public function __construct(MessageBag $messages, array $headers = [])
    {
        parent::__construct([
            'errors' => $messages->all()
        ], $headers);
    }
}
