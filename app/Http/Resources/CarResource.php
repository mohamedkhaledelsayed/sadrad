<?php

namespace App\Http\Resources\Resources;
use App\Car;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
        'id'    => $this->id,
        '' => $this->getTranslation('',$request->locale),
        '' => $this->getTranslation('',$request->locale),
        '' => $this->getTranslation('',$request->locale),
        ];
    }
}
