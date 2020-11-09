<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterRequest
 *
 * @package App\Http\Requests\Auth
 */
class CategoryImportRequest extends FormRequest
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
            Category::FILE_TO_UPLOAD_IMPORT => 'required|file|max:5048|mimes:xls,xlsx,ods',
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
