<?php

namespace App\Http\Requests\Admin;

use App\Models\CompanyDetails as Company;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CompanyImportRequest
 * @package App\Http\Requests\Admin
 */
class CompanyImportRequest extends FormRequest
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
            Company::FILE_TO_UPLOAD_IMPORT_COMPANY => 'required|file|max:5048|mimes:xls,xlsx,ods',
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
