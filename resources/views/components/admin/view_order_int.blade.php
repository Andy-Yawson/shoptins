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
                                    <td>
                                        {{ $order_detail[0]->phone }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Shipping Details | Other Specifications</h4>
                        @if($order_detail[0]->address == "none")
                            <p>No shipping details provided</p>
                        @else
                            {{ $order_detail[0]->address }}
                        @endif
                        <hr>
                        @if($order_detail[0]->other == "none")
                            <p>No spec details provided</p>
                        @else
                            {{ $order_detail[0]->other }}
                        @endif
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
                                <th>Order Code</th>
                                <th>Link</th>
                                <th>Quantity</th>
                                <th>Weight</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Shopper Assist</th>
                                <th>Self Shopper</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($order_detail as $detail)
                                    <tr>
                                        <td>{{ $detail->order_code }}</td>
                                        <td>{{ $detail->link }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ $detail->weight }}</td>
                                        <td>{{ $detail->origin }}</td>
                                        <td>{{ $detail->destination }}</td>
                                        <td>
                                            @if($detail->shopper_assist == 1)
                                                <p>yes</p>
                                            @else
                                                <p>No</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($detail->self_shopper == 1)
                                                <p>yes</p>
                                            @else
                                                <p>No</p>
                                            @endif
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