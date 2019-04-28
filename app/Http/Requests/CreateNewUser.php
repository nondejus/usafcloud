<?php

namespace App\Http\Requests;

use App\Rules\AllowedDomain;
use Illuminate\Foundation\Http\FormRequest;

class CreateNewUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->user()->can('users:create')) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:255'],
            'nickname' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', new AllowedDomain],
            'date_of_birth' => ['nullable', 'date', 'max:255'],
            'gender_id' => ['nullable', 'numeric', 'exists:genders,id'],
            'avatar' => ['nullable', 'image'],
            'password' => ['nullable', 'string', 'min:8'],
            'needs_gsuite' => ['nullable']
        ];
    }
}
