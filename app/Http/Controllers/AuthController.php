<?php

namespace App\Http\Controllers;

use App\Http\Response\NoContentResponse;
use App\Http\Response\ValidatorFailedResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        if (empty($content = json_decode($request->getContent(), true))) {
            return new NoContentResponse();
        }

        $validator = Validator::make($content, [
            'login' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return new ValidatorFailedResponse($validator->errors());
        }

        dd($content);
    }
}
