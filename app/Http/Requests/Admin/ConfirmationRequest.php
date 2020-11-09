<?php

namespace App\Http\Requests\Admin;

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
            Confirmation::COLUMN_STATUS => 'nullable|integer',
            Confirmation::COLUMN_COMMENT => 'nullable|string|max:500',
            //            Confirmation::COLUMN_DOCUMENTS => 'present',
        ];
    }
}
