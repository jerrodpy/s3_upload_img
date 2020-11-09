<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FilterCompanyRequest
 *
 * @package App\Http\Requests\Auth
 */
class FilterCompanyRequest extends FormRequest
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
            'categoryRoot'  => 'nullable|integer',
            'categorySub'   => 'nullable|integer',
            'city'          => 'nullable',
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
