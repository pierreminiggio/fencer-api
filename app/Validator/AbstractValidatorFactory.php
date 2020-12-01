<?php

namespace App\Validator;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as ValidatorFactory;

abstract class AbstractValidatorFactory
{
    
    private array $rules;

    public function make(array $content): Validator
    {
        return ValidatorFactory::make($content, $this->rules);
    }
}
