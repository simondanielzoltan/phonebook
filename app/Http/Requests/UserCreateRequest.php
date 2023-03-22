<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    //TODO validate phone
    protected $redirect = '/user/create';
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            "newEmails"    => "required|array|min:1",
            "newEmails.*"  => "email|unique:emails,email",
        ];
    }
}
