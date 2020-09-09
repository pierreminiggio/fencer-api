<?php

namespace App\Http\Controllers;

use App\Http\Response\NoContentResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if (empty($body = json_decode($request->getContent(), true))) {
            return new NoContentResponse();
        }
        dd('bon');
    }
}
