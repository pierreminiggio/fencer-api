<?php

namespace App\Validator\Auth;

use App\Validator\AbstractValidatorFactory;

class LoginValidatorFactory extends AbstractValidatorFactory
{

    public function __construct()
    {
        $this->rules = [
            'login' => 'required',
            'password' => 'required'
        ];
    }
}
