<?php

namespace Raahin\HumanResource\Http\Resources\Profile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {

        $data = [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'address' => $this->address,
            'bank_account' => $this->bank_account,
            'Identification_no' => $this->Identification_no,
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'birth_date' => $this->birth_date,
            'children' => $this->children,
            'study_field' => $this->study_field,
            'school' => $this->school,
            'description' => $this->description,
        ];

        return $data;
    }
}
