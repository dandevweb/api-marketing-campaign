<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use App\Services\DiscountService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DiscountController extends Controller
{
    public function __construct(
        private DiscountService $discountService,
    ) {}

    public function index(): ResourceCollection
    {
        return DiscountResource::collection(Discount::all());
    }

    public function store(DiscountRequest $discountRequest): DiscountResource
    {
        return new DiscountResource($this->discountService->store($discountRequest->validated()));
    }

    public function show(Discount $discount): DiscountResource
    {
        return new DiscountResource($discount);
    }

    public function update(DiscountRequest $discountRequest, Discount $discount): DiscountResource
    {
        return new DiscountResource($this->discountService->update($discountRequest->validated(), $discount));
    }

    public function destroy(Discount $discount): void
    {
        $discount->deleteOrFail();
    }

    public function paginate(int $perPage = 10)
    {
        return DiscountResource::collection(Discount::paginate($perPage));
    }
}