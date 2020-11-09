<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterRequest
 *
 * @package App\Http\Requests\Auth
 */
class CategoryRequest extends FormRequest
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
            Category::COLUMN_TITLE => 'required|string|max:255',
            Category::COLUMN_PARENT_ID => 'present',
            Category::COLUMN_SORTING => 'integer',
            Category::COLUMN_ICON => 'present',
            Category::COLUMN_IMAGE => 'max:255',
            Category::COLUMN_SEO_TITLE => 'present|max:255',
            Category::COLUMN_SEO_H1 => 'present|max:255',
            Category::COLUMN_SEO_TEXT => 'present|max:2000',

        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            Category::COLUMN_TITLE.'.required' => 'Обязательно для заполнения',
        ];
    }
}
