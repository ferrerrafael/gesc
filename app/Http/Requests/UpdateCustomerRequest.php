<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'identification' => 'required|integer|string:50|unique:customers,identification,'.$this->customer->id,
            'name' => 'required|string|max:250',
            'tipo_id' => 'required|string|max:50',
            'name' => 'required|string|max:250',
            'cellphone' => 'required|string|max:250',
            'telephone' => 'required|string|max:250',
            'email' => 'required|string|max:250',
            'country' => 'required|string|max:250',
            'city' => 'required|string|max:250',
            'address' => 'required|string|max:250',
            'status' => 'required|integer|min:1|max:10000',
        ];
    }
}