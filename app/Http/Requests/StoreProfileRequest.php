<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "user_id" => "required|exists:users,id",
            "phone" => "string|max:15",
            "address" => "nullable|string|max:100",
            "date_of_birth" => "nullable|date",
            "bio" => "nullable|string",
        ];
    }
}
