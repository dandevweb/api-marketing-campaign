<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService,
    ) {}

    public function index(): ResourceCollection
    {
        return ProductResource::collection(Product::with('discounts')->get());
    }

    public function store(ProductRequest $productRequest): ProductResource
    {
        return new ProductResource($this->productService->store($productRequest->validated()));
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function update(ProductRequest $productRequest, Product $product): ProductResource
    {
        return new ProductResource($this->productService->update($productRequest->validated(), $product));
    }

    public function destroy(Product $product): void
    {
        $product->discounts()->detach();
        $product->deleteOrFail();
    }

    public function paginate(int $perPage = 10)
    {
        return ProductResource::collection(Product::paginate($perPage));
    }
}