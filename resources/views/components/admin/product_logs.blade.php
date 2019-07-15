@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">All Logged Products Activities</h4>
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
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Action Taken</th>
                                <th>Done by</th>
                                <th>Worked On</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Log ID</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Action Taken</th>
                                <th>Done by</th>
                                <th>Worked On</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($productLogs as $log)
                                <tr>
                                    <td>{{$log->log_id}}</td>
                                    <td>{{$log->product_name}}</td>
                                    <td>{{$log->product_price}}</td>
                                    <td>
                                        @if($log->product_status == 1)
                                            <button class="btn btn-danger">Activated Product</button>
                                        @elseif($log->product_status == 2)
                                                <button class="btn btn-danger">Unactivated Product</button>
                                        @elseif($log->product_status == 3)
                                                <button class="btn btn-danger">Deleted Product</button>
                                        @elseif($log->product_status == 4)
                                                <button class="btn btn-danger">Activated Stock</button>
                                        @elseif($log->product_status == 5)
                                                <button class="btn btn-danger">Unactivated Stock</button>
                                        @elseif($log->product_status == 6)
                                                <button class="btn btn-danger">Updated Product</button>
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