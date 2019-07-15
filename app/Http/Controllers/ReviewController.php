<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insertReview(Request $request){

        $this->validate($request,[
            'name' => 'required|min:3',
            'comment' => 'required|min:5',
        ]);

        $rating = empty($request->rating) ? 0 : $request->rating;

        Review::create([
            "user_id" => Auth::user()->id,
            "product_id" => $request->product_id,
            "name" => $request->name,
            "review" => $request->comment,
            "star" => $rating
        ]);
        $data = Review::where('product_id','=',$request->product_id)->get();
        $summed = 0;
        foreach ($data as $dataSum){
            $summed = $summed + $dataSum["star"];
        }
        $finalRating = $summed / count($data);
        Product::where('product_id','=',$request->product_id)
            ->update(['rating' => $finalRating]);

        return redirect(route('user.shop.product.detail',$request->product_id))
            ->with("status","Your review was successfully created for this product");
    }
}
