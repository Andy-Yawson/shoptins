@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">All Orders</h4>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ session('status') }}
                            </div>
                        @endif
                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Order Code</th>
                                <th>Customer Name</th>
                                <th>Payment Type</th>
                                <th>Payment</th>
                                <th>Order Total</th>
                                <th>Delivery Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Order Code</th>
                                <th>Customer Name</th>
                                <th>Payment Type</th>
                                <th>Payment</th>
                                <th>Order Total</th>
                                <th>Delivery Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->order_code}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->payment_method}}</td>
                                    <td>
                                        @if($order->payment_status == 0)
                                            <button class="btn btn-info">unpaid</button>
                                        @else
                                            <button class="btn btn-success">Paid</button>
                                        @endif
                                    </td>
                                    <td>&#8373;{{$order->order_total}}</td>
                                    <td>
                                        @if($order->order_status == 0)
                                            <button class="btn btn-info">Pending</button>
                                        @elseif($order->order_status == 1)
                                            <button class="btn btn-primary">Confirmed</button>
                                        @elseif($order->order_status == 2)
                                            <button class="btn btn-primary">Delivered</button>
                                        @elseif($order->order_status == 3)
                                            <button class="btn btn-danger">Declined</button>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($order->order_status == 1)
                                            <a href="{{route('admin.active.order',$order->order_id)}}" title="Not Delivered"><i class="fa fa-thumbs-up fa-2x" style="color: green"></i></a>
                                        @else
                                            <a href="{{route('admin.unactive.order',$order->order_id)}}" title="Delivered"><i class="fa fa-thumbs-o-down fa-2x" style="color: red"></i></a>
                                        @endif
                                        <?php
                                            $payment = \App\Payment::where('user_id',$order->customer_id)
                                                                        ->where('order_id',$order->order_id)
                                                                        ->first();
                                            if ($payment->payment_status == 0){
                                                ?>
                                                <a href="{{route('admin.payment.active',$payment->payment_id)}}" title="paid"><i class="fa fa-money fa-2x" style="color:#008000"></i></a>
                                                <?php
                                            }else{
                                                ?>
                                                <a href="{{route('admin.payment.unactive',$payment->payment_id)}}" title="unpaid"><i class="fa fa-money fa-2x" style="color:#ff0000"></i></a>
                                                <?php
                                            }
                                        ?>
                                            <a href="{{route('admin.view.order.detail',$order->order_id)}}" title="Manage Order"><i class="fa fa-eye fa-2x" style="color:#6f42c1"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection