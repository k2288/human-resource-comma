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
            'id'                        => $this->id,
            'user_id'                   => $this->user_id,
            'address'                   => $this->address,
            'bank_account'              => $this->bank_account,
            'Identification_no'         => $this->Identification_no,
            'identity_card_issue_place' => $this->identity_card_issue_place,
            'gender'                    => $this->gender,
            'marital_status'            => $this->marital_status,
            'birth_date'                => $this->birth_date,
            'children'                  => $this->children,
            'study_field'               => $this->study_field,
            'study_degree'              => $this->study_degree,
            'school'                    => $this->school,
            'home_city'                 => $this->home_city,
            'birth_city'                => $this->birth_city,
            'postal_code'               => $this->postal_code,
            'father_name'               => $this->father_name,
            'military_service_status'   => $this->military_service_status,
            'description'               => $this->description,
            'user'                      => $this->whenLoaded('user'),
        ];

        return $data;
    }
}
