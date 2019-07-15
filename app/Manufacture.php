<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    public $table = "tbl_manufacture";

    protected $fillable = [
        'manufacture_id', 'manufacture_name', 'manufacture_description',
        'publication_status' , 'created_at'
    ];
}
