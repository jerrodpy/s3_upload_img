<?php

namespace App\Http\Requests\Auth;

use App\Models\CompanyDetails as Company;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class RegisterRequest
 *
 * @package App\Http\Requests\Auth
 */
class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //        return auth()->check();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $role = intval($this->input('role'));

        return [
            User::COLUMN_NAME => 'required|string|max:255',
            User::COLUMN_FAMILY => 'required|string|max:255',
            User::COLUMN_ROLE => 'required|integer',
            User::COLUMN_PASSWORD => 'required|string|min:8|confirmed',
            Company::REQUEST_COMPANY_TITLE => 'nullable',
            Company::REQUEST_COMPANY_CITY_TITLE => 'nullable',
            Company::REQUEST_COMPANY_ADDRESS => 'nullable',
//            Company::REQUEST_TIME_WORK_TEXT => 'nullable',
            User::COLUMN_EMAIL => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', User::COLUMN_EMAIL)->where(
                    function ($query) use ($role) {
                        $query->where(User::COLUMN_ROLE, $role);
                    }
                ),
            ],
            User::COLUMN_BASE_PHONE => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', User::COLUMN_BASE_PHONE)->where(
                    function ($query) use ($role) {
                        $query->where(User::COLUMN_ROLE, $role);
                    }
                ),
            ]
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            User::COLUMN_EMAIL.'.unique' => 'Почта уже зарегистрирована',
            User::COLUMN_EMAIL.'.email' => 'email должен быть действующим адресом электронной почты',
            User::COLUMN_BASE_PHONE.'.unique' => 'Телефон уже зарегистрирован'
        ];
    }
}
