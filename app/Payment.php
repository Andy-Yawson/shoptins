<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $table = "tbl_payment";

    protected $fillable = [
        'payment_id', 'payment_method','user_id',
        'order_id', 'payment_status', 'created_at',
        'updated_at'
    ];
}
