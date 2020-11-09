<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class ChangePasswordRequest
 *
 * @package App\Http\Requests\Auth
 */
class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_new' => 'required|string|min:8|confirmed',
            'old_password' => 'required|password',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'old_password.password' => 'Старый пароль не верный'
        ];
    }
}
