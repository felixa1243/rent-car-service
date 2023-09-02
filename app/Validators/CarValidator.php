<?php

namespace App\Validators;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CarValidator
{
    public static function validate(Request $request){
        $data = $request->only(["brand","model","police_number","rent_perday"]);
        $validator = Validator::make($data,[
            "brand"=>"required",
            "model"=>"required",
            "police_number"=>"required",
            "rent_perday"=>"required|numeric"
        ]);

        if ($validator->fails()){
            throw new ValidationException($validator);
        }
    }
}
