@extends('components.print')
@section('content')

<div id="printDiv">
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div>
                    <img src="{{asset('images/logo.png')}}">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div>
                            <h6>From</h6>
                            <p><strong>Shoptins</strong>.</p>
                            <p>East Legon Ave. Old Block</p>
                            <p>Accra - Ghana</p>
                            <p>Phone: (233) 209386780</p>
                            <p>Email: support@shoptins.com</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div>
                            <h6>To</h6>
                            <p><strong>{{$order_detail[0]->name}}</strong></p>
                            <p>{{$order_detail[0]->shipping_address}}</p>
                            <p>{{$order_detail[0]->shipping_city}} - Ghana</p>
                            <p>{{$order_detail[0]->shipping_phone}}</p>
                            <p>{{$order_detail[0]->shipping_email}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div>
                            <h6>Invoice</h6>
                            <p>Invoice #{{substr(md5(rand(0,7)),0,6)}}</p>
                            <p>Order Code: {{$order_detail[0]->order_code}}</p>
                            <?php $payment_type = \App\Payment::where('payment_id','=',$order_detail[0]->payment_id)->first()?>
                            <p>Payment Type: {{$payment_type->payment_method}}</p>
                            <h5>Total Amount: GH&#8373;{{$order_detail[0]->order_total}}</h5>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <h5>{{\Carbon\Carbon::now()->format('F d, Y')}}</h5>
                        <p>Shipping Fees: GH&#8373;5.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">Customer Order Details</h4>
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
                        <hr>
                        <td colspan="4">
                            <strong>DA signature/Stamp</strong><br><br><br>
                        </td>
                        <td>
                            <strong>Shoptins Stamp</strong><br><br><br>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="col-md-4 col-md-offset-2">
                <a href="#" id="printBtn">
                    <button class="btn btn-warning"><i class="fa fa-print"></i> Print Invoice</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#printBtn').click(function (e) {
            e.preventDefault();
            window.print();
        });
    })
</script>

@endsection
