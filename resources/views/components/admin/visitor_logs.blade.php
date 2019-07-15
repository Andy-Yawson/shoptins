@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">All Logged Visitors</h4>
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
                                <th>IP Address</th>
                                <th>Country</th>
                                <th>Timezone</th>
                                <th>LatLng</th>
                                <th>City</th>
                                <th>Logged On</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Log ID</th>
                                <th>IP Address</th>
                                <th>Country</th>
                                <th>Timezone</th>
                                <th>LatLng</th>
                                <th>City</th>
                                <th>Logged On</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($visitorLogs as $log)
                                <tr>
                                    <td>{{$log->visitor_id}}</td>
                                    <td>{{$log->ip_address}}</td>
                                    <td>{{$log->country}}</td>
                                    <td>{{$log->timezone}}</td>
                                    <td>{{$log->latlng}}</td>
                                    <td>{{$log->city}}</td>
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