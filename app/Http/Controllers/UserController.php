<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
    }
    public function authenticate(Request $request)
    {
        UserValidator::validate($request);
           
    }
}
