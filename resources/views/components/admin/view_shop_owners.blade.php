@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">All Shop Owners</h4>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Shop Code</th>
                                <th>Shop Name</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Shop Code</th>
                                <th>Shop Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td>{{$owner->name}}</td>
                                    <td>{{$owner->email}}</td>
                                    <td>{{$owner->phone}}</td>
                                    <td>{{$owner->shop_code}}</td>
                                    <td>{{$owner->shop_name}}</td>
                                    <td>{{Carbon\Carbon::parse($owner->created_at)->format('F d, Y H:i')}}</td>
                                    <td>
                                        <a href=""><i class="fa fa-trash-o fa-2x"></i></a>
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