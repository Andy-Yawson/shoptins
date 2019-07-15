<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogVisitor extends Model
{

    public $table = "tbl_log_visitors";

    protected $fillable = [
        'visitor_id', 'ip_address', 'country',
        'timezone','latlng','city','created_at'
    ];
}
