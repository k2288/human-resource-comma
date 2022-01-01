<?php

namespace Raahin\HumanResource\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
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
            'address'                   => ["required", 'string', 'max:200'],
            'bank_account'              => ["required", 'string', 'max:200'],
            'Identification_no'         => ["required", 'string', 'max:200'],
            'identity_card_issue_place' => ["required", 'string', 'max:200'],
            'gender'                    => ["required", 'in:male,female'],
            'birth_date'                => ["required", 'date'],
            'marital_status'            => ["required", 'in:married,single'],
            'children'                  => ["required", 'integer'],
            'study_field'               => ["required", 'string', 'max:200'],
            'study_degree'              => ["required", 'string', 'max:200'],
            'school'                    => ["required", 'string', 'max:200'],
            'home_city'                 => ["required", 'string', 'max:200'],
            'birth_city'                => ["required", 'string', 'max:200'],
            'postal_code'               => ["required", 'string', 'max:200'],
            'father_name'               => ["required", 'string', 'max:200'],
            'military_service_status'   => ["required", 'string', 'max:200', "in:finished,exempted,educational_exemption,other"],
            'description'               => ["nullable", 'string', 'max:500'],
        ];
    }
}
