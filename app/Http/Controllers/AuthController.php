<?php

namespace App\Http\Controllers;

use App\Http\Response\BadContent\NoContentResponse;
use App\Http\Response\BadContent\ValidatorFailedResponse;
use App\Http\Response\ServerError\TechnicalErrorResponse;
use App\Repository\UserRepository;
use Exception;
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

        try {
            (new UserRepository())->create($content['login'], $content['email'], $content['password']);
        } catch (Exception $e) {
            return new TechnicalErrorResponse();
        }
    }
}
