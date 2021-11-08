<?php

namespace Raahin\HumanResource\Http\Requests\EmergencyContact;

use Illuminate\Foundation\Http\FormRequest;

class EmergencyContactStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:200'],
            'phone' => ['required', 'string', 'max:200'],
            'mobile' => ['required', 'string', 'max:200'],
            'description' => ["nullable", 'string', 'max:500'],
        ];
    }
}
