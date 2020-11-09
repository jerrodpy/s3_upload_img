<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FilterCategoryRequest
 *
 * @package App\Http\Requests\Auth
 */
class FilterCategoryRequest extends FormRequest
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
            'id'            => 'present|integer',
            'title'         => 'present|nullable|string|max:255',
//            'parent_id'     => 'nullable|integer',
            'parent_id'     => 'nullable',
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
