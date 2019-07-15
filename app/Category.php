<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $table = "tbl_category";

    protected $fillable = [
        'category_id', 'category_name', 'category_description',
        'publication_status' , 'created_at'
    ];
}
