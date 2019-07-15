<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->product_name,
            'description' => $this->product_short_description,
            'price' => $this->product_price,
            'stock' => $this->stock,
            'discount' => $this->product_del,
            'href' => [
                'reviews' => route('reviews.index',$this->product_id),
                'image' => $this->product_image
            ],
            'others' => [
                'long_description' => $this->product_long_description
            ]
        ];
    }
}
