<?php

namespace App\Validator\Auth;

use App\Models\User;
use App\Validator\AbstractValidatorFactory;

class RegisterValidatorFactory extends AbstractValidatorFactory
{

    public function __construct()
    {
        $table = (new User())->getTable();
        $this->rules = [
            'login' => 'required|unique:' . $table,
            'email' => 'required|unique:' . $table,
            'password' => 'required'
        ];
    }
}
