<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Product;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','show']);
    }

    public function index(){

        #return ProductResource::collection(Product::all());
        $data = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->join('tbl_shop','tbl_products.shop_id','=','tbl_shop.shop_id')
            ->join('tbl_reviews','tbl_products.product_id','=','tbl_reviews.product_id')
            ->select('tbl_products.*','tbl_category.category_name',
                'tbl_manufacture.manufacture_name',
                'tbl_shop.shop_name','tbl_reviews.star')
            ->where('tbl_products.publication_status','=',1)
            ->paginate(10);

        return ProductCollection::collection($data);
    }

    public function show($product){
        $data = Product::where('product_id',$product)->first();
        return new ProductResource($data);
    }

    public function update(){

    }

    public function destroy(){

    }

    public function edit(Product $product){

    }

    public function store(Request $request){
        return "This shit is good";
    }
}
