<?php

namespace App\Http\Requests;

use App\Models\Image;
use App\Rules\ImageFormBase64Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class ReviewsAddRequest
 *
 * @package App\Http\Requests\Auth
 */
class ImageCreateRequest extends FormRequest
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
            'type' => 'required|'.Rule::in(array_keys(Image::IMAGE_TYPE)),
            'image' => new ImageFormBase64Rule($this->input('image')),
        ];
    }
}
