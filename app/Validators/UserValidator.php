<?php

namespace App\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Auth;

class UserValidator
{
    public static function validate(Request $request)
    {
        $cred = $request->only(["email", "password"]);
        $validator = Validator::make($cred, [
            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        $token = Auth::attempt($cred);
        $validator->after(function () use ($token) {
            if (!$token) {
                throw new UnauthorizedException();
            }
        });
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $token;
    }
}
