<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Utils\AuthenticationUtils;
use App\Validators\UserValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->middleware("auth:api", ["except" => ["login", "register"]]);
        $this->userService = $userService;
    }
    public function register(Request $request):JsonResponse{
        return response()->json(["data"=>$this->userService->register($request)]);
    }
    public function login(Request $request): JsonResponse
    {
        UserValidator::validate($request);
        $token = AuthenticationUtils::authenticate($request);
        return response()->json([
            "user" => auth()->user(),
            "token_type" => "bearer",
            "access_token" => $token,
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
