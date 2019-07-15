@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Customer Details</h4>
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$order_detail[0]->name}}</td>
                                    <td>{{$order_detail[0]->shipping_phone}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Shipping Details</h4>
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>City</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$order_detail[0]->shipping_name}}</td>
                                <td>{{$order_detail[0]->shipping_address}}</td>
                                <td>{{$order_detail[0]->shipping_phone}}</td>
                                <td>{{$order_detail[0]->shipping_city}}</td>
                                <td>{{$order_detail[0]->shipping_email}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Order Details</h4>
                        <table class="table table-striped" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Sales Quantity</th>
                                <th>Product SubTotal</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($order_detail as $detail)
                                    <tr>
                                        <td>{{$detail->order_id}}</td>
                                        <td>{{$detail->product_name}}</td>
                                        <td>&#8373;{{$detail->product_price}}</td>
                                        <td>{{$detail->product_sales_quantity}}</td>
                                        <td>&#8373;{{intval($detail->product_price) * intval($detail->product_sales_quantity) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">Total With VAT:</td>
                                <td><strong>= &#8373;{{$order_detail[0]->order_total}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <a href="{{route('admin.view.invoice',$order_detail[0]->order_id)}}" target="_blank">
                                        <button class="btn btn-default"><i class="fa fa-ticket"></i> View Invoice</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('admin.order.confirm',$order_detail[0]->order_id)}}"><button class="btn btn-primary">Confirm Order</button></a>
                                    <a href="{{route('admin.order.decline',$order_detail[0]->order_id)}}"><button class="btn btn-danger">Decline Order</button></a>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection