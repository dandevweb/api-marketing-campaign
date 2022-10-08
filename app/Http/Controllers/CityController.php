<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Services\CityService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CityController extends Controller
{
    public function __construct(
        private CityService $cityService,
    ) {}

    public function index(): ResourceCollection
    {
        return CityResource::collection(City::with('group')->get());
    }

    public function store(CityRequest $cityRequest): CityResource
    {
        return new CityResource($this->cityService->store($cityRequest->validated()));
    }

    public function show(City $city): CityResource
    {
        return new CityResource($city);
    }

    public function update(CityRequest $cityRequest, City $city): CityResource
    {
        return new CityResource($this->cityService->update($cityRequest->validated(), $city));
    }

    public function destroy(City $city): void
    {
        $city->deleteOrFail();
    }

    public function paginate(int $perPage = 10)
    {
        return CityResource::collection(City::paginate($perPage));
    }
}