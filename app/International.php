<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class International extends Model
{
    protected $table = "international";

    protected $fillable = [
        'link','quantity','weight','origin','destination','other',
        'shopper_assist','self_shopper','address','user_id','code', 'price'
    ];

}
