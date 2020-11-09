<?php

namespace App\Http\Requests\User;

use App\Models\CompanyDetails as Company;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserProfileRequest
 *
 * @package App\Http\Requests\Auth
 */
class UserProfileRequest extends FormRequest
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
            User::COLUMN_NAME   => 'required|string|max:255',
            User::COLUMN_FAMILY   => 'required|string|max:255',
            User::COLUMN_PHOTO  => 'image|max:6000|dimensions:min_width=100,min_height=100',
            User::COLUMN_CITY   => 'present',
            User::REQUEST_REMOVE_AVATAR   => 'nullable',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [];
    }
}
