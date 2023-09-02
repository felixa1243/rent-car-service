<?php

namespace App\Http\Controllers;

use App\Validators\UserValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api", ["except" => ["login", "register"]]);
    }

    public function login(Request $request): JsonResponse
    {
        $validated = UserValidator::validate($request);
        return response()->json([
            "user" => auth()->user(),
            "token_type" => "bearer",
            "access_token" => $validated,
            "expired" => auth()->factory()->getTTL() * 60 * 24
        ]);
    }

    public function whoami()
    {
        return response()->json(auth()->user());
    }
    public function logout(){
        auth()->logout();
        return response()->json(["message"=>"logout success!"]);
    }
    public function refresh(){
        return response()->json([
            "user" => auth()->user(),
            "token_type" => "bearer",
            "access_token" => auth()->refresh(),
            "expired" => auth()->factory()->getTTL() * 60 * 24
        ]);
    }
}
