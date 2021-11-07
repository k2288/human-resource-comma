<?php

namespace Raahin\HumanResource\Http\Resources\Experience;

use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
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
            'company' => $this->company,
            'position' => $this->position,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user' => $this->whenLoaded('user'),
            'description' => $this->description,
        ];
    }
}
