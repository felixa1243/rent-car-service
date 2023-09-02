<?php

namespace App\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserValidator
{
    public static function validate(Request $request)
    {
        $cred = $request->only(["email", "password"]);
        $validator = Validator::make($cred, [
            "email" => "required|email",
            "password" => "required|min:6"
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
