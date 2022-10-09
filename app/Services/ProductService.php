<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;

class ProductService
{

    public function store(array $input): Product
    {
        return $this->productCreateOrUpdate($input);
    }

    public function update(array $input, Product $product): Product
    {
        return ($this->productCreateOrUpdate($input, $product))->fresh();
    }

    private function productCreateOrUpdate(array $input, Product $product = null): Product
    {
        $data = [
            'name' => $input['name'],
            'price' => (float)$input['price'],
        ];

        if ($product) {
            $product->fill($data);
            $product->save();
        } else {
            $product = Product::create($data);
        }

        $product->discounts()->sync($input['discounts']);

        return $product;
    }
}
