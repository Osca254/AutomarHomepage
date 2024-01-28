<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\PseudoTypes\True_;

class UpdateCarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'design' => 'sometimes|required|string',
            'performance' => 'sometimes|required|string',
            'model' => 'sometimes|required|string',
            'brand' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ];
    }
}
