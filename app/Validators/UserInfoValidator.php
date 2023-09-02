<?php

namespace App\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserInfoValidator
{
    public static function validate(Request $request){
        $data = $request->only(["address","phone_number","driving_license_id"]);
        $validator = Validator::make($data,[
            "address"=>"required|min:10",
            "phone_number"=>"required|numeric|min:10",
            "driving_license_id"=>"required|min:16|max:16"
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
