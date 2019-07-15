<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoreImage extends Model
{
    public $table = "tbl_more_images";

    protected $fillable = [
         'product_id', 'image',
    ];
}
