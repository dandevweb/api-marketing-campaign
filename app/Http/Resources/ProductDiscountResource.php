<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDiscountResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'discount_id' => $this->id,
            'discount_name' => $this->name,
            'discount_percent_value' => $this->value,
        ];
    }
}
