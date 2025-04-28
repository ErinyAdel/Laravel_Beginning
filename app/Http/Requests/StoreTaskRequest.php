<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "priority" => "required|integer|min:1"
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The Title is Required.',
            'title.string' => 'The Title Must Be a String.',
            'title.max' => 'The Title Must Not Exceed 255 Characters.',
            
            'description.string' => 'The Description Must Be a String.',

            'priority.required' => 'The Priority is Required.',
            'priority.integer' => 'The Priority Must Be an Integer.',
            'priority.min' => 'The Priority Must Be At Least 1.',
        ];
    }
}
