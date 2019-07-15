@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">All Administrators</h4>
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
                                <th>Level</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>
                                        @if($admin->level == 0)
                                            <button class="btn btn-info">Super Admin</button>
                                        @elseif($admin->level == 1)
                                            <button class="btn btn-success">Normal Admin</button>
                                        @else
                                            <button class="btn btn-primary">Shop Owner</button>
                                        @endif
                                    </td>
                                    <td>{{Carbon\Carbon::parse($admin->created_at)->format('F d, Y H:i')}}</td>
                                    <td>
                                        <a href="{{route('admin.delete.admin',$admin->id)}}"><i class="fa fa-trash-o fa-2x"></i></a>
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