<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Review\ReviewResource;
use App\Product;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index($product_id){

        $data = Review::where('product_id',$product_id)->get();
        return ReviewResource::collection($data);
    }

    public function show(){

    }
}
