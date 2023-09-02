<?php

namespace App\Http\Controllers;

use App\Services\CarsService;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    private CarsService $carsService;

    public function __construct(CarsService $carsService)
    {
        $this->carsService = $carsService;
    }

    public function create(Request $request)
    {
        $data = $this->carsService->create($request);
        return response()->json($data, 201);
    }

    public function search(Request $request)
    {
        $brand = $request->get("brand");
        $model = $request->get("model");
        $availability = $request->get("available");
        $result = $this->carsService->searchCars($brand,$model,$availability);
        return response($result);
    }
}
