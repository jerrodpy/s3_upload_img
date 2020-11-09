<?php

namespace App\Http\Requests;

use App\Models\CompanyDetails as Company;
use App\Models\Confirmation;
use App\Models\Review;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ReviewsChangeStatusRequest
 *
 * @package App\Http\Requests\Auth
 */
class ReviewsChangeStatusRequest extends FormRequest
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
             Review::COLUMN_STATUS => 'required|integer',
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
