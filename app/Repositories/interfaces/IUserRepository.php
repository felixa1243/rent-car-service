<?php

namespace App\Repositories\interfaces;

interface IUserRepository extends CrudRepository
{
    public function findByEmail(string $email);
}
