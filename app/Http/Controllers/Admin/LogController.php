<?php

namespace App\Http\Controllers\Admin;

use App\LogOrder;
use App\LogVisitor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function orderLogs(){

        $orderLogs = DB::table('tbl_log_order')
            ->join('admins','tbl_log_order.admin_id','=','admins.id')
            ->join('tbl_order','tbl_log_order.order_id','=','tbl_order.order_id')
            ->select('tbl_order.order_code','admins.name','tbl_log_order.*')
            ->get();

        return view('components.admin.order_logs',['orderLogs'=>$orderLogs]);
    }

    public function productLogs(){
        $productLogs = DB::table('tbl_log_product')
            ->join('admins','tbl_log_product.admin_id','=','admins.id')
            ->join('tbl_products','tbl_log_product.product_id','=','tbl_products.product_id')
            ->select('tbl_products.product_name','tbl_products.product_price','admins.name','tbl_log_product.*')
            ->get();

        return view('components.admin.product_logs',['productLogs'=>$productLogs]);
    }

    public function VisitorLogs(){
        $visitorLogs = LogVisitor::all();

        return view('components.admin.visitor_logs',['visitorLogs'=>$visitorLogs]);
    }
}
