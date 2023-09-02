<?php

namespace App\Services;

use App\Models\Cars;
use App\Repositories\CarsRepository;
use App\Repositories\interfaces\ICarsRepository;
use App\Validators\CarValidator;
use Illuminate\Http\Request;

class CarsService
{
    private ICarsRepository $carsRepository;

    public function __construct(CarsRepository $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    public function create(Request $request)
    {
        CarValidator::validate($request);
        $user = auth()->user();
        $created = $this->carsRepository->save([
            "brand" => $request->json("brand"),
            "model" => $request->json("model"),
            "police_number" => $request->json("police_number"),
            "rent_perday" => $request->json("rent_perday"),
            "owner_id"=>$user->id
        ]);
        return [
            "brand"=>$created->brand,
            "model"=>$created->model
        ];
    }
    public function searchCars($brand, $model, $availability)
    {
        $query = Cars::query();

        if ($brand) {
            $query->where('brand', 'like', '%' . $brand . '%');
        }

        if ($model) {
            $query->where('model', 'like', '%' . $model . '%');
        }

        if ($availability !== null) {
            $query->where('availability', $availability);
        }

        return $query->get();
    }

}
