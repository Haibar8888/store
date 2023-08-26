<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
        'name' => 'required|max:255',
        'user_id' => 'required|exits:users,id',
        'categories_id' => 'required|exits:categories,id',
        'price' => 'required|integer',
        'description' => 'required',
        ];
    }
}
