<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
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
            'name' => $this->product_name,
            'description' => $this->product_short_description,
            'price' => $this->product_price,
            'stock' => $this->stock,
            'discount' => $this->product_del,
            'star' => round($this->rating,1),
            'shop' => $this->shop_name,
            'href' => [
                'link' => route('products.show',$this->product_id),
                'image' => $this->product_image
            ],
            'others' => [
                'long_description' => $this->product_long_description,
                'category' => $this->category_name,
                'manufacture' => $this->manufacture_name,
                'size' => $this->product_size,
                'colour' => $this->product_color,
            ]
        ];
    }
}
