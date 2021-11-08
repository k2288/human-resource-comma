<?php

namespace Raahin\HumanResource\Http\Resources\Education;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'school' => $this->school,
            'study_field' => $this->study_field,
            'grade' => $this->grade,
            'description' => $this->description,
            'user' => $this->whenLoaded('user'),
        ];
    }
}
