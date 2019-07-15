<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogOrder extends Model
{
    public $table = "tbl_log_order";

    protected $fillable = [
        'log_id', 'order_id', 'order_status',
        'admin_id' , 'created_at'
    ];
}
