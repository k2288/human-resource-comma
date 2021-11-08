<?php

namespace Raahin\HumanResource\Http\Resources\EmergencyContact;

use Illuminate\Http\Resources\Json\JsonResource;

class EmergencyContactResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'description' => $this->description,
            'user' => $this->whenLoaded('user'),
        ];
    }
}
