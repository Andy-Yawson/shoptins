<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogProduct extends Model
{
    public $table = "tbl_log_product";

    protected $fillable = [
        'log_id', 'product_id', 'product_status',
        'admin_id' , 'created_at'
    ];
}
