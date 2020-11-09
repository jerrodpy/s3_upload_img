<?php

namespace App\Http\Requests\Admin;

use App\Models\CompanyDetails as Company;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CompanyRequest
 *
 * @package App\Http\Requests\Auth
 */
class CompanyRequest extends FormRequest
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
            Company::COLUMN_TITLE => 'required|string|max:255',
            Company::COLUMN_CITY_TITLE => 'required|string|max:255',
            Company::COLUMN_LATITUDE => 'present',
            Company::COLUMN_LONGITUDE => 'present',

            // "expiry" => "required|string|size:5|date_format:m/y|after:today",
//            Company::COLUMN_TIME_BEGIN => 'present',
//            Company::COLUMN_TIME_END => 'present',
//            Company::COLUMN_POSTAL_CODE => 'present',

            Company::COLUMN_SITE => 'present',
            Company::COLUMN_INFO_TEXT => 'present',
            Company::COLUMN_TIME_WORK_TEXT => 'present',
            Company::COLUMN_PHONES => 'array',
            Company::COLUMN_EMAIL => 'present',
            Company::COLUMN_ADDRESS => 'present',
            Company::COLUMN_SORTING => 'present',
            Company::COLUMN_IMAGE_PROFILE => 'image|max:6000|dimensions:min_width=100,min_height=100',
            Company::REQUEST_CATEGORY => 'array',
            Company::REQUEST_REMOVE_AVATAR => 'nullable',
            Company::REQUEST_REMOVE_IMAGE => 'nullable|array',
            Company::REQUEST_IMAGES => 'array|max:5',
            Company::REQUEST_IMAGES.'.*' => 'image|max:6000|dimensions:min_width=400,min_height=400',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            Company::REQUEST_IMAGES.'.*.image' => 'Загружаемый файл должен быть изображением',
            Company::REQUEST_IMAGES.'.*.dimensions' => 'Поле :attribute имеет недопустимые размеры изображения. Минимально допустимый размер изображений 400х400px',
            Company::COLUMN_IMAGE_PROFILE.'.dimensions' => 'Поле :attribute имеет недопустимые размеры изображения. Минимально допустимый размер изображения 100х100px',
        ];
    }
}
