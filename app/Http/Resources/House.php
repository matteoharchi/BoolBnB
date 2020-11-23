<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class House extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'rooms' => $this->rooms,
            'beds' => $this->beds,
            'bathrooms' => $this->bathrooms,
            'price' => $this->price,
            'size' => $this->size,
            'address' => $this->address,
            'long' => $this->long,
            'lat' => $this->lat,
            'img' => $this->img,
            'visible' => $this->visible,
            'services' => $this->services->pluck('name'),
            // 'services' => $this->whenPivotLoadedAs('services', 'house_service', function () {
            //     return $this->services->name;
            // }),
        ];
    }
}
