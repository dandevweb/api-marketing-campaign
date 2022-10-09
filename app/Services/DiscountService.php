<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\DiscountHasBeenTakenException;
use App\Models\Discount;

class DiscountService
{

    public function store(array $input): Discount
    {
        $discountExists = Discount::whereName($input['name'])->exists();

        return !$discountExists ? Discount::create($input) : throw new DiscountHasBeenTakenException();
    }

    public function update(array $input, Discount $discount): Discount
    {
        $discountExists = Discount::where($input)->where('name', '!=', $discount->name)->exists();

        if ($discountExists) {
            throw new DiscountHasBeenTakenException();
        }

        $discount->fill($input);
        $discount->save();

        return $discount->fresh();
    }
}