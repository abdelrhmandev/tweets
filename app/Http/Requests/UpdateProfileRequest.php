<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users,username,'. auth()->user()->id],
            'email' => ['required', 'email', 'max:100', 'unique:users,email,'. auth()->user()->id],
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'cover' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'password' => ['string','min:8','max:255','confirmed',
            ],
        ];
    }
}
