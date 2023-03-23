<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'price' => 'nullable|integer',
            'old_price' => 'nullable|integer',
            'count' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'colors' => 'nullable|array',
            'tags' => 'nullable|array',
            'product_images' => 'nullable|array'
        ];
    }
}
