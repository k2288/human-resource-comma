<?php

namespace Raahin\HumanResource\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;

class EducationStoreRequest extends FormRequest
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
            'start_date' => ["required", 'date'],
            'end_date' => ["required", 'date'],
            'school' => ["required", 'string', 'max:200'],
            'study_field' => ["required", 'string', 'max:200'],
            'grade' => ["required", 'string', 'max:200'],
            'description' => ["nullable",'string', 'max:500'],
        ];
    }
}
