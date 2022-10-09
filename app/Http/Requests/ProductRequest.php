<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => !empty($this->request->all()['id']) ?
                        'required|string|unique:products,name,' . $this->request->all()['id'] :
                        'required|string|unique:products,name',
            'price' => 'required|numeric',
            'discounts.*' => 'required|integer'
        ];
    }
}