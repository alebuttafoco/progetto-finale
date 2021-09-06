<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            "id" => $this->id,
            "user_id"=> $this->user_id,
            "name" => $this->name,
            "image" => $this->image,
            "address" => $this->address,
            "cap" => $this->cap,
            "city" => $this->city,
            "description" => $this->description,
            "piva" => $this->piva,

            'categories' => CategoryResource::collection($this->categories),
            'plates' => PlateResource::collection($this->plates),
        ];
        // return parent::toArray($request);
    }
}
