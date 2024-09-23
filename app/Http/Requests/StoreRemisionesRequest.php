<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRemisionesRequest extends FormRequest
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
            'customer_id' => 'required|integer',
            'sing' => 'required|string|max:250',
            'sing_date' => 'required|date_format:Y-m-d H:i:s',
            'comments' => 'string|max:500',
            //'created_by' => 'required|integer|max:50',
            //'updated_by' => 'required|integer|max:50',
        ];
    }
}
