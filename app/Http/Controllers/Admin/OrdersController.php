<?php

namespace App\Http\Controllers\Admin;

use App\International;
use App\LogOrder;
use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function manageOrders(){

        $all_orders = DB::table('tbl_order')
            ->join('users','tbl_order.customer_id','=','users.id')
            ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
            ->select('tbl_order.*','users.name','tbl_payment.payment_method','tbl_payment.payment_status')
            ->orderBy('order_id','desc')
            ->get();

        return view('components.admin.manage_orders',['orders'=>$all_orders]);
    }

    public function manageOrdersInt(){
        $orders = DB::table('international_order')
            ->join('users','international_order.customer_id','=','users.id')
            ->select('international_order.*','users.name','users.email')
            ->get();
        return view('components.admin.manage_int_orders',compact('orders'));
    }

    public function viewOrderInt($order_code){
        $order_details = DB::table('international_order')
            ->join('users','international_order.customer_id','=','users.id')
            ->join('international','international_order.order_code','=','international.code')
            ->where('international_order.order_code',$order_code)
            ->select('international_order.*','international.*','users.*')
            ->get();
            /*echo "<pre>";
            print_r($order_details);
            echo "</pre>";*/
        return view('components.admin.view_order_int',['order_detail'=>$order_details]);
    }

    public function viewOrder($order_id){

        $order_details = DB::table('tbl_order')
            ->join('users','tbl_order.customer_id','=','users.id')
            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->where('tbl_order.order_id',$order_id)
            ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','users.*')
            ->get();

        /*echo "<pre>";
        print_r($order_details);
        echo "</pre>";*/


        return view('components.admin.view_order',['order_detail'=>$order_details]);
    }

    public function paymentActive($id){
        Payment::where('payment_id',$id)
                ->update(['payment_status'=>1]);

        return redirect(route('admin.view.orders'))
            ->with('status','Payment changed to paid successfully');
    }

    public function paymentUnActive($id){
        Payment::where('payment_id',$id)
            ->update(['payment_status'=>0]);

        return redirect(route('admin.view.orders'))
            ->with('status','Payment changed to unpaid successfully');
    }

    public function activeOrder($order_id){
        Order::where('order_id','=',$order_id)
            ->update(['order_status' => 2]);

        Payment::where('order_id','=',$order_id)
                ->update(['payment_status' => 1]);

        LogOrder::create([
            'order_id' => $order_id,
            'order_status' => 2,
            'admin_id' => Auth::user()->id
        ]);

        return redirect(route('admin.view.orders'))
            ->with('status','Order successfully delivered with payment');
    }

    public function unactiveOrder($order_id){
        Order::where('order_id','=',$order_id)
            ->update(['order_status' => 0]);

        Payment::where('order_id','=',$order_id)
            ->update(['payment_status' => 0]);

        return redirect(route('admin.view.orders'))
            ->with('status','Order was set to not delivered successfully');
    }

    public function confirmOrder($id){
        Order::where('order_id','=',$id)
            ->update(['order_status' => 1]);

        LogOrder::create([
            'order_id' => $id,
            'order_status' => 1,
            'admin_id' => Auth::user()->id
        ]);

        return redirect(route('admin.view.orders'))
            ->with('status','Order was confirmed successfully');
    }

    public function declineOrder($id){
        Order::where('order_id','=',$id)
            ->update(['order_status' => 3]);

        LogOrder::create([
            'order_id' => $id,
            'order_status' => 3,
            'admin_id' => Auth::user()->id
        ]);

        return redirect(route('admin.view.orders'))
            ->with('status','Order was declined successfully');
    }
}
