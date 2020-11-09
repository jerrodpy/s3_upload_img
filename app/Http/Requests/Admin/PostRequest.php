<?php

namespace App\Http\Requests\Admin;

use App\Models\Post;
use App\Services\Utils;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class PostRequest
 *
 * @package App\Http\Requests\Auth
 */
class PostRequest extends FormRequest
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
        $title = $this->input(Post::COLUMN_TITLE);
        $postType = intval($this->input(Post::COLUMN_TYPE));

        return [
            Post::COLUMN_TITLE => [
                'required',
                'string',
                'max:255',
//                Rule::unique(Post::TABLE_NAME, Post::COLUMN_SLUG)
//                    ->where(function ($query) use ($title, $postType) {
//                        $query
//                            ->where(Post::COLUMN_SLUG, Utils::toTranslate($title));
////                            ->where(Post::COLUMN_TYPE, $postType);
//                    }
//                ),
                Rule::unique(Post::TABLE_NAME)->where(function ($query) use ($title) {
                    return $query->where(Post::COLUMN_SLUG, Utils::toTranslate($title));
                })
            ],
            Post::COLUMN_SEO_H1 => 'present',
            Post::COLUMN_SEO_TITLE => 'present',
            Post::COLUMN_CITY_ID => 'present',
            Post::COLUMN_IMAGE => 'image|max:6000|dimensions:min_width=100,min_height=100',
            Post::COLUMN_TEXT => 'required|string',
            Post::COLUMN_SORTING => 'present',
            Post::COLUMN_TYPE => 'present',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            Post::COLUMN_TITLE . '.unique' => 'Заголовок должен быть уникальный',
            Post::COLUMN_IMAGE . '.dimensions' => 'Поле :attribute имеет недопустимые размеры изображения. Минимально допустимый размер изображений 100х100px',
        ];
    }
}
