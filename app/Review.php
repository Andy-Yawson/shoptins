<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $table = "tbl_reviews";

    protected $fillable = [
        'id' ,'user_id', 'product_id', 'name',
        'review' , 'star' ,'created_at',];



    public function product(){

        return $this->belongsTo(Product::class);
    }
}
