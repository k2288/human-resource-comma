<?php

namespace Raahin\HumanResource\Http\Resources\EmergencyContact;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmergencyContactCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
