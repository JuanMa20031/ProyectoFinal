<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|string|unique:products,sku,' . optional($this->product)->id,
            'price' => 'required|numeric|min:0',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
