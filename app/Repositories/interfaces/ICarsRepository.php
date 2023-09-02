<?php

namespace App\Repositories\interfaces;

interface ICarsRepository extends CrudRepository
{
    public function findByBrand(string $brand);
    public function findByModel(string $model);
    public function findByAvailability(bool $isAvailable);
}
