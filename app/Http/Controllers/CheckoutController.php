<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\OrderShipped;
use App\Payment;
use App\Shipping;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['checkout']);
    }

    public function checkout(){
        if (\auth()->check()){
            $checkout = Shipping::where('user_id',Auth::user()->id)->first();
            return view('checkout',['checkout'=>$checkout]);
        }else{
            return view('checkout');
        }
    }

    public function createShipping(Request $request){

        //========= do validation checks here ============
        $data = array();
        if ($request->shipping_notes == null)
            $notes = "none";
        else
            $notes = $request->shipping_notes;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_city'] = $request->shipping_city;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_notes'] = $notes;
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        $check = Shipping::where('user_id',Auth::user()->id)->first();
        if ($check){
            Shipping::where('user_id',Auth::user()->id)
                    ->update($data);
            $order_code = substr(sha1(time()),0,6);
            Session::put('order_id',strtoupper($order_code));
            Session::put('shipping_id',$check->shipping_id);
        }else{
            $shipping_id = DB::table('tbl_shipping')
                ->insertGetId($data);
            $order_code = substr(sha1(time()),0,6);
            Session::put('order_id',strtoupper($order_code));
            Session::put('shipping_id',$shipping_id);
        }
        return redirect(route('user.payment'));
    }

    public function getPayment(){
        return view('user_payment');
    }

    public function orderPlace(Request $request){
        /*$contents = Cart::content();
        echo "<pre>";
        print_r($contents);
        echo "</pre>";*/
        $payment_gateway = $request->payment_type;
        $shipping_id = Session::get('shipping_id');
        $order_code = Session::get('order_id');

        $pdata = array();
        $pdata["payment_method"] = $payment_gateway;
        $pdata["user_id"] = Auth::user()->id;
        $pdata["order_id"] = 0;
        $pdata["payment_status"] = 0;
        $pdata['created_at'] = Carbon::now();
        $pdata['updated_at'] = Carbon::now();

        $payment_id = DB::table('tbl_payment')
                      ->insertGetId($pdata);

        $odata = array();
        $odata["customer_id"] = Auth::user()->id;
        $odata["shipping_id"] = $shipping_id;
        $odata["payment_id"] = $payment_id;
        $odata["order_total"] = Cart::total();
        $odata["order_status"] = 0;
        $odata["order_code"] = $order_code;
        $odata['created_at'] = Carbon::now();
        $odata['updated_at'] = Carbon::now();

        $order_id = DB::table('tbl_order')
            ->insertGetId($odata);


        //======= update the payment table with the order id
        Payment::where('payment_id','=',$payment_id)
                ->update(["order_id"=>$order_id]);


        $contents = Cart::content();
        $oddata = array();
        foreach ($contents as $single){
            $oddata["order_id"] = $order_id;
            $oddata["product_id"] = $single->id;
            $oddata["product_name"] = $single->name;
            $oddata["product_price"] = $single->price;
            $oddata["product_sales_quantity"] = $single->qty;
            $oddata['created_at'] = Carbon::now();
            $oddata['updated_at'] = Carbon::now();

            DB::table('tbl_order_details')->insert($oddata);
        }

        Cart::destroy();

        //send confirmation email
        /*Mail::to(Auth::user()->email)
                ->send( new OrderShipped($order_code,Auth::user()->name,$payment_gateway,Auth::user()->email) );*/
        return redirect(route('user.confirm'))->with('order_code',$order_code);
    }

    public function confirmationPage(){
        $category = Category::all();
        if (Session::has('order_code') or Session::has('code'))
            return view('confirmation',['categories'=>$category]);
        else
            return redirect()->back();
    }
}












