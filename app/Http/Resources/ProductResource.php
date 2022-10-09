<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Requests\ProductDiscountRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => (float)$this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'discounts' => ProductDiscountResource::collection($this->discounts),
        ];
    }
}
