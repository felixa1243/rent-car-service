<?php

namespace App\Services;

use App\Exceptions\DataIsExistsException;
use App\Repositories\interfaces\IUserRepository;
use App\Validators\UserValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request)
    {
        UserValidator::validate($request);
        $email = $request->json("email");
        $existing = $this->userRepository->findByEmail($email);
        if ($existing) {
            throw new DataIsExistsException("Data with email " . $email . " is already exists");
        }
        $created = $this->userRepository->save([
            "name" => $request->json("name"),
            "email" => $email,
            "password" => Hash::make($request->json("password"))
        ]);
        return [
            "id" => $created->id,
            "name" => $created->name,
            "email"=>$created->email
        ];
    }
}
