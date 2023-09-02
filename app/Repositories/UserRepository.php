<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\interfaces\IUserRepository;

class UserRepository implements IUserRepository
{
    public function save(array $data)
    {

        return User::create($data);
    }

    public function delete(string $id)
    {
        // TODO: Implement delete() method.
    }

    public function findAll($page)
    {
        // TODO: Implement findAll() method.
    }

    public function findById(string $id)
    {
        // TODO: Implement findById() method.
    }

    public function findByName(string $name)
    {
        // TODO: Implement findByName() method.
    }

    public function update(string $id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function findByEmail(string $email)
    {
        return User::where("email", $email)->first();
    }

    public function verification(string $id, array $data)
    {
        return User::where("id", $id)->update($data);
    }
}
