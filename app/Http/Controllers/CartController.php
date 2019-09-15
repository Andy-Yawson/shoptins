<?php

namespace App\Http\Controllers;

use App\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function ajaxAddToCart(Request $request){

        $product_info = DB::table('tbl_products')
            ->where('product_id',$request->product_id)
            ->first();

        $price = $product_info->product_del > 0 ?
            round((1 - ($product_info->product_del/100)) * $product_info->product_price)
            : $product_info->product_price;

        $data["qty"] = $request->qty;
        $data["id"] = $product_info->product_id;
        $data["name"] = $product_info->product_name;
        $data["price"] = $price;
        $data["weight"] = 0;
        $data["options"]["image"] = $product_info->product_image;
        $data["options"]["product_del"] = $product_info->product_del;
        $data["options"]["product_price"] = $product_info->product_price;

        Cart::add($data);
        /*Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'weight' => 550,
            'options' => ['image' => 'large.png']]);*/
        return Cart::content()->count();
    }

    public function add_to_cart(Request $request){

        $product_info = DB::table('tbl_products')
                        ->where('product_id',$request->product_id)
                        ->first();

        $price = $product_info->product_del > 0 ?
            round((1 - ($product_info->product_del/100)) * $product_info->product_price)
            : $product_info->product_price;

        $data["qty"] = $request->qty;
        $data["id"] = $product_info->product_id;
        $data["name"] = $product_info->product_name;
        $data["price"] = $price;
        $data["options"]["image"] = $product_info->product_image;
        $data["options"]["shop"] = $product_info->shop_id;
        $data["options"]["product_del"] = $product_info->product_del;
        $data["options"]["product_price"] = $product_info->product_price;

        Cart::add($data);
        return redirect(route('user.shop.show.cart'));
    }


    public function show_cart(){

        if (count(Cart::content()) > 0){
            $discount = session()->has('coupon') ? session()->get('coupon')["discount"] : 0;
            return view('show_cart');
        }else{
            return view('empty');
        }
    }

    public function delete_item($rowID){
        Cart::update($rowID,0);
        return redirect(route('user.shop.show.cart'));
    }

    public function update_item(Request $request){
        $qty = $request->qty;
        $rowId = $request->rowId;

        Cart::update($rowId,$qty);
        return redirect(route('user.shop.show.cart'));
    }

    public function cart_clear(){
        Cart::destroy();
        return redirect()->route('user.shop.show.cart');
    }
}
