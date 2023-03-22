<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//TODO validate phone
class UserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            "newEmails"    => "array",
            "newEmails.*"  => "email|unique:emails,email",
        ];
    }
}
