<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\User;

class UpdateUserRequest extends FormRequest
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
    public function rules(User $user)
    {
        return [
            //
            //
        'name' => 'required|string|max:50',
        'email' => 'required|email',
        'roles' => 'required|string|in:ADMIN,USER', //
        ];
    }
}
