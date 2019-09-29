<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternationalOrder extends Model
{
    protected $table = "international_order";

    protected $fillable = ['customer_id','order_code','status', 'payment'];
}
