<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return
            [
            'id' => $this->id,
            'name' => $this->name
            ];
//        $data = parent::toArray($request);
//
//        // Thêm các trường riêng của Resource này
//        $data['status'] = 2001;
//        return  $data;
    }
}
