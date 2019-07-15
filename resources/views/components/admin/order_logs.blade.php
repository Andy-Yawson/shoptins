@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">All Logged Orders</h4>
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
                                <th>Log ID</th>
                                <th>Order Code</th>
                                <th>Action Taken</th>
                                <th>Done by</th>
                                <th>Worked On</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Log ID</th>
                                <th>Order ID</th>
                                <th>Action Taken</th>
                                <th>Done by</th>
                                <th>Worked On</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($orderLogs as $log)
                                <tr>
                                    <td>{{$log->log_id}}</td>
                                    <td>{{$log->order_code}}</td>
                                    <td>
                                        @if($log->order_status == 1)
                                            <button class="btn btn-primary">Confirmed Order</button>
                                        @elseif($log->order_status == 2)
                                                <button class="btn btn-success">Order Delivered</button>
                                        @elseif($log->order_status == 3)
                                                <button class="btn btn-danger">Declined Order</button>
                                        @endif
                                    </td>
                                    <td>{{$log->name}}</td>
                                    <td>
                                        {{Carbon\Carbon::parse($log->created_at)->format('F d, Y H:i')}}
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