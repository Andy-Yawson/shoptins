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
                                <th>Code</th>
                                <th>Link</th>
                                <th>Qty</th>
                                <th>KG</th>
                                <th>Origin</th>
                                <th>Shopper Assist</th>
                                <th>Self Shopper</th>
                                <th>Price</th>
                                <th>SubTotal</th>
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
                                        <td>
                                            {{ $detail->price }}
                                        </td>
                                        <td>
                                            {{ $detail->price * $detail->quantity }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="8">Total With Admin Fee:</td>
                                <td>
                                    <strong>
                                        <?php $total = 0;$check = false; ?>
                                        @foreach($order_detail as $detail)
                                            <?php $total = ($total + $detail->price) * $detail->quantity  ?>
                                        @endforeach
                                        @foreach($order_detail as $detail)
                                            @if($detail->shopper_assist == 1)
                                                <?php $check = true; ?>
                                            @endif
                                        @endforeach
                                        @if($check)
                                            = &#8373;{{ $total + 50 }}
                                        @else
                                            = &#8373;{{ $total }}
                                        @endif
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="9">
                                    <a href="{{ route('admin.order.confirm.int',$order_detail[0]->order_code) }}"><button class="btn btn-primary">Confirm Order</button></a>
                                    <a href="{{ route('admin.order.decline.int',$order_detail[0]->order_code) }}"><button class="btn btn-danger">Decline Order</button></a>
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