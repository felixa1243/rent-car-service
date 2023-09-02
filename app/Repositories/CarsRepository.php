<?php

namespace App\Repositories;

use App\Models\Cars;
use App\Repositories\interfaces\ICarsRepository;

class CarsRepository implements ICarsRepository
{
    public function save(array $data)
    {
        return Cars::create($data);
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
}
