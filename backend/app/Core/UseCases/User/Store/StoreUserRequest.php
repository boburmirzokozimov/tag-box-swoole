<?php

namespace App\Core\UseCases\User\Store;

use Illuminate\Foundation\Http\FormRequest;

final class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
