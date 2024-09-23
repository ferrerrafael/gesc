<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTasksRequest extends FormRequest
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
            'title' => 'required|'.$this->tasks->id, 
            'description' => 'required|string|max:250',
            'due_date' => 'required|date_format:dd/mm/YYYY',
            'completed' => 'required',
            //'created_by' => 'required|integer|max:50',
            //'updated_by' => 'required|integer|max:50',
        ];
    }
}
