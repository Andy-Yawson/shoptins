<?php

namespace App\Http\Controllers;

use App\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CouponsController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code',$request->coupon_code)->first();

        if (!$coupon){
            return redirect()->route('user.shop.show.cart')
                ->with('error','Invalid Coupon Code, please try again');
        }

        session()->put('coupon',[
           'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::subtotal())
        ]);


        return redirect()->route('user.shop.show.cart')
            ->with('status','Coupon has being applied!');
    }



    public function destroy()
    {
        session()->forget('coupon');
        return redirect()->route('user.shop.show.cart')
            ->with('status','Coupon has being removed!');
    }
}
