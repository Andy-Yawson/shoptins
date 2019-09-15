<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $table = "apps_countries";

    protected $fillable = [
        'country_code', 'country_name'
    ];
}