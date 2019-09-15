@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">All Manufacturers</h4>
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
                                <th>Slug</th>
                                <th>Publication Status</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Publication Status</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($manufacture as $single)
                                <tr>
                                    <td>{{$single->manufacture_name}}</td>
                                    <td>{{$single->manufacture_slug}}</td>
                                    <td>
                                        @if($single->publication_status == 0)
                                            <button class="btn btn-danger">Inactive</button>
                                        @else
                                            <button class="btn btn-success">Active</button>
                                        @endif
                                    </td>
                                    <td>{{Carbon\Carbon::parse($single->created_at)->format('F d, Y H:i')}}</td>
                                    <td align="center">
                                        @if($single->publication_status == 0)
                                            <a href="{{route('admin.active.manufacture',$single->manufacture_id)}}"><i class="fa fa-thumbs-up fa-2x" style="color: green"></i></a>
                                        @else
                                            <a href="{{route('admin.unactive.manufacture',$single->manufacture_id)}}"><i class="fa fa-thumbs-o-down fa-2x" style="color: red"></i></a>
                                        @endif
                                        <a href="{{route('admin.edit.manufacture',$single->manufacture_id)}}"><i class="fa fa-pencil-square-o fa-2x" style="color:#6f42c1"></i></a>
                                        <a href="{{route('admin.delete.manufacture',$single->manufacture_id)}}"><i class="fa fa-trash-o fa-2x"></i></a>
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