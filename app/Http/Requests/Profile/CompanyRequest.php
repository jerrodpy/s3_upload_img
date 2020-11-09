<?php

namespace App\Http\Requests\Profile;

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
//            Company::COLUMN_CITY_TITLE => 'required|string|max:255',
//            Company::COLUMN_LATITUDE => 'present',
//            Company::COLUMN_LONGITUDE => 'present',
            Company::COLUMN_SITE => 'present',
            Company::COLUMN_INFO_TEXT => 'required|string|min:50',
//            Company::COLUMN_TIME_WORK_TEXT => 'present',
            Company::REQUEST_TIME_WORK_MON_START => 'present',
            Company::REQUEST_TIME_WORK_MON_END => 'present',
            Company::REQUEST_TIME_WORK_TUE_START => 'present',
            Company::REQUEST_TIME_WORK_TUE_END => 'present',
            Company::REQUEST_TIME_WORK_WED_START => 'present',
            Company::REQUEST_TIME_WORK_WED_END => 'present',
            Company::REQUEST_TIME_WORK_THU_START => 'present',
            Company::REQUEST_TIME_WORK_THU_END => 'present',
            Company::REQUEST_TIME_WORK_FRI_START => 'present',
            Company::REQUEST_TIME_WORK_FRI_END => 'present',
            Company::REQUEST_TIME_WORK_SAT_START => 'present',
            Company::REQUEST_TIME_WORK_SAT_END => 'present',
            Company::REQUEST_TIME_WORK_SUN_START => 'present',
            Company::REQUEST_TIME_WORK_SUN_END => 'present',
            Company::COLUMN_PHONES => 'array',
            Company::COLUMN_PHONES.'.0' => 'required|string',
            Company::COLUMN_EMAIL => 'required|email',
            Company::COLUMN_ADDRESS => 'present',
            Company::COLUMN_IMAGE_PROFILE => 'image|max:6000|dimensions:min_width=100,min_height=100',
            Company::REQUEST_CATEGORY => 'array',
            Company::REQUEST_CATEGORY.'.0' => 'required|integer',
            Company::REQUEST_CATEGORY.'.1' => 'required|integer',
            Company::REQUEST_REMOVE_AVATAR => 'nullable',
            Company::REQUEST_REMOVE_IMAGE => 'nullable|array',
            Company::REQUEST_IMAGES => 'array|max:30',
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
            Company::COLUMN_INFO_TEXT.'.required' => 'Не заполнено описание',
            Company::COLUMN_INFO_TEXT.'.min' => 'Количество для описания должно быть  больше :min',
            Company::COLUMN_PHONES.'.0.required' => 'Не заполнен телефон',
            Company::REQUEST_CATEGORY.'.0.required' => 'Не заполнена основная категория',
            Company::REQUEST_CATEGORY.'.1.required' => 'Не заполнена подкатегория'
        ];
    }
}
