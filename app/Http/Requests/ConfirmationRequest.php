<?php

namespace App\Http\Requests;

use App\Models\CompanyDetails as Company;
use App\Models\Confirmation;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CompanyRequest
 *
 * @package App\Http\Requests\Auth
 */
class ConfirmationRequest extends FormRequest
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
            Confirmation::COLUMN_USER_NAME => 'required|string|max:255',
            Confirmation::COLUMN_USER_FAMILY => 'required|string|max:255',
            Confirmation::COLUMN_COMPANY_ID => 'required|integer',
            Confirmation::COLUMN_CITY_TITLE => 'required|string|max:255',
            Confirmation::COLUMN_COMPANY_NAME => 'required|string|max:255',
            Confirmation::COLUMN_EMAIL => 'required|string|max:255',
            Confirmation::COLUMN_PHONE => 'required|string',
//            Confirmation::COLUMN_DOCUMENTS => 'present',
            Confirmation::COLUMN_SITE => 'present',
        ];
    }
}
