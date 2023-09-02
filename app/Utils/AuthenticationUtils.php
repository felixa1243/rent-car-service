<?php

namespace App\Utils;

use App\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationUtils
{
    public static function authenticate(Request $request){
        $cred = $request->only(["email", "password"]);
        $token = Auth::attempt($cred);
        if (!$token) {
            throw new UnauthorizedException();
        }
        return $token;
    }
}
