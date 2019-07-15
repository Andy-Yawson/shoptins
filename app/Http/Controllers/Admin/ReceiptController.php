<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function viewInvoice($order_id){

        $order_details = DB::table('tbl_order')
            ->join('users','tbl_order.customer_id','=','users.id')
            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->where('tbl_order.order_id',$order_id)
            ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','users.*')
            ->get();

        return view('components.admin.customer-invoice',['order_detail'=>$order_details]);
    }
}
