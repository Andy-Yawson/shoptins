<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $table = "tbl_sliders";

    protected $fillable = [
        'slider_id', 'slider_name', 'slider_description',
        'publication_status' , 'created_at', 'slider_image'
    ];
}
