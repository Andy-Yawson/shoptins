<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    public $table = "tbl_products";

    protected $fillable = [
        'product_id', 'category_id', 'manufacture_id','product_name',
        'product_short_description' , 'product_long_description','product_price',
        'product_image','product_size','product_color','publication_status','created_at',
        'product_del','shop_id', 'stock','feature','rating','slug'
    ];


    public function reviews(){

        return $this->hasMany(Review::class);
    }

}
