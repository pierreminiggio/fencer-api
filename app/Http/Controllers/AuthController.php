<?php

namespace App\Http\Controllers;

use App\Http\Response\BadContent\NoContentResponse;
use App\Http\Response\BadContent\ValidatorFailedResponse;
use App\Http\Response\ServerError\TechnicalErrorResponse;
use App\Http\Response\Success\CreatedResponse;
use App\Http\Response\Unauthorized\UnauthorizedResponse;
use App\Repository\UserRepository;
use App\Repository\UserTokenRepository;
use App\Validator\Auth\LoginValidatorFactory;
use App\Validator\Auth\RegisterValidatorFactory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request): Response
    {
        if (empty($content = json_decode($request->getContent(), true))) {
            return new NoContentResponse();
        }

        $validator = (new RegisterValidatorFactory())->make($content);

        if ($validator->fails()) {
            return new ValidatorFailedResponse($validator->errors());
        }

        try {
            (new UserRepository())->create($content['login'], $content['email'], $content['password']);
        } catch (Exception $e) {
            return new TechnicalErrorResponse();
        }

        return new CreatedResponse();
    }

    public function login(Request $request): Response
    {
        if (empty($content = json_decode($request->getContent(), true))) {
            return new NoContentResponse();
        }

        $validator = (new LoginValidatorFactory())->make($content);

        if ($validator->fails()) {
            return new ValidatorFailedResponse($validator->errors());
        }

        $user = (new UserRepository())->findForLoginOrEmail($content['login']);

        if ($user === null) {
            return new UnauthorizedResponse();
        }

        if (Hash::check($content['password'], $user->password)) {
            try {
                $token = (new UserTokenRepository())->createForUser($user->id);
            } catch (Exception $e) {
                return new TechnicalErrorResponse();
            }
            
            return new Response([
                'token' => $token->token
            ]);
        }

        return new UnauthorizedResponse();
    }
}
