<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand_id' => 'nullable|integer|exists:brands,id',
            'color' => 'nullable|string|max:255',
            'transmission' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'seats' => 'nullable|integer|min:1',
            'fuel_type' => 'nullable|string|max:255',
            'featured' => 'nullable|boolean',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|gte:min_price',
            'query' => 'nullable|string|max:255',
        ];
    }
}
