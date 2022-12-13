<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'         => ['required', 'string', 'min:3'],
            'country_id'   => ['required', 'integer'],
            'phone_number' => ['required', 'string'],
            'email'        => ['required', 'string', 'unique:App\Models\User,email'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = $this->validator->validated($key, $default);

        $validated['password'] = Hash::make(Str::random(8));

        return $validated;
    }
}
