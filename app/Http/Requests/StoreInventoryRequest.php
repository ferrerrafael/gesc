<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
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
            'code' => 'required|string|max:250|unique:inventories,code',
            'name' => 'required|string|max:250',
            'description' => 'required|string|max:500',
            //'image' => 'required|string|max:500',
            'price' => 'required|integer',
            'type' => 'required|string|max:500',
            //'created_by' => 'required|integer|max:50',
            //'updated_by' => 'required|integer|max:50',
        ];
    }
}
