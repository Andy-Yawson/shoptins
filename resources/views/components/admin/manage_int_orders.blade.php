@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">All International Orders</h4>
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
                                <th>Customer Email</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Order Code</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->order_code }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>
                                        @if($order->status == 0)
                                            <p class="text-info">Pending</p>
                                        @elseif($order->status == 1)
                                            <p class="text-success">Confirmed</p>
                                        @elseif($order->status == 2)
                                            <p class="text-danger">Declined</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.view.order.detail.int',$order->order_code) }}">
                                            <button class="btn btn-success">
                                                <i class="fa fa-bookmark"></i>
                                                Manage Order
                                            </button>
                                        </a>
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