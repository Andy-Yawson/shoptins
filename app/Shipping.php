<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $table = "tbl_shipping";

    protected $fillable = [
        'shipping_id', 'shipping_name', 'shipping_address',
        'shipping_city' , 'shipping_email' ,'created_at',  'shipping_phone' , 'shipping_notes'
    ];
}
